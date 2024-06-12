@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>All Payments</h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">
                    Pembayaran
                </button>


                <table class="table" id="paymentTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Siswa</th>
                            <th>Metode Pembayaran</th>
                            <th>Jenis Pembayaran</th>
                            <th>Nominal Pembayaran</th>
                            <th>Status Pembayaran</th>
                            <th>Bukti Pembayaran</th>
                            <th>Waktu Pembayaran</th>
                            <th>update_at Pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->first_name }} {{ $payment->last_name }}</td>
                                <td>{{ $payment->payment_method }}</td>
                                <td>{{ $payment->payment_type }}</td>
                                <td>{{ $payment->payment_instructions }}</td>
                                <td>{{ $payment->payment_status }}</td>
                                <td>
                                    @if($payment->proof_of_payment)
                                        <img src="{{ asset('storage/' . $payment->proof_of_payment) }}" alt="Proof of Payment" width="100">
                                    @else
                                        No Proof
                                    @endif
                                </td>
                                <td>{{ $payment->created_at }}</td>
                                <td>{{ $payment->updated_at }}</td>
                                <td>
                                    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Create Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="student_id">Student</label>
                            <select class="form-control" id="student_id" name="student_id">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select class="form-control" id="payment_method" name="payment_method" onchange="toggleProofOfPayment()">
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="Pembayaran Tunai">Pembayaran Tunai</option>
                                <option value="Pembayaran Online">Pembayaran Online</option>
                                <option value="Cek atau Giro">Cek atau Giro</option>
                                <option value="Pembayaran Daring melalui Bank">Pembayaran Daring melalui Bank</option>
                                <option value="Pembayaran dengan Kartu Prabayar">Pembayaran dengan Kartu Prabayar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="payment_type">Payment Type</label>
                            <select class="form-control" id="payment_type" name="payment_type">
                                <option value="Biaya Pendidikan">Biaya Pendidikan</option>
                                <option value="Seragam Sekolah">Seragam Sekolah</option>
                                <option value="Buku dan Materi Pelajaran">Buku dan Materi Pelajaran</option>
                                <option value="Kegiatan Ekstrakurikuler">Kegiatan Ekstrakurikuler</option>
                                <option value="Makanan dan Kantin">Makanan dan Kantin</option>
                                <option value="Transportasi">Transportasi</option>
                                <option value="Biaya Acara dan Perjalanan">Biaya Acara dan Perjalanan</option>
                                <option value="Biaya Teknologi">Biaya Teknologi</option>
                                <option value="Biaya Tambahan">Biaya Tambahan</option>
                                <option value="Donasi dan Sumbangan">Donasi dan Sumbangan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="payment_instructions">Amount (in IDR)</label>
                            <input type="number" class="form-control" id="payment_instructions" name="payment_instructions" placeholder="Enter amount in IDR">
                        </div>
                        
                        <div class="form-group">
                            {{-- <label for="payment_status">Payment Status</label>
                            <select class="form-control" id="payment_status" name="payment_status">
                                <option value="Pending">Pending</option>
                                <option value="Success">Success</option>
                                <option value="Failed">Failed</option>
                            </select>
                        </div> --}}
                        <div class="form-group" id="proof_of_payment_div">
                            <label for="proof_of_payment">Proof of Payment</label>
                            <input type="file" class="form-control-file" id="proof_of_payment" name="proof_of_payment">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#paymentTable').DataTable({
                "pageLength": 5 // Menampilkan hanya lima data per halaman
            });
        });
    </script>
    
    <script>
        function toggleProofOfPayment() {
            var paymentMethod = document.getElementById('payment_method').value;
            var proofOfPaymentDiv = document.getElementById('proof_of_payment_div');

            if (paymentMethod === 'Pembayaran Tunai') {
                proofOfPaymentDiv.style.display = 'none';
            } else {
                proofOfPaymentDiv.style.display = 'block';
            }
        }

        // Initialize the form with the correct visibility for the proof of payment field
        document.addEventListener('DOMContentLoaded', function() {
            toggleProofOfPayment();
        });
    </script>
@endsection
