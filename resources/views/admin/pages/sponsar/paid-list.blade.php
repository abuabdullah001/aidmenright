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
                    <h5 class="m-0 text-dark">Paid List</h5>
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
                @php
                   $billing = App\Models\Billing::where('user_id',auth()->user()->id)->whereIn('status',['paid','partial'])->get();
                @endphp

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped  ">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Sponser Amount</th>
                                        <th>Payment Status</th>
                                        <th>Paid Amount</th>
                                        <th>Month</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($billing as $item)
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{auth()->user()->name}}</td>
                                            <td>{{$item->amount}} Tk</td>
                                            <td>{{$item->status }}</td>
                                            <td>{{$item->paid_amount}} Tk</td>                                        
                                            <td>{{ $item->created_at->format('Y-M-d') }} to {{ $item->created_at->copy()->addMonth()->format('Y-M-d') }}</td>                                        
                                        @endforeach
                                        
                                
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
