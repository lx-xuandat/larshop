@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Products')

@section('content_header')
    <h1>Products</h1>
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
    <script>
        $(document).ready(function() {
            ////----- Open the modal to CREATE -----////
            $('#btn-add').click(function() {
                $('.btn-save').val("add");
                $('#modalFormData').trigger("reset");
                $('#productEditorModal').modal('show');
                $('.modal-title').text('Create Product');
            });

            ////----- Open the modal to UPDATE -----////
            $('tbody.product-items').on('click', 'tr', function() {
                var modal = $('#productEditorModal');
                var product_id = $(this).data("id");

                $.get('/admin/products/' + product_id, function(data, statusText, xhr) {
                    console.log(xhr.status + " " + statusText);
                    modal.find('input[name="productId"]').val(product_id);
                    modal.find('input[name="name"]').val(data.name);
                    modal.find('input[name="code"]').val(data.code);
                    modal.find('input[name="price"]').val(data.price);
                    modal.find('input[name="weight"]').val(data.weight);
                    modal.find('input[name="quantity"]').val(data.quantity);
                    modal.find('select[name="status"]').val(data.status);
                    modal.find('textarea[name="description"]').val(data.description);

                    $('#btn-save').val("update");
                    $('#btn-save').data("product-id", product_id);
                    $('#productEditorModal').modal('show');
                });
            });
        });

    </script>

    @include('admin.js.productsave')
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-8 mt-2">
                    <h3 class="card-title ">DataTable with default features</h3>
                </div>
                <div class="col-sm-4 mt-2">
                    <button class="btn btn-success float-right" id="btn-add">Create New</button>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped btn-new btn-new-product">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody class="product-items">
                    @foreach ($products as $product)
                        {{-- data-toggle="modal" data-target="#productEditorModal" --}}
                        <tr style="cursor: pointer" data-id="{{ $product->id }}">
                            <td class="name">{{ $product->name }}</td>
                            <td class="price">{{ $product->price }}</td>
                            <td class="quantity">{{ $product->quantity }}</td>
                            <td class="images">{{ $product->images }}</td>
                            <td class="status">{{ $product->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
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
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" name="code" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Weight</label>
                                    <input type="text" name="weight" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" class="form-control" placeholder="Enter ...">
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
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success btn-save" id="btn-save">Save</button>
                </div>

            </div>
        </div>
    </div>
@stop
