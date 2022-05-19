@extends('layouts.app')

@section('title', 'test')

@section('content')
    <!-- Top content -->
    <div class="top-content section-container section position-relative" id="top-content">
        <div class="filter position-absolute"></div>

        <div class="container">
            <div class="row">
                <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <a class="btn btn-primary btn-customized-2 scroll-link btn-disabled" href="/" role="button">
                        <img src="{{ asset('image/assets/logo.png') }}" alt="logo" width="47.426" height="47.426">
                        <svg class="brand-title" xmlns="http://www.w3.org/2000/svg" width="143" height="46.359" viewBox="0 0 143 46.359">
                          <g id="Group_26" data-name="Group 26" transform="translate(-134 -40.641)">
                            <text transform="translate(144 60)" fill="#212121" font-size="1.25rem" font-family="Poppins-Bold, Poppins" font-weight="bold"><tspan x="0" y="0">SIM DIKLIT</tspan></text>
                            <text transform="translate(144 83)" fill="#5d5449" font-size=".8rem" font-family="Poppins-Light, Poppins" font-weight="300"><tspan x="0" y="0">RSUD Gunung Jati</tspan></text>
                          </g>
                        </svg>
                    </a>
                    <!-- <div class="card">
                        
                    </div> -->
                    <h1 class="wow fadeIn">
                        Sistem Informasi <br> <strong>Pengajuan Pendidikan & Penelitian</strong>
                    </h1>
                    <div class="description wow fadeInLeft">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi laborum dolorem, enim aspernatur id, natus facere sit deserunt distinctio provident iste. Aliquam, aliquid facere atque tempore consequuntur debitis molestias quos!
                        </p>
                    </div>
                    <div class="buttons wow fadeInUp">							
                        <a class="btn btn-primary btn-customized @guest open-btn @endguest" href="@guest #! @else {{ route('dashboard') }} @endguest" role="button">
                            <i class="fas fa-book-open"></i> Mulai Ajukan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 1 -->
    <div class="section-1-container section-container" id="section-1">
        <div class="container">
            <div class="row">
                <div class="col section-1 section-description wow fadeIn">
                    <h2 class="font-weight-bold text-color">Fitur Kami</h2>
                    <div class="divider-1 wow fadeInUp"><span></span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 section-1-box wow fadeInDown">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="card p-4 bg-danger" style="box-shadow: none;">
                                    <i class="fas fa-arrow-left fa-2x text-white" style="opacity: 1;"></i>
                                </div>
                                <div class="ml-3 text-left">
                                    <h4 class="my-0 font-weight-bold">1234123412341234</h4>
                                    <p class="mb-0">Card title</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Section 4 -->
    <div class="section-4-container section-container section position-relative section-container-image-bg" id="section-4">
        <div class="filter position-absolute"></div>
        <div class="container">
            <div class="row">
                <div class="col section-4 section-description wow fadeInLeftBig">
                    <h2>Terjadi kendala dalam proses pengajuan atau butuh bantuan?</h2>
                    <p>
                        Silahkan kamu bisa hubungi kami melalui kontak yang tertera pada tombol dibawah ini.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col section-bottom-button wow fadeInUp">
                    <a class="btn btn-primary btn-customized-2 scroll-link" href="#section-6" role="button">
                        <i class="fas fa-envelope"></i> Contact Us
                    </a>
                    <a class="btn btn-primary btn-customized-2 scroll-link" href="#section-6" role="button">
                        <i class="fas fa-envelope"></i> Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection