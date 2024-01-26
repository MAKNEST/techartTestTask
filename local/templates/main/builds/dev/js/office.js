/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/block/office/map/map.js":
/*!*************************************!*\
  !*** ./src/block/office/map/map.js ***!
  \*************************************/
/***/ (() => {

document.addEventListener("DOMContentLoaded", function () {
  async function initMaps() {
    // Промис `ymaps3.ready` будет зарезолвлен, когда загрузятся все компоненты основного модуля API
    await window.ymaps3.ready;
    const {
      YMap,
      YMapDefaultSchemeLayer,
      YMapDefaultFeaturesLayer,
      YMapMarker
    } = window.ymaps3;

    // Иницилиазируем карту офиса в Туле
    const map_tula = new YMap(
    // Передаём ссылку на HTMLElement контейнера
    document.getElementById("map_tula"),
    // Передаём параметры инициализации карты
    {
      location: {
        // Координаты центра карты 54.200802, 37.584685
        center: [37.584685, 54.200802],
        // Уровень масштабирования
        zoom: 17
      }
    });

    // Добавляем слой для отображения схематической карты
    map_tula.addChild(new YMapDefaultSchemeLayer());

    // слой метки
    map_tula.addChild(new YMapDefaultFeaturesLayer());
    const content_tula = document.createElement("section");
    const marker_tula = new YMapMarker({
      coordinates: [37.58446, 54.20100],
      title: "Techart",
      draggable: false,
      iconSrc: "geometka.png",
      subtitle: "Офис в Туле 300041, г. Тула, ул. Ф. Смирнова ул., д. 28, оф. 601-602, 701, 703-707, 712Тел. / Факс: (4872) 250-450, 57-05-01",
      iconImageOffset: [-20, -100]
    }, content_tula);
    let popupMarker_tula = `<img class="b-map__image" src="geometka.png">
			<div class="b-map__popup-marker">
				<h4 class="b-map__marker-title">
					TECHART Тула
				</h4>
			
				<span class="b-map__popup-content">
					Офис в Туле 300041, г. Тула, ул. Ф. Смирнова ул., д. 28, 
					оф. 601-602, 701, 703-707, 712Тел. / Факс: (4872) 250-450, 57-05-01
				</span>
			</div>`;
    content_tula.innerHTML = popupMarker_tula;
    map_tula.addChild(marker_tula);

    //============================================================================================================
    // Иницилиазируем карту офиса в Москве
    const map_moscow = new YMap(
    // Передаём ссылку на HTMLElement контейнера
    document.getElementById("map_moscow"),
    // Передаём параметры инициализации карты
    {
      location: {
        // Координаты центра карты
        center: [37.630131, 55.679138],
        // Уровень масштабирования
        zoom: 17
      }
    });

    // Добавляем слой для отображения схематической карты
    map_moscow.addChild(new YMapDefaultSchemeLayer());

    // слой метки
    map_moscow.addChild(new YMapDefaultFeaturesLayer());
    const content_moscow = document.createElement("section");
    const marker_moscow = new YMapMarker({
      coordinates: [37.62978, 55.67954],
      title: "Techart Москва",
      draggable: false,
      iconSrc: "geometka.png",
      subtitle: "Офис в Москве 115230, г. Москва, Варшавское шоссе, д. 47, к. 4, оф. 1224 (12 этаж). Тел. / Факс: (495) 933-62-10",
      iconImageOffset: [-20, -100]
    }, content_moscow);
    let popupMarker_moscow = `<img class="b-map__image" src="geometka.png">
			<div class="b-map__popup-marker">
				<h4 class="b-map__marker-title">
					TECHART Москва
				</h4>

				<span class="b-map__popup-content">
					Офис в Москве
					115230, г. Москва, Варшавское шоссе, д. 47, к. 4, оф. 1224 (12 этаж).
					Тел. / Факс: (495) 933-62-10
				</span>
			</div>`;
    content_moscow.innerHTML = popupMarker_moscow;
    map_moscow.addChild(marker_moscow);
    let titles = document.querySelectorAll('.b-map__marker-title');
    for (let title of titles) {
      title.addEventListener("click", showContent);
    }
    let icons = document.querySelectorAll(".b-map__image");
    for (let icon of icons) {
      icon.addEventListener("click", showContent);
    }
    function showContent() {
      let map = document.querySelector('.b-map--show');
      for (let innerContent of map.querySelectorAll(".b-map__popup-content")) {
        if (innerContent.classList.contains("b-map__popup-content--show")) {
          innerContent.classList.remove("b-map__popup-content--show");
          map.querySelector(".b-map__image").classList.remove("b-map__image--show-content");
        } else {
          innerContent.classList.add("b-map__popup-content--show");
          map.querySelector(".b-map__image").classList.add("b-map__image--show-content");
        }
      }
    }
  }
  initMaps();
});

/***/ }),

/***/ "./src/block/office/office.js":
/*!************************************!*\
  !*** ./src/block/office/office.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

function requireAll(r) {
  r.keys().map(r);
}
requireAll(__webpack_require__("./src/block/office sync recursive ^\\.\\/[^/]+\\/[^/.]+\\.(js%7Ccss%7Cscss%7Csass%7Cless)$"));

/***/ }),

/***/ "./src/block/office/map/map.scss":
/*!***************************************!*\
  !*** ./src/block/office/map/map.scss ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/block/office sync recursive ^\\.\\/[^/]+\\/[^/.]+\\.(js%7Ccss%7Cscss%7Csass%7Cless)$":
/*!*************************************************************************************!*\
  !*** ./src/block/office/ sync ^\.\/[^/]+\/[^/.]+\.(js%7Ccss%7Cscss%7Csass%7Cless)$ ***!
  \*************************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var map = {
	"./map/map.js": "./src/block/office/map/map.js",
	"./map/map.scss": "./src/block/office/map/map.scss"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/block/office sync recursive ^\\.\\/[^/]+\\/[^/.]+\\.(js%7Ccss%7Cscss%7Csass%7Cless)$";

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
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
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
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!*****************************!*\
  !*** ./src/entry/office.js ***!
  \*****************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var block_office__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! block/office */ "./src/block/office/office.js");
/* harmony import */ var block_office__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(block_office__WEBPACK_IMPORTED_MODULE_0__);

})();

/******/ })()
;
//# sourceMappingURL=office.js.map