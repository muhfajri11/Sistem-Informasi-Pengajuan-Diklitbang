<div class="modal fade" id="modal_settingfee" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" id="setting_fee" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-cog me-2"></i> Setting Biaya Kunjungan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 mb-4">
                    <div class="form-group">
                        <label for="less_setting">Biaya Kurang dari (< 10)</label>
                        <input type="text" name="less" class="form-control mb-2" id="mou_setting" required>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="form-group">
                        <label for="over_setting">Biaya Lebih dari (> 10)</label>
                        <input type="text" name="over" class="form-control mb-2" id="over_setting" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
</div>