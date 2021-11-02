/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/admin/js/scripts.js":
/*!***************************************!*\
  !*** ./resources/admin/js/scripts.js ***!
  \***************************************/
/***/ (() => {

eval("/*!\n    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)\n    * Copyright 2013-2020 Start Bootstrap\n    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)\n    */\n(function ($) {\n  \"use strict\"; // Add active state to sidbar nav links\n\n  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path\n\n  $(\"#layoutSidenav_nav .sb-sidenav a.nav-link\").each(function () {\n    if (this.href === path) {\n      $(this).addClass(\"active\");\n    }\n  }); // Toggle the side navigation\n\n  $(\"#sidebarToggle\").on(\"click\", function (e) {\n    e.preventDefault();\n    $(\"body\").toggleClass(\"sb-sidenav-toggled\");\n  });\n})(jQuery);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYWRtaW4vanMvc2NyaXB0cy5qcz81ODVlIl0sIm5hbWVzIjpbIiQiLCJwYXRoIiwid2luZG93IiwibG9jYXRpb24iLCJocmVmIiwiZWFjaCIsImFkZENsYXNzIiwib24iLCJlIiwicHJldmVudERlZmF1bHQiLCJ0b2dnbGVDbGFzcyIsImpRdWVyeSJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNJLENBQUMsVUFBU0EsQ0FBVCxFQUFZO0FBQ2IsZUFEYSxDQUdiOztBQUNBLE1BQUlDLElBQUksR0FBR0MsTUFBTSxDQUFDQyxRQUFQLENBQWdCQyxJQUEzQixDQUphLENBSW9COztBQUM3QkosRUFBQUEsQ0FBQyxDQUFDLDJDQUFELENBQUQsQ0FBK0NLLElBQS9DLENBQW9ELFlBQVc7QUFDM0QsUUFBSSxLQUFLRCxJQUFMLEtBQWNILElBQWxCLEVBQXdCO0FBQ3BCRCxNQUFBQSxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFNLFFBQVIsQ0FBaUIsUUFBakI7QUFDSDtBQUNKLEdBSkQsRUFMUyxDQVdiOztBQUNBTixFQUFBQSxDQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQk8sRUFBcEIsQ0FBdUIsT0FBdkIsRUFBZ0MsVUFBU0MsQ0FBVCxFQUFZO0FBQ3hDQSxJQUFBQSxDQUFDLENBQUNDLGNBQUY7QUFDQVQsSUFBQUEsQ0FBQyxDQUFDLE1BQUQsQ0FBRCxDQUFVVSxXQUFWLENBQXNCLG9CQUF0QjtBQUNILEdBSEQ7QUFJSCxDQWhCRyxFQWdCREMsTUFoQkMiLCJzb3VyY2VzQ29udGVudCI6WyIvKiFcbiAgICAqIFN0YXJ0IEJvb3RzdHJhcCAtIFNCIEFkbWluIHY2LjAuMiAoaHR0cHM6Ly9zdGFydGJvb3RzdHJhcC5jb20vdGVtcGxhdGUvc2ItYWRtaW4pXG4gICAgKiBDb3B5cmlnaHQgMjAxMy0yMDIwIFN0YXJ0IEJvb3RzdHJhcFxuICAgICogTGljZW5zZWQgdW5kZXIgTUlUIChodHRwczovL2dpdGh1Yi5jb20vU3RhcnRCb290c3RyYXAvc3RhcnRib290c3RyYXAtc2ItYWRtaW4vYmxvYi9tYXN0ZXIvTElDRU5TRSlcbiAgICAqL1xuICAgIChmdW5jdGlvbigkKSB7XG4gICAgXCJ1c2Ugc3RyaWN0XCI7XG5cbiAgICAvLyBBZGQgYWN0aXZlIHN0YXRlIHRvIHNpZGJhciBuYXYgbGlua3NcbiAgICB2YXIgcGF0aCA9IHdpbmRvdy5sb2NhdGlvbi5ocmVmOyAvLyBiZWNhdXNlIHRoZSAnaHJlZicgcHJvcGVydHkgb2YgdGhlIERPTSBlbGVtZW50IGlzIHRoZSBhYnNvbHV0ZSBwYXRoXG4gICAgICAgICQoXCIjbGF5b3V0U2lkZW5hdl9uYXYgLnNiLXNpZGVuYXYgYS5uYXYtbGlua1wiKS5lYWNoKGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgaWYgKHRoaXMuaHJlZiA9PT0gcGF0aCkge1xuICAgICAgICAgICAgICAgICQodGhpcykuYWRkQ2xhc3MoXCJhY3RpdmVcIik7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuXG4gICAgLy8gVG9nZ2xlIHRoZSBzaWRlIG5hdmlnYXRpb25cbiAgICAkKFwiI3NpZGViYXJUb2dnbGVcIikub24oXCJjbGlja1wiLCBmdW5jdGlvbihlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgJChcImJvZHlcIikudG9nZ2xlQ2xhc3MoXCJzYi1zaWRlbmF2LXRvZ2dsZWRcIik7XG4gICAgfSk7XG59KShqUXVlcnkpO1xuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9hZG1pbi9qcy9zY3JpcHRzLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/admin/js/scripts.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/admin/js/scripts.js"]();
/******/ 	
/******/ })()
;