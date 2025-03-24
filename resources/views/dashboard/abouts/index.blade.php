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
                    <button class="btn btn-primary float-right" id="btn-add">Add</button>

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
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm btn-edit" data-id="{{ $about->id }}">Edit</button>
                                    <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $about->id }}">Delete</button>
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
<div class="modal fade" id="modal-about" tabindex="-1" role="dialog" aria-labelledby="modal-about-label" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form id="form-about">
                @include('dashboard.abouts.form')
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Show Add about Modal
        $('#btn-add').on('click', function() {
            $('#form-about')[0].reset();
            $('#modal-about-label').text('Add about');
            $('#modal-about').modal('show');
        });

        // Show Edit about Modal
        $('.btn-edit').on('click', function() {
            var about_id = $(this).data('id');
            $.get('{{ route("admin.about.edit", ":id") }}'.replace(':id', about_id) , function(about) {
                $('#about_id').val(about.id);
                tinymce.get('summary').setContent(about.summary);
                $('#title').val(about.title);
                $('#birthday').val(about.birthday);
                $('#nationality').val(about.nationality);
                $('#phone').val(about.phone);
                $('#age').val(about.age);
                $('#address').val(about.address);
                $('#city').val(about.city);
                $('#degree').val(about.degree);
                $('#freelance').val(about.freelance);
                $('#email').val(about.email);
                $('#image').val('');
                $('#modal-about-label').text('Edit about');
                $('#modal-about').modal('show');
            });
        });

        // Save about (Create or Update) using Ajax
        $('#form-about').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var url = $('#about_id').val() ? '/admin/about/update/' + $('#about_id').val() : '/admin/about/store';
            var method = $('#about_id').val() ? 'PUT' : 'POST';

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
                success: function(response) {
                    console.log(response);
                    $('#modal-about').modal('hide');
                    alert('about saved successfully');
                    location.reload(); // Reload page to update the list

                },
                error: function(xhr) {
                    // Handle errors
                    // alert('Error saving about');
                    var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'An error occurred';
                    console.log(errorMessage);
                    alert('Error saving position: ' + errorMessage);
                }
            });
        });

        // Delete about using Ajax
        $('.btn-delete').on('click', function(event) {
            event.preventDefault();
            var about_id = $(this).data('id');
            if (confirm('Are you sure you want to delete this about?')) {
                $.ajax({
                    url: '/admin/about/delete/' + about_id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                        alert('Item deleted successfully');
                        location.reload(); // Reload page to update the list
                    } else {
                        alert('Error: ' + response.message);
                    }
                    },
                    error: function(xhr) {
                        // Handle errors
                    var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'An error occurred';
                    console.log(errorMessage);
                    alert('Error saving about: ' + errorMessage);                    }
                });
            }
        });
    });
</script>
@endsection
