<!-- Daftar -->
<nav class="sidebar1 light">
				
    <div class="container">
        <!-- close sidebar menu -->
        <div class="dismiss">
            <i class="fas fa-arrow-left"></i>
        </div>
        
        <img src="{{ asset('image/assets/logo.png') }}" alt="logo" width="47.426" height="47.426" class="logo">

        <h2 class="font-weight-bold mt-4 mb-4 text-color">Daftar Akun</h2>
        
        <form id="form_daftar" novalidate>
            <div class="form-group">
                <label for="nama_daftar">Nama Lengkap</label>
                <input type="text" name="nama_daftar" class="form-control" id="nama_daftar" required>
            </div>
            <div class="form-group mt-2">
                <label for="email_daftar">Email</label>
                <input type="text" name="email_daftar" class="form-control" id="email_daftar" required>
            </div>
            <div class="form-group">
                <label for="phone_daftar">Nomor Handphone</label>
                <input type="number" name="phone_daftar" class="form-control" id="phone_daftar" required>
            </div>
            <div class="form-group">
                <label for="password1_daftar">Password</label>
                <input type="password" name="password1_daftar" class="form-control" id="password1_daftar" required>
            </div>
            <div class="form-group">
                <label for="password2_daftar">Ulangi Password</label>
                <input type="password" name="password2_daftar" class="form-control" id="password2_daftar" required>
            </div>
            <button type="submit" class="btn btn-main col-12 mt-2">Daftar</button>
            <p class="text-center mt-2">Sudah punya akun? <a href="#!" class="toLogin">Login</a></p>
        </form>
    </div>

</nav>
<!-- End Daftar -->