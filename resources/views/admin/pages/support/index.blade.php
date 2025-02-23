@extends('admin.masterTemplate')
@section('menu-name')
Support List
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
                    <h5 class="m-0 text-dark">All Support</h5>
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
                                    <h3 class="card-title"> <i class="fa fa-users"></i> All Support</h3>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Support Type</th>
                                        <th>Support Reason</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($supports as $support)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $support->name }}</td>
                                        <td>{{ $support->email }}</td>
                                        <td>{{ $support->phone ?? 'N/A' }}</td>
                                        <td>{{ $support->support_type ?? 'N/A' }}</td>
                                        <td>{{ $support->support_reason ?? 'N/A' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Add pagination here if necessary -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
