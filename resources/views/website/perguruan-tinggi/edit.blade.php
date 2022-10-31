@extends('layouts.web.app')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Perguruan Tinggi</h3>
            </div>
            <form id="form" action="{{ url('perguruan-tinggi-update/'.$perguruan->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="nama">Nama Instansi</label>
                            <input type="hidden" name="id" id="id" value="{{ $perguruan->id }}">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $perguruan->nama }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="number" class="form-control" id="longitude" name="longitude" value="{{ $perguruan->longitude }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="number" class="form-control" id="latitude" name="latitude" value="{{ $perguruan->latitude }}">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi">{{ $perguruan->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat">{{ $perguruan->alamat }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="status">Status Instansi</label>
                            <select class="custom-select rounded-0" id="status" name="status" value="{{ $perguruan->status }}">
                                <option value="Negeri">Negeri</option>
                                <option value="Swasta">Swasta</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Gambar Instansi</label>
                            <div class="form-control-wrap">
                                <div class="fileinput fileinput-new input w-full mt-2" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        @empty($perguruan->gambar)
                                            <img src="{{ asset('public/img/default.png') }}" alt="gambar" width="100" height="80"/>
                                        @else
                                            <img src="{{ asset('public/img/'.$perguruan->gambar.'') }}" alt="gambar" width="100" height="80" />
                                        @endempty
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail mb-7 "></div>
                                    <div class="mt-10">
                                        <span class="btn btn-sm btn-primary btn-file">
                                            <span class="fileinput-new">Pilih gambar</span>
                                            <span class="fileinput-exists">Ubah </span>
                                            <input type="file" name="gambar" accept="image/*" oninvalid="setCustomValidity('Harus .png')">
                                        </span>
                                        <a href="javascript:;" class="button btn btn-sm btn-danger fileinput-exists" data-dismiss="fileinput">Hapus </a>
                                        <input type="hidden"  class="input w-full mt-2" name="gambarlama" value="{{ $perguruan->gambar }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{ url('perguruan-tinggi') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop

@section('css')
<link href="{{ asset('public/admin/asset/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" />
@stop

@section('js')
<script src="{{ asset('public/admin/asset/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script>
    $('#form').validate({
        rules: {
            nama: {
            required: true,
            },
            longitude: {
            required: true,
            },
            latitude: {
            required: true
            },
            alamat: {
            required: true
            },
            deskripsi: {
            required: true
            },
            status: {
            required: true
            },
        },
        messages: {
            nama: {
                required: "Nama Instansi Harus Di isi!",
            },
            longitude: {
                required: "Longitude Harus Di isi!",
            },
            
            latitude: {
                required: "latitude Harus Di isi!",
            },
            alamat: {
                required: "alamat Harus Di isi!",
            },
            deskripsi: {
                required: "deskripsi Harus Di isi!",
            },
            status: {
                required: "status Harus Di isi!",
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