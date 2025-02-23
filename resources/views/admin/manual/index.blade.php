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
                    <h5 class="m-0 text-dark">All Blogs</h5>
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
                                    <h3 class="card-title"> <i class="fa fa-users"></i> All payable amount</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('manual.create')}}" class="btn btn-success float-right"> <i
                                            class="fa fa-plus"></i> ADD payable Cash</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped  ">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Payment type</th>
                                        <th>Amount</th>
                                        <th>Transaction info</th>
                                        <th>Payment proof</th>
                                        <th>Donation type</th>
                                        <th>Payment status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($manuals as $key => $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->payment_method}}</td>
                                        <td>{{$value->amount}}</td>
                                        <td>{!! Str::limit($value->transaction_info, 5000) !!}</td>
                                        <td>
                                            @if($value->payment_proof)
                                                <img src="{{ asset($value->payment_proof) }}" alt="Payment Proof" height="50px">
                                            @else
                                                No proof uploaded
                                            @endif
                                        </td>
                                        <td>{{$value->event_type}} </td>
                                        <td>
                                            <select name="payment_status" id="payment_status_{{ $value->id }}" onchange="updatePaymentStatus({{ $value->id }}, this.value)">
                                                <option value="pending" {{ $value->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="approved" {{ $value->payment_status == 'approved' ? 'selected' : '' }}>Approved</option>
                                            </select>
                                        </td>
                                        <td>
                                             <a href="{{route('manual.edit',$value->id)}}"
                                                class="btn btn-xs btn-info">Edit</a>
                                                <form action="{{route('manual.delete',$value->id)}}" method="post" >
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function updatePaymentStatus(id, status) {
        $.ajax({
            url: "{{ route('donation.updatePaymentStatus') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                payment_status: status
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                } else {
                    alert("Failed to update payment status. Please try again.");
                }
            },
            error: function(xhr) {
                alert("An error occurred: " + xhr.status + " " + xhr.statusText);
            }
        });
    }
</script>
