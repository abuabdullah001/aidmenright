@extends('admin.masterTemplate')

@section('menu-name')
    ALL Donations
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

@php
    $donations = App\Models\Order::all(); // Assuming the model name is `Order` and the namespace is correct
@endphp

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">All Donations</h5>
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
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"> <i class="fa fa-users"></i> All Donations</h3>
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
                                        <th>Phone</th>
                                        <th>Amount</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Transaction ID</th>
                                        <th>Currency</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($donations as $donation)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $donation->name }}</td>
                                        <td>{{ $donation->email }}</td>
                                        <td>{{ $donation->phone }}</td>
                                        <td>{{ $donation->amount }}</td>
                                        <td>{{ $donation->address }}</td>
                                        <td>{{ $donation->status }}</td>
                                        <td>{{ $donation->transaction_id }}</td>
                                        <td>{{ $donation->currency }}</td>

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
