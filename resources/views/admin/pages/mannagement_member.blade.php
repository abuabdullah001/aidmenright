@extends('admin.masterTemplate')

@section('menu-name')
    ALL USERS
@endsection

@section('main-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark">ALL MEMBERS</h5>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#createMemberModal">Add New
                            Member</button>
                    </div>
                </div>
            </div>
            <hr class="style18">
        </div>

        <section class="content" id='td'>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-12">
                        <div class="card">
                            <div class="card-header bg-cyan">
                                <h3 class="card-title"><i class="fa fa-users"></i> All Executives</h3>
                            </div>
                            <div class="card-body" id='td'>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Designation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mannagements as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    @if ($value->image)
                                                        <img src="{{ asset($value->image) }}" alt="Image" width="100"
                                                            height="100" class="img-thumbnail">
                                                    @else
                                                        <img src="{{ asset('uploads/images/default.jpg') }}" alt="No Image"
                                                            width="50" height="50" class="img-thumbnail">
                                                    @endif
                                                </td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td>{{ $value->address }}</td>
                                                <td>{{ $value->designation }}</td>

                                                <td class="d-flex" style="gap:3%">
                                                    <a href="{{ route('MannagementMember.delete', $value->id) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are You sure')">Delete</a>
                                                    <button class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#showMemberModal" data-id="{{ $value->id }}"
                                                        data-name="{{ $value->name }}" data-email="{{ $value->email }}"
                                                        data-phone="{{ $value->phone }}"
                                                        data-address="{{ $value->address }}"
                                                        data-dob="{{ $value->dob }}"
                                                        data-blood_group="{{ $value->blood_group }}"
                                                        data-designation="{{ $value->designation }}"
                                                        data-image="{{ asset($value->image) }}">
                                                        Show
                                                    </button>
                                                    <a href="{{ route('MannagementMember.edit', $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createMemberModal" tabindex="-1" role="dialog" aria-labelledby="createMemberModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content col-12">
                <form action="{{ route('MannagementMember.store') }}" method="POST" id='sakib'
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createMemberModalLabel">Add New Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" required>
                        </div>
                        <div class="form-group">
                            <label for="blood_group">Blood Group</label>
                            <input type="text" class="form-control" name="blood_group" required>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" name="designation" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="showMemberModal" tabindex="-1" role="dialog" aria-labelledby="showMemberModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded shadow">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title text-primary" id="showMemberModalLabel">Member Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Name:</label>
                                <p class="text-muted" id="show_name"></p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Email:</label>
                                <p class="text-muted" id="show_email"></p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Phone:</label>
                                <p class="text-muted" id="show_phone"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Address:</label>
                                <p class="text-muted" id="show_address"></p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Date of Birth:</label>
                                <p class="text-muted" id="show_dob"></p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Blood Group:</label>
                                <p class="text-muted" id="show_blood_group"></p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Designation:</label>
                                <p class="text-muted" id="show_designation"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Image:</label><br>
                        <img id="show_image" src="" alt="Image" width="150" height="150"
                            class="">
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#showMemberModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);

                console.log(button.data());

                var name = button.data('name');
                var email = button.data('email');
                var phone = button.data('phone');
                var address = button.data('address');
                var dob = button.data('dob');
                var bloodGroup = button.data('blood_group');
                var designation = button.data('designation');
                var image = button.data('image');

                var modal = $(this);
                modal.find('#show_name').text(name);
                modal.find('#show_email').text(email);
                modal.find('#show_phone').text(phone);
                modal.find('#show_address').text(address);
                modal.find('#show_dob').text(dob ? dob : 'N/A');
                modal.find('#show_blood_group').text(bloodGroup ? bloodGroup : 'N/A');
                modal.find('#show_designation').text(designation ? designation : 'N/A');
                if (image) {
                    modal.find('#show_image').attr('src', image).show();
                } else {
                    modal.find('#show_image').hide();
                }
            });

        })
    </script>



    <!-- Show Modal -->
    <script>
        $(document).ready(function() {
            $('#sakib').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                var formData = new FormData(this); // Create a FormData object

                $.ajax({
                    url: '{{ route('MannagementMember.store') }}', // Your route
                    method: "POST", // HTTP POST request
                    data: formData, // Send FormData object
                    contentType: false, // Required for file uploads
                    processData: false, // Prevents jQuery from processing the data
                    success: function(response) {
                        $('#td').html(response);
                        console.log(response); // Debugging line

                        $('#sakib')[0].reset(); // Reset the form
                        $('#createMemberModal').modal('hide'); // Close the modal
                    },
                    error: function(xhr, status, error) {
                        alert('Something went wrong! ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
