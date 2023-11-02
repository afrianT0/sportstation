<div class="modal fade" id="modalShow-{{ $user->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $user->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" class="form-control" id="username" name="username"
                            value="{{ $user->username }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="role">Roles</label>
                        <input type="text" class="form-control" id="roles" name="roles"
                            value="{{ $user->roles }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="created_at">Created at</label>
                        <input type="text" class="form-control" id="created_at" name="created_at"
                            value="{{ $user->created_at }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Updated at</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at"
                            value="{{ $user->updated_at }}" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-primary px-3">OK</button>
                    <button type="button" class="btn bg-gradient-danger px-3" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
