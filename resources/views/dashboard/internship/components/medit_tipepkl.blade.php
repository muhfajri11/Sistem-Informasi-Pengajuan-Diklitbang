<div class="modal fade" id="modal_edittipepkl" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" id="edit_tipepkl" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-cog me-2"></i> Edit Tipe PKL</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body py-3">
                <input type="hidden" name="id" id="id_bukti" required>
                <div class="row">
                    <div class="col-12 col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="tipepkl_name">Nama</label>
                            <input type="text" name="name" class="form-control mb-2" id="tipepkl_name" required>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="tipepkl_fee">Fee</label>
                            <input type="text" name="fee" class="form-control mb-2" id="tipepkl_fee" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
</div>