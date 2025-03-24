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
                    <a  id="dt-button-action"
                        href="{{ route('admin.about.create') }}"
                        class=" btn btn-primary btn-sm waves-effect btn-label waves-light dt-button-action ">
                        <i class="bx bx-cog label-icon"></i> {{ __('messages.add') }}
                    </a>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th>{{ __('messages.title') }}</th>
                                <th>{{ __('messages.phone') }}</th>
                                <th>{{ __('messages.email') }}</th>
                                <th width="40">{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @isset($abouts)
                            @forelse ($abouts as $about)
                            <tr>
                                <td>{{ $about->id }}</td>
                                <td>{{ $about->title }}</td>
                                <td>{{ $about->phone }}</td>
                                <td>{{ $about->email }}</td>
                                <td>
                                    <a href="{{ route('admin.about.show', $about->id)}}" class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i class="bx bx-show label-icon"></i> {{ __('messages.show') }}</a>
                                    <a href="{{ route('admin.about.edit', $about->id)}}" class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i class="bx bx-edit label-icon"></i> {{ __('messages.edit') }}</a>
                                    <form action="{{ route('admin.about.delete' ,$about->id) }}" method="POST" style="display: inline-block">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" title="حذف" onclick="return confirm({{ __('messages.Are you sure for delete this item?') }});" class="btn btn-danger btn-sm waves-effect btn-label waves-light">
                                            <i class="bx bx-exit label-icon"></i> {{ __('messages.delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">{{ __('messages.There are no items at this time') }}</td>
                            </tr>
                            @endforelse
                        @endisset
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
