@extends('dashboard.layouts.app')
@section('title', 'Dashboard')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div>
            <a href="{{ route('admin.visitors.index') }}" class="btn btn-sm btn-primary shadow-sm mr-2">
                <i class="fas fa-users fa-sm text-white-50"></i> View Visitors
            </a>
            <a href="{{ route('admin.emails.index') }}" class="btn btn-sm btn-info shadow-sm">
                <i class="fas fa-envelope fa-sm text-white-50"></i> View Emails
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Total Visitors Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Visitors</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $visitors }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Unique Visitors Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Unique Visitors</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $uniqueVisit }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Today's Visitors Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Today's Visitors</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $todayVisitors ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Unread Emails Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Unread Emails</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $unreadEmails ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Recent Visitors Table -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Visitors</h6>
                    <a href="{{ route('admin.visitors.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>IP Address</th>
                                    <th>Browser</th>
                                    <th>Device</th>
                                    <th>Visit Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentVisitors ?? [] as $visitor)
                                    <tr>
                                        <td>{{ $visitor->ip_address }}</td>
                                        <td>{{ $visitor->browser }}</td>
                                        <td>{{ $visitor->device }}</td>
                                        <td>{{ $visitor->created_at->format('M d, Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Emails Table -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Emails</h6>
                    <a href="{{ route('admin.emails.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>From</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentEmails ?? [] as $email)
                                    <tr class="{{ $email->is_read ? '' : 'table-primary' }}">
                                        <td>{{ $email->name }}</td>
                                        <td>{{ $email->subject }}</td>
                                        <td>{{ $email->created_at->format('M d, Y H:i') }}</td>
                                        <td>
                                            @if($email->is_read)
                                                <i class="fas fa-envelope-open text-gray-300"></i>
                                            @else
                                                <i class="fas fa-envelope text-primary"></i>
                                            @endif
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

    <!-- End of Main Content -->
@endsection
