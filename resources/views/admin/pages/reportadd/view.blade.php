@extends('admin.masterTemplate')

@section('menu-name')
    View News
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Partner Logo Details</h5>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $repo->name }}</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <!-- Description -->
                            <div class="form-group">
                                <label><strong>Description:</strong></label>
                                <p>{{ $repo->description }}</p>
                            </div>

                            <!-- Image Preview -->
                            <div class="form-group">
                                <label><strong>Image</strong></label><br>
                                <img src="{{ asset($repo->image) }}" alt="{{ $repo->name }} Logo" class="img-thumbnail" style="max-height: 200px;">
                            </div>

                            <!-- PDF Download -->
                            <div class="form-group">
                                <label><strong>PDF File:</strong></label><br>
                                <a href="{{ asset($repo->pdf) }}" class="btn btn-success btn-sm" download>
                                    <i class="fas fa-download"></i> Download PDF
                                </a>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('repo.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
