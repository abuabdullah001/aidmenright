@extends('admin.masterTemplate')
@section('menu-name')
Add Sponsor
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Add New Sponsor</h5>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"><i class="fa fa-user-plus"></i> Add Sponsor Details</h3>
                        </div>

                        <form action="{{ route('store.sponsor') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <!-- First Name -->
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name" required>
                                </div>
                                <!-- Last Name -->
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name" required>
                                </div>
                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email Address" required>
                                </div>
                                <!-- Contact Number -->
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="text" name="contact_number" id="contact_number" class="form-control" placeholder="Enter Contact Number">
                                </div>
                                <!-- Sponsor Number -->
                                <div class="form-group">
                                    <label for="sponsor_number">Sponsor Number</label>
                                    <input type="text" name="sponsor_number" id="sponsor_number" class="form-control" placeholder="Enter Sponsor Number" required>
                                </div>
                                <!-- Contribution Type -->
                                <div class="form-group">
                                    <label for="contribution_type">Contribution Type</label>
                                    <select name="contribution_type" id="contribution_type" class="form-control" required>
                                        <option value="" disabled selected>Select Contribution Type</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="One-Time">One-Time</option>
                                    </select>
                                </div>
                                <!-- Date -->
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="date" class="form-control">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Sponsor</button>
                                <a href="{{ route('all.sponsors') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
