document.addEventListener("DOMContentLoaded", function () {
	async function initMaps() {
		// Промис `ymaps3.ready` будет зарезолвлен, когда загрузятся все компоненты основного модуля API
		await window.ymaps3.ready;

		const {
			YMap,
			YMapDefaultSchemeLayer,
			YMapDefaultFeaturesLayer,
			YMapMarker,
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
					zoom: 17,
				},
			}
		);

		// Добавляем слой для отображения схематической карты
		map_tula.addChild(new YMapDefaultSchemeLayer());

		// слой метки
		map_tula.addChild(new YMapDefaultFeaturesLayer());

		const content_tula = document.createElement("section");

		const marker_tula = new YMapMarker(
			{ 
				coordinates: [37.58446, 54.20100],
				title: "Techart",
				draggable: false,
				iconSrc: "geometka.png",
				subtitle:
					"Офис в Туле 300041, г. Тула, ул. Ф. Смирнова ул., д. 28, оф. 601-602, 701, 703-707, 712Тел. / Факс: (4872) 250-450, 57-05-01",
				iconImageOffset: [-20, -100],
			},
			content_tula
		);

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
					zoom: 17,
				},
			}
		);

		// Добавляем слой для отображения схематической карты
		map_moscow.addChild(new YMapDefaultSchemeLayer());

		// слой метки
		map_moscow.addChild(new YMapDefaultFeaturesLayer());

		const content_moscow = document.createElement("section");

		const marker_moscow = new YMapMarker(
			{
				coordinates: [37.62978, 55.67954],
				title: "Techart Москва",
				draggable: false,
				iconSrc: "geometka.png",
				subtitle:
					"Офис в Москве 115230, г. Москва, Варшавское шоссе, д. 47, к. 4, оф. 1224 (12 этаж). Тел. / Факс: (495) 933-62-10",
				iconImageOffset: [-20, -100],
			},
			content_moscow
		);

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
					map
						.querySelector(".b-map__image")
						.classList.remove("b-map__image--show-content");
				} else {
					innerContent.classList.add("b-map__popup-content--show");
					map
						.querySelector(".b-map__image")
						.classList.add("b-map__image--show-content");
				}
			}
		}
	}
	
	initMaps();
	
});
