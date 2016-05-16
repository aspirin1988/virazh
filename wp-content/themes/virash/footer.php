</div><!--КОНЕЦ .content - общий див для контента ниже хедера и выше футера для sticky-navbar'a -->

<footer>
	<div class="container">
		<h4 class="text-uppercase">Автосалоны Вираж</h4>
		<div class="row">
			<div class="col-md-2 col-sm-6 hidden-xs">
				<h4><a href="#">Текст</a></h4>
				<ul>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
				</ul>
			</div>
			<div class="col-md-2 col-sm-6 hidden-xs">
				<h4><a href="#">Текст</a></h4>
				<ul>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
				</ul>
			</div>
			<div class="col-md-2 col-sm-6 hidden-xs">
				<h4><a href="#">Текст</a></h4>
				<ul>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
				</ul>
			</div>
			<div class="col-md-2 col-sm-6 hidden-xs">
				<h4><a href="#">Текст</a></h4>
				<ul>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
				</ul>
			</div>
			<div class="col-md-2 col-sm-6 hidden-xs">
				<h4><a href="#">Текст</a></h4>
				<ul>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
					<li><a href="#">Текст</a></li>
				</ul>
			</div>
			<div class="col-md-2 col-sm-6">
				<p>Адрес:</p>
				<a ><?=get_field('address',4)?></a><br>
				<br>
				<p>Телефон <br> Клиентской службы:</p>
				<a href="tel:<?=get_field('phone2')?>"><?=get_field('phone2')?></a>
				<div class="social-icons">
					<a href="<?=get_field('vk')?>"><img src="<?=bloginfo('template_directory')?>/public/img/icon-vk.png"></a>
					<a href="<?=get_field('fb')?>"><img src="<?=bloginfo('template_directory')?>/public/img/icon-fb.png"></a>
					<a href="<?=get_field('tw')?>"><img src="<?=bloginfo('template_directory')?>/public/img/icon-twitter.png"></a>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- НАЧАЛО Modal для карт яндекса -->
<div id="mapModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Город <span class="city-name-and-phone"></span></h4>
			</div>
			<!--id="map" задаётся для дива яндекс-карт-->
			<div id="map" class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn" data-dismiss="modal">Закрыть</button>
			</div>
		</div>

	</div>
</div>
<!-- КОНЕЦ Modal для карт яндекса -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php bloginfo('template_directory') ?>/public/js/jquery-2.2.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php bloginfo('template_directory') ?>/public/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/public/js/owl.carousel.min.js"></script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory') ?>/public/js/scripts.js"></script>
</body>
</html>