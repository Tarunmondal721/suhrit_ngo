<!-- resources/views/users/index.blade.php -->

@extends('layouts.admin')

@section('title', 'Admin | Blog')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Blog Page</h4>
            <!-- Button to trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBlogModal">
                Add Blog
            </button>
        </div>
        <div class="card-body table-responsive">
         
            <table class="table table-striped table-fixed table-hover align-middle text-center" id="blogs-table">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($blogs))
                        @foreach ($blogs as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ strlen($item->description) > 20 ? substr($item->description, 0, 20) . '...' : $item->description }}</td>
                                <td class="col-md-3">
                                    <img src="{{ asset('assets/blog/' . $item->image) }}"
                                        class="img-thumbnail rounded-circle"
                                        style="width: 54px; height: 51px; object-fit: cover;" alt="Image Not Found">
                                </td>

                                <td>
                                    <button class="btn btn-primary edit-blog-btn" data-id="{{ $item->id }}"
                                        data-title="{{ $item->title }}" data-date="{{ $item->date }}"
                                        data-description="{{ $item->description }}"
                                        data-image="{{ asset('assets/blog/' . $item->image) }}"
                                        data-target="#editBlogModal">
                                        Edit
                                    </button>
                                    <!-- Form for deletion -->
                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('admin.blog.delete', $item->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <!-- Delete button -->
                                    <a class="btn btn-danger"
                                        href="{{ route('admin.blog.delete', ['blogs' => $item->id]) }}"
                                        onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this blog?')) { document.getElementById('delete-form-{{ $item->id }}').submit(); }">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Blog Modal -->
    <div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBlogModalLabel">Add Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addBlogForm" method="POST" action="{{ route('admin.blog.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="blog_title">Blog Title</label>
                            <input type="text" class="form-control" id="blog_title" name="blog_title" required>
                        </div>
                        <div class="form-group">
                            <label for="blog_date">Blog Date</label>
                            <input type="date" class="form-control" id="blog_date" name="blog_date" required>
                        </div>
                        <div class="form-group">
                            <label for="blog_description">Description</label>
                            <textarea class="form-control" id="blog_description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="blog_image">Image</label>
                            <input type="file" class="form-control-file" id="blog_image" name="image" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Blog Modal -->
    <div class="modal fade" id="editBlogModal" tabindex="-1" aria-labelledby="editBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBlogModalLabel">Edit Blog</h5>
                    <button type="button" class="close hide" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editBlogForm" method="POST" action="{{ route('admin.blog.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-blog-id" name="id">
                        <div class="form-group">
                            <label for="edit-blog-title">Blog Title</label>
                            <input type="text" class="form-control" id="edit-blog-title" name="blog_title" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-blog-date">Blog Date</label>
                            <input type="date" class="form-control" id="edit-blog-date" name="blog_date" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-blog-description">Description</label>
                            <textarea class="form-control" id="edit-blog-description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit-blog-image">Image</label>
                            <input type="file" class="form-control-file" id="edit-blog-image" name="image">
                            <img id="current-image" class="w-50 mt-2" style="height: 100px;" alt="Current Image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary hide" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $('#blogs-table').DataTable();

        // Handle Edit button click
        $('.edit-blog-btn').on('click', function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var date = $(this).data('date');
            var description = $(this).data('description');
            var image = $(this).data('image');

            $('#edit-blog-id').val(id);
            $('#edit-blog-title').val(title);
            $('#edit-blog-date').val(date);
            $('#edit-blog-description').val(description);
            $('#current-image').attr('src', image);

            $('#editBlogModal').modal('show');
        });
        $('.hide').on('click', function() {
            $('#editBlogModal').modal('hide');
        });


        // $(document).ready(function() {
        //     setTimeout(function() {
        //         $(".alert").alert('close');
        //     }, 2000);
        // });
    </script>
@endpush
