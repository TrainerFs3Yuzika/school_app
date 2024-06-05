@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Contact Details</h1>

    <div class="card">
        <div class="card-header">
            {{ $contact_information->name }}
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $contact_information->email }}</p>
            <p><strong>Phone Number:</strong> {{ $contact_information->phone_number }}</p>
            <p><strong>Address:</strong> {{ $contact_information->address }}</p>
            <p><strong>Twitter:</strong> {{ $contact_information->twitter }}</p>
            <p><strong>Facebook:</strong> {{ $contact_information->facebook }}</p>
            <p><strong>Instagram:</strong> {{ $contact_information->instagram }}</p>
            <p><strong>GitHub:</strong> {{ $contact_information->github }}</p>
            <p><strong>WhatsApp:</strong> {{ $contact_information->whatsapp }}</p>
            <a href="{{ route('contact_information.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
