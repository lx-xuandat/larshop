class Store {

    constructor(_base_url) {
        this.base_url = _base_url;
    }

    /**
     *
     * @param {string} method - method type
     * @param {object} form - form
     * @returns ajax
     */
    addBySerializeForm(form) {
        return $.ajax({
            url: this.base_url,
            method: 'POST',
            data: form.serialize(),
            dataType: 'JSON',
        })
    }

    /**
     *
     * @param {string} id - id resource
     * @param {object} form - element object
     * @returns
     */
    update(id, form) {
        return $.ajax({
            url: this.base_url + '/' + id,
            method: 'POST',
            data: form.serialize(),
            dataType: 'JSON',
        })
    }

    getById(id) {
        var dynamicData = {};
        dynamicData["id"] = id;
        return $.ajax({
            url: this.base_url + '/' + id,
            type: "get",
            data: dynamicData
        });
    }

    destroy(arr_id) {
        return $.ajax({
            data: 'ids=' + arr_id.join(","),
            url: this.base_url + '/deletes',
            type: 'POST',
            dataType: 'json'
        });
    }
}

class UI {

    /**
     * remove elements in ui
     * @param {object} elements List elements in DOM
     */
    static remove(elements) {
        elements.each(function (index) {
            $(this).parent().parent().remove();
        });
    }

    static UpdateModalForm(form, data) {
        form.find('input[name="name"]').val(data.name);
        form.find('input[name="code"]').val(data.code);
        form.find('input[name="price"]').val(data.price);
        form.find('input[name="weight"]').val(data.weight);
        form.find('input[name="quantity"]').val(data.quantity);
        form.find('select[name="status"]').val(data.status);
        form.find('textarea[name="description"]').val(data.description);

        $('#btn-save').val("update");
        $('#btn-save').data("product-id", data.id);
    }

    /**
     * Show form modal for create resource
     * @param {string} form - Selector form
     * @param {string} modal - Selector modal
     * @param {string} title - Selector title for modal
     */
    static showModalFormCreate(form, modal, title) {
        form.trigger("reset");
        modal.modal('show');
        title.text('Create Product');
    }

    /**
     *
     * @param {string} form - selector form
     * @param {string} modal - selector modal
     * @param {string} title - selector title for modal
     */
    static ShowModalFormUpdate(form, modal, title) {
        form.trigger("reset");
        modal.modal('show');
        title.text('Update Product');
    }

    /**
     *
     * @param {element} list - element product html
     * @param {object} _productModel - product resource
     */
    static addProductToList(list, model) {

        const row = document.createElement('tr');

        row.innerHTML = `<tr style="cursor: pointer" data-id="${model.id}">
            <td>
                <input type="checkbox" name="product-id" class="product-id" value="${model.id}">
            </td>
            <td class="name">${model.name}</td>
            <td class="price">${model.price}</td>
            <td class="quantity">${model.quantity}</td>
            <td class="images"><img src="${model.images}" alt="" width="48px" height="64px"></td>
            <td class="status">${model.status}</td>
        </tr>`;

        list.prepend(row);
    }

    /**
     *
     * @param {string} message - message error
     */
    static showError(message) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: message,
            showConfirmButton: false,
            timer: 1500
        });
    }

    /**
     *
     * @param {string} message - message success
     */
    static showSuccess(message) {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 15000
        })
    }

    /**
     *
     * @param {object} _form - form object
     * @param {array} _errors - errors message object
     */
    static showErrorsHelper(_form, _errors) {
        var x;

        _form.find('small').text('');

        for (x in _errors) {
            _form.find(`small[id="${x}Helper"]`).text(_errors[x][0]);
        }
    }

    static confirmDelete() {
        return Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })
    }
}

export { Store, UI };

