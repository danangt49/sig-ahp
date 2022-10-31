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
                    <h3 class="card-title">Data User</h3>
                    <a href="{{ url('user/form')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah</a>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@stop

@section('js')
<script src="{{ asset('public/admin/asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/admin/asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
<script>
    $(document).ready( function () {
        $('#datatable').dataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('json-user') }}",
            columns: [
                { title: 'No', data: null,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { title: 'Nama', data: 'name' },
                { title: 'Email', data: 'email' },
                { title: 'Username', data: 'username' },
                { title: 'Tanggal Lahir', data: 'tgl_lahir' },
                { title: 'Alamat', data: 'alamat' },
                { title: 'Jenis Kelamin', data: 'jk'},
                { title: 'Role', data: 'role', 
                    render: function(data){
                        if(data == "admin"){
                            return '<span class="badge badge-success">Admin</span>';
                        }else{
                            return '<span class="badge badge-danger">User</span>';
                        }
                    }
                },
                { title: 'Action', data: 'action',
                orderable: false, searchable: false }
            ]  
        });
    });

    $('body').on('click', '.delete', function () {
        var csrf_token = "{{ csrf_token() }}";
        var document_id = $(this).data("id");
        swal({
            title: "Are you sure?",
            text: "You will be delete this item ?",
            type: "warning",
            confirmButtonText: "Yes, delete",
            showCancelButton: true
        })
        .then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('user-delete') }}"+'/'+ document_id,
                    type: "POST",
                    data: {
                        '_method': 'GET',
                        '_token': csrf_token
                    },
                    success: function(){
                        swal(
                            'Success',
                            'Destroy Data <b style="color:green;">Success</b> button!',
                            'success'
                        ).then(function() {
                            location.reload();
                        });
                    },
                    error: function() {
                        swal({
                            title: 'Opps...',
                            text: 'Error',
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
            } else if (result.dismiss === 'cancel') {
                swal(
                'Cancelled',
                'Your stay here :)',
                'error'
                )
            }
        })
    });
</script>
@stop