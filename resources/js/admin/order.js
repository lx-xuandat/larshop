// IIFE - Immediately Invoked Function Expression
(function ($, window, document) {

    // The $ is now locally scoped

    // Listen for the jQuery ready event on the document
    $(function () {

        // The DOM is ready!

    });

    // The rest of the code goes here!

}(window.jQuery, window, document));
// The global jQuery object is passed as a parameter


// Product Class: represents a Product

export default class Order {
    base_url;

    constructor(base_url = '/admin/orders') {
        this.base_url = base_url;
    }

    get() {
        return $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 10,
            // scrollX: true,
            "order": [
                [0, "desc"]
            ],
            ajax: this.base_url,
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

    store(id) {
        return $.ajax({
            url: this.base_url + '/' + id,
            method: "POST",
        });
    };

    update(id) {
        return $.ajax({
            url: this.base_url + '/' + id,
            method: "PUT",
        });
    };

    destroy(id) {
        return $.ajax({
            url: this.base_url + '/' + id,
            method: "DELETE",
        });
    };
}
