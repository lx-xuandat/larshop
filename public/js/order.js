/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
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
/*!*************************************!*\
  !*** ./resources/js/admin/order.js ***!
  \*************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Order)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

// IIFE - Immediately Invoked Function Expression
(function ($, window, document) {
  // The $ is now locally scoped
  // Listen for the jQuery ready event on the document
  $(function () {// The DOM is ready!
  }); // The rest of the code goes here!
})(window.jQuery, window, document); // The global jQuery object is passed as a parameter
// Product Class: represents a Product


var Order = /*#__PURE__*/function () {
  function Order() {
    var base_url = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '/admin/orders';

    _classCallCheck(this, Order);

    _defineProperty(this, "base_url", void 0);

    this.base_url = base_url;
  }

  _createClass(Order, [{
    key: "get",
    value: function get() {
      return $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        pageLength: 10,
        // scrollX: true,
        "order": [[0, "desc"]],
        ajax: this.base_url,
        columns: [{
          data: 'id',
          name: '#'
        }, {
          data: 'code',
          name: 'Order Code'
        }, {
          data: 'user_id',
          name: 'Customer'
        }, {
          data: 'address',
          name: 'Address'
        }, {
          data: 'total_price',
          name: 'Total Price	'
        }, {
          data: 'status',
          name: 'Status'
        }, {
          data: 'Actions',
          name: 'Actions',
          orderable: false,
          serachable: false,
          sClass: 'text-center'
        }]
      });
    }
  }, {
    key: "store",
    value: function store(id) {
      return $.ajax({
        url: this.base_url + '/' + id,
        method: "POST"
      });
    }
  }, {
    key: "update",
    value: function update(id) {
      return $.ajax({
        url: this.base_url + '/' + id,
        method: "PUT"
      });
    }
  }, {
    key: "destroy",
    value: function destroy(id) {
      return $.ajax({
        url: this.base_url + '/' + id,
        method: "DELETE"
      });
    }
  }]);

  return Order;
}();


/******/ })()
;