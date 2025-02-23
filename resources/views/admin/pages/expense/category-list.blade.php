@extends('admin.masterTemplate')

@section('menu-name')
    ALL Expense
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
                        <h5 class="m-0 text-dark">All Expense</h5>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="card-title"> <i class="fa fa-gift"></i> All Category</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('expense.category') }}" class="btn btn-success float-right">
                                            <i class="fa fa-plus"></i> ADD Category
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <!-- Filter Buttons -->


                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Parent Category Name</th>
                                            <th>Category name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($eventSupport as $key => $gift)
                                            <tr class="row-type-{{ strtolower($gift->type) }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $gift->subcategories->name ?? 'Root' }}

                                                </td>
                                                <td>{{ ucfirst($gift->name) }}</td>
                                                <td>
                                                    <a href="{{ route('expense.category.edit', $gift->id) }}"
                                                        class="btn btn-xs btn-info">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('expense.category.destroy', $gift->id) }}"
                                                        onclick="return confirm('Are you sure?')"
                                                        class="btn btn-xs btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                                <td>

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

    <!-- Modal -->


    <script>
        // JavaScript to handle showing the note in the modal
        document.querySelectorAll('.view-note').forEach(button => {
            button.addEventListener('click', function() {
                // Get the note content from the data attribute
                var noteContent = this.getAttribute('data-note');

                // Set the content of the modal's body
                document.getElementById('noteContent').textContent = noteContent;

                // Show the modal
                var myModal = new bootstrap.Modal(document.getElementById('noteModal'));
                myModal.show();
            });
        });

        // JavaScript to handle filtering the table rows based on the selected type
        document.getElementById('btn-project').addEventListener('click', function() {
            filterRows('project');
        });

        document.getElementById('btn-champaign').addEventListener('click', function() {
            filterRows('champaign');
        });

        document.getElementById('btn-event').addEventListener('click', function() {
            filterRows('event');
        });

        function filterRows(type) {
            // Hide all rows initially
            document.querySelectorAll('tbody tr').forEach(row => {
                row.style.display = 'none';
            });

            // Show only the rows that match the selected type
            document.querySelectorAll('.row-type-' + type).forEach(row => {
                row.style.display = '';
            });
        }
    </script>
@endsection
