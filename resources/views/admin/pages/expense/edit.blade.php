@extends('admin.masterTemplate')

@section('menu-name')
    Edit Expense
@endsection

@section('main-content')
    <style>
        .form-group label {
            font-weight: bold;
        }
    </style>
    @php
        $events = App\Models\Event::all();
    @endphp
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark">Edit Expense</h5>
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
                                <h3 class="card-title"> <i class="fa fa-edit"></i> Edit Expense</h3>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('event_support.update', $eventSupport->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="category">Choose Category</label>
                                        <select name="type" id="category" class="form-control" required>
                                            <option value="">Select Category</option>
                                            <option value="project" {{ $eventSupport->type == 'project' ? 'selected' : '' }}>Project</option>
                                            <option value="champaign" {{ $eventSupport->type == 'champaign' ? 'selected' : '' }}>Champaign</option>
                                            <option value="event" {{ $eventSupport->type == 'event' ? 'selected' : '' }}>Event</option>
                                            <option value="other-expense" {{ $eventSupport->type == 'other-expense' ? 'selected' : '' }}>Other expense</option>
                                        </select>
                                    </div>

                                    @if ($eventSupport->type == 'event' && $eventSupport->count() > 0)
                                        <div class="form-group">
                                            <label for="event_id">Event</label>
                                            <select name="event_id" id="event_id" class="form-control select2" >
                                                <option value="">Select Event</option>
                                                @foreach ($events as $event)
                                                    <option value="{{ $event->id }}" {{ $eventSupport->event_id == $event->id ? 'selected' : '' }}>{{ $event->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if ($eventSupport->type == 'project' && $eventSupport->count() > 0)
                                        <div class="form-group">
                                            <label for="projects_id">Project</label>
                                            <select name="projects_id" id="projects_id" class="form-control select2" >
                                                <option value="">Select Project</option>
                                                @php
                                                    $projects = App\Models\Project::all();
                                                @endphp
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}" {{ $eventSupport->projects_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if ($eventSupport->type == 'champaign' && $eventSupport->count() > 0)
                                        <div class="form-group">
                                            <label for="champaign_id">Champaign</label>
                                            <select name="champaign_id" id="champaign_id" class="form-control select2" >
                                                <option value="">Select Champaign</option>
                                                @php
                                                    $champaign = App\Models\Champaign::all();
                                                @endphp
                                                @foreach ($champaign as $champaignItem)
                                                    <option value="{{ $champaignItem->id }}" {{ $eventSupport->champaign_id == $champaignItem->id ? 'selected' : '' }}>{{ $champaignItem->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if ($eventSupport->category_id && $eventSupport->count() > 0)
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select name="category_id" id="category_id" class="form-control select2">
                                                <option value="">Select Category</option>
                                                @php
                                                    $expensecategory = App\Models\ExpenseCategory::where('parent_id',null)->get();
                                                @endphp
                                                @foreach ($expensecategory as $category)
                                                    <option value="{{ $category->id }}" {{ $eventSupport->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if ($eventSupport->sub_category_id && $eventSupport->count() > 0)
                                        <div class="form-group">
                                            <label for="sub_category_id">Sub Category</label>
                                            <select name="sub_category_id" id="sub_category_id" class="form-control select2">
                                                <option value="">Select Sub Category</option>
                                                @php
                                                    $expensecategory = App\Models\ExpenseCategory::all();
                                                @endphp
                                                @foreach ($expensecategory as $category)
                                                    <option value="{{ $category->id }}" {{ $eventSupport->sub_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @php
                                        $accounts = App\Models\Accounts::all();
                                    @endphp

                                    <div class="form-group">
                                        <label for="account_id">Choose Account</label>
                                        <select name="account_id" id="account_id" class="form-control select2" >
                                            <option value="">Select Account</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->id }}" {{ $eventSupport->account_id == $account->id ? 'selected' : '' }}>{{ $account->account_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ old('amount', $eventSupport->amount) }}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="note">Note</label>
                                        <textarea name="note" id="note" class="form-control" rows="4">{{ old('note', $eventSupport->note) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Update Expense</button>
                                        <a href="{{ route('event_support.index') }}" class="btn btn-secondary">Back</a>
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
    =======
    >>>>>>> f3102e389e4ae8f77284e968fee463f301ffe754
@endsection
