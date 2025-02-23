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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Paid List</h5>
                </div>
            </div>
        </div>
        <hr class="style18">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                    @php
                        $billing = App\Models\Billing::where('user_id', auth()->user()->id)->where('status', 'not_paid')->get();
                    @endphp
    
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Sponsor Amount</th>
                                    <th>Payment Status</th>
                                    <th>Paid Amount</th>
                                    <th>Month</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($billing as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ auth()->user()->name }}</td>
                                    <td>{{ $item->amount }} Tk</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->paid_amount }}</td>
                                    <td>{{ $item->created_at->format('Y-M-d') }} to {{ $item->created_at->copy()->addMonth()->format('Y-M-d') }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm updatePaymentBtn" 
                                            data-id="{{ $item->id }}" 
                                            data-amount="{{ $item->amount }}" 
                                            data-paid="{{ $item->paid_amount }}" 
                                            data-status="{{ $item->status }}" 
                                            data-toggle="modal" data-target="#updatePaymentModal">
                                            Pay Now
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
    
                    <!-- Payment Update Modal -->
                    <div class="modal fade" id="updatePaymentModal" tabindex="-1" role="dialog" aria-labelledby="updatePaymentModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updatePaymentModalLabel">Update Payment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('billing.updatePayment', ':id') }}" method="POST" id="paymentForm">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="billing_id" id="billingId">
                                        <div class="form-group">
                                            <label>Amount Due (Tk)</label>
                                            <input type="text" class="form-control" id="billingAmount" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Paid Amount (Tk)</label>
                                            <input type="number" name="paid_amount" class="form-control" id="paidAmount" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone_number" class="form-control" id="phoneNumber" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Transaction ID</label>
                                            <input type="text" name="transaction_id" class="form-control" id="transactionId" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Update Payment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Payment Update Modal -->
    
                </div>
            </div>
        </div>
    </section>
    
    <script>
        // Using jQuery to populate the modal fields dynamically
        $(document).ready(function() {
            $('.updatePaymentBtn').on('click', function() {
                var billingId = $(this).data('id');
                var billingAmount = $(this).data('amount');
                var paidAmount = $(this).data('paid');
                var status = $(this).data('status');
    
                // Set modal values
                $('#billingId').val(billingId);
                $('#billingAmount').val(billingAmount);
                $('#paidAmount').val(paidAmount);
    
                // Update form action to include the correct billing ID
                var formAction = "{{ route('billing.updatePayment', ':id') }}".replace(':id', billingId);
                $('#paymentForm').attr('action', formAction);
            });
        });
    </script>
    
</div>

<!-- Script to Fill Modal with Data -->

@endsection