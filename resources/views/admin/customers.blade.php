@extends('adminlte::page')

@section('title', 'Customers')

@section('content_header')
    <h1>Customers</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-9 mt-2">
                    <h3 class="card-title ">DataTable with default features</h3>
                </div>
                <div class="col-sm-3 float-right">
                    <button class="btn btn-success float-right ml-2 mr-2 mt-2" id="btn-add">Create New</button>
                    {{-- <button class="btn btn-danger float-right ml-2 mr-2 mt-2" id="btn-delete">Delete</button> --}}
                </div>
            </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered datatable" id="DataTable_Customers">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th width="150" class="text-center">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @include('admin.customers.create-edit')
    @include('admin.customers.delete')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    @include('inc.don-vi-hanh-chinh-vn')
    @include('admin.customers.index')
    @include('admin.customers.store-update')
    @include('admin.customers.destroy')

    <script>

        var json_thanh_pho = DonViHanhChinh.ThanhPho;
        var json_quan_huyen = DonViHanhChinh.QuanHuyen;
        var json_phuong_xa = DonViHanhChinh.PhuongXa;
        var htmlProvince = '';
        for (var i = 0; i < json_thanh_pho.length; i++) {
            var obj = json_thanh_pho[i];
            htmlProvince += " <option value = '" + obj.thanh_pho + "' > " + obj
                .ten_thanh_pho +
                "</option>";
        }
        $('#province').html(htmlProvince);

        $("#province").change(function() {
            var htmlDistrict = '';
            var thanh_pho = $(this).val();
            for (var i = 0; i < json_quan_huyen.length; i++) {
                var obj = json_quan_huyen[i];
                if (thanh_pho == obj.thanh_pho) {
                    htmlDistrict += " <option value = '" + obj.quan_huyen + "' > " + obj
                        .ten_quan_huyen +
                        "</option>";
                }
            }
            $('#district').html(htmlDistrict);
        }).change(function() {
            var htmlWardStreet = '';
            var quan_huyen = $('#district').val();
            for (var i = 0; i < json_phuong_xa.length; i++) {
                var obj = json_phuong_xa[i];
                if (quan_huyen == obj.quan_huyen) {
                    htmlWardStreet += " <option value = '" + obj.phuong_xa + "' > " + obj
                        .ten_phuong_xa +
                        "</option>";
                }
            }
            $('#ward_street').html(htmlWardStreet);
        });

        $("#district").change(function() {
            var htmlWardStreet = '';
            var quan_huyen = $(this).val();
            for (var i = 0; i < json_phuong_xa.length; i++) {
                var obj = json_phuong_xa[i];
                if (quan_huyen == obj.quan_huyen) {
                    htmlWardStreet += " <option value = '" + obj.phuong_xa + "' > " + obj
                        .ten_phuong_xa +
                        "</option>";
                }
            }
            $('#ward_street').html(htmlWardStreet);
        });

        // ward_street

    </script>
@stop
