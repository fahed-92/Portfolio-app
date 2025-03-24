@extends('dashboard.layouts.app')
@section('title', 'about')
@section('content')


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ __('messages.dashboard') }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('messages.Home') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.home') }}">{{ __('messages.Home') }}</a>{{ __('messages.About') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('messages.About') }}</h4>
                    <p class="card-title-desc">{{ __('messages.About') }}</p>

                    @isset($about)
                        <div class="card text-center" style="width: 24rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('messages.title') }} :{{$about->title}}</h5>
                                <p class="card-text"> {{ __('messages.Summary') }} :{!!  $about->summary !!}</p>
                            </div>

                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ __('messages.age') }} :{{$about->age}}</li>
                                    <li class="list-group-item">{{ __('messages.birthday') }} :{{$about->birthday}}</li>
                                    <li class="list-group-item">{{ __('messages.nationality') }} :{{$about->nationality}}</li>
                                    <li class="list-group-item">{{ __('messages.freelance') }} :{{$about->freelance}}</li>
                                    <li class="list-group-item">{{ __('messages.phone') }} :{{$about->phone}}</li>
                                    <li class="list-group-item">{{ __('messages.city') }} :{{$about->city}}</li>
                                    <li class="list-group-item">{{ __('messages.degree') }} :{{$about->degree}}</li>
                                    <li class="list-group-item">{{ __('messages.email') }} :{{$about->email}}</li>
                                </ul>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
