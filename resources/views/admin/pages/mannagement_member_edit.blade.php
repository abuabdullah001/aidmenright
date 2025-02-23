@extends('admin.masterTemplate')

@section('menu-name')
    ALL USERS
@endsection

@section('main-content')
    <div class="content-wrapper">


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-5">
                            <div class="card-header bg-cyan ">
                                <h3 class="card-title"><i class="fa fa-users"></i> All Members</h3>
                            </div>
                            <form action="{{ route('MannagementMember.update', $mannagements->id) }}" method="POST" enctype="multipart/form-data" id="editMemberForm">
                                @csrf
                                @method('PUT') <!-- Use PUT for update -->

                                <input type="hidden" name="id" value="{{ $mannagements->id }}">

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="edit_name">Name</label>
                                        <input type="text" class="form-control" name="name" id="edit_name" value="{{ $mannagements->name }}" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="edit_email">Email</label>
                                        <input type="email" class="form-control" name="email" id="edit_email" value="{{ $mannagements->email }}" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="edit_phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="edit_phone" value="{{ $mannagements->phone }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="edit_address">Address</label>
                                        <input type="text" class="form-control" name="address" id="edit_address" value="{{ $mannagements->address }}" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="edit_dob">Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" id="edit_dob" value="{{ $mannagements->dob }}" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="edit_blood_group">Blood Group</label>
                                        <input type="text" class="form-control" name="blood_group" id="edit_blood_group" value="{{ $mannagements->blood_group }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="edit_designation">Designation</label>
                                        <input type="text" class="form-control" name="designation" id="edit_designation" value="{{ $mannagements->designation }}" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="edit_image">Image</label>
                                        <input type="file" class="form-control" name="image" id="edit_image">
                                        @if ($mannagements->image)
                                            <img src="{{ asset($mannagements->image) }}" alt="mannagements Image" class="img-thumbnail mt-2" width="100">
                                        @else
                                            <img src="{{ asset('uploads/images/default.jpg') }}" alt="Default Image" class="img-thumbnail mt-2" width="100">
                                        @endif
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Members</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Edit Modal
        $('#editMemberModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var email = button.data('email');
            var phone = button.data('phone');
            var address = button.data('address');
            var dob = button.data('dob');
            var blood_group = button.data('blood_group');
            var image = button.data('image');

            var modal = $(this);
            modal.find('#edit_member_id').val(id);
            modal.find('#edit_name').val(name);
            modal.find('#edit_email').val(email);
            modal.find('#edit_phone').val(phone);
            modal.find('#edit_address').val(address);
            modal.find('#edit_dob').val(dob);
            modal.find('#edit_blood_group').val(blood_group);
            modal.find('#edit_designation').val(button.data('designation'));
            // Optionally show the current image in the edit modal
            if (image) {
                modal.find('#show_member_image').attr('src', image).show();
            } else {
                modal.find('#show_member_image').attr('src', "{{ asset('uploads/images/default.jpg') }}").show();
            }
        });
    });
</script>
@endsection
