@extends('admin.masterTemplate')

@section('menu-name')
    Update Expense Category
@endsection

@section('main-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark">Update Expense Category</h5>
                    </div>
                </div>
            </div>
            <hr class="style18">
        </div>

        @php
            // Fetch all parent categories using @php directive
            $parentCategories = App\Models\ExpenseCategory::all();
        @endphp

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        @endif
                        <div class="card">
                            <div class="card-header bg-cyan">
                                <h3 class="card-title"> <i class="fa fa-gift"></i> Update Category</h3>
                            </div>
                            <div class="card-body">
                                <!-- Form for editing category -->
                                <form action="{{ route('expense.category.update', $expenseCategory->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input type="text" name="name" id="name" class="form-control select2" value="{{ old('name', $expenseCategory->name) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="parent_id">Parent Category</label>
                                        <select name="parent_id" id="parent_id" class="form-control select2">
                                            <option value="">Select Parent Category</option>
                                            @foreach ($parentCategories as $category)
                                                <option value="{{ $category->id }}" {{ $expenseCategory->parent_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success">Update Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
