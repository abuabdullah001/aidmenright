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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">All Custom Donations</h5>
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
                                {{-- <div class="col-md-6">
                                    <a href="{{ route('donation.create') }}" class="btn btn-success float-right"> <i class="fa fa-plus"></i> Add Donation</a>
                                </div> --}}
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Image</th>
                                        <th>What Will Donate</th>
                                        <th>How Will Donate</th>
                                        <th>Comment</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($gifts as $donation)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $donation->name ?? 'N/A' }}</td>
                                        <td>{{ $donation->phone ?? 'N/A' }}</td>
                                        <td>{{ $donation->address ?? 'N/A' }}</td>
                                        <td>
                                            @if($donation->image)
                                            <img src="{{ asset($donation->image) }}" alt="Donation Image" width="100" height="50px">
                                            @else
                                            <span>No image</span>
                                            @endif
                                        </td>
                                        <td>{{ $donation->what_will_donate ?? 'N/A' }}</td>
                                        <td>{{ $donation->how_he_will_donate ?? 'N/A' }}</td>
                                        <td>{{ $donation->comment ?? 'N/A' }}</td>
                                        {{-- <td>
                                            <a href="{{ route('donation.edit', $donation->id) }}" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('donation.delete', $donation->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </td> --}}
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
