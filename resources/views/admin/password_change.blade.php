@extends('admin.masterTemplate')

@section('menu-name')
Change Password
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Change Password</h5>
                </div>
            </div>
        </div>
        <hr class="style18">
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"><i class="fas fa-key"></i> Update Password</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

        

                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" name="new_password" class="form-control" required>
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Password</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
