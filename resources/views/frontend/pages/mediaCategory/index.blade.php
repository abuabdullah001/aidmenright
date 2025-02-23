@extends('admin.masterTemplate')

@section('menu-name')
Add Donation
@endsection

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"> category</h5>
                </div>
                <div class="col-sm-6">
                    <a href="{{route('mediaCategory.create')}}" class="btn btn-info float-right btn-sm">Add New</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>


    @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif


    <section class="content">
        <div class="container">


        @if(session()->has('delete'))
            <div class="alert alert-success">
                {{ session()->get('delete') }}
            </div>
            @endif
        @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
            @endif

            <div class="row">

                <div class="col-12 col-sm-6 col-md-12">
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i>  category</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mediaCategories as $key => $mediaCategory)

                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $mediaCategory->name }}</td>
                                            {{-- <td>
                                                @if($mediaCategory->status == 0)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td> --}}

                                            <td>
                                                <div class="" style="display: flex">
                                                <a href="{{ route('mediaCategory.edit', $mediaCategory->id) }}"  class="btn btn-sm btn-info me-2" style="margin-left:20px;margin-right:20px ">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('mediaCategory.delete', $mediaCategory->id) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
<!-- Content Wrapper. Contains page content -->
