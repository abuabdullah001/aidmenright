@extends('admin.masterTemplate')

@section('menu-name')
Add Donation
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Donation Create</h5>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-blue text-center"> ADD Donation</div>
                        <div class="card-body">

                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="post" action="{{ Route('donation-store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="">Name*</label>
                                                <input type="text" name="name" class="form-control" required>
                                                @error('name')
                                                <div class="error text-red text-bold" style="padding: 0;">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="">Email*</label>
                                                <input type="text" name="email" class="form-control" required>
                                                @error('email')
                                                <div class="error text-red text-bold" style="padding: 0;">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="">Phone*</label>
                                                <input type="phone" name="phone" class="form-control" required>
                                                @error('phone')
                                                <div class="error text-red text-bold" style="padding: 0;">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="">Amount*</label>
                                                <input type="number" name="amount" class="form-control" required>
                                                @error('amount')
                                                <div class="error text-red text-bold" style="padding: 0;">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="">Address*</label>
                                                <input type="text" name="address" class="form-control" required>
                                                @error('address')
                                                <div class="error text-red text-bold" style="padding: 0;">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="">Status*</label>
                                                <select name="status" class="form-control" required>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Completed">Completed</option>
                                                    <option value="Canceled">Canceled</option>
                                                </select>
                                                @error('status')
                                                <div class="error text-red text-bold" style="padding: 0;">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="">Transaction ID*</label>
                                                <input type="text" name="transaction_id" class="form-control" required>
                                                @error('transaction_id')
                                                <div class="error text-red text-bold" style="padding: 0;">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="">Currency*</label>
                                                <input type="text" name="currency" class="form-control" value="BDT" required>
                                                @error('currency')
                                                <div class="error text-red text-bold" style="padding: 0;">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script type="text/javascript" src="{{ asset('editor/ckeditor.js') }}"></script>
<script>
    var allEditors = document.querySelectorAll('.summernote');
    for (var i = 0; i < allEditors.length; ++i) {
        ClassicEditor.create(
            allEditors[i], {
                fontSize: {
                    options: [
                        12, 13, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36
                    ],
                    supportAllValues: true
                },
            }
        );
    }
</script>

@endsection
