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
                    <h5 class="m-0 text-dark">Sponserd</h5>
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
                    {{-- <div class="card">
                        <div class="card-header bg-cyan">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"> <i class="fa fa-users"></i> All champaigns</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('create.champaign')}}" class="btn btn-success float-right"> <i
                                            class="fa fa-plus"></i> ADD champaigns</a>
                                </div>
                            </div>
                        </div> --}}

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped  ">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Company Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Sponsar Amount</th>
                                        <th>Contribution Type</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ Auth()->user()->sponsar->first_name }}</td>
                                        <td>{{ Auth()->user()->sponsar->last_name }}</td>
                                        <td>{{ Auth()->user()->sponsar->email }}</td>
                                        <td>{{ Auth()->user()->sponsar->contact_number }}</td>
                                        <td>{{ Auth()->user()->sponsar->sponsor_number }} Tk</td>
                                        <td>{{ Auth()->user()->sponsar->contribution_type }}</td>
                       
                                
                                    </tr>
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
