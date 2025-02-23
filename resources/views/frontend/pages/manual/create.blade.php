@extends('frontend.masterTemp')

@section('fmenuname')
HOME
@endsection

@section('front-main-content')
<div class="clearfix"></div>

<section>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h5 class="m-0 text-dark">Blog</h5> --}}
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container" style="width: 70%; height:250px; margin: 20px auto; border: 1px solid #ddd; padding: 20px; border-radius: 10px; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
            <h2 style="margin-bottom: 20px; color: #333; font-family: Arial, sans-serif;">ODMS All Payment Details</h2>
            {{-- <h4 style="margin-bottom: 10px; color: #555; font-family: Arial, sans-serif;">Bkash no: +88014454</h4>
            <h4 style="margin-bottom: 10px; color: #555; font-family: Arial, sans-serif;">Rocket no: +8801456454</h4> --}}
            <h4 style="margin-bottom: 10px; color: #555; font-family: Arial, sans-serif;">0642901091487
                Odms(organization for Disaster management society)</h4>
            <h4 style="margin-bottom: 10px; color: #555; font-family: Arial, sans-serif;">Pubali bank,khatungonj branch</h4>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-1"></div>
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane row col-md-12 container" style="display: flex; gap: 20px; margin-top: 20px;">
                                    <!-- Form Section -->
                                    <div class="col-md-6" style="border: 1px solid #ddd;margin-top:20px; padding: 20px; border-radius: 10px; background-color: #ffffff; width:100% ;box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                        <form class="form-horizontal" method="post" action="{{ Route('manual.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <h2 style="text-align: center"> Donate manually </h2>
                                            <div style="background-color:black;height:2px;width:100px;margin-left:600px;margin-bottom:50px;"></div>
                                            {{-- <h4 class="" style="margin-bottom: 20px; text-align:center; color: #333; font-family: Arial, sans-serif;">Manual Payment Form</h4> --}}

                                        <div class="col-md-6">
                                            <!-- Name -->
                                            <div class="form-group" style="margin-bottom: 15px;">
                                                <label for="name" style="font-weight: bold;">Name</label>
                                                <input type="text" name="name" class="form-control" style="padding: 10px; font-size: 14px;" value="">
                                                @error('name')
                                                <div class="error text-red text-bold" style="color: red; font-size: 12px; margin-top: 5px;">
                                                    <strong>{{$message}}</strong>
                                                </div>
                                                @enderror
                                            </div>

                                                <!-- Phone -->
                                                <div class="form-group" style="margin-bottom: 15px;">
                                                    <label for="phone" style="font-weight: bold;">Phone</label>
                                                    <input type="text" name="phone" class="form-control" style="padding: 10px; font-size: 14px;" value="">
                                                    @error('phone')
                                                    <div class="error text-red text-bold" style="color: red; font-size: 12px; margin-top: 5px;">
                                                        <strong>{{$message}}</strong>
                                                    </div>
                                                    @enderror
                                                </div>


                                            <!-- Address -->
                                            <div class="form-group" style="margin-bottom: 15px;">
                                                <label for="address" style="font-weight: bold;">Address</label>
                                                <input type="text" name="address" class="form-control" style="padding: 10px; font-size: 14px;" value="">
                                                @error('address')
                                                <div class="error text-red text-bold" style="color: red; font-size: 12px; margin-top: 5px;">
                                                    <strong>{{$message}}</strong>
                                                </div>
                                                @enderror
                                            </div>


                                                <!-- Email Address -->
                                                <div class="form-group" style="margin-bottom: 15px;">
                                                    <label for="email" style="font-weight: bold;">Email Address</label>
                                                    <input type="text" name="email" class="form-control" style="padding: 10px; font-size: 14px;" value="">
                                                    @error('email')
                                                    <div class="error text-red text-bold" style="color: red; font-size: 12px; margin-top: 5px;">
                                                        <strong>{{$message}}</strong>
                                                    </div>
                                                    @enderror
                                                </div>



                                            <!-- Payment Method -->
                                            <div class="form-group" style="margin-bottom: 15px;">
                                                <label for="payment_method" style="font-weight: bold;"> Payment Method</label>
                                                <select name="payment_method" id="payment_method" class="form-control" style="padding: 10px; font-size: 14px;">
                                                    <option value="bkash">Bkash</option>
                                                    <option value="nagad">Nagad</option>
                                                    <option value="rocket">Rocket</option>
                                                    <option value="bank">Bank</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                @error('payment_method')
                                                <div class="error text-red text-bold" style="color: red; font-size: 12px; margin-top: 5px;">
                                                    <strong>{{$message}}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                            </div>


                                            <div class="col-md-6">
                                            <!-- Amount -->
                                            <div class="form-group" style="margin-bottom: 15px;">
                                                <label for="amount" style="font-weight: bold;">Amount</label>
                                                <input type="number" name="amount" class="form-control" style="padding: 10px; font-size: 14px;" step="0.01" value="{{ old('amount', $manuals->amount ?? '') }}">
                                                @error('amount')
                                                <div class="error text-red text-bold" style="color: red; font-size: 12px; margin-top: 5px;">
                                                    <strong>{{$message}}</strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <!-- Transaction Info -->
                                            <div class="form-group" style="margin-bottom: 15px;">
                                                <label for="transaction_info" style="font-weight: bold;">Transaction Info</label>
                                                <textarea name="transaction_info" class="form-control" style="padding: 10px; font-size: 14px;" rows="4"></textarea>
                                                @error('transaction_info')
                                                <div class="error text-red text-bold" style="color: red; font-size: 12px; margin-top: 5px;">
                                                    <strong>{{$message}}</strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <!-- Payment Proof -->
                                            <div class="form-group" style="margin-bottom: 15px;">
                                                <label for="payment_proof" style="font-weight: bold;">Payment Proof</label>
                                                <input type="file" name="payment_proof" class="form-control" style="padding: 5px;">
                                                @error('payment_proof')
                                                <div class="error text-red text-bold" style="color: red; font-size: 12px; margin-top: 5px;">
                                                    <strong>{{$message}}</strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <!-- Donation Type -->
                                            <div class="form-group" style="margin-bottom: 15px;">
                                                <label for="event_type" style="font-weight: bold;">Donation Type</label>
                                                <select name="event_type" id="event_type" class="form-control" style="padding: 10px; font-size: 14px;">
                                                    <option value="Event">Event</option>
                                                    <option value="Project">Project</option>
                                                    <option value="Sponsor">Sponsor</option>
                                                    <option value="Champaign">Champaign</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                @error('event_type')
                                                <div class="error text-red text-bold" style="color: red; font-size: 12px; margin-top: 5px;">
                                                    <strong>{{$message}}</strong>
                                                </div>
                                                @enderror
                                            </div>

                                            {{-- choose event --}}


                                        <div class="mt-5 form-group" id="event">

                                        </div>

                                             {{-- choose event --}}


                                            <!-- Submit Button -->
                                            <div style="text-align:left; margin-top: 20px;">
                                                <button type="submit" class="btn btn-success" style="padding: 10px 20px; font-size: 16px;">Submit</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
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

</section>

<script type="text/javascript" src="{{asset('editor/ckeditor.js')}}"></script>
<!--<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>-->
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#event_type').change(function () {
            var eventId = $(this).val();
            if (eventId) {
                $.ajax({
                    url: "{{ route('getDonationTypes') }}", // Route for fetching donation types
                    type: "GET",
                    data: { event_id: eventId },
                    success: function (response) {
                        $('#event').html(response);
                    }
                });
            }
        });
    });
</script>


@endsection
<!-- Content Wrapper. Contains page content -->
