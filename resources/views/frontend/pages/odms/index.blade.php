@extends('admin.masterTemplate')

@section('menu-name')
Add About odms
@endsection
@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Odms</h5>
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
                        <div class="card-header bg-blue text-center" ><a href="{{route('odms.create')}}"> ADD Odms </a>  </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped  ">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($odmss as $odms)
                                                <tr>
                                                    <td>{{$odms->id}}</td>
                                                    <td>
                                                        <img src="{{asset($odms->image)}}" alt="" width="100%">
                                                    </td>                                                   <td>{!! Str::limit($odms->title, 5000) !!}</td>
                                                    <td>{!! Str::limit($odms->descrition, 5000) !!}</td>
                                                    <td>
                                                        <a class="btn btn-success mb-2" href="{{ route('odms.edit', $odms->id) }}">
                                                            <i class="fas fa-edit"></i> </a>
                                                        <form action="{{ route('odms.delete', $odms->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?')">
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


                </div>

            </div>
                </div>
    </section>

</div>

<script type="text/javascript" src="{{asset('editor/ckeditor.js')}}"></script>
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

