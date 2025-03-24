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
                        <li class="breadcrumb-item active">{{ __('messages.experiences') }}</li>
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

                    <h4 class="card-title">{{ __('messages.experiences') }}</h4>
                    <p class="card-title-desc">{{ __('messages.experiences') }}</p>
                    <button class="btn btn-primary float-right" id="btn-add">Add</button>

                    <table id="datatable" class="table table-bordered mb-1 dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th class="text-center">{{ __('messages.position') }}</th>
                                <th class="text-center">{{ __('messages.company') }}</th>
                                <th class="text-center">{{ __('messages.Date From') }}</th>
                                <th class="text-center">{{ __('messages.Date To') }}</th>
                                <th class="text-center">{{ __('messages.description') }}</th>
                                <th class="text-center">{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($experiences))
                                @foreach($experiences as $experience)
                                    <tr>
                                        <td class="text-center">{{ $experience->id }}</td>
                                        <td class="text-center">{{ $experience->position }}</td>
                                        <td class="text-center">{{ $experience->company }}</td>
                                        <td class="text-center">{{ $experience->from }}</td>
                                        <td class="text-center">{{ $experience->to }}</td>
                                        <td class="text-center">{!!  $experience->description !!}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm btn-edit" data-id="{{ $experience->id }}">Edit</button>
                                            <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $experience->id }}">Delete</button>
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

        <!--Modal-->
    <div class="modal fade" id="modal-experience" tabindex="-1" role="dialog" aria-labelledby="modal-experience-label" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form id="form-experience">
                    @include('dashboard.experiences.form')
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
                $('#form-experience')[0].reset();
                $('#modal-experience-label').text('Add experience');
                $('#modal-experience').modal('show');
            });

            // Show Edit education Modal
            $('.btn-edit').on('click', function() {
                var education_id = $(this).data('id');
                // console.log(education);
                var experience_id = $(this).data('id');

                $.get('{{ route("admin.experience.edit", ":id") }}'.replace(':id', experience_id) , function(experience) {
                    $('#experience_id').val(experience.id);
                    $('#position').val(experience.position);
                    $('#company').val(experience.company);
                    $('#from').val(experience.from);
                    $('#to').val(experience.to);
                    tinymce.get('description').setContent(experience.description);
                    $('#modal-experience-label').text('Edit experience');
                    $('#modal-experience').modal('show');
                });
            });

            // Save education (Create or Update) using Ajax
            $('#form-experience').on('submit', function(event) {
                event.preventDefault();
                // var form = $(this)[0];
                var formData = new FormData(this);
                // var formData = $(this).serialize();

                var url = $('#experience_id').val() ? '/admin/experience/update/' + $('#experience_id').val() : '/admin/experience/store';
                var method = $('#experience_id').val() ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    type: 'Post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                        'X-HTTP-Method-Override': $('#experience_id').val() ? 'PUT' : 'POST' // Method spoofing for Laravel
                    },
                    success: function(response) {
                        $('#modal-experience').modal('hide');
                        alert('experience saved successfully');
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
                            alert('Error saving experience: ' + errorMessage);
                        }
                    }
                });
            });

            // Delete education using Ajax
            $('.btn-delete').on('click', function() {
                var experience_id = $(this).data('id');
                if (confirm('Are you sure you want to delete this experience?')) {
                    $.ajax({
                        url: '/admin/experience/delete/' + experience_id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            location.reload(); // Reload page to update the list
                            alert('experience deleted successfully');
                        },
                        error: function(xhr) {
                            // Handle errors
                            alert('Error deleting experience');
                        }
                    });
                }
            });
        });
    </script>
@endsection

