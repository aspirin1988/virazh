$(document).ready(function () {

  /* код для реализации sticky-навбара */
  var menu = $('.navbar');
  var origOffsetY = menu.offset().top;

  function scroll() {
      if ($(window).scrollTop() >= origOffsetY) {
          $('.navbar').addClass('sticky');
          $('.content').addClass('content-padding');
      } else {
          $('.navbar').removeClass('sticky');
          $('.content').removeClass('content-padding');
      }
  }

  document.onscroll = scroll;
  /* конец код для реализации sticky-навбара */


  /* функция для подключения стилей динамически */
  function CSSLoad(file){
  	var link = document.createElement("link");
  	link.setAttribute("rel", "stylesheet");
  	link.setAttribute("type", "text/css");
  	link.setAttribute("href", file);
  	document.getElementsByTagName("head")[0].appendChild(link)
  }

  /* подключаем стили кнопки звонка динамически, чтобы перебить стили: */
  CSSLoad('css/call_button.css');


/* модальное окно */
  $('#mapModal').on('shown.bs.modal', function (e) {


    /* подключаем стили модалки динамически, чтобы перебить стили: */
    CSSLoad('css/modal.css');

    var cityId = e.relatedTarget.id;

    var cities = {
        almaty:   {
                    russianNameAndPhone: "Алматы, Тел: (727)356 48 38, 356 02 48",
                    coordinates: {
                              dolgota: "76.931521",
                              shirota: "43.270608"
                    },
                    address: "Райымбека 173/2"
                  },
        shimkent: {
                    russianNameAndPhone: "Шымкент, Тел/факс: (7252) 46-66-35, 46 60 07, 46 60 41",
                    coordinates: {
                              dolgota: "69.560483",
                              shirota: "42.279212"
                    },
                    address: "Ташкентское шоссе, 22"
                  },
        taraz:    {
                    russianNameAndPhone: "Тараз, Тел/факс: (7262) 51 00 55, 51 20 22",
                    coordinates: {
                              dolgota: "71.361692",
                              shirota: "42.907694"
                    },
                    address: "пр. Жамбыла 162 А."
                  },
        aqtaw:    {
                    russianNameAndPhone: "Актау, Тел: (7292) 40 02 77,  40 03 77, 40 17 77",
                    coordinates: {
                              dolgota: "51.186203",
                              shirota: "43.675126"
                    },
                    address: "мкр. Шыгыс-1"
                  },
        oskemen: {
                    russianNameAndPhone: "Оскемен, Тел./факс: (7232) 23 02 40, 23 05 40",
                    coordinates: {
                              dolgota: "82.65831",
                              shirota: "49.998051"
                    },
                    address: "пр. Абая 193/1"
                  },
        semey:    {
                    russianNameAndPhone: "Семей, Тел: (7222) 33 46 06",
                    coordinates: {
                              dolgota: "80.165952",
                              shirota: "50.400457"
                    },
                    address: "ул. Би Боранбая 81"
                  },
        qyzqylorda:{
                    russianNameAndPhone: "Кызылорда, Тел/факс: (7242) 23 89 39, 23 89 16",
                    coordinates: {
                              dolgota: "65.529247",
                              shirota: "44.819458"
                    },
                    address: "ул. Женис 115"
                  },
        kostanay: {
                    russianNameAndPhone: "Костанай, Тел: (7142) 57 91 74, 57 91 28, 57 91 12",
                    coordinates: {
                              dolgota: "63.588694",
                              shirota: "53.243028"
                    },
                    address: "ул. Промышленная, б/н"
                  },
        kokshetaw:{
                    russianNameAndPhone: "Кошетау, Тел: (7162) 33 06 10,  33 37 44",
                    coordinates: {
                              dolgota: "69.416778",
                              shirota: "53.331819"
                    },
                    address: "Северная пром зона, проезд 10 №6"
                  },
        qaragandy:{
                    russianNameAndPhone: "Караганда, Тел: (7212) 77 00 55, 77 00 65, 77 20 10, 77 12 22",
                    coordinates: {
                              dolgota: "73.133168",
                              shirota: "49.779114"
                    },
                    address: "пр. Строителей, 33/2"
                  },
        astana:   {
                    russianNameAndPhone: "Астана, Тел: (7172) 28 97 73, 28 97 74",
                    coordinates: {
                              dolgota: "71.378659",
                              shirota: "51.17923"
                    },
                    address: "пр. Тлендиева, 3 А"
                  },
        aqtobe:   {
                    russianNameAndPhone: "Актобе, Тел: (7132) 56 75 80, 54 27 97",
                    coordinates: {
                              dolgota: "57.137865",
                              shirota: "50.294784"
                    },
                    address: "пр. Санкибай Батыра, 22"
                  },
        atyraw:   {
                    russianNameAndPhone: "Атырау, Тел: (7122) 36 05 30, 36 06 06",
                    coordinates: {
                              dolgota: "51.949804",
                              shirota: "47.130133"
                    },
                    address: "ул. Баймуханова, 55"
                  },
        pavlodar:   {
                    russianNameAndPhone: "Павлодар, Тел: (7182) 65 93 68, 65 94 77, 65 94 88",
                    coordinates: {
                              dolgota: "77.036177",
                              shirota: "52.293218"
                    },
                    address: "ул. Суворова, 81"
                  },
  pertropavlovsk: {
                    russianNameAndPhone: "Петропавловск, Тел/факс: (7152) 42 55 77, 42 55 88",
                    coordinates: {
                              dolgota: "69.154033",
                              shirota: "54.901387"
                    },
                    address: "ул. Жамбыла, 251"
                  },
    oral          :{
                    russianNameAndPhone: "Уральск, Тел: (7112) 23 35 36, 23 23 80",
                    coordinates: {
                              dolgota: "51.42064",
                              shirota: "51.243076"
                    },
                    address: "ул. Циолковского, 2/2."
                  }
    };



    for (var propName in cities)
    {
      if (propName == cityId)
      {
        console.log(cities[propName]);
        var cityToShow = cities[propName];
      }
    }

    $(".city-name-and-phone").text(cityToShow.russianNameAndPhone);

    // Создает экземпляр карты и привязывает его к созданному контейнеру
    var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
    var geoPoint = new YMaps.GeoPoint(cityToShow.coordinates.dolgota, cityToShow.coordinates.shirota);

    // Устанавливает начальные параметры отображения карты: центр карты и коэффициент масштабирования
    map.setCenter(geoPoint, 14);
    // Устанавливает балун и описание на карту
    map.openBalloon(geoPoint, cityToShow.address);
    // Разрешает зум прокруткой мыши
    map.enableScrollZoom();
  });
/* конец модальное окно */

});
