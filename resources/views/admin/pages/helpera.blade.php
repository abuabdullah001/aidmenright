@php
$mannagements = App\Models\MannagementMember::orderby('id','desc')->get();
@endphp
<section class="content" id='td'>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-12">
                <div class="card">
                    <div class="card-header bg-cyan">
                        <h3 class="card-title"><i class="fa fa-users"></i> All Members</h3>
                    </div>
                    <div class="card-body"  id='td'>
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
                                                class="btn btn-danger" onclick="return confirm('Are You sure')">Delete</a>
                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#showMemberModal" data-id="{{ $value->id }}"
                                                data-name="{{ $value->name }}" data-email="{{ $value->email }}"
                                                data-phone="{{ $value->phone }}"
                                                data-address="{{ $value->address }}"
                                                data-dob="{{ $value->dob }}"
                                                data-blood_group="{{ $value->blood_group }}"
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
