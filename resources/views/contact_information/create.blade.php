@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Add New Contact</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact_information.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" class="form-control" placeholder="Address"></textarea>
        </div>

        <div class="form-group">
            <label for="twitter">Twitter:</label>
            <input type="text" name="twitter" class="form-control" placeholder="Twitter">
        </div>

        <div class="form-group">
            <label for="facebook">Facebook:</label>
            <input type="text" name="facebook" class="form-control" placeholder="Facebook">
        </div>

        <div class="form-group">
            <label for="instagram">Instagram:</label>
            <input type="text" name="instagram" class="form-control" placeholder="Instagram">
        </div>

        <div class="form-group">
            <label for="github">GitHub:</label>
            <input type="text" name="github" class="form-control" placeholder="GitHub">
        </div>

        <div class="form-group">
            <label for="whatsapp">WhatsApp:</label>
            <input type="text" name="whatsapp" class="form-control" placeholder="WhatsApp">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
