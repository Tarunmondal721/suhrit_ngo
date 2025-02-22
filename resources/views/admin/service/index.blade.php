@extends('layouts.admin')

@section('title', 'Admin | Services')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Services Page</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addServiceModal">
                Add Service
            </button>
        </div>
        <div class="card-body table-responsive">

            <table class="table table-striped table-hover" id="service_table">
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
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->title }}</td>
                            <td>{{ $service->date }}</td>
                            <td>{{ Str::limit($service->description, 50) }}</td>
                            <td>
                                @if ($service->image)
                                    <img src=" {{ asset('assets/service/' . $service->image) }}" class="img-thumbnail"
                                        width="50">
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-warning edit-service-btn" data-id="{{ $service->id }}"
                                    data-title="{{ $service->title }}" data-date="{{ $service->date }}"
                                    data-description="{{ $service->description }}"
                                    data-image="{{ asset('assets/service/' . $service->image) }}"
                                    data-target="#editServiceModal">
                                    Edit
                                </button>

                                <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Service Modal -->
    <div class="modal fade" id="addServiceModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Service</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="title" class="form-control mb-2" placeholder="Title" required>
                        <input type="date" name="date" class="form-control mb-2">
                        <textarea name="description" class="form-control mb-2" placeholder="Description" required></textarea>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Service Modal -->
    <div class="modal fade" id="editServiceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                    <button type="button" class="close hide" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form id="editServiceForm" method="POST" enctype="multipart/form-data" action="">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-service-id" name="id">

                        <div class="form-group">
                            <label for="edit-service-title">Service Title</label>
                            <input type="text" class="form-control" id="edit-service-title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="edit-service-date">Service Date</label>
                            <input type="date" class="form-control" id="edit-service-date" name="date" required>
                        </div>

                        <div class="form-group">
                            <label for="edit-service-description">Description</label>
                            <textarea class="form-control" id="edit-service-description" name="description" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="edit-service-image">Image</label>
                            <input type="file" class="form-control-file" id="edit-service-image" name="image">
                            <img id="current-service-image" class="w-50 mt-2" style="height: 100px;"
                                alt="Current Image">
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
        $('#service_table').DataTable();
        // Handle Edit button click
        $('.edit-service-btn').on('click', function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var date = $(this).data('date');
            var description = $(this).data('description');
            var image = $(this).data('image');

            // Populate modal fields
            $('#edit-service-id').val(id);
            $('#edit-service-title').val(title);
            $('#edit-service-date').val(date);
            $('#edit-service-description').val(description);
            $('#current-service-image').attr('src', image);

            $('#editServiceForm').attr('action', '/admin/services/' + id);
            // Show the modal
            $('#editServiceModal').modal('show');
        });
        $('.hide').on('click', function() {
            $('#editServiceModal').modal('hide');
        });
    </script>
@endpush
