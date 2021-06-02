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

        var btnSave = $("#btnSave");
        btnSave.on({
            "click": function () {
                store.addBySerializeForm(form)
                    .done(function (response) {
                        UI.showError(response.message);
                        // UI.addProductToList(response);
                    })
                    .fail(function (response) {
                        // not found server
                        if (response.status == 404) {
                            UI.showError('Server Not Found');
                        }

                        UI.showErrorsHelper(form, JSON.parse(response.responseText).errors);
                    });
            },
        });

        var btnDelete = $("#btnDelete");
        btnDelete.on({
            "click": function () {
                UI.confirmDelete();
            },
        });

        var btnDestroy = $("#btnDestroy");

        var btnUpdate = $("#btnUpdate");

        // Show Form Create
        var btnCreate = $("#btnCreate");
        btnCreate.on({

            "click": function () {

                UI.showModalFormCreate(form, modal, title);

            }

        });

        // show form update
        $('tbody.product-items').on('click', 'tr td:not(:first-child)', function () {

            var id_resource = $(this).parent().data("id");

            UI.ShowModalFormUpdate(form, modal, title);

            store.getById(id_resource)
                .done(function (data) {
                    UI.UpdateModalForm(form, data);
                });
        });


    });

    // The rest of the code goes here!

}(window.jQuery, window, document));
// The global jQuery object is passed as a parameter
