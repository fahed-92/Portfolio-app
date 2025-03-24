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
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('messages.Home') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.home') }}">{{ __('messages.Home') }}</a>{{ __('messages.common questions') }}</li>
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
                    <p class="card-title-desc">{{ __('messages.all common questions') }}</p>
                    <button class="btn btn-primary float-right" id="btn-add">Add</button>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.skills') }}</th>
                                <th width="20">{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('admin.skill.index' , $category->id ) }}" type="submit" title="show" onclick="" class="btn btn-info btn-sm waves-effect btn-label waves-light">
                                        <i href="{{ route('admin.skill.index' , $category->id) }}" class="bx bx-cog label-icon"></i> {{ __('messages.view') }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm btn-edit" data-id="{{ $category->id }}">Edit</button>
                                    <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $category->id }}">Delete</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">{{ __('messages.There are no category at this time') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

        <!-- Add/Edit Modal -->
    <div class="modal fade" id="modal-category" tabindex="-1" role="dialog" aria-labelledby="modal-category-label" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form id="form-category">
                    @include('dashboard.categories.form')
                </form>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script>
        $(document).ready(function() {
            // Show Add category Modal
            $('#btn-add').on('click', function() {
                $('#form-category')[0].reset();
                $('#modal-category-label').text('Add category');
                $('#modal-category').modal('show');
            });

            // Show Edit category Modal
            $('.btn-edit').on('click', function() {
                var category_id = $(this).data('id');
                // console.log(category);
                $.get('{{ route("admin.category.edit", ":id") }}'.replace(':id', category_id) , function(category) {
                    $('#category_id').val(category.id);
                    $('#name').val(category.name);
                    $('#modal-category-label').text('Edit category');
                    $('#modal-category').modal('show');
                });
            });

            // Save category (Create or Update) using Ajax
            $('#form-category').on('submit', function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                var url = $('#category_id').val() ? '/admin/category/update/' + $('#category_id').val() : '/admin/category/store';
                var method = $('#category_id').val() ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    success: function(response) {
                        $('#modal-category').modal('hide');
                        alert('category saved successfully');
                        location.reload(); // Reload page to update the list
                    },
                    error: function(xhr) {
                        // Handle errors
                        alert('Error saving category');
                    }
                });
            });

            // Delete category using Ajax
            $('.btn-delete').on('click', function() {
                var category_id = $(this).data('id');
                if (confirm('Are you sure you want to delete this category?')) {
                    $.ajax({
                        url: '/admin/category/delete/' + category_id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert('category deleted successfully');
                            location.reload(); // Reload page to update the list
                        },
                        error: function(xhr) {
                            // Handle errors
                            alert('Error deleting category');
                        }
                    });
                }
            });
        });
    </script>
    @endsection
