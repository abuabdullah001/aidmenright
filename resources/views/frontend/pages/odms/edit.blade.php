@extends('admin.masterTemplate')

@section('menu-name')
Edit About ODMS
@endsection

@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Edit ODMS</h5>
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
                        <div class="card-header bg-blue text-center">Edit ODMS</div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="POST" action="{{ route('odms.update', $odmss->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Image Upload -->
                                        <div class="col-md-6 form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control">
                                            <img src="{{ asset($odmss->image) }}" alt="Current Image" style="max-height: 100px; margin-top: 10px;">
                                            @error('image')
                                            <div class="error text-red text-bold" style="padding: 0;">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                        <div>
                                            <img src="{{asset($odmss->image)}}" alt="">
                                        </div>



                                        <!-- Title -->
                                        <div class="col-md-6 form-group">
                                            <label for="title">Title</label>
                                            <textarea name="title" class="form-control summernote" cols="30" rows="5">{{  $odmss->title }}</textarea>
                                            @error('title')
                                            <div class="error text-red text-bold" style="padding: 0;">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>

                                        <!-- Description -->
                                        <div class="col-md-6 form-group">
                                            <label for="descrition">Description</label>
                                            <textarea name="descrition" class="form-control summernote" cols="30" rows="10">{{  $odmss->descrition }}</textarea>
                                            @error('descrition')
                                            <div class="error text-red text-bold" style="padding: 0;">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>

                                        <!-- Submit Button -->
                                        <div>
                                            <button type="submit" class="btn btn-success">Submit</button>
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

<!-- CKEditor -->
<script type="text/javascript" src="{{ asset('editor/ckeditor.js') }}"></script>
<script>
    var allEditors = document.querySelectorAll('.summernote');
    for (var i = 0; i < allEditors.length; ++i) {
        ClassicEditor.create(allEditors[i], {
            fontSize: {
                options: [
                    12, 13, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36
                ],
                supportAllValues: true
            },
        });
    }
</script>

@endsection
