<div class="modal fade" id="modal_addpengguna" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="tambah_pengguna" novalidate>
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-user-plus"></i> <span class="ml-4">Tambah Pengguna</span></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-secondary alert-alt fade show">
                            Setiap akun yang dibuat memiliki password default <strong>12341234</strong>.
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="nama_daftar">Nama Lengkap</label>
                            <input type="text" name="nama_daftar" class="form-control" id="nama_daftar" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="email_daftar">Email</label>
                            <input type="text" name="email_daftar" class="form-control" id="email_daftar" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="phone_daftar">Nomor Handphone</label>
                            <input type="number" name="phone_daftar" class="form-control" id="phone_daftar" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="role_daftar">Pilih Role</label>
                            <select id="role_daftar" class="select2_" name="role_daftar">
                                @foreach ($roles as $role)
                                    <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="permissions_daftar">Pilih Permissions</label>
                            <select id="permissions_daftar" class="multi-select select2_" name="permissions_daftar[]" multiple="multiple">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission['id'] }}" selected>{{ $permission['name'] }}</option>
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