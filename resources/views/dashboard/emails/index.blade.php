@extends('dashboard.layouts.app')
@section('title', 'Emails')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Emails</h1>
        <div>
            <span class="badge badge-danger">{{ $unreadCount }} Unread</span>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>From</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($emails as $email)
                                    <tr class="{{ $email->is_read ? '' : 'table-primary' }}">
                                        <td>
                                            @if($email->is_read)
                                                <i class="fas fa-envelope-open text-gray-300"></i>
                                            @else
                                                <i class="fas fa-envelope text-primary"></i>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $email->name }}<br>
                                            <small class="text-muted">{{ $email->email }}</small>
                                        </td>
                                        <td>{{ $email->subject }}</td>
                                        <td>{{ $email->created_at->format('M d, Y H:i') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.emails.show', $email) }}"
                                                   class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button type="button"
                                                        class="btn btn-sm {{ $email->is_read ? 'btn-warning' : 'btn-success' }}"
                                                        onclick="toggleReadStatus({{ $email->id }}, {{ $email->is_read ? 'false' : 'true' }})">
                                                    <i class="fas {{ $email->is_read ? 'fa-envelope' : 'fa-envelope-open' }}"></i>
                                                </button>
                                                <form action="{{ route('admin.emails.destroy', $email) }}"
                                                      method="POST"
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this email?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No emails found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($emails->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div class="text-muted">
                                Showing {{ $emails->firstItem() ?? 0 }} to {{ $emails->lastItem() ?? 0 }} of {{ $emails->total() }} entries
                            </div>
                            <div>
                                {{ $emails->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function toggleReadStatus(emailId, currentStatus) {
            const url = currentStatus ?
                `/admin/emails/${emailId}/mark-as-read` :
                `/admin/emails/${emailId}/mark-as-unread`;

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            });
        }
    </script>
    @endpush

@endsection
