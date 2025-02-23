@extends('admin.masterTemplate')
@section('menu-name')
ALL Training
@endsection
@section('main-content')
<style>
    .tablestyle3 {
        margin: 0;
        padding: 0;
        line-height: 0;
        font-size: 9px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">All events</h5>
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
                    @if(session()->has('success'))
                    <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"> <i class="fa fa-users"></i> All People feedback</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('feedback.create')}}" class="btn btn-success float-right"> <i
                                            class="fa fa-plus"></i> ADD People feedback</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Company and Designation name</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($feedbacks as $key => $value)
                                    <tr>

                                        <td>{{ $i++ }}</td>

                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->designation }}</td>
                                        <td><img src="{{asset('images/post/'.$value->image)}}" alt="" style="height: 100px;width:100px;"></td>
                                        <td>{!! Str::limit($value->description, 5000) !!}</td>

                                        <td>
                                             <a href="{{route('feedback.edit',$value->id)}}"
                                                class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('feedback.delete',$value->id)}}"
                                                onclick="return confirm('Are You sure')"
                                                class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></a>
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
@endsection
