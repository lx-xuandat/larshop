@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Products')

@section('content_header')
    <h1>Products</h1>
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
                    <button class="btn btn-success float-right ml-2 mr-2 mt-2" id="btnCreate">Create New</button>
                    <button class="btn btn-danger float-right ml-2 mr-2 mt-2" id="btnDelete">Delete</button>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped btn-new btn-new-product">
                <thead>
                    <tr>
                        <th class="no-sort">
                            {{-- <input type="checkbox" name="vehicle1" value="Bike"> --}}
                        </th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody class="product-items">
                    @foreach ($products as $product)
                        <tr style="cursor: pointer" data-id="{{ $product->id }}">
                            <td>
                                <input type="checkbox" name="product-id" class="product-id" value="{{ $product->id }}">
                            </td>
                            <td class="name">{{ $product->name }}</td>
                            <td class="price">{{ $product->price }}</td>
                            <td class="quantity">{{ $product->quantity }}</td>
                            <td class="images"><img src="{{ $product->images }}" alt="" width="48px" height="64px"></td>
                            <td class="status">{{ $product->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th class="no-sort">
                    </th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>status</th>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- The Modal -->
    <div class="modal" id="productEditorModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">New Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="modalFormData" name="modalFormData" role="form">
                        <input name="productId" type="hidden">
                        <div class="row">
                            <div class="col-sm-7">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter ...">
                                    <small id="nameHelper" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" name="code" class="form-control" placeholder="Enter ...">
                                    <small id="codeHelper" class="text-danger"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter ...">
                                    <small id="priceHelper" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Weight</label>
                                    <input type="text" name="weight" class="form-control" placeholder="Enter ...">
                                    <small id="weightHelper" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" class="form-control" placeholder="Enter ...">
                                    <small id="quantityHelper" class="text-danger"></small>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="0">Enable</option>
                                        <option value="1">Disable</option>
                                        <option value="2">Sale Off</option>
                                    </select>
                                    <small id="statusHelper" class="text-danger"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="3"
                                        placeholder="Enter ..."></textarea>
                                    <small id="name" class="text-danger"></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success btn-save" id="btnSave">Save</button>
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        table tbody tr:hover {
            background-color: #28a745 !important;
            color: white
        }

    </style>

@stop

@section('js')
    <script src="/js/product.js"></script>
@stop
