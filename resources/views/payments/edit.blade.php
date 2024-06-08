<!-- resources/views/payments/edit.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Payment</h1>
                <form action="{{ route('payments.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="student_id">Student</label>
                        <select class="form-control" id="student_id" name="student_id">
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" {{ $student->id == $payment->student_id ? 'selected' : '' }}>{{ $student->first_name }} {{ $student->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <select class="form-control" id="payment_method" name="payment_method">
                            <option value="Transfer Bank" {{ $payment->payment_method == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                            <option value="Pembayaran Tunai" {{ $payment->payment_method == 'Pembayaran Tunai' ? 'selected' : '' }}>Pembayaran Tunai</option>
                            <option value="Pembayaran Online" {{ $payment->payment_method == 'Pembayaran Online' ? 'selected' : '' }}>Pembayaran Online</option>
                            <option value="Cek atau Giro" {{ $payment->payment_method == 'Cek atau Giro' ? 'selected' : '' }}>Cek atau Giro</option>
                            <option value="Pembayaran Daring melalui Bank" {{ $payment->payment_method == 'Pembayaran Daring melalui Bank' ? 'selected' : '' }}>Pembayaran Daring melalui Bank</option>
                            <option value="Pembayaran dengan Kartu Prabayar" {{ $payment->payment_method == 'Pembayaran dengan Kartu Prabayar' ? 'selected' : '' }}>Pembayaran dengan Kartu Prabayar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="payment_type">Payment Type</label>
                        <select class="form-control" id="payment_type" name="payment_type">
                            @foreach ($payment_types as $type)
                                <option value="{{ $type }}" {{ $payment->payment_type == $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="payment_instructions">Payment Instructions</label>
                        <textarea class="form-control" id="payment_instructions" name="payment_instructions">{{ $payment->payment_instructions }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="payment_status">Payment Status</label>
                        <select class="form-control" id="payment_status" name="payment_status">
                            @foreach ($payment_statuses as $status)
                                <option value="{{ $status }}" {{ $payment->payment_status == $status ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="proof_of_payment">Proof of Payment</label>
                        <input type="file" class="form-control-file" id="proof_of_payment" name="proof_of_payment">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
