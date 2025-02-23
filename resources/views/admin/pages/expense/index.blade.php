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
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"> <i class="fa fa-gift"></i> All Expense</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('event_support.create') }}" class="btn btn-success float-right">
                                        <i class="fa fa-plus"></i> ADD Expense
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- Filter Buttons -->
                            <div class="btn-group mb-3 d-flex justify-content-around" style="gap:10px">
                                <button id="btn-project" class="btn btn-primary">Project</button>
                                <button id="btn-champaign" class="btn btn-success">Champaign</button>
                                <button id="btn-event" class="btn btn-info">Event</button>
                                <button id="btn-other-expense" class="btn btn-warning">Other Expense</button> <!-- New Button -->
                            </div>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Type</th>
                                        <th>Category Name</th>
                                        <th>Amount</th>
                                        <th>Account Name</th>
                                        <th>Action</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eventSupports as $key => $gift)
                                    <tr class="row-type-{{ strtolower($gift->type) }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ucfirst($gift->type) }}</td>
                                        <td>
                                            @if ($gift->type === 'event')
                                                {{ ucfirst($gift->event->name ?? 'N/A') }}
                                            @elseif ($gift->type === 'project')
                                                {{ ucfirst($gift->project->name ?? 'N/A') }}
                                            @elseif ($gift->type === 'champaign')
                                                {{ ucfirst($gift->champaign->name ?? 'N/A') }}
                                            @elseif ($gift->type === 'other-expense')
                                                    Category:   {{ ucfirst($gift->categories->name ?? 'N/A') }} <br> <br>
                                                    Sub-Category:  {{ ucfirst($gift->subcategories->name ?? 'N/A') }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ number_format($gift->amount, 2) ?? 'N/A' }}</td>
                                        <td class="text-center">{{ $gift->account->account_name ?? null }}</td>
                                        <td>
                                            <a href="{{ route('event_support.edit', $gift->id) }}" class="btn btn-xs btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('event_support.destroy', $gift->id) }}"
                                               onclick="return confirm('Are you sure?')"
                                               class="btn btn-xs btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <!-- Button to open the modal for the note -->
                                            <button class="btn btn-xs btn-primary view-note" data-note="{{ $gift->note ?? 'No note available' }}">
                                                <i class="fas fa-eye"></i> View Note
                                            </button>
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
<div class="modal fade" id="noteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noteModalLabel">Expense Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="noteContent">Loading...</p>
            </div>
        </div>
    </div>
</div>

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

    document.getElementById('btn-other-expense').addEventListener('click', function() {
        filterRows('other-expense');
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
