@extends('dashboard.layouts.app')
@section('title', 'View Email')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Email</h1>
        <div>
            <a href="{{ route('admin.emails.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Emails
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Email Details</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <strong>From:</strong><br>
                            {{ $email->name }}<br>
                            <small class="text-muted">{{ $email->email }}</small>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <strong>Date:</strong><br>
                            {{ $email->created_at->format('M d, Y H:i') }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <strong>Subject:</strong><br>
                        {{ $email->subject }}
                    </div>

                    <div class="mb-4">
                        <strong>Message:</strong><br>
                        <div class="border p-3 bg-light">
                            {!! nl2br(e($email->message)) !!}
                        </div>
                    </div>

                    <div class="mt-4">
                        <form action="{{ route('admin.emails.destroy', $email) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this email?')">
                                <i class="fas fa-trash"></i> Delete Email
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
