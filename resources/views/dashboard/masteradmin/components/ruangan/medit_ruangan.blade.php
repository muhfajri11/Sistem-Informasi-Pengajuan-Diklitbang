<div class="modal fade" id="modal_editruangan" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="edit_ruangan" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-hospitals me-2"></i> Edit Ruangan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_edit" required>
                <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="nama_edit">Nama Ruangan</label>
                            <input type="text" name="name" class="form-control" id="nama_edit" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="rate_edit">Pilih Rating</label>
                            <select id="rate_edit" class="select2_" name="rate">
                                @foreach ($rates as $rate => $val)
                                    <option value="{{ $val }}">{{ $rate }}</option>
                                @endforeach
                            </select>
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