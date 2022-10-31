@extends('layouts.web.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                {{session('success')}}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Perguruan Tinggi</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped text-center"></table>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('public/admin/asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin/asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin/asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@stop

@section('js')
<script src="{{ asset('public/admin/asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready( function () {
        $('#datatable').dataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('json-perguruan-tinggi') }}",
            columns: [
                { title: 'No', data: null,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { title: 'Nama', data: 'nama' },
                { title: 'Longitude', data: 'longitude' },
                { title: 'Latitude', data: 'latitude' },
                { title: 'Alamat', data: 'alamat' },
                { title: 'Status', data: 'status', 
                    render: function(data){
                        if(data == "Negeri"){
                            return '<span class="badge badge-success">Negeri</span>';
                        }else{
                            return '<span class="badge badge-danger">Swasta</span>';
                        }
                    }
                },
                { title: 'Deskripsi', data: 'deskripsi'},
                { title: 'Gambar', data: 'gambar', 
                    render: function(data){
                        if(data == null || data == "" ){
                            return '<img src="{{ asset("public/img/default.png") }}" width="70%" height="70%" class="center img-responsive">';
                        }else{
                            return '<img src="{{ url("public/img/'+ data +'") }}" width="70%" height="70%" class="center img-responsive" >';
                        }
                    }
                },
            ]  
        });
    });

</script>
@stop