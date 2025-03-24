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
                        <li class="breadcrumb-item active">{{ __('messages.projects') }}</li>
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

                    <h4 class="card-title">{{ __('messages.projects') }}</h4>
                    <p class="card-title-desc">{{ __('messages.projects') }}</p>
                    <button class="btn btn-primary float-right" id="btn-add">Add</button>

                    <table id="datatable" class="table table-bordered mb-1 dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th class="text-center">{{ __('messages.name') }}</th>
                                <th class="text-center">{{ __('messages.category') }}</th>
                                <th class="text-center">{{ __('messages.link') }}</th>
                                <th class="text-center">{{ __('messages.image') }}</th>
                                <th class="text-center">{{ __('messages.description') }}</th>
                                <th class="text-center">{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($projects))
                                @foreach($projects as $project)
                                    <tr>
                                        <td class="text-center">{{ $project->id }}</td>
                                        <td class="text-center">{{ $project->name }}</td>
                                        <td class="text-center">{{ $project->category }}</td>
                                        <td class="text-center">{{ $project->link }}</td>
                                        <td class="text-center">
                                            <img src="{{asset('assets/img/Projects/'. $project->image)}}" style="width:10rem; hight:10rem;" ></td>
                                        <td class="text-center">{!!  $project->description !!}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm btn-edit" data-id="{{ $project->id }}">Edit</button>
                                            <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $project->id }}">Delete</button>
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

            <!-- form modal-->
            <div class="modal fade" id="modal-project" tabindex="-1" role="dialog" aria-labelledby="modal-project-label" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <form id="form-project" enctype="multipart/form-data">
                            @include('dashboard.projects.form')
                        </form>
                    </div>
                </div>
            </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Show Add project Modal
        $('#btn-add').on('click', function() {
            $('#form-project')[0].reset();
            $('#modal-project-label').text('Add project');
            $('#modal-project').modal('show');
        });

        // Show Edit project Modal
        $('.btn-edit').on('click', function() {
            var project_id = $(this).data('id');
            $.get('{{ route("admin.project.edit", ":id") }}'.replace(':id', project_id) , function(project) {
                $('#project_id').val(project.id);
                $('#name').val(project.name);
                $('#category').val(project.category);
                $('#link').val(project.link);
                tinymce.get('description').setContent(project.description);
                $('#modal-project-label').text('Edit Project');
                $('#modal-project').modal('show');
            });
        });

        // Save project (Create or Update) using Ajax
        $('#form-project').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var url = $('#project_id').val() ? '/admin/project/update/' + $('#project_id').val() : '/admin/project/store';
            var method = $('#project_id').val() ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(), // Ensure CSRF token is included
                    'X-HTTP-Method-Override': method // Method spoofing for Laravel
                },
                success: function(response) {
                    console.log(response);
                    $('#modal-project').modal('hide');
                    alert('Project saved successfully');
                    location.reload(); // Reload page to update the list
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        console.log(errors);
                        var errorMessage = '';
                        $.each(errors, function(key, value) {
                            errorMessage += value + '\n';
                        });
                        alert('Validation Error: \n' + errorMessage);
                    } else {
                        var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'An error occurred';
                        alert('Error saving project: ' + errorMessage);
                    }
                }
            });
        });

        // Delete Setting using Ajax
        $('.btn-delete').on('click', function() {
            var project_id = $(this).data('id');
            if (confirm('Are you sure you want to delete this project?')) {
                $.ajax({
                    url: '/admin/project/delete/' + project_id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert('Project deleted successfully');
                        location.reload(); // Reload page to update the list
                    },
                    error: function(xhr) {
                        alert('Error deleting project');
                    }
                });
            }
        });
    });
</script>
@endsection

