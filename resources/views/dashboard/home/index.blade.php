@extends('dashboard.layouts.app')
@section('title', 'الأسئلة الشائعة')
@section('content')


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ __('messages.dashboard') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">{{ __('messages.Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.common questions') }}</li>
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

                    <h4 class="card-title">{{ __('messages.Site Setting') }}</h4>
                    <p class="card-title-desc">{{ __('messages.all common questions') }}</p>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.position') }}</th>
                                <th>{{ __('messages.photo') }}</th>

                                <th width="20">{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($homes as $home)
                            <tr>
                                <td>{{ $home->id }}</td>
                                <td>{{ $home->name }}</td>
                                <td>{{ $home->position }}</td>
                                <td>{{ $home->photo }}</td>


                                <td>
                                    <a href="{{ route('admin.settings.edit', $home->id)}}" class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i class="bx bx-cog label-icon"></i> {{ __('messages.edit') }}</a>
                                    <form action="{{ route('admin.settings.delete' ,$home->id) }}" method="POST" style="display: inline-block">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" title="حذف" onclick="return confirm({{ __('messages.Are you sure for delete this item?') }});" class="btn btn-danger btn-sm waves-effect btn-label waves-light">
                                            <i class="bx bx-cog label-icon"></i> {{ __('messages.delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">{{ __('messages.There are no services at this time') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
