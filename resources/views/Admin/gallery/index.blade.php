<!-- resources/views/users/index.blade.php -->

@extends('layouts.admin')

@section('title', 'Admin | Gallery')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Gallery Page</h4>
            <!-- Button to trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBlogModal">
                Add Picture
            </button>
        </div>
        <div class="card-body table-responsive">
            {{-- @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif --}}
            <table class="table table-striped table-fixed table-hover align-middle text-center" id="blogs-table">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($gallery))
                        @foreach ($gallery as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ strlen($item->description) > 20 ? substr($item->description, 0, 20) . '...' : $item->description }}
                                </td>
                                <td class="col-md-3">
                                    <img src="{{ asset('assets/gallery/' . $item->image) }}"
                                        class="img-thumbnail rounded-circle"
                                        style="width: 54px; height: 51px; object-fit: cover;" alt="Image Not Found">
                                </td>

                                <td>
                                    <button class="btn btn-primary edit-gallery-btn" data-id="{{ $item->id }}"
                                        data-title="{{ $item->title }}"
                                        data-category="{{ $item->category }}"
                                        data-description="{{ $item->description }}"
                                        data-image="{{ asset('assets/gallery/' . $item->image) }}"
                                        data-target="#editBlogModal">
                                        Edit
                                    </button>
                                    <!-- Form for deletion -->
                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('admin.photo.delete', $item->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <!-- Delete button -->
                                    <a class="btn btn-danger"
                                        href="{{ route('admin.photo.delete', ['photos' => $item->id]) }}"
                                        onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this photo?')) { document.getElementById('delete-form-{{ $item->id }}').submit(); }">
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

    <!-- Add Picture Modal -->
    <div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBlogModalLabel">Add Photos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addBlogForm" method="POST" action="{{ route('admin.photo.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="blog_title">Photo Title</label>
                            <input type="text" class="form-control" id="blog_title" name="photo_title" required>
                        </div>
                        <div class="form-group">
                            <label for="blog_date">Photo Category</label>
                            <select name="photo_category" class="form-control select2 select2-hidden-accessible language-select" style="width: 100%;" tabindex="-1" aria-hidden="true" id="" required>
                                <option value="Education">Education</option>
                                <option value="Donation">Donation</option>
                                <option value="Event">Event</option>
                                <option value="Team">Team</option>
                                <option value="Achievement">Achievement</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="blog_description">Description</label>
                            <textarea class="form-control" id="blog_description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="blog_image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
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
                    <h5 class="modal-title" id="editBlogModalLabel">Edit Photo</h5>
                    <button type="button" class="close hide" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editBlogForm" method="POST" action="{{ route('admin.photo.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-blog-id" name="id">
                        <div class="form-group">
                            <label for="edit-blog-title">Photo Title</label>
                            <input type="text" class="form-control" id="edit-blog-title" name="photo_title" required>
                        </div>
                        <div class="form-group">
                            <label for="blog_date">Photo Category</label>
                            <select name="photo_category" id="edit-photo-category" class="form-control select2 select2-hidden-accessible language-select" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                <option value="Education">Education</option>
                                <option value="Donation">Donation</option>
                                <option value="Event">Event</option>
                                <option value="Team">Team</option>
                            </select>
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
        $('.edit-gallery-btn').on('click', function() {
            console.log('hhhh');
            var id = $(this).data('id');
            var title = $(this).data('title');
            var category = $(this).data('category');
            var description = $(this).data('description');
            var image = $(this).data('image');

            $('#edit-blog-id').val(id);
            $('#edit-blog-title').val(title);
            $('#edit-photo-category').val(category);
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
    <script>
        $(document).ready(function() {
            $('.language-select').select2({

                placeholder: "Select a programming language",
                allowClear: true
            });
            // $('.edit-photo-category').select2({
            //     placeholder: "Select a programming language",
            //     allowClear: true
            // });
        });
    </script>
@endpush
