<!-- resources/views/admin/donations/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Admin | Donation')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Donation Page</h4>
        </div>
        <div class="card-body table-responsive">

            <table class="table table-striped table-hover" id="donation_table">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Email Send</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donations as $donation)
                        <tr>
                            <td>{{ $donation->id }}</td>
                            <td>{{ $donation->name }}</td>
                            <td>{{ $donation->email }}</td>
                            <td>{{ $donation->amount }}</td>
                            <td>{{ $donation->created_at }}</td>
                            <td>
                                @if ($donation->screenshot_path)
                                    <img src=" {{ asset('assets/donation/' . $donation->screenshot_path) }}"
                                        class="img-thumbnail" width="50">
                                @endif
                            </td>
                            <td>
                                @if ($donation->status === 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif ($donation->status === 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>

                            <td>
                                @if ($donation->email_send == 1)
                                    <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i>Sent</span>
                                @else
                                    <span class="badge bg-danger"><i class="fas fa-times-circle me-1"></i>Not Sent</span>
                                @endif
                            </td>



                            <td class="d-flex gap-2">
                                <!-- Edit Button -->
                                <button class="btn btn-warning edit-donation-btn"
                                    data-id="{{ $donation->id }}"
                                    data-name="{{ $donation->name }}"
                                    data-date="{{ $donation->created_at }}"
                                    data-email="{{ $donation->email }}"
                                    data-amount="{{ $donation->amount }}"
                                    data-image="{{ asset('assets/donation/' . $donation->screenshot_path) }}"
                                    data-status="{{ $donation->status }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editdonationModal">
                                    <i class="fas fa-edit"></i> Edit
                                </button>

                                <!-- Send Email Button -->
                                <form method="POST" action="{{ route('donation.sendEmail', $donation->id) }}">
                                    @csrf
                                    @if ($donation->email_send != 1)

                                    <button type="submit" class="btn btn-info">
                                        <i class="fas fa-envelope me-1"></i> Email
                                    </button>
                                    @else
                                    <button disabled type="submit" class="btn btn-info">
                                        <i class="fas fa-envelope me-1"></i> Email
                                    </button>
                                    @endif
                                </form>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Edit Donation Modal -->
    <div class="modal fade" id="editdonationModal" tabindex="-1" aria-labelledby="editDonationLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form id="updateDonationForm" method="POST" action="{{ route('donation.updateStatus') }}"
                class="needs-validation" novalidate>
                @csrf
                <div class="modal-content shadow-lg border-0 rounded-4">
                    <div class="modal-header bg-gradient-primary text-white rounded-top-4 px-4 py-3">
                        <h5 class="modal-title fw-bold" id="editDonationLabel">Update Donation Status</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-4">
                        <input type="hidden" name="donation_id" id="edit-donation-id">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Donor Name</label>
                                <input type="text" class="form-control border-primary" id="edit-donation-name" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control border-primary" id="edit-donation-email" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Amount (₹)</label>
                                <input type="text" class="form-control border-primary" id="edit-donation-amount"
                                    disabled>
                            </div>

                            <div class="col-md-6 text-center">
                                <label class="form-label">Payment Screenshot</label><br>
                                <img id="edit-donation-screenshot" src="#"
                                    class="img-fluid img-thumbnail border border-secondary rounded" width="150"
                                    alt="Payment Screenshot">
                            </div>

                            <div class="col-12 mt-3">
                                <label class="form-label fw-semibold">Update Status</label>
                                <select class="form-select border-success" name="status" id="edit-donation-status"
                                    required>
                                    <option value="pending">⏳ Pending Verification</option>
                                    <option value="approved">✅ Approved</option>
                                    <option value="rejected">❌ Rejected</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-top-0 px-4 pb-4">
                        <button type="submit" class="btn btn-success px-4 fw-semibold">
                            <i class="bi bi-check-circle me-1"></i> Save Changes
                        </button>
                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i> Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        $('#donation_table').DataTable();
        // Handle Edit button click
        $('.edit-donation-btn').on('click', function() {
            var id = $(this).data('id');
            var date = $(this).data('date');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var amount = $(this).data('amount');
            var status = $(this).data('status');
            var image = $(this).data('image');

            // Populate modal fields
            $('#edit-donation-id').val(id);
            $('#edit-donation-name').val(name);
            $('#edit-donation-email').val(email);
            $('#edit-donation-amount').val(amount);
            $('#edit-donation-date').val(date);
            $('#edit-donation-status').val(status);
            $('#edit-donation-screenshot').attr('src', image);

            // $('#updateDonationForm').attr('action', '/admin/donation/' + id);
            // Show the modal
            $('#editdonationModal').modal('show');
        });
        $('.hide').on('click', function() {
            $('#editServiceModal').modal('hide');
        });
    </script>
@endpush
