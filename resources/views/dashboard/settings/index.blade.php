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
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('messages.Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active"><a
                                href="{{ route('admin.home') }}">{{ __('messages.Home') }}</a>
                            . {{ __('messages.Site Setting') }}</li>
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
                    <p class="card-title-desc">{{ __('messages.Site Setting') }}</p>
                    @if(!$settings)
                        <button class="btn btn-primary float-right" id="btn-add">Add Settings</button>
                    @endif

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th width="10">#</th>
                            <th>{{ __('messages.name') }}</th>
                            <th>{{ __('messages.Positions') }}</th>
                            <th>{{ __('messages.Links') }}</th>
                            <th>{{ __('messages.picture') }}</th>
                            <th width="20">{{ __('messages.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($settings)
                            @forelse ($settings as $setting)
                                <tr>
                                    <td>{{ $setting->id }}</td>
                                    <td class="text-center">{{ $setting->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.positions.index' , $setting->id ) }}" type="submit"
                                           title="show" onclick=""
                                           class="btn btn-info btn-sm waves-effect btn-label waves-light">
                                            <i href="{{ route('admin.positions.index' , $setting->id) }}"
                                               class="bx bx-cog label-icon"></i> {{ __('messages.view') }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.links.index' , $setting->id ) }}" type="submit"
                                           title="show" onclick=""
                                           class="btn btn-info btn-sm waves-effect btn-label waves-light">
                                            <i href="{{ route('admin.links.index' , $setting->id) }}"
                                               class="bx bx-cog label-icon"></i> {{ __('messages.view') }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset('assets/img/setting/'. $setting->photo)}}"
                                             style="width:10rem; hight:10rem;">
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm btn-edit" data-id="{{ $setting->id }}">
                                            Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $setting->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">{{ __('messages.There are no services at this time') }}</td>
                                </tr>
                            @endforelse
                        @endisset
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <!-- form modal-->
    <div class="modal fade" id="modal-setting" tabindex="-1" role="dialog" aria-labelledby="modal-setting-label"
         aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form id="form-setting" enctype="multipart/form-data">
                    @include('dashboard.settings.form')
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            // Show Add Setting Modal
            $('#btn-add').on('click', function () {
                $('#form-setting')[0].reset();
                $('#modal-setting-label').text('Add Setting');
                $('#modal-setting').modal('show');
            });

            // Show Edit Setting Modal
            $('.btn-edit').on('click', function () {
                var setting_id = $(this).data('id');
                $.get('{{ route("admin.settings.edit", ":id") }}'.replace(':id', setting_id), function (setting) {
                    $('#setting_id').val(setting.id);
                    $('#name').val(setting.name);
                    $('#photo').val();
                    $('#modal-setting-label').text('Edit Setting');
                    $('#modal-setting').modal('show');
                });
            });

            // Save Setting (Create or Update) using Ajax
            $('#form-setting').on('submit', function (event) {
                event.preventDefault();
                var formData = new FormData(this);
                var url = $('#setting_id').val() ? '/admin/setting/update/' + $('#setting_id').val() : '/admin/setting/store';
                var method = $('#setting_id').val() ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                        'X-HTTP-Method-Override': method,
                    },
                    success: function (response) {
                        console.log(response)
                        $('#modal-setting').modal('hide');
                        alert('Setting saved successfully');
                        location.reload(); // Reload page to update the list
                    },
                    error: function (xhr) {
                        // Handle errors
                        console.log(formData)
                        console.log(xhr.responseText);
                        alert('Error saving setting');
                    }
                });
            });

            // Delete Setting using Ajax
            $('.btn-delete').on('click', function () {
                var setting_id = $(this).data('id');
                if (confirm('Are you sure you want to delete this setting?')) {
                    $.ajax({
                        url: '/admin/setting/delete/' + setting_id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            alert('Setting deleted successfully');
                            location.reload(); // Reload page to update the list
                        },
                        error: function (xhr) {
                            // Handle errors
                            alert('Error deleting setting');
                        }
                    });
                }
            });
        });
    </script>
@endsection
