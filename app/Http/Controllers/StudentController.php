<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class StudentController extends Controller
{
    /** Menampilkan halaman daftar siswa */
    public function student()
    {
        $studentList = Student::all();
        return view('student.student', compact('studentList'));
    }

    /** Menampilkan halaman daftar siswa dalam bentuk grid */
    public function studentGrid()
    {
        $studentList = Student::all();
        return view('student.student-grid', compact('studentList'));
    }

    /** Menampilkan halaman tambah siswa */
    public function studentAdd()
    {
        // Ambil data user untuk dropdown hanya yang memiliki role_name 'Student'
        $users = User::where('role_name', 'Student')->select('id', 'name', 'email')->get();

        return view('student.add-student', compact('users'));
    }

    /** Menyimpan data siswa yang baru ditambahkan */
    public function studentSave(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'gender'        => 'required|not_in:0',
            'date_of_birth' => 'required|string',
            'roll'          => 'required|string',
            'blood_group'   => 'required|string',
            'religion'      => 'required|string',
            'email'         => 'required|email|unique:students,email|unique:students,first_name,NULL,id,last_name,' . $request->last_name,
            'class'         => 'required|string',
            'section'       => 'required|string',
            'admission_id'  => 'required|string',
            'phone_number'  => 'required',
            'upload'        => 'required|image',
            'parent_name'   => 'required|string',
            'address'       => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $upload_file = rand() . '.' . $request->upload->extension();
            $request->upload->move(storage_path('app/public/student-photos/'), $upload_file);

            // Memeriksa apakah nama dan email sudah ada di database
            $existingStudent = Student::where('first_name', $request->first_name)
                ->where('last_name', $request->last_name)
                ->first();
            if ($existingStudent) {
                throw new \Exception('Nama sudah digunakan.');
            }

            $student = new Student;
            $student->first_name   = $request->first_name;
            $student->last_name    = $request->last_name;
            $student->gender       = $request->gender;
            $student->date_of_birth = $request->date_of_birth;
            $student->roll         = $request->roll;
            $student->blood_group  = $request->blood_group;
            $student->religion     = $request->religion;
            $student->email        = $request->email;
            $student->class        = $request->class;
            $student->section      = $request->section;
            $student->admission_id = $request->admission_id;
            $student->phone_number = $request->phone_number;
            $student->upload = $upload_file;
            $student->parent_name = $request->parent_name;
            $student->address = $request->address;
            $student->save();

            Toastr::success('Siswa berhasil ditambahkan!', 'Success');
            DB::commit();

            return redirect()->route('student/list')->with('success', 'Siswa berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Gagal menambahkan siswa: ' . $e->getMessage(), 'Error');
            return redirect()->back()->withErrors(['msg', 'The Message']);
        }
    }

    /** Menampilkan halaman edit siswa */
    public function studentEdit($id)
    {
        $studentEdit = Student::where('id', $id)->first();
        return view('student.edit-student', compact('studentEdit'));
    }

    /** Menyimpan perubahan data siswa yang diedit */
    public function studentUpdate(Request $request)
    {
        DB::beginTransaction();
        try {
            if (!empty($request->upload)) {
                unlink(storage_path('app/public/student-photos/' . $request->image_hidden));
                $upload_file = rand() . '.' . $request->upload->extension();
                $request->upload->move(storage_path('app/public/student-photos/'), $upload_file);
            } else {
                $upload_file = $request->image_hidden;
            }

            $updateRecord = [
                'upload' => $upload_file,
                'parent_name' => $request->parent_name,
                'address' => $request->address,
            ];
            Student::where('id', $request->id)->update($updateRecord);

            Toastr::success('Siswa berhasil diperbarui!', 'Success');
            DB::commit();
            return redirect()->route('student/list')->with('success', 'Siswa berhasil diupdate!');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Gagal memperbarui siswa.', 'Error');
            return redirect()->back()->withErrors(['msg', 'The Message']);
        }
    }

    /** Menghapus data siswa */
    public function studentDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            if (!empty($request->id)) {
                Student::destroy($request->id);
                unlink(storage_path('app/public/student-photos/' . $request->avatar));
                DB::commit();
                Toastr::success('Siswa berhasil dihapus!', 'Success');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Gagal menghapus siswa.', 'Error');
            return redirect()->back()->withErrors(['msg', 'The Message']);
        }
    }

    /** Menampilkan profil siswa */
    public function studentProfile($id)
    {
        $studentProfile = Student::where('id', $id)->first();
        return view('student.student-profile', compact('studentProfile'));
    }

    /** Mencari siswa berdasarkan kata kunci */
    public function studentlist(Request $request)
    {
        $query = $request->input('search');
        $studentList = Student::where(function ($q) use ($query) {
            $q->where('first_name', 'like', '%' . $query . '%')
                ->orWhere('last_name', 'like', '%' . $query . '%')
                ->orWhere('phone_number', 'like', '%' . $query . '%')
                ->orWhere('date_of_birth', 'like', '%' . $query . '%');
        })
            ->get();

        return view('student.student', compact('studentList'));
    }
    public function exportPdf()
    {
        $studentList = Student::all();
        $pdf = Pdf::loadView('pdf.export-siswa', compact('studentList'));
        return $pdf->download('export-students-' . Carbon::now()->timestamp . '.pdf');
    }
}
