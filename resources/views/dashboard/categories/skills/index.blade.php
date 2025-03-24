@extends('dashboard.layouts.app')
@section('title', 'Skills')
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
                                href="">{{ __('messages.skills') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.Skills') }}</li>
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

                    <h4 class="card-title">{{ __('messages.Skills') }}</h4>
                    <p class="card-title-desc">{{ __('messages.Skills') }}</p>
                    <button class="btn btn-primary float-right" id="btn-add" data-id="{{$category_id}}">Add</button>

                    <table id="datatable" class="table table-bordered mb-1 dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th width="10">#</th>
                            <th class="text-center">{{ __('messages.Skill') }}</th>
                            <th class="text-center">{{ __('messages.Percentage') }}</th>
                            <th class="text-center">{{ __('messages.Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" id="category_id" value="{{$category_id}}">
                            @isset($skills)
                            @foreach ($skills as $skill)
                                <tr>
                                    <td class="text-center">{{ $skill->id }}</td>
                                    <td class="text-center">{{ $skill->skill }}</td>
                                    <td class="text-center">{{ $skill->percentage }} %</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm btn-edit" data-id="{{ $skill->id }}" data-param="{{$category_id}}">Edit</button>
                                        <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $skill->id }}">Delete</button>
                                    </td>
                                </tr>

                            @endforeach
                        @endisset
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

        <!-- Add/Edit Modal -->
        <div class="modal fade" id="modal-skill" tabindex="-1" role="dialog" aria-labelledby="modal-skill-label" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form id="form-skill">
                        @include('dashboard.categories.skills.form')
                    </form>
                </div>
            </div>
        </div>
        @endsection
        @section('scripts')
        <script>
            $(document).ready(function() {
                // Show Add skill Modal
                $('#btn-add').on('click', function() {
                    var category_id = $('#category_id').val();
                    $('#form-skill')[0].reset();
                    $('#modal-skill-label').text('Add skill');
                    $('#modal-skill').modal('show');
                });

                // Show Edit skill Modal
                $('.btn-edit').on('click', function() {
                    var skill_id = $(this).data('id');

                    // console.log(skill);
                    $.get('{{ route("admin.skill.edit", ":id") }}'.replace(':id', skill_id) , function(skill) {
                        $('#skill_id').val(skill.id);
                        $('#skill').val(skill.skill);
                        $('#percentage').val(skill.percentage);

                        $('#modal-skill-label').text('Edit skill');
                        $('#modal-skill').modal('show');
                    });
                });

                // Save skill (Create or Update) using Ajax
                $('#form-skill').on('submit', function(event) {
                    event.preventDefault();
                    var formData = $(this).serialize();
                    var url = $('#skill_id').val() ? '/admin/skill/update/' + $('#skill_id').val() : '/admin/skill/store/' + $('#category_id').val();
                    var method = $('#skill_id').val() ? 'PUT' : 'POST';

                    $.ajax({
                        url: url,
                        type: method,
                        data: formData,
                        success: function(response) {
                            $('#modal-skill').modal('hide');
                            alert('skill saved successfully');
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

                // Delete skill using Ajax
                $('.btn-delete').on('click', function() {
                    var skill_id = $(this).data('id');
                    if (confirm('Are you sure you want to delete this skill?')) {
                        $.ajax({
                            url: '/admin/skill/delete/' + skill_id,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                alert('skill deleted successfully');
                                location.reload(); // Reload page to update the list
                            },
                            error: function(xhr) {
                                // Handle errors
                                alert('Error deleting skill');
                            }
                        });
                    }
                });
            });
        </script>
        @endsection
