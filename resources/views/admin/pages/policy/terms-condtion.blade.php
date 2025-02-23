@extends('admin.masterTemplate')
@section('menu-name')
ALL Terms and Conditions
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
                    <h5 class="m-0 text-dark">All Terms and Conditions</h5>
                </div>
            </div>
        </div>
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
                            <h3 class="card-title"> <i class="fa fa-users"></i> All Terms and Conditions</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($terms as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! html_entity_decode(($value->desc)) !!}</td>
                                        <td>
                                            <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#editModal" data-id="{{ $value->id }}" data-desc="{{ $value->desc }}">
                                                <i class="fas fa-edit"></i>
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Terms and Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" method="POST" action="{{ route('terms-condition.edit', $value->id) }}">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" id="returnPolicy" />
                <div class="modal-body">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control summernote" id="description" name="description" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Populate modal with data
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id'); // Extract info from data-* attributes
        var desc = button.data('desc');

        var modal = $(this);
        modal.find('.modal-body #description').val(desc);
        modal.find('.modal-body #returnPolicy').val(id); // Set the ID for the hidden input

        // Initialize Summernote
        modal.find('.summernote').summernote({
            height: 200, // Set the height of the editor
            toolbar: [ // Customize toolbar options
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });

        // Set the editor's content to the description
        modal.find('.summernote').summernote('code', desc);
    });

    // Destroy Summernote when the modal is closed to avoid conflicts
    $('#editModal').on('hidden.bs.modal', function () {
        $(this).find('.summernote').summernote('destroy');
    });
</script>
@endsection


