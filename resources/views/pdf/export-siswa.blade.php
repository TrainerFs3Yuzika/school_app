<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header, .footer {
            width: 100%;
            text-align: center;
            position: fixed;
        }
        .header {
            top: 0;
        }
        .footer {
            bottom: 0;
        }
        .footer .page-number:before {
            content: counter(page);
        }
        .content {
            margin: 50px 0;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .avatar {
            text-align: center;
        }
        .avatar img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Daftar Siswa</h2>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tanggal Lahir</th>
                    <th>Nama Orang Tua</th>
                    <th>No. Telepon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentList as $key => $list)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td class="avatar">
                        <img src="{{ storage_path('app/public/student-photos/'.$list->upload) }}" alt="Gambar Pengguna">
                    </td>
                    <td>{{ $list->first_name }} {{ $list->last_name }}</td>
                    <td>{{ $list->class }} {{ $list->section }}</td>
                    <td>{{ $list->date_of_birth }}</td>
                    <td>{{ $list->parent_name }}</td>
                    <td>{{ $list->phone_number }}</td>
                    <td>{{ $list->address }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer">
        <p>Page <span class="page-number"></span></p>
    </div>
</body>
</html>
