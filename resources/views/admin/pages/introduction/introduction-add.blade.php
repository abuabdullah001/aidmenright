@extends('admin.masterTemplate')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Add New User</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    @if($errors->any())
                    <div class="alert alert-danger" {>
                        <ui>
                            @foreach($errors->all() as $error )
                            <li>{{$error}}</li>
                            @endforeach()
                        </ui>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body register-card-body">
                            <form action="#" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                
                                    <input type="text" name="title" class="form-control" placeholder="Full name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>

                           

                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="image">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-image"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>

@endsection