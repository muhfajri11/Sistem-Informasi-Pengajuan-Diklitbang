<div class="modal fade" id="modal_editpengguna" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="edit_pengguna" novalidate>
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-user-cog"></i> <span class="ml-4">Update Pengguna</span></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" id="id_edit" required>
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="nama_edit">Nama Lengkap</label>
                            <input type="text" name="nama_edit" class="form-control" id="nama_edit" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="email_edit">Email</label>
                            <input type="text" name="email_edit" class="form-control" id="email_edit" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="phone_edit">Nomor Handphone</label>
                            <input type="number" name="phone_edit" class="form-control" id="phone_edit" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="role_edit">Pilih Role</label>
                            <select id="role_edit" class="select2_" name="role_edit" data-is="1" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="permissions_edit">Pilih Permissions</label>
                            <select id="permissions_edit" class="multi-select select2_" name="permissions_edit[]" multiple="multiple" required>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission['id'] }}">{{ $permission['name'] }}</option>
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