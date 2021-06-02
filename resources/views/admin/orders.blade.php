@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
    <h1>Orders</h1>
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
                <table class="table table-bordered datatable" id="tblOrders">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Order Code</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th width="150" class="text-center">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="/js/admin.js"></script>
@stop
