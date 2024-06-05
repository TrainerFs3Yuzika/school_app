@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Contact Information</h1>
    <a href="{{ route('contact_information.create') }}" class="btn btn-primary">Add New Contact</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
        @php $i = 0; @endphp
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone_number }}</td>
            <td>
                <form action="{{ route('contact_information.destroy', $contact->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('contact_information.show', $contact->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('contact_information.edit', $contact->id) }}">Edit</a>
    
                    @csrf
                    @method('DELETE')
    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
</div>
@endsection
