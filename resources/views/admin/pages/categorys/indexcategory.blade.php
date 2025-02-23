@extends('admin.masterTemplate')
@section('menu-name')
Category
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Category</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <button type="button" class="btn btn-sm btn-info float-right" data-toggle="modal"
                        data-target="#modal-lg">
                        <i class="fa fa-plus-square"></i> Add New
                    </button>

                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">SL</th>
                                        <th style="width: 20%;">Type</th>
                                        <th style="width: 25%;">Category</th>
                                        <th style="width: 10%;">Order By</th>
                                        <th style="width: 15%;">Image</th>
                                        <th style="width: 10%;">Edit</th>
                                        <th style="width: 10%;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($viewcategory as $key => $category)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$category->type}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{{$category->order_by}}</td>
                                        <td><img src="{{ asset($category->image) }}" alt="" height="50" width="50"></td>
                                        <td>
                                            <button class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$category->id}}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <a href="{{ url('deletecategory/'.$category->id) }}" onclick="return confirm('Are you sure you want to Delete This Record?')">
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Edit Category Modal -->
                                    <div class="modal fade" id="editModal{{$category->id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form action="{{ url('updatecategory/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Category</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Type</label>
                                                                    <select name="type" class="form-control" required>
                                                                        <option value="Gallery" {{ $category->type == 'Gallery' ? 'selected' : '' }}>Gallery</option>
                                                                        <option value="Video" {{ $category->type == 'Video' ? 'selected' : '' }}>Video</option>
                                                                        <option value="About" {{ $category->type == 'About' ? 'selected' : '' }}>About</option>
                                                                        <option value="Mission" {{ $category->type == 'Mission' ? 'selected' : '' }}>Mission</option>
                                                                        <option value="Message" {{ $category->type == 'Message' ? 'selected' : '' }}>Message</option>
                                                                        <option value="Committee" {{ $category->type == 'Committee' ? 'selected' : '' }}>BIEA Committee</option>
                                                                        <option value="Cell" {{ $category->type == 'Cell' ? 'selected' : '' }}>BIEA Cell</option>
                                                                        <option value="Activities" {{$category->type == 'Activities' ? 'selected' : '' }}>Activities</option>
                                                                        <option value="Media" {{$category->type == 'Media' ? 'selected' : '' }}>Media</option>
                                                                        <option value="Involved" {{$category->type == 'Involved' ? 'selected' : '' }}>Involved</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label>Category</label>
                                                                    <input type="text" class="form-control" name="title" value="{{$category->title}}" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label>Image</label>
                                                                    <input type="file" class="form-control-file" name="image">
                                                                    <small>Leave empty to keep existing image</small>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label>Order By</label>
                                                                    <input type="number" class="form-control" name="order_by" value="{{$category->order_by}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Edit Category Modal -->

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>



<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('addcategory') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Type Dropdown -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="categoryType">Type</label>
                                <select name="type" class="form-control" id="categoryType" required>
                                    <option value="Gallery">Gallery</option>
                                    <option value="Video">Video</option>
                                    <option value="About">About</option>
                                    <option value="Mission">Mission</option>
                                    <option value="Message">Message</option>
                                    <option value="Committee">Committee</option>
                                    <option value="Cell">BIEA Cell</option>
                                    <option value="Activities">Activities</option>
                                    <option value="Media">Media</option>
                                    <option value="Involved">Involved</option>
                                </select>
                            </div>
                        </div>

                        <!-- Category Title -->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="categoryTitle">Category</label>
                                <input type="text" class="form-control" name="title" id="categoryTitle" placeholder="Enter category name" required>
                            </div>
                        </div>

                        <!-- Image URL -->
                        <div class="col-md-12 row">
                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoryImage">Image</label>
                                <input type="file" class="form-control" name="image" id="categoryImage" placeholder="Enter image URL">
                            </div>
                           </div>
                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="orderBy">Order By</label>
                                <input type="number" class="form-control" name="order_by" id="orderBy" placeholder="Enter order number">
                            </div>
                           </div>
                        </div>


                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.modal-dialog -->
</div>
@endsection
