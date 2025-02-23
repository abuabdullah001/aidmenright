@extends('admin.masterTemplate')

@section('menu-name')
    Add Expense
@endsection

@section('main-content')
    <style>
        .form-group label {
            font-weight: bold;
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark">Add Category</h5>
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
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        @endif

                        <div class="card">
                            <div class="card-header bg-cyan">
                                <h3 class="card-title"> <i class="fa fa-plus"></i> Add Category</h3>
                            </div>
                            @php
                                $events = App\Models\Event::all();
                            @endphp
                            <div class="card-body">
                                <form action="{{ route('expense.category.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="amount">Name</label>
                                        <input type="text" name="name" id="amount"
                                            class="form-control" required>
                                    </div>
                                    @php
                                    $expenseCategories = App\Models\ExpenseCategory::all();
                                @endphp
                                <div class="form-group">
                                    <label for="category">Parent Category</label>
                                    <select name="parent_id" id="category" class="form-control select2" >
                                        <option value="">Select a parent Category</option>
                                        @foreach($expenseCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Save Category</button>
                                        <a href="{{ route('expense.category.list') }}" class="btn btn-secondary">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var category = $(this).val();



                $.ajax({
                    url: "{{ route('fetch.events') }}",
                    method: "GET",
                    data: {
                        category: category
                    },
                    success: function(response) {
                        $('#category2').html(response);

                    },
                    error: function() {
                        alert('Failed to load events.');
                    }
                });
            });
        });
    </script>
@endsection
