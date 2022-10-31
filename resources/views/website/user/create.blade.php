@extends('layouts.web.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Tambah Data User</h3>
                </div>
                <form id="form" action="{{ url('user-store') }}" method="POST">
                @csrf
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="hidden" name="id" id="id">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                                <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="custom-select rounded-0" id="jk" name="jk">
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Permpuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="custom-select rounded-0" id="role" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <div class='input-group date' id='datetimepicker'>
                                    <input type='text' class="form-control" id="datepicker" name="tgl_lahir"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                    </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="{{ url('user') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section>
@stop

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
@stop

@section('js')
    <script src="{{ asset('public/admin/asset/plugins/jquery/jquery.min.js') }}"></script>
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
                alamat: {
                    required: true,
                },
                password: {
                    required: true,
                    minLength: 8,
                },
            },
            messages: {
                name: {
                    required: "Nama Harus Di isi!",
                    email: "Harus Berupa Alamat Email"
                },
                email: {
                    required: "email Harus Di isi!",
                },
                alamat: {
                    required: "alamat Harus Di isi!",
                },
                password: {
                    required: "password Harus Di isi!",
                    minLength: "Minimal 8 Karakter",
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    </script>
@stop