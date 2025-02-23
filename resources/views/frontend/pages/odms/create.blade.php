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
                        <div class="card-header bg-blue text-center"> ADD Odms</div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="post" action="{{ route('odms.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="col-md-6 form-group">
                                            <label for="">Image</label>
                                            <input type="file" name="image" class="form-control">
                                            @error('image')
                                            <div class="error text-red text-bold" style="padding: 0;">
                                                <strong>     {{$message}}  </strong>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="">Title</label>
                                            <textarea name="title" class="form-control summernote" id="" cols="30" rows="10"></textarea>
                                            @error('title')
                                            <div class="error text-red text-bold" style="padding: 0;">
                                                <strong>     {{$message}}  </strong>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="">Description</label>
                                            <textarea name="descrition" id="" cols="30" class="form-control summernote" rows="10"></textarea>
                                            @error('title')
                                            <div class="error text-red text-bold" style="padding: 0;">
                                                <strong>     {{$message}}  </strong>
                                            </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button class="btn btn-success">Submit</button>
                                        </div>

                                    </form>
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

