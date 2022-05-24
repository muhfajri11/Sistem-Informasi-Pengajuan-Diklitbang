	<!--**********************************
		Scripts
	***********************************-->
	<!-- Required vendors -->
	<script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>

	<script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	
	
	<!-- Chart piety plugin files -->
	
	
	<!-- Dashboard 1 -->
	
	<script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/toastr/js/toastr.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/sweetalert/sweetalert2.all.min.js') }}"></script>
	
	<script src="{{ asset('assets/js/custom.js') }}"></script>
	<script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
	{{-- <script src="{{ asset('dashboard/js/demo.js') }}"></script> --}}
	{{-- <script src="{{ asset('dashboard/js/styleSwitcher.js') }}"></script> --}}

    @yield('script')