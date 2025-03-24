@extends('dashboard.layouts.app')
@section('title', 'Positions')
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
                                href="{{ route('admin.settings.index') }}">{{ __('messages.Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.Positions') }}</li>
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

                    <h4 class="card-title">{{ __('messages.Positions') }}</h4>
                    <p class="card-title-desc">{{ __('messages.Positions') }}</p>
                    <button class="btn btn-primary float-right" id="btn-add">Add Position</button>

                    <table id="datatable" class="table table-bordered mb-1 dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th width="10">#</th>
                            <th class="text-center">{{ __('messages.position') }}</th>
                            <th class="text-center">{{ __('messages.Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($positions)
                            @forelse ($positions as $position)
                                <tr>
                                    <td class="text-center">{{ $position->id }}</td>
                                    <td class="text-center">{{ $position->position }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm btn-edit" data-id="{{ $position->id }}">Edit</button>
                                            <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $position->id }}">Delete</button>
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
                <div class="modal fade" id="modal-position" tabindex="-1" role="dialog" aria-labelledby="modal-position-label" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <form id="form-position">
                                @include('dashboard.settings.positions.form')

                            </form>
                        </div>
                    </div>
                </div>


@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Show Add position Modal
        $('#btn-add').on('click', function() {
            $('#form-position')[0].reset();
            $('#modal-position-label').text('Add position');
            $('#modal-position').modal('show');
        });

        // Show Edit position Modal
        $('.btn-edit').on('click', function() {
            var position_id = $(this).data('id');
            $.get('{{ route("admin.positions.edit", ":id") }}'.replace(':id', position_id) , function(position) {
                $('#position_id').val(position.id);
                $('#position').val(position.position);
                $('#modal-position-label').text('Edit position');
                $('#modal-position').modal('show');
            });
        });

        // Save position (Create or Update) using Ajax
        $('#form-position').on('submit', function(event) {
            event.preventDefault();
            // var form = $('#form-positions')[0];
            var setting_id = $('#setting_id').val();
            // var formData = new FormData(this);
            var formData = $(this).serialize();
            var url = $('#position_id').val() ? '/admin/positions/update/' + $('#position_id').val() : '/admin/positions/store/'+ setting_id;
            var method = $('#position_id').val() ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                type: method,
                data: formData,
                success: function(response) {
                    console.log(response)
                    $('#modal-position').modal('hide');
                    alert('position saved successfully');
                    location.reload(); // Reload page to update the list
                },
                error: function(xhr) {
                    // Handle errors
                    console.log(response)
                    alert('Error saving position');
                }
            });
        });

        // Delete position using Ajax
        $('.btn-delete').on('click', function() {
            var position_id = $(this).data('id');
            if (confirm('Are you sure you want to delete this position?')) {
                $.ajax({
                    url: '/admin/positions/delete/' + position_id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert('position deleted successfully');
                        location.reload(); // Reload page to update the list
                    },
                    error: function(xhr) {
                        // Handle errors
                        alert('Error deleting position');
                    }
                });
            }
        });
    });
</script>
@endsection

