@extends('dashboard.layouts.app')
@section('title', 'Services')
@section('content')


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ __('messages.dashboard') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('messages.Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.services') }}</li>
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

                    <h4 class="card-title">{{ __('messages.services') }}</h4>
                    <p class="card-title-desc">{{ __('messages.services') }}</p>
                    <button class="btn btn-primary float-right" id="btn-add">Add Service</button>

                    <table id="datatable" class="table table-bordered mb-1 dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th class="text-center">{{ __('messages.service') }}</th>
                                <th class="text-center">{{ __('messages.Icon') }}</th>
                                <th class="text-center">{{ __('messages.description') }}</th>
                                <th class="text-center">{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($services))
                                @foreach($services as $service)
                                    <tr>
                                        <td class="text-center">{{ $service->id }}</td>
                                        <td class="text-center">{{ $service->service }}</td>
                                        <td class="text-center">
                                                <div class="icon-box" data-aos="fade-up">
                                                    <div class="icon">
                                                    <!-- Assuming $service->icon contains icon classes or a URL -->
                                                        <i class="{{ $service->icon }}"></i>
                                                    </div>
                                            </div>
                                        </td>
                                        <td class="text-center">{!!  $service->description !!}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm btn-edit" data-id="{{ $service->id }}">Edit</button>
                                            <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $service->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td colspan="4">{{ __('messages.There are no items at this time') }}</td>
                                    </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

        <!-- Add/Edit Modal -->
<div class="modal fade" id="modal-service" tabindex="-1" role="dialog" aria-labelledby="modal-service-label" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form id="form-service">
                @include('dashboard.services.form')
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Show Add Service Modal
        $('#btn-add').on('click', function() {
            $('#form-service')[0].reset();
            $('#modal-service-label').text('Add Service');
            $('#modal-service').modal('show');
        });

        // Show Edit Service Modal
        $('.btn-edit').on('click', function() {
            var service_id = $(this).data('id');
            // console.log(service);
            $.get('{{ route("admin.service.edit", ":id") }}'.replace(':id', service_id) , function(service) {
                $('#service_id').val(service.id);
                $('#service').val(service.service);
                $('#icon').val(service.icon);
                tinymce.get('description').setContent(service.description);
                $('#modal-service-label').text('Edit Service');
                $('#modal-service').modal('show');
            });
        });

        // Save Service (Create or Update) using Ajax
        $('#form-service').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            var url = $('#service_id').val() ? '/admin/service/update/' + $('#service_id').val() : '/admin/service/store';
            var method = $('#service_id').val() ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                type: method,
                data: formData,
                success: function(response) {
                    $('#modal-service').modal('hide');
                    alert('Service saved successfully');
                    location.reload(); // Reload page to update the list
                },
                error: function(xhr) {
                    // Handle errors
                    alert('Error saving service');
                }
            });
        });

        // Delete Service using Ajax
        $('.btn-delete').on('click', function() {
            var service_id = $(this).data('id');
            if (confirm('Are you sure you want to delete this service?')) {
                $.ajax({
                    url: '/admin/service/delete/' + service_id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert('Service deleted successfully');
                        location.reload(); // Reload page to update the list
                    },
                    error: function(xhr) {
                        // Handle errors
                        alert('Error deleting service');
                    }
                });
            }
        });
    });
</script>
@endsection
