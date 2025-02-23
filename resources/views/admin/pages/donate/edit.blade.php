@extends('admin.masterTemplate')

@section('menu-name')
    Edit A Training
@endsection

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark">Donations Edit</h5>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <hr class="style18">
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- /.col -->
                    <div class="col-md-1"></div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-blue text-center"> EDIT DONATIONS</div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane">
                                        <form class="form-horizontal" method="post"
                                            action="{{ route('donate.update', $donates->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr class="text-center text-nowrap ">
                                                            <th>Sl</th>
                                                            <th>Sponsor Amount</th>
                                                            <th>Paid Amount</th>
                                                            <th>Phone Number</th>
                                                            <th>Deu Amount</th>
                                                            <th>Transaction Id</th>
                                                            <th width="50%">Month</th>
                                                            <th width="30%">Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($donates->billing as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->amount }} Tk</td>
                                                            <td>{{ $item->paid_amount }} Tk</td>
                                                            <td>{{ $item->phone_number }}</td>
                                                            <td>{{ $item->amount - $item->paid_amount }}</td>
                                                            <td>{{ $item->transaction_id }}</td>
                                                            <td width="30%">
                                                                {{ $item->created_at->format('Y-M-d') }} to
                                                                {{ $item->created_at->copy()->addMonth()->format('Y-M-d') }}
                                                            </td>
                                                            </td>
                                                            <td width="50%">
                                                                <select name="status[{{ $item->id }}]"
                                                                    class="form-control">
                                                                    <option value="paid"
                                                                        {{ $item->status == 'paid' ? 'selected' : '' }}>
                                                                        paid</option>
                                                                    <option value="not_paid"
                                                                        {{ $item->status == 'not_paid' ? 'selected' : '' }}>
                                                                        not_paid</option>
                                                                    <option value="partial"
                                                                        {{ $item->status == 'partial' ? 'selected' : '' }}>
                                                                        partial</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <button type="submit" class="btn btn-primary">Update
                                                                    Status</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
