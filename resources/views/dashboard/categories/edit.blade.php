@extends('dashboard.layouts.app')
@section('title', 'اعدادات الموقع')
@section('content')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ __('messages.dashboard') }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">{{ __('messages.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('messages. Site Setting') }}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">من نحن</h4>
                    <p class="card-title-desc">تعديل بيانات من نحن</p> --}}
                    <form class="form row" method="POST" enctype="multipart/form-data" action="{{ route('admin.category.update', $category->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('messages.name') }}</label>
                                <input name="name" class="form-control @error('name') is-invalid  @enderror"
                                       value="{{ isset($category) ? $category->name : old('name') }}">
                                @error('name')
                                <small class=" text text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <button class="btn btn-primary waves-effect btn-label waves-light"><i class="bx bx-save label-icon"></i>
                                    {{ __('messages.save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
