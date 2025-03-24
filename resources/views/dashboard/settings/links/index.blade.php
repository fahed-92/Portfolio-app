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
                        <li class="breadcrumb-item active"><a href="#">{{ __('messages.Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.Links') }}</li>
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

                    <h4 class="card-title">{{ __('messages.Links') }}</h4>
                    <p class="card-title-desc">{{ __('messages.Links') }}</p>
                    <button class="btn btn-primary float-right" id="btn-add">Add Links</button>

                    <table id="datatable" class="table table-bordered mb-1 dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th class="text-center">{{ __('messages.Link') }}</th>
                                <th class="text-center">{{ __('messages.Icon') }}</th>
                                <th class="text-center">{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($links)
                                @forelse ($links as $link)
                                    <tr>
                                        <td class="text-center">{{ $link->id }}</td>
                                        <td class="text-center">{{ $link->link }}</td>
                                        <td class="text-center"><i class="{{ $link->icon }}"> </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm btn-edit" data-id="{{ $link->id }}">Edit</button>
                                            <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $link->id }}">Delete</button>
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
            <!-- form modal-->
            <div class="modal fade" id="modal-links" tabindex="-1" role="dialog" aria-labelledby="modal-links-label" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <form id="form-links">
                            @include('dashboard.settings.links.form')

                        </form>
                    </div>
                </div>
            </div>



@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Show Add links Modal
        $('#btn-add').on('click', function() {
            $('#form-links')[0].reset();
            $('#modal-links-label').text('Add links');
            $('#modal-links').modal('show');
        });

        // Show Edit links Modal
        $('.btn-edit').on('click', function() {
            var links_id = $(this).data('id');
            $.get('{{ route("admin.links.edit", ":id") }}'.replace(':id', links_id) , function(links) {
                $('#links_id').val(links.id);
                $('#link').val(links.link);
                $('#icon').val(links.icon);
                $('#modal-links-label').text('Edit links');
                $('#modal-links').modal('show');
            });
        });

        // Save links (Create or Update) using Ajax
        $('#form-links').on('submit', function(event) {
            event.preventDefault();
            // var form = $('#form-links')[0];
            var setting_id = $('#setting_id').val();
            var formData = new FormData(this);
            // var formData = $(this).serialize();
            var url = $('#links_id').val() ? '/admin/links/update/' + $('#links_id').val() : '/admin/links/store/'+ setting_id;
            var method = $('#links_id').val() ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                type: method,
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(), // Ensure CSRF token is included
                    'X-HTTP-Method-Override': $('#links_id').val() ? 'PUT' : 'POST' // Method spoofing for Laravel
                },
                success: function(response) {
                    console.log(response)
                    $('#modal-links').modal('hide');
                    alert('links saved successfully');
                    location.reload(); // Reload page to update the list
                },
                error: function(xhr) {
                    // Handle errors
                    console.log(response)
                    alert('Error saving links');
                }
            });
        });

        // Delete Setting using Ajax
        $('.btn-delete').on('click', function() {
            var links_id = $(this).data('id');
            if (confirm('Are you sure you want to delete this links?')) {
                $.ajax({
                    url: '/admin/links/delete/' + links_id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert('Link deleted successfully');
                        location.reload(); // Reload page to update the list
                    },
                    error: function(xhr) {
                        // Handle errors
                        alert('Error deleting link');
                    }
                });
            }
        });
    });
</script>
@endsection
