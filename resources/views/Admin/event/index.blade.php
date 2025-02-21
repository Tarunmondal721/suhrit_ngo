<!-- resources/views/users/index.blade.php -->

@extends('layouts.admin')

@section('title', 'Admin | Event')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Event Page</h4>
            <!-- Button to trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBlogModal">
                Add Event
            </button>
        </div>
        <div class="card-body table-responsive">
            {{-- @if (session('success'))
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        toastr.success("{{ session('success') }}", "Success");
                    });
                </script>
            @endif

            @if ($errors->any())
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        @foreach ($errors->all() as $error)
                            toastr.error("{{ $error }}", "Error");
                        @endforeach
                    });
                </script>
            @endif --}}

            <table class="table table-striped table-fixed table-hover align-middle text-center" id="blogs-table">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($events))
                        @foreach ($events as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ strlen($item->description) > 20 ? substr($item->description, 0, 20) . '...' : $item->description }}
                                </td>
                                <td>{{ $item->date }}</td>
                                <td>{{ date('h:i A', strtotime($item->time)) }}</td>
                                <td>{{ strlen($item->location) > 20 ? substr($item->location, 0, 20) . '...' : $item->location }}
                                </td>
                                <td class="col-md-3">
                                    <img src="{{ asset('assets/event/' . $item->image) }}"
                                        class="img-thumbnail rounded-circle"
                                        style="width: 54px; height: 51px; object-fit: cover;" alt="Image Not Found">
                                </td>

                                <td>
                                    @if ($item->status == 'completed')
                                        <span class="text-success fw-bold">✅ {{ ucfirst($item->status) }}</span>
                                        <!-- Green for Completed -->
                                    @elseif ($item->status == 'ongoing')
                                        <span class="text-warning fw-bold">⚡ {{ ucfirst($item->status) }}</span>
                                        <!-- Yellow for Ongoing -->
                                    @elseif ($item->status == 'cancled')
                                        <span class="text-danger fw-bold">❌ {{ ucfirst($item->status) }}</span>
                                        <!-- Red for Canceled -->
                                    @else
                                        <span class="text-secondary fw-bold">{{ ucfirst($item->status) }}</span>
                                        <!-- Gray for unknown status -->
                                    @endif
                                </td>


                                <td>
                                    <button class="btn btn-primary edit-blog-btn" data-id="{{ $item->id }}"
                                        data-title="{{ $item->title }}" data-date="{{ $item->date }}"
                                        data-description="{{ $item->description }}" data-location ="{{ $item->location }}"
                                        data-time="{{ $item->time }}" data-status="{{ $item->status }}"
                                        data-image="{{ asset('assets/event/' . $item->image) }}"
                                        data-target="#editBlogModal">
                                        Edit
                                    </button>
                                    <!-- Form for deletion -->
                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('admin.event.destroy', $item->id) }}" method="POST"
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

    <!-- Add Event Modal -->
    <div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBlogModalLabel">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Event Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Event Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Event Time</label>
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Event Status</label>
                            <select name="status" id="status" class="form-select border-primary shadow-sm">
                                <option value="" disabled selected>🔹 Select Status</option>
                                <option value="completed">✅ Done</option>
                                <option value="ongoing">⚡ On Progress</option>
                                <option value="cancled">❌ Canceled</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Event Image</label>
                            <input type="file" class="form-control" id="image" name="image">
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


    <!-- Edit Event Modal -->
    <div class="modal fade" id="editBlogModal" tabindex="-1" aria-labelledby="editBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBlogModalLabel">Edit Event</h5>
                    <button type="button" class="close hide" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editBlogForm" method="POST" action="{{ route('admin.event.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="event_id" name="id">
                        <div class="mb-3">
                            <label for="title" class="form-label">Event Title</label>
                            <input type="text" class="form-control" id="event_title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="event_description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Event Date</label>
                            <input type="date" class="form-control" id="event_date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Event Time</label>
                            <input type="time" class="form-control" id="event_time" name="time" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="event_location" name="location" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Event Status</label>
                            <select name="status" id="status_id" class="form-select border-primary shadow-sm">
                                <option value="" disabled selected>🔹 Select Status</option>
                                <option value="completed">✅ Done</option>
                                <option value="ongoing">⚡ On Progress</option>
                                <option value="cancle">❌ Canceled</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Event Image</label>
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
            var time = $(this).data('time');
            var location = $(this).data('location');
            var description = $(this).data('description');
            var image = $(this).data('image');
            var status = $(this).data('status'); // Status value

            console.log("Selected Status:", status); // Debugging output

            $('#event_id').val(id);
            $('#event_title').val(title);
            $('#event_date').val(date);
            $('#event_time').val(time);
            $('#event_location').val(location);
            $('#event_description').val(description);
            $('#current-image').attr('src', image);

            // Fix: Ensure the status is correctly selected
            $('#status_id option').prop('selected', false); // Reset selection
            $('#status_id option[value="' + status + '"]').prop('selected', true);

            $('#editBlogModal').modal('show');
        });

        $('.hide').on('click', function() {
            $('#editBlogModal').modal('hide');
        });

    </script>
@endpush
