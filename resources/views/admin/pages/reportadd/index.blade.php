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
                    <h5 class="m-0 text-dark">All Report</h5>
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
                                    <h3 class="card-title"> <i class="fa fa-users"></i> All Report</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('repo.create')}}" class="btn btn-success float-right"> <i
                                            class="fa fa-plus"></i> ADD Report</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Images</th>
                                        <th>Pdf</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($repos as $key => $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{!! Str::limit($value->description, 200) !!}</td>
                                        <td>
                                          <img src="{{asset($value->image)}}" alt="" style="height: 120px">
                                        </td>
                                        <td>
                                            <a href="{{ asset($value->pdf) }}" target="_blank" download>
                                                <img src="{{ asset('free-pdf-download-icon-2617-thumb.png') }}" alt="PDF" style="height: 120px;">
                                            </a>
                                        </td>

                                        <td>
                                         <a href="{{ route('repo.view', $value->id) }}" class="btn btn-xs btn-info"><img width="20" height="20" src="https://img.icons8.com/ios-glyphs/30/visible--v1.png" alt="visible--v1"/></a>
                                              <a href="{{ route('repo.edit', $value->id) }}" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a>
                                             <form action="{{ route('repo.delete', $value->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
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
