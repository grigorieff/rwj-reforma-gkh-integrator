	ymaps.ready(init);
	function init(){
		var geocoder = new ymaps.geocode(
			// Строка с адресом, который нужно геокодировать
			rwj_reforma_gkh_integrator_options.full_address,
					// требуемое количество результатов
			{ results: 1 }
		);
		// После того, как поиск вернул результат, вызывается callback-функция
		geocoder.then(
				function (res) {
					// координаты объекта
					var coord = res.geoObjects.get(0).geometry.getCoordinates();
					var map = new ymaps.Map('rwj-integrator-ymap', {
						// Центр карты - координаты первого элемента
						center: coord,
						// Коэффициент масштабирования
						zoom: 7,
						// включаем масштабирование карты колесом
						behaviors: ['default', 'scrollZoom'],
						controls: ['mapTools']
					});
					// Добавление метки на карту
					map.geoObjects.add(res.geoObjects.get(0));
					// устанавливаем максимально возможный коэффициент масштабирования - 1
					map.zoomRange.get(coord).then(function(range){
						map.setCenter(coord, range[1] - 1)
					});
					// Добавление стандартного набора кнопок
					map.controls.add('mapTools')
						// Добавление кнопки изменения масштаба
							.add('zoomControl')
						// Добавление списка типов карты
							.add('typeSelector');
				}
		);
	}