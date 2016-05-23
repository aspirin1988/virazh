$(document).ready(function () {

  /* НАЧАЛО код для реализации sticky-навбара */
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
  /* КОНЕЦ код для реализации sticky-навбара */

  /* НАЧАЛО вывод карты и соотв. инфы в модалку */
  $("[data-map]").click(function () {
    var ThisElement = $(this);
    console.log(ThisElement.data('map'));
    $('#' + ThisElement.data('map')).on('shown.bs.modal', function () {
      $("#map").empty();
      var position = ThisElement.data('position').split(',');
      console.log(position);
      var myMap = new ymaps.Map("map", {
          center: [position[1], position[0]],
          zoom: 16
        }),
        myGeoObject = new ymaps.GeoObject({
          geometry: {
            type: "Point",
            coordinates: [position[1], position[0]]
          }
        });
      var balloon = new ymaps.Balloon(myMap);
      myMap.geoObjects.add(myGeoObject);
      $(".city-name-and-phone").text(ThisElement.data('name'));
    }).modal();
    return false;
  });
  /* КОНЕЦ вывод карты и соотв. инфы в модалку */

  /* НАЧАЛО код для переключения картинок в разделе Виды транспорта на Главной стр. */

  //проверяем, есть ли элементы с .car-gallery на странцие, и только тогда запускаем код
  var isItClass = document.getElementsByClassName('car-gallery');

  if (isItClass.length > 0) {
    var gallery = document.getElementsByClassName('car-gallery')[0],
      galleryAnchor = gallery.getElementsByClassName('zoom'),
      mainImg = gallery.getElementsByClassName('car-pic-container')[0].children,
      mainImgContainer = gallery.getElementsByClassName('car-pic-container')[0],

      mainImgDecorationBorder = gallery.getElementsByClassName('picture-of-car')[0].children,
      mainImgDecorationBorderContainer = gallery.getElementsByClassName('picture-of-car')[0];

    for (var i = 0; i < galleryAnchor.length; i++) {
      galleryAnchor[i].addEventListener('mouseover', function (event) {// вешаем событие на mouseover

        mainImg[0].classList.add("animated", "zoomIn"); // сама картинка
        mainImgDecorationBorder[1].classList.add("animated", "zoomIn"); // декоративня рамка

        mainImg[0].remove(); // удаляем картинку
        mainImgDecorationBorder[1].remove(); // удаляем декор. рамку

        // Создаём новую картинку с соотв-щим src и классами
        var newImg = document.createElement("img");
        newImg.src = this.getAttribute("data-img");
        newImg.classList.add("img-responsive", "animated", "fadeInLeft");

        //создаём анимированную декор. рамку
        var borderWithClass = document.createElement("div");
        borderWithClass.classList.add("square", "animated", "zoomIn");

        // Вставляем картинку
        mainImgContainer.appendChild(newImg);

        //Вставляем рамку
        mainImgDecorationBorderContainer.appendChild(borderWithClass);

      });
    }
  }
  /* КОНЕЦ код для переключения картинок в разделе Виды транспорта на Главной стр. */


  /* НАЧАЛО код для переключения картинок в разделе ОДИНОЧНО ТОВАРА */

  //проверяем, есть ли элементы с .car-gallery на странцие, и только тогда запускаем код
  var isItProductMain = document.getElementsByClassName('single-product');

  if (isItProductMain.length > 0) {
    var previewGallery = document.getElementsByClassName('single-product')[0],
      previewGalleryAnchor = previewGallery.getElementsByClassName('thumb'),
      previewMainImg = previewGallery.getElementsByClassName('product-main-photo')[0].children,
      previewMainImgContainer = previewGallery.getElementsByClassName('product-main-photo')[0];

    for (var i = 0; i < previewGalleryAnchor.length; i++) {
      previewGalleryAnchor[i].addEventListener('click', function (event) {// вешаем событие на click
        event.preventDefault();

        previewMainImg[0].remove(); // удаляем картинку

        // Создаём новую картинку с соотв-щим src и классами
        var newImg = document.createElement("img");
        newImg.src = this.getAttribute("data-img");
        newImg.classList.add("img-responsive");

        // Вставляем картинку

        previewMainImgContainer.insertBefore(newImg, previewMainImgContainer.firstChild);

      });
    }
  }
  /* КОНЕЦ код для переключения картинок в разделе ОДИНОЧНО ТОВАРА */


  /* НАЧАЛО параметры для карусели Owl-carousel брендов на Главной стр. */
  var count=0;
  if (screen.width<=435) {
    count = Math.round((screen.width / 100));
  }
  else
  {
    count = Math.round((screen.width / 200));
  }
  console.info(count);
  $(".owl-carousel-brands").owlCarousel({
    items: count,
    margin: 30,
    loop: true,
    dotsEach: true,
    nav: true,
    navText: [
        "<img src='../wp-content/themes/virash/public/img/index/carousel-left-arrow.png'>",
        "<img src='../wp-content/themes/virash/public/img/index/carousel-right-arrow.png'>"
    ]
  });
  /* КОНЕЦ параметры для карусели Owl-carousel брендов на Главной стр. */

  /* НАЧАЛО параметры для карусели Owl-carousel новостей на Главной стр. */
  $(".owl-carousel-news").owlCarousel({
    items: 2,
    margin: 30,
    loop: true,
    dotsEach: true,
    nav: true,
    navText: [
      "<img src='../wp-content/themes/virash/public/img/index/carousel-left-arrow.png'>",
      "<img src='../wp-content/themes/virash/public/img/index/carousel-right-arrow.png'>"
    ]
  });
  /* КОНЕЦ параметры для карусели Owl-carousel новостей на Главной стр. */

  /* НАЧАЛО параметры для карусели Owl-carousel фото товаров */
  $(".owl-carousel-products").owlCarousel({
    items: 4,
    dots: $(".owl-carousel img").length < 5 ? false : true,
    margin: 5

    /*nav: true, //стрелки прокрутки, Илья сказал, что они не нужны, на всякий случай оставил.
    navText: [
      "<img src='../../wp-content/themes/virash/public/img/index/carousel-left-arrow.png'>",
      "<img src='../../wp-content/themes/virash/public/img/index/carousel-right-arrow.png'>"
    ]*/
  });

  /* КОНЕЦ параметры для карусели Owl-carousel  фото товаров */


  //НАЧАЛО добавление класса img-responsive ко всем
  // img в табах единичного товара
  var isItTabs = document.getElementsByClassName('single-product-tabs');
  if (isItTabs.length > 0) {
    var images = isItTabs[0].getElementsByTagName('img');

    for (var x = 0; x < images.length; ++x) {
      images[x].classList.add('img-responsive');
    }
  }
  //КОНЕЦ добавление класса img-responsive ко всем
  // img в табах единичного товара

  //НАЧАЛО применяем модификатор .price-gen-if-promotion к цене без скидки,
  //если есть скидка.
  var prices = document.getElementsByClassName('prices');
  if (prices.length > 0) {
    var priceGen = prices[0].getElementsByClassName('price-gen'),
    pricePromotion = prices[0].getElementsByClassName('price-promotion');

    if (pricePromotion.length > 0) {
      priceGen[0].classList.add('price-gen-if-promotion');
    }
  }
  //КОНЕЦ применяем модификатор .price-gen-if-promotion к цене без скидки,
  //если есть скидка.
  $('#otherArticles').css('height', $('#articleContent').height()+'px');
  

  $('.collapse')
    .on('shown.bs.collapse', function() {
     $("[data-target='#" + $(this).attr("id") + "']").find("span")
        .removeClass("glyphicon-plus")
        .addClass("glyphicon-minus");
    })
    .on('hidden.bs.collapse', function(e) {

      $("[data-target='#" + $(this).attr("id") + "']").find("span")
        .removeClass("glyphicon-minus")
        .addClass("glyphicon-plus");

      e.stopPropagation();
    });

});