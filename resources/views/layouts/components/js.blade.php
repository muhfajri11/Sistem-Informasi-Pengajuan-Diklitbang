<!-- Javascript -->
<script src="{{ asset('assets/home/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/home/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.backstretch.min.js') }}"></script>
<script src="{{ asset('assets/home/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/js/toastr.min.js') }}"></script>

<script src="{{ asset('assets/home/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.validator.setDefaults({
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'text-danger',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });
        
        $.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^[a-z\d\-\s]+$/i.test(value);
        }, "Letters, numbers, and spaces only please");

        var closeSidebar = function(){
            $('.sidebar, .sidebar1').removeClass('active');
            $('.overlay').removeClass('active');
            $('body').removeClass('overflow-hidden');
        }

        $('#form_login').validate({
            rules:{
                email: { email: true, required: true },
                password: { minlength: 8 }
            },
            submitHandler: function (form) {
                let data_login = $(form).serializeArray(),
                    dataLogin = {};

                $.each(data_login, function(i, val){
                    dataLogin[val['name']] = val['value'];
                })

                $.ajax({
                    url: '{{ route('login.check_login') }}',
                    method: 'POST',
                    data: dataLogin,
                    beforeSend: function(){
                        $('#form_login')[0].reset();
                        closeSidebar()
                        preload(0)
                    }
                }).done(function (data) {						
                    if(data.success){
                        window.location.href = "{{ route('dashboard') }}";
                    } else {
                        preload(1)
                        alertError('Login Gagal', data.message)
                    }
                }).fail(function(data){
                    console.log(data.responseText);
                    console.log("error");
                });   
            }
        })

        $('#form_daftar').validate({
            rules:{
                nama_daftar: { required: true, minlength: 10, maxlength: 20, alphanumeric: true },
                email_daftar: { 
                    required: true, 
                    email: true,
                    remote: {
                        url: '{{ route("verifyemail") }}',
                        type: 'POST',
                        data: {
                            email: function(){
                                return $('#email_daftar').val();
                            }
                        }
                    }
                },
                phone_daftar: { required: true, digits: true, minlength: 11, maxlength: 14 },
                password1_daftar: { required: true, minlength: 8 },
                password2_daftar: { equalTo: '#password1_daftar' }
            },
            messages: {
                password2_daftar: { equalTo: "Password tidak sama" }
            },
            submitHandler: function (form) {
                let data_daftar = $(form).serializeArray(),
                    dataDaftar  = {};

                $.each(data_daftar, function(i, val){
                    switch(val['name']){
                        case "nama_daftar": 
                            dataDaftar['name'] = val['value'];
                            break;
                        case "email_daftar": 
                            dataDaftar['email'] = val['value'];
                            break;
                        case "phone_daftar": 
                            dataDaftar['phone'] = val['value'];
                            break;
                        case "password1_daftar": 
                            dataDaftar['password'] = val['value'];
                            break;
                        case "password2_daftar": 
                            dataDaftar['password_confirmation'] = val['value'];
                            break;
                    }
                })
                
                $.ajax({
                    url: '{{ route('register') }}',
                    method: 'POST',
                    data: dataDaftar,
                    beforeSend: function(){
                        $('#form_daftar')[0].reset();
                        closeSidebar()
                        preload(0)
                    }
                }).done(function (data) {						
                    if(data.success){
                        window.location.href = "{{ route('dashboard') }}";
                    } else {
                        preload(1)
                        alertError("Terjadi Kesalahan", data.msg)
                    }
                }).fail(function(data){
                    preload(1)
                    resp = JSON.parse(data.responseText)
                    alertError("Terjadi Kesalahan", resp.message)
                    console.log("error");
                });   
            }
        })

        $('#form_reset').validate({
            rules:{
                email: { email: true, required: true }
            },
            submitHandler: function (form) {
                let data_reset = $(form).serializeArray(),
                    dataReset = {};

                $.each(data_reset, function(i, val){
                    dataReset[val['name']] = val['value'];
                })

                $.ajax({
                    url: '{{ route('reset_password') }}',
                    method: 'POST',
                    data: dataReset,
                    beforeSend: function(){
                        $('#form_reset')[0].reset();
                        $('#lupaPassword').modal('hide')
                        preload(0)
                    }
                }).done(function (data) {						
                    preload(1)

                    if(data.error){
                        alertError("Email tidak terdaftar", data.msg)
                    } else {
                        alertSuccess("Link Terkirim", data.msg)
                    }
                }).fail(function(data){
                    console.log(data.responseText);
                    console.log("error");
                });   
            }
        })
    })
</script>

@yield('script')