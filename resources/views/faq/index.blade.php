<!-- resources/views/faq/index.blade.php -->
@extends('layouts.master')

@section('content')
<title>Daftar FAQ</title>

<!-- DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mt-2">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Daftar FAQ</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">FAQ</li>
                            <li class="breadcrumb-item active">Semua FAQ</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-12 mb-3">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Daftar FAQ</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <!-- Buttons -->
                                        <a href="{{ route('faq.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus"></i> Add New FAQ
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive px-3">
                            <table class="table border-0 star-book table-hover table-center mb-0 table-striped" id="faqTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $faq)
                                        <tr>
                                            <td>{{ $faq->name }}</td>
                                            <td>{{ $faq->email }}</td>
                                            <td>{{ $faq->subject }}</td>
                                            <td>{{ $faq->message }}</td>
                                            <td>
                                                <div class="actions d-flex justify-content-start">
                                                    <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this FAQ?')">
                                                            <i class="far fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Modal -->
        <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="alertModalLabel">Notification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="alertModalBody">
                        <!-- Message will be inserted here dynamically -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Initialize DataTable
            $(document).ready(function() {
                $('#faqTable').DataTable({
                    "pageLength": 5 // Display only five records per page
                });

                // Check for flash messages in the session and show the alert modal if they exist
                @if (session('success'))
                    showAlertModal('{{ session('success') }}');
                @endif

                @if (session('error'))
                    showAlertModal('{{ session('error') }}');
                @endif
            });

            // Function to show alert modal
            function showAlertModal(message) {
                $('#alertModalBody').text(message);
                var alertModal = new bootstrap.Modal(document.getElementById('alertModal'));
                alertModal.show();
            }
        </script>
    </div>
</div>
@endsection
