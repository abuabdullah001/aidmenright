@extends('frontend.masterTemp')

@section('fmenuname')
HOME
@endsection

@section('front-main-content')
<div class="clearfix"></div>


@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Blog</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col -->
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-blue text-center"> ADD Blog</div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="POST"
                                        action="{{Route('blog.update',$blogs->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="col-md-6 form-group">
                                            <label for="">Name*</label>
                                            <input type="text" name="name" value="{{$blogs->name}}" class="form-control">
                                            @error('name')
                                            <div class="error text-red text-bold" style="padding: 0;">
                                                <strong>     {{$message}}  </strong>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="">Date</label>
                                            <input type="date" name="date" value="{{$blogs->date}}" class="form-control">
                                            @error('date')
                                            <div class="error text-red text-bold" style="padding: 0;">
                                                <strong>     {{$message}}  </strong>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="">Image</label>
                                            <input type="file" name="image" value="{{$blogs->image}}" class="form-control">
                                            @error('image')
                                            <div class="error text-red text-bold" style="padding: 0;">
                                                <strong>     {{$message}}  </strong>
                                            </div>
                                            @enderror
                                        </div>
                                        <div>
                                            <img src="{{asset('images/post/'.$blogs->image)}}" alt="" style="height: 100px;width:100px;">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="">Title</label>
                                            <textarea type="longText"  name="title"  class="summernote" id="" cols="30" rows="10">{{$blogs->title}}</textarea>
                                            @error('title')
                                            <div class="error text-red text-bold" style="padding: 0;">
                                                <strong>     {{$message}}  </strong>
                                            </div>
                                            @enderror
                                        </div>


                                        <div class="col-md-6 form-group">
                                            <label for="">Description</label>
                                            <textarea type="longText"  name="description"  class="summernote" id="" cols="30" rows="10">{{$blogs->description}}</textarea>
                                            @error('title')
                                            <div class="error text-red text-bold" style="padding: 0;">
                                                <strong>     {{$message}}  </strong>
                                            </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button class="btn btn-success">Update</button>
                                        </div>

                                    </form>
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


@endsection
<!-- Content Wrapper. Contains page content -->
