<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Geografis | Log in</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('public/admin/asset/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/admin/asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/admin/asset/dist/css/adminlte.min.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
    <a href="{{ url('/') }}"><b>Register</a>
</div>

<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Masuk ke Halaman Website</p>

        <form id="form" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="hidden" name="id">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
                </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-key"></span>
                </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id=" passwordconfirm" name=" password-confirm" placeholder="Password">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-key"></span>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
        <p class="mb-1">
            <a href="{{ url('login')}}">Sudah Punya Akun</a>
        </p>
    </div>
</div>
<script src="{{ asset('public/admin/asset/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('public/admin/asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>     
<script>
    $(function () {
        $("#datepicker").datepicker({ 
            format: 'yyyy-mm-dd',
            autoclose: true, 
            todayHighlight: true
        }).datepicker('update', new Date());
    });

    $('#form').validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minLength: 8,
            },
            passwordconfirm: {
                required: true,
                minLength: 8,
                equalTo: "#password"
            },
        },
        messages: {
            name: {
                required: "Nama Harus Di isi!",
                email: "Harus Berupa Alamat Email"
            },
            email: {
                required: "Email Harus Di isi!",
            },
            password: {
                required: "Password Harus Di isi!",
                minLength: "Minimal 8 Karakter",
            },
            passwordconfirm: {
                required: "Password Harus Di isi!",
                minLength: "Minimal 8 Karakter",
                equalTo: "Password tidak sama"
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
</script>
</body>
</html>
