@extends('admin.masterTemplate')
@section('menu-name')
ALL Training
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"> All event Amount</h5>
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
                                    <h3 class="card-title"> <i class="fa fa-users"></i> All event amount</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('eventAmount.create')}}" class="btn btn-success float-right"> <i
                                            class="fa fa-plus"></i> ADD Event amount</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped  ">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Paid Amount</th>
                                        <th>Event id</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($eventAmountss as $key => $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{$value->user_id}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->paid_amount}}</td>
                                        <td>{{$value->event_id}}</td>

                                        <td>
                                            <label for="">
                                            <a href="{{route('eventAmount.edit',$value->id)}}"
                                                class="btn btn-xs btn-info"><i class="fas fa-edit"></i>
                                            </a>

                                                <form action="{{route('eventAmount.delete',$value->id)}}" method="post" >
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </label>
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
