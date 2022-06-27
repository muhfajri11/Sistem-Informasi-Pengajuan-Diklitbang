<!doctype html>
<html lang="en">

    <head>

		<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        
        <title>@yield('title')</title>

        @include('layouts.components.css')

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{ asset('image/assets/favicon.ico') }}">

    </head>

    <body>

        <div class="preload-container d-none">
            <div class="preload-content">
                <div class="spinner-border" style="width: 2.5rem; height: 2.5rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
		<!-- Wrapper -->
    	<div class="wrapper">

            @if (!Route::is('password.reset'))
                @guest
                    @include('layouts.components.login')

                    @include('layouts.components.daftar')
                @endguest
            @endif

			<!-- Dark overlay -->
    		<div class="overlay"></div>

			<!-- Content -->
			<div class="content">
			
				@if (!Route::is('password.reset'))
                    @guest
                        <!-- open sidebar menu -->
                        <a class="btn btn-primary btn-customized open-menu" href="#!" role="button">
                            <i class="fas fa-sign-in-alt"></i> <span>Login</span>
                        </a>
                        <a class="btn btn-primary btn-customized open-menu2" href="#!" role="button">
                            <i class="fas fa-user"></i> <span>Daftar</span>
                        </a>
                    @endguest

                    @auth
                        <a class="btn btn-primary btn-customized dashboard" href="{{ route('dashboard') }}" role="button">
                            <i class="fas fa-layer-group"></i> <span>Dashboard</span>
                        </a>
                    @endauth
                @endif