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

    @include('admin.orders.create-edit')
    @include('admin.orders.delete')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        // IIFE - Immediately Invoked Function Expression
        (function($, window, document) {

            function get() {
                console.log('get order');

                return $('.datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    pageLength: 10,
                    // scrollX: true,
                    "order": [
                        [0, "desc"]
                    ],
                    ajax: '{{ route('orders.get') }}',
                    columns: [{
                            data: 'id',
                            name: '#',
                        },
                        {
                            data: 'code',
                            name: 'Order Code'
                        },
                        {
                            data: 'user_id',
                            name: 'Customer'
                        },
                        {
                            data: 'address',
                            name: 'Address'
                        },
                        {
                            data: 'total_price',
                            name: 'Total Price	'
                        },
                        {
                            data: 'status',
                            name: 'Status'
                        },
                        {
                            data: 'Actions',
                            name: 'Actions',
                            orderable: false,
                            serachable: false,
                            sClass: 'text-center'
                        },
                    ]
                });
            }

            function store(id) {
                console.log('destroy');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });

                return $.ajax({
                    url: "/admin/orders/" + id,
                    method: "DELETE",
                });
            }

            function update(id) {
                console.log('destroy');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });

                return $.ajax({
                    url: "/admin/orders/" + id,
                    method: "DELETE",
                });
            }

            function destroy(id) {
                console.log('destroy');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });

                return $.ajax({
                    url: "/admin/orders/" + id,
                    method: "DELETE",
                });
            }

            // Listen for the jQuery ready event on the document
            $(function() {
                get();

            });
            // The rest of the code goes here!

        }(window.jQuery, window, document));
        // The global jQuery object is passed as a parameter

    </script>
    {{-- init datatable --}}
@stop
