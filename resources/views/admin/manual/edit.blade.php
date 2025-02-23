@extends('admin.masterTemplate')

@section('menu-name')
ALL Training
@endsection

@section('main-content')
<div class="clearfix"></div>

<section>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- Optional Page Title --}}
                    </div>
                </div>
            </div>
            <hr class="style18">
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header bg-blue text-center">
                                <h1>Edit Donation</h1>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" method="POST"
                                      action="{{ route('manual.update', $manuals->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="col-md-6 form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ $manuals->name }}" class="form-control">
                                        @error('name')
                                            <div class="error text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" name="email" value="{{ $manuals->email }}" class="form-control">
                                        @error('email')
                                            <div class="error text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" value="{{ $manuals->address }}" class="form-control">
                                        @error('address')
                                            <div class="error text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" value="{{ $manuals->phone }}" class="form-control">
                                        @error('phone')
                                            <div class="error text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="payment_method">Payment Method</label>
                                        <select name="payment_method" id="payment_method" class="form-control">
                                            <option value="Mobile Banking" {{ $manuals->payment_method == 'Mobile Banking' ? 'selected' : '' }}>Mobile Banking</option>
                                            <option value="Bank" {{ $manuals->payment_method == 'Bank' ? 'selected' : '' }}>Bank</option>
                                            <option value="Others" {{ $manuals->payment_method == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select>
                                        @error('payment_method')
                                            <div class="error text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6 form-group">
                                        <label for="amount">Amount</label>
                                        <input type="number" name="amount" class="form-control" step="0.01" value="{{$manuals->amount}}">
                                        @error('amount')
                                        <div class="error text-red text-bold" style="padding: 0;">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6 form-group">
                                        <label for="transaction_info">Transaction Info</label>
                                        <textarea name="transaction_info" class="form-control summernote" rows="4">{{ $manuals->transaction_info }}</textarea>
                                        @error('transaction_info')
                                            <div class="error text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="payment_proof">Payment Proof</label>
                                        <input type="file" name="payment_proof" class="form-control">
                                        @if($manuals->payment_proof)
                                            <img src="{{ asset($manuals->payment_proof) }}" alt="Payment Proof" height="100" class="mt-2">
                                        @endif
                                        @error('payment_proof')
                                            <div class="error text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="event_type">Donation Type</label>
                                        <select name="event_type" id="event_type" class="form-control">
                                            <option value="Event" {{ $manuals->event_type == 'Event' ? 'selected' : '' }}>Event</option>
                                            <option value="Project" {{ $manuals->event_type == 'Project' ? 'selected' : '' }}>Project</option>
                                            <option value="Sponsor" {{ $manuals->event_type == 'Sponsor' ? 'selected' : '' }}>Sponsor</option>
                                            <option value="Champaign" {{ $manuals->event_type == 'Champaign' ? 'selected' : '' }}>Champaign</option>
                                            <option value="Others" {{ $manuals->event_type == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select>
                                        @error('event_type')
                                            <div class="error text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<script type="text/javascript" src="{{ asset('editor/ckeditor.js') }}"></script>
<script>
    document.querySelectorAll('.summernote').forEach((editor) => {
        ClassicEditor.create(editor, {
            fontSize: {
                options: [12, 14, 16, 18, 20, 24, 28, 32],
                supportAllValues: true,
            },
        });
    });
</script>
@endsection
