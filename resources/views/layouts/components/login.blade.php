<!-- Login -->
<nav class="sidebar light">
				
    <div class="container">
        <!-- close sidebar menu -->
        <div class="dismiss">
            <i class="fas fa-arrow-left"></i>
        </div>
        
        <img src="{{ asset('image/assets/logo.png') }}" alt="logo" width="47.426" height="47.426" class="logo">

        <h2 class="font-weight-bold mt-4 mb-4 text-color">Login</h2>
        
        <form id="form_login" novalidate>

            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
            </div>
            
            <button type="submit" class="btn btn-main col-12 mt-2">Login</button>
            <button type="button" class="btn btn-main col-12 mt-2 teal" data-toggle="modal" data-target="#lupaPassword">Lupa Password?</button>
            <p class="text-center mt-3">Belum punya akun? <a href="#!" class="toRegister">Daftar Akun</a></p>
        </form>
    </div>

</nav>
<!-- End Login -->