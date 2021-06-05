import { Store, UI } from './base.js';

// IIFE - Immediately Invoked Function Expression
(function ($, window, document) {
    // The $ is now locally scoped

    // Product Class: represents a Product
    class Product {
        constructor(name, code, price, quantity, description, images, rate, weight, status) {
            this.name = name;
            this.code = code;
            this.price = price;
            this.quantity = quantity;
            this.description = description;
            this.images = images;
            this.rate = rate;
            this.weight = weight;
            this.status = status;
        }


    }

    // Listen for the jQuery ready event on the document
    $(function () {
        // The DOM is ready!

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".no-sort").removeClass("sorting_asc");

        let store = new Store('/admin/products');

        var form = $("#modalFormData");
        var modal = $("#productEditorModal");
        var title = $('.modal-title');
        var productTable = $('tbody.product-items');

        // Event

        // Save
        var btnSave = $("#btnSave");
        btnSave.on({
            "click": function () {
                store.addBySerializeForm(form)
                    .done(function (response) {
                        UI.showSuccess(response.message);
                        UI.addProductToList(productTable, response.product);
                    })
                    .fail(function (response) {
                        // not found server
                        if (response.status == 404) {
                            UI.showError('Server Not Found');
                        }

                        UI.showError('Vui Long Kiem Tra lai thong tin nhap lieu');

                        UI.showErrorsHelper(form, JSON.parse(response.responseText).errors);
                    });
            },
        });

        // Delete
        var btnDelete = $("#btnDelete");
        btnDelete.on({
            "click": function () {
                var arr_id = [];
                var products = $("input.product-id[type=checkbox][name=product-id]:checked");

                products.each(function (index) {
                    arr_id.push($(this).val());
                });

                if (arr_id.length == 0) {
                    Swal.fire(
                        'Chu Y',
                        'Vui Long Chon San Pham Can Xoa.',
                        'success'
                    )
                    return;
                }

                UI.confirmDelete().then((result) => {
                    if (result.isConfirmed) {
                        store.destroy(arr_id).done(function (response) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            UI.remove(products);
                        }).fail(function (response) {

                        });
                    }
                });
            },
        });

        // Create
        var btnCreate = $("#btnCreate");
        btnCreate.on({

            "click": function () {

                UI.showModalFormCreate(form, modal, title);

            }

        });

        // Edit
        $('tbody.product-items').on('click', 'tr td:not(:first-child)', function () {

            var id_resource = $(this).parent().data("id");

            UI.ShowModalFormUpdate(form, modal, title);

            store.getById(id_resource)
                .done(function (data) {
                    UI.UpdateModalForm(form, data);
                });
        });

        // Update
        var btnUpdate = $("#btnUpdate");
        btnUpdate.on({
            "click": function () {
                btnUpdate.val('update');
                store.addBySerializeForm(form)
                    .done(function (response) {
                        UI.showSuccess(response.message);
                        UI.addProductToList(productTable, response.product);
                    })
                    .fail(function (response) {
                        // not found server
                        if (response.status == 404) {
                            UI.showError('Server Not Found');
                        }

                        UI.showError('Vui Long Kiem Tra lai thong tin nhap lieu');

                        UI.showErrorsHelper(form, JSON.parse(response.responseText).errors);
                    });
            }
        })

    });

    // The rest of the code goes here!

}(window.jQuery, window, document));
// The global jQuery object is passed as a parameter
