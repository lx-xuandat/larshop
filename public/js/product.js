/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/admin/base.js":
/*!************************************!*\
  !*** ./resources/js/admin/base.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "Store": () => (/* binding */ Store),
/* harmony export */   "UI": () => (/* binding */ UI)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Store = /*#__PURE__*/function () {
  function Store(_base_url) {
    _classCallCheck(this, Store);

    this.base_url = _base_url;
  }
  /**
   *
   * @param {string} method - method type
   * @param {object} form - form
   * @returns ajax
   */


  _createClass(Store, [{
    key: "addBySerializeForm",
    value: function addBySerializeForm(form) {
      return $.ajax({
        url: this.base_url,
        method: 'POST',
        data: form.serialize(),
        dataType: 'JSON'
      });
    }
  }, {
    key: "getById",
    value: function getById(id) {
      var dynamicData = {};
      dynamicData["id"] = id;
      return $.ajax({
        url: this.base_url + '/' + id,
        type: "get",
        data: dynamicData
      });
    }
  }, {
    key: "destroy",
    value: function destroy(arr_id) {
      return $.ajax({
        data: 'ids=' + arr_id.join(","),
        url: this.base_url + '/deletes',
        type: 'POST',
        dataType: 'json'
      });
    }
  }]);

  return Store;
}();

var UI = /*#__PURE__*/function () {
  function UI() {
    _classCallCheck(this, UI);
  }

  _createClass(UI, null, [{
    key: "remove",
    value:
    /**
     * remove elements in ui
     * @param {object} elements List elements in DOM
     */
    function remove(elements) {
      elements.each(function (index) {
        $(this).parent().parent().remove();
      });
    }
  }, {
    key: "UpdateModalForm",
    value: function UpdateModalForm(form, data) {
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

  }, {
    key: "showModalFormCreate",
    value: function showModalFormCreate(form, modal, title) {
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

  }, {
    key: "ShowModalFormUpdate",
    value: function ShowModalFormUpdate(form, modal, title) {
      form.trigger("reset");
      modal.modal('show');
      title.text('Update Product');
    }
    /**
     *
     * @param {element} list - element product html
     * @param {object} _productModel - product resource
     */

  }, {
    key: "addProductToList",
    value: function addProductToList(list, model) {
      var row = document.createElement('tr');
      row.innerHTML = "<tr style=\"cursor: pointer\" data-id=\"".concat(model.id, "\">\n            <td>\n                <input type=\"checkbox\" name=\"product-id\" class=\"product-id\" value=\"").concat(model.id, "\">\n            </td>\n            <td class=\"name\">").concat(model.name, "</td>\n            <td class=\"price\">").concat(model.price, "</td>\n            <td class=\"quantity\">").concat(model.quantity, "</td>\n            <td class=\"images\"><img src=\"").concat(model.images, "\" alt=\"\" width=\"48px\" height=\"64px\"></td>\n            <td class=\"status\">").concat(model.status, "</td>\n        </tr>");
      list.prepend(row);
    }
    /**
     *
     * @param {string} message - message error
     */

  }, {
    key: "showError",
    value: function showError(message) {
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

  }, {
    key: "showSuccess",
    value: function showSuccess(message) {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 15000
      });
    }
    /**
     *
     * @param {object} _form - form object
     * @param {array} _errors - errors message object
     */

  }, {
    key: "showErrorsHelper",
    value: function showErrorsHelper(_form, _errors) {
      var x;

      _form.find('small').text('');

      for (x in _errors) {
        _form.find("small[id=\"".concat(x, "Helper\"]")).text(_errors[x][0]);
      }
    }
  }, {
    key: "confirmDelete",
    value: function confirmDelete() {
      return Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      });
    }
  }]);

  return UI;
}();



/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!***************************************!*\
  !*** ./resources/js/admin/product.js ***!
  \***************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _base_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./base.js */ "./resources/js/admin/base.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

 // IIFE - Immediately Invoked Function Expression

(function ($, window, document) {
  // The $ is now locally scoped
  // Product Class: represents a Product
  var Product = function Product(name, code, price, quantity, description, images, rate, weight, status) {
    _classCallCheck(this, Product);

    this.name = name;
    this.code = code;
    this.price = price;
    this.quantity = quantity;
    this.description = description;
    this.images = images;
    this.rate = rate;
    this.weight = weight;
    this.status = status;
  }; // Listen for the jQuery ready event on the document


  $(function () {
    // The DOM is ready!
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(".no-sort").removeClass("sorting_asc");
    var store = new _base_js__WEBPACK_IMPORTED_MODULE_0__.Store('/admin/products');
    var form = $("#modalFormData");
    var modal = $("#productEditorModal");
    var title = $('.modal-title');
    var productTable = $('tbody.product-items');
    var btnSave = $("#btnSave");
    btnSave.on({
      "click": function click() {
        store.addBySerializeForm(form).done(function (response) {
          _base_js__WEBPACK_IMPORTED_MODULE_0__.UI.showSuccess(response.message);
          _base_js__WEBPACK_IMPORTED_MODULE_0__.UI.addProductToList(productTable, response.product);
        }).fail(function (response) {
          // not found server
          if (response.status == 404) {
            _base_js__WEBPACK_IMPORTED_MODULE_0__.UI.showError('Server Not Found');
          }

          _base_js__WEBPACK_IMPORTED_MODULE_0__.UI.showError('Vui Long Kiem Tra lai thong tin nhap lieu');
          _base_js__WEBPACK_IMPORTED_MODULE_0__.UI.showErrorsHelper(form, JSON.parse(response.responseText).errors);
        });
      }
    });
    var btnDelete = $("#btnDelete");
    btnDelete.on({
      "click": function click() {
        var arr_id = [];
        var products = $("input.product-id[type=checkbox][name=product-id]:checked");
        products.each(function (index) {
          arr_id.push($(this).val());
        });

        if (arr_id.length == 0) {
          Swal.fire('Chu Y', 'Vui Long Chon San Pham Can Xoa.', 'success');
          return;
        }

        _base_js__WEBPACK_IMPORTED_MODULE_0__.UI.confirmDelete().then(function (result) {
          if (result.isConfirmed) {
            store.destroy(arr_id).done(function (response) {
              Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
              _base_js__WEBPACK_IMPORTED_MODULE_0__.UI.remove(products);
            }).fail(function (response) {});
          }
        });
      }
    });
    var btnDestroy = $("#btnDestroy");
    var btnUpdate = $("#btnUpdate"); // Show Form Create

    var btnCreate = $("#btnCreate");
    btnCreate.on({
      "click": function click() {
        _base_js__WEBPACK_IMPORTED_MODULE_0__.UI.showModalFormCreate(form, modal, title);
      }
    }); // show form update

    $('tbody.product-items').on('click', 'tr td:not(:first-child)', function () {
      var id_resource = $(this).parent().data("id");
      _base_js__WEBPACK_IMPORTED_MODULE_0__.UI.ShowModalFormUpdate(form, modal, title);
      store.getById(id_resource).done(function (data) {
        _base_js__WEBPACK_IMPORTED_MODULE_0__.UI.UpdateModalForm(form, data);
      });
    });
  }); // The rest of the code goes here!
})(window.jQuery, window, document); // The global jQuery object is passed as a parameter
})();

/******/ })()
;