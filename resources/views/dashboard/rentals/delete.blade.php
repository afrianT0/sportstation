<div class="modal fade" id="modalDelete-{{ $rental->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirm Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('rentals.update', $rental->id) }}" method="POST">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p>Are you sure you want to delete data <strong>{{ $rental->item->name }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger px-3">Yes</button>
                    <button type="button" class="btn btn-default px-3" data-dismiss="modal">No</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
