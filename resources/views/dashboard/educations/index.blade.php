@extends('dashboard.layouts.app')
@section('title', 'Links')
@section('content')


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ __('messages.dashboard') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('messages.Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.education') }}</li>
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

                    <h4 class="card-title">{{ __('messages.education') }}</h4>
                    <p class="card-title-desc">{{ __('messages.education') }}</p>
                    <button class="btn btn-primary float-right" id="btn-add">Add</button>

                    <table id="datatable" class="table table-bordered mb-1 dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th class="text-center">{{ __('messages.faculty') }}</th>
                                <th class="text-center">{{ __('messages.major') }}</th>
                                <th class="text-center">{{ __('messages.period') }}</th>
                                <th class="text-center">{{ __('messages.university') }}</th>
                                <th class="text-center">{{ __('messages.grade') }}</th>
                                <th class="text-center">{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($educations)
                                @forelse ($educations as $education)
                                    <tr>
                                        <td class="text-center">{{ $education->id }}</td>
                                        <td class="text-center">{{ $education->faculty }}</td>
                                        <td class="text-center">{{ $education->major }}</td>
                                        <td class="text-center">{{ $education->period }}</td>
                                        <td class="text-center">{{ $education->university }}</td>
                                        <td class="text-center">{{ $education->grade }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm btn-edit" data-id="{{ $education->id }}">Edit</button>
                                            <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $education->id }}">Delete</button>
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

        <!-- Add/Edit Modal -->
<div class="modal fade" id="modal-education" tabindex="-1" role="dialog" aria-labelledby="modal-education-label" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form id="form-education">
                @include('dashboard.educations.form')
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Show Add education Modal
        $('#btn-add').on('click', function() {
            $('#form-education')[0].reset();
            $('#modal-education-label').text('Add education');
            $('#modal-education').modal('show');
        });

        // Show Edit education Modal
        $('.btn-edit').on('click', function() {
            var education_id = $(this).data('id');
            // console.log(education);
            $.get('{{ route("admin.education.edit", ":id") }}'.replace(':id', education_id) , function(education) {
                $('#education_id').val(education.id);
                $('#faculty').val(education.faculty);
                $('#major').val(education.major);
                $('#from').val(education.from);
                $('#to').val(education.to);
                $('#university').val(education.university);
                $('#grade').val(education.grade);
                $('#modal-education-label').text('Edit education');
                $('#modal-education').modal('show');
            });
        });

        // Save education (Create or Update) using Ajax
        $('#form-education').on('submit', function(event) {
            event.preventDefault();
            // var form = $(this)[0];
            // var formData = new FormData(form);
            var formData = $(this).serialize();

            var url = $('#education_id').val() ? '/admin/education/update/' + $('#education_id').val() : '/admin/education/store';
            var method = $('#education_id').val() ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                type: method,
                data: formData,
            //     contentType: false,
            //     processData: false,
                headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                'X-HTTP-Method-Override': $('#education_id').val() ? 'PUT' : 'POST' // Method spoofing for Laravel
            },
                success: function(response) {
                    $('#modal-education').modal('hide');
                    alert('education saved successfully');
                    location.reload(); // Reload page to update the list
                },
                error: function(xhr) {
                    // Handle errors
                    if(xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    console.log(errors);
                    var errorMessage = '';
                    $.each(errors, function(key, value) {
                        errorMessage += value + '\n';
                    });
                    alert('Validation Error: \n' + errorMessage);
                } else {
                    var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'An error occurred';
                    alert('Error saving setting: ' + errorMessage);
                }
                }
            });
        });

        // Delete education using Ajax
        $('.btn-delete').on('click', function() {
            var education_id = $(this).data('id');
            if (confirm('Are you sure you want to delete this education?')) {
                $.ajax({
                    url: '/admin/education/delete/' + education_id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        location.reload(); // Reload page to update the list
                        alert('education deleted successfully');
                    },
                    error: function(xhr) {
                        // Handle errors
                        alert('Error deleting education');
                    }
                });
            }
        });
    });
</script>
@endsection
