@include('dashboard.layouts.header')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

@include('dashboard.layouts.footer')