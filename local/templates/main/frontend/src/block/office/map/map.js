document.addEventListener("DOMContentLoaded", function () {

	async function initMap() {
		// Промис `ymaps3.ready` будет зарезолвлен, когда загрузятся все компоненты основного модуля API
		await ymaps3.ready;

		const {
			YMap,
			YMapDefaultSchemeLayer,
			YMapDefaultFeaturesLayer,
			YMapMarker,
		} = ymaps3;

		// Иницилиазируем карту
		const map = new YMap(
			// Передаём ссылку на HTMLElement контейнера
			document.getElementById('map'),

			// Передаём параметры инициализации карты
			{
				location: {
					// Координаты центра карты
					center: [37.584719, 54.200511],

					// Уровень масштабирования
					zoom: 18,
				},
			}
		);

		// Добавляем слой для отображения схематической карты
		map.addChild(new YMapDefaultSchemeLayer());

		// слой метки
		map.addChild(new YMapDefaultFeaturesLayer());

		const content = document.createElement("section");

		const marker = new YMapMarker(
			{
				coordinates: [37.584719, 54.200511],
				draggable: true,
			},
			content
		);

		let popupMarker = `<div class="b-map__popup-marker">
			<span class="b-map__popup-content"> Офис в Туле 300041, г. Тула, ул. Ф. Смирнова ул., д. 28, 
			оф. 601-602, 701, 703-707, 712Тел. / Факс: (4872) 250-450, 57-05-01</span></div>`;

		content.innerHTML = '';
		map.addChild(marker);
		
	}

	initMap();
});
