<div class="modal fade" id="modal_settingpkl" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form class="modal-content" id="setting_pkl" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-cog me-2"></i> Setting PKL</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 mb-4">
                    <div class="form-group">
                        <label for="mou_setting">Biaya punya MOU</label>
                        <input type="text" name="mou" class="form-control mb-2" id="mou_setting" required>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="form-group">
                        <label for="nomou_setting">Biaya tidak punya MOU</label>
                        <input type="text" name="no_mou" class="form-control mb-2" id="nomou_setting" required>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="form-group">
                        <label for="kuota_setting">Kuota Penerimaan PKL</label>
                        <div class="input-group mb-2">
                            <button class="btn btn-primary min_members" type="button">-</button>
                            <input type="number" name="kuota" class="form-control text-center" id="kuota_setting" value="1" readonly required>
                            <button class="btn btn-primary add_members" type="button">+</button>
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