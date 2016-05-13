<!--начало ГЛАВНЫЙ БАННЕР-->
<div class="banner-main">
	<div class="container">
		<?php the_field('slug',4) ?>
	</div>
</div>
<!--начало ГЛАВНЫЙ БАННЕР-->

<!--начало КОНТАКТЫ ТЕКСТ-->
<div class="container text-section">
	<h3 class="text-uppercase">Контакты:</h3>
	<p class="contacts"><?=get_field('full_name')?> <br>
		Телефоны: <a href="tel:<?=get_field('phone1',4)?>"><?=get_field('phone1',4)?></a>, <a href="tel:<?=get_field('phone2',4)?>"><?=get_field('phone2',4)?></a> <br>
		E-mail: <a href="mailto:dubininds@mail.ru">dubininds@mail.ru</a>
	</p>
	<h3 class="text-uppercase">Адрес:</h3>
	<p class="address">
		<?=get_field('address',4)?>
	</p>

</div>
<!--конец КОНТАКТЫ ТЕКСТ -->

<!--начало КАРТА -->
<h3 class="text-uppercase text-center">Мы на карте:</h3>
<div class="map-wrapper">
	<?php the_field('map');?>
</div>
<!--конец КАРТА -->