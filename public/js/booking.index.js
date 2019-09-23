/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/booking.index.js":
/*!***************************************!*\
  !*** ./resources/js/booking.index.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('#submit-btn').on('click', function (e) {
  e.preventDefault();
  $('.loader').css('display', 'block');
  $('.overlay').css('display', 'block');
  $(this).val('Please wait ...').attr('disabled', 'disabled');
  $('.booking-form').submit();
});
var wrapper = $(".row-container");
var addButton = $(".add-form-field");
var row = 2;
$(addButton).on('click', function () {
  $(wrapper).append("\n    <tr>\n        <td class=\"fieldlist\">\n            <label for=\"length__".concat(row, "\">Length</label>\n            <input id=\"length__").concat(row, "\" type=\"text\" name=\"parcels[").concat(row, "][length]\">\n            <span>cm</span>\n        </td>\n        <td class=\"fieldlist\">\n            <label for=\"width__").concat(row, "\">Width</label>\n            <input id=\"width__").concat(row, "\" type=\"text\" name=\"parcels[").concat(row, "][width]\">\n            <span>cm</span>\n        </td>\n        <td class=\"fieldlist\">\n            <label for=\"height__").concat(row, "\">Height</label>\n            <input id=\"height__").concat(row, "\" type=\"text\" name=\"parcels[").concat(row, "][height]\">\n            <span>cm</span>\n        </td>\n        <td class=\"fieldlist\">\n            <label for=\"weight__").concat(row, "\">Weight</label>\n            <input id=\"weight__").concat(row, "\" type=\"text\" name=\"parcels[").concat(row, "][weight]\">\n            <span>kg</span>\n        </td>\n        <td>\n            <button type=\"button\" title=\"Remove parcel\" class=\"k-button delete-row\">\n                <i class=\"fas fa-trash-alt\"></i>\n            </button>\n        </td>\n    </tr>\n    "));
  row++;
});
$(wrapper).on('click', '.delete-row', function () {
  $(this).parent('td').parent('tr').remove();
});

/***/ }),

/***/ 1:
/*!*********************************************!*\
  !*** multi ./resources/js/booking.index.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/impactexpress/resources/js/booking.index.js */"./resources/js/booking.index.js");


/***/ })

/******/ });