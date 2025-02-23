@extends('admin.masterTemplate')
@section('menu-name')
ALL Training
@endsection
@section('main-content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container mt-3" style="margin-left: 300px">
    <div class="donation-section">

        <div class="donation-options">
            <h2 class="text-uppercase mt-5">Contribute for disaster people</h2>

            <form action="{{ route('eventAmount.update', $eventss->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">User id</label>
                    <input type="text" id="user_id" name="user_id" class="form-control" value="{{$eventss->user_id}}"  placeholder="Enter your name" required>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" value="{{$eventss->name}}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="integer" id="phone" name="phone" class="form-control" placeholder="Enter your Phone" value="{{$eventss->phone}}" required>
                </div>

                <div class="form-group">
                    <label for="donation_amount">Paid Amount</label>
                    <input type="integer" id="paid_amount" name="paid_amount" class="form-control" placeholder="Paid amount" value="{{$eventss->paid_amount}}" reaquired> <!-- Displaying the session value -->
                </div>


                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
