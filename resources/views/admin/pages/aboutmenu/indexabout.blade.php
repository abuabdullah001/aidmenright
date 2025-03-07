@extends('admin.masterTemplate')

@section('menu-name')
ALL GALLERY IMAGES
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">About page</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{ route('addaboutcontent')}}" class="btn btn-sm btn-info float-right"><i class="fa fa-plus-square"></i> Add New</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-12">
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif

                    <div class="card" class="">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> Aboute page</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th >SL</th>
                                        <th>Page</th>
                                        <th>Content</th>
                                        <th>Image</th>
                                        <th style="width: 5%;">Plod</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($viewpage as $key=>$showlist)
                                    <tr>
                                        {{-- @dd($showlist); --}}
                                        <td>{{$key + 1}}</td>
                                        <td>{{$showlist ->title}}</td>
                                        <td>{!! $showlist->content !!}</td>
                                        <td><img src="{{asset($showlist->image)}}" alt="" style="height: 120px"></td>
                                        <td>
                                            <a href="{{'aboute_viewedit/'.$showlist->id}}" class="btn btn-ml btn-danger"><i class="fas fa-edit"></i></a>
                                            &nbsp;&nbsp;&nbsp;
                                            <a onclick="return confirm('Are you sure you want to Delete This Record ?')" href="{{'aboute_viewdelete/'.$showlist->id}}" class="btn btn-ml btn-danger"><i class="fas fa-trash-alt"></i></a>
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
