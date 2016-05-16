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
  console.log(isItProductMain.length);

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
  $(".owl-carousel").owlCarousel({
    items: 7,
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