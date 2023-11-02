<div class="modal fade" id="modalShow-{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category"
                            value="{{ $item->category }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name" name="name"
                            value="{{ $item->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock"
                            value="{{ $item->stock }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="price_item">Price per Item</label>
                        <input type="text" class="form-control" id="price_item" name="price_item"
                            value="@currency($item->price_item)" readonly>
                    </div>
                    <div class="form-group">
                        <label for="price_day">Price per Day</label>
                        <input type="text" class="form-control" id="price_day" name="price_day"
                            value="@currency($item->price_day)" readonly>
                    </div>
                    <div class="form-group">
                        <label for="created_at">Created at</label>
                        <input type="text" class="form-control" id="created_at" name="created_at"
                            value="{{ $item->created_at }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Updated at</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at"
                            value="{{ $item->updated_at }}" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger px-3" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
