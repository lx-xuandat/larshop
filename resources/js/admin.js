class Admin {

    static showError(error) {
        let html = `<div class='alert alert-danger error-log'><i class='pull-right' style='cursor:pointer'><span class='glyphicon glyphicon-remove btn-remove'></span></i>`;
        for (let key in error) {
            html += `<li class='mt-10'> ${error[key]} </li>`;
        }
        html += `</div>`;
        return html;
    };

    static swalAlert(status, message) {
        Swal.fire({
            position: 'top-end',
            icon: status,
            title: message,
            showConfirmButton: false,
            timer: 1500
        });
    };

    static callAjaxByFormData(url, method = '', idForm) {
        return $.ajax({
            url: url,
            method: 'post',
            data: new FormData($(idForm)[0]),
            contentType: false,
            cache: false,
            processData: false,
        });
    };

    static callAjaxBySerialize(url, method = '', idForm) {
        return $.ajax({
            url: url,
            method: method,
            data: $(idForm).serialize(),
        });
    };

    static submitFormByAjax(url, idTable, idForm) {
        callAjaxByFormData(url, 'post', idForm).fail(function (response) {
            let result = showError(response.responseJSON.errors);
            $(`${idForm} #form_result`).html(result);
        }).done(function (response) {
            $(idForm).parents('.modal.fade').modal('hide');
            swalAlert('success', response.message);
            let { data } = response;
            $(idTable + ' tbody').html(data);
            $(idForm)[0].reset();
        });
    };

    static updateFormByAjax(url, idTable, idForm) {
        callAjaxBySerialize(url, 'put', idForm).done(function (response) {
            $(idForm).parents('.modal.fade').modal('hide');
            swalAlert('success', response.message);
            let { data } = response;
            $(idTable + ' tbody').html(data);
            $(idForm)[0].reset();
        }).fail(function (response) {
            let result = showError(response.responseJSON.errors);
            $(`${idForm} #form_result`).html(result);
        });
    };

    static confirmDelete() {
        return Swal.fire({
            title: 'Bạn chắc chưa?',
            text: "Bạn sẽ không thể phục hồi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa'
        });
    };

    static removeRecordDeleted(url, idModule) {
        $.ajax({
            url: url,
            method: "delete",
        }).done((response) => {
            swalAlert('success', response.message);
            let data = response.id;
            $(`${idModule}${data}`).remove();
        });
    };

    static deleteRecord(url, idModule) {
        confirmDelete().then((result) => {
            if (result.value) {
                removeRecordDeleted(url, idModule);
            }
        });
    };

    static fetchData(page = '', txtSearch = '', idTable) {
        let url = $('#fetchDataForm').data('action') + "?page=" + page + "&txtSearch=" + txtSearch;
        $.ajax({
            url: url,
        }).done((data) => {
            $(idTable + ' tbody').html(data);
            $(idTable + ' tbody').mark(txtSearch);
        });
    };

    static searchRecord(idTable) {
        $(document).on('keyup', '#txt_search', function () {
            let txtSearch = $(this).val();
            let page = $('#hidden_page').val();
            fetchData(page, txtSearch, idTable);
        });
    };

    static paginate(idTable) {
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            let txtSearch = $('#txt_search').val();
            $('li').removeClass('active');
            $(this).parent().addClass('active');
            fetchData(page, txtSearch, idTable);
        });
    };

    static submitTaskForm(url, idForm, idTable) {
        callAjaxBySerialize(url, 'post', idForm).done((response) => {
            $(idForm)[0].reset();
            $(idForm).parents('.modal.fade').modal('hide');
            toastr.success(response.message);
            $(idTable + ' tbody').html(response.data);
            let url = response.urlTask;
            $.ajax({
                url: url,
            })
                .done((data) => {
                    $('#contentTask .modal-content').html(data);
                    $('#contentTask').addClass('show');
                    $('#contentTask').show();
                })
        }).fail((response) => {
            let result = showError(response.responseJSON.errors);
            $(`${idForm} #form_result`).html(result);
        });
    };

}
