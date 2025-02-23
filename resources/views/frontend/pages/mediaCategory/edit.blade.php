@extends('admin.masterTemplate')

@section('menu-name')
Add Donation
@endsection

@section('main-content')


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Add Media Category</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('mediaCategory.index')}}" class="btn btn-info btn-sm float-right">All Medua category</a>
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
                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-list-alt"></i> Add media Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('mediaCategory.update', $mediaCategories->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <select name="name" id="" style="width: 100px; height: 50px;">
                                        <option value="Cold wave" {{ $mediaCategories->name == 'Cold wave' ? 'selected' : '' }}>Cold Wave</option>
                                        <option value="Storm" {{ $mediaCategories->name == 'Storm' ? 'selected' : '' }}>Storm</option>
                                        <option value="Flood" {{ $mediaCategories->name == 'Flood' ? 'selected' : '' }}>Flood</option>
                                        <option value="All" {{ $mediaCategories->name == 'All' ? 'selected' : '' }}>All</option>
                                    </select>
                                </div>
                                <button class="btn btn-success">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
