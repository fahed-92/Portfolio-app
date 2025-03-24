@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Visitor Statistics</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $totalVisitors }}</h3>
                                        <p>Total Visitors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $todayVisitors }}</h3>
                                        <p>Today's Visitors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-clock"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $thisWeekVisitors }}</h3>
                                        <p>This Week's Visitors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-calendar-week"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $thisMonthVisitors }}</h3>
                                        <p>This Month's Visitors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>IP Address</th>
                                        <th>Device</th>
                                        <th>Browser</th>
                                        <th>Platform</th>
                                        <th>Location</th>
                                        <th>Visited At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($visitors as $visitor)
                                        <tr>
                                            <td>{{ $visitor->ip_address }}</td>
                                            <td>{{ $visitor->device ?? 'Unknown' }}</td>
                                            <td>{{ $visitor->browser ?? 'Unknown' }}</td>
                                            <td>{{ $visitor->platform ?? 'Unknown' }}</td>
                                            <td>{{ $visitor->location ?? 'Unknown' }}</td>
                                            <td>{{ $visitor->created_at ? $visitor->created_at->diffForHumans() : 'Unknown' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $visitors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
