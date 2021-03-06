</div><!--КОНЕЦ .content - общий див для контента ниже хедера и выше футера для sticky-navbar'a -->

<!--НАЧАЛО preloader-->

<!--КОНЕЦ preloader-->

<footer>
	<div class="container">
		<div class="row">
			<?php $menu=wp_get_nav_menu_items('footer'); /*print_r($menu);*/ $title=get_post();/* print_r($menu);*/
			foreach ($menu as $key=>$val) : if ($val->menu_item_parent==0):?>
			<div class="col-md-2 col-sm-6 hidden-xs">
				<h4><a href="<?=$val->url?>"><?=$val->title?></a></h4>
				<ul>
					<?php foreach ($menu as $key1=>$val1) : if ($val->ID==$val1->menu_item_parent):?>
					<li><a href="<?=$val1->url?>"><?=$val1->title?></a></li>
					<?php endif; endforeach; ?>
				</ul>
			</div>
			<?php endif; endforeach; ?>
			<div class="col-md-2 col-sm-6 hidden-xs">
			</div>
			<h4 class="text-uppercase footer-h4">Автосалоны Вираж</h4>

			<div class="col-md-2 col-sm-6">
				<p>Адрес:</p>
				<a ><?=get_field('address',4)?></a><br>
				<br>
				<p>Телефон <br> Клиентской службы:</p>
				<a href="tel:<?=get_field('phone2',4)?>"><?=get_field('phone2',4)?></a>
				<div class="social-icons">
					<a href="<?=get_field('vk',4)?>"><img src="<?=bloginfo('template_directory')?>/public/img/icon-vk.png"></a>
					<a href="<?=get_field('fb',4)?>"><img src="<?=bloginfo('template_directory')?>/public/img/icon-fb.png"></a>
					<a href="<?=get_field('tw',4)?>"><img src="<?=bloginfo('template_directory')?>/public/img/icon-twitter.png"></a>
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
<div class="bubble_info">
	<a href="" style="position: absolute; right: 6px;" onclick="$('.bubble_info').hide()" >
		<i class="glyphicon glyphicon-remove-circle"></i>
	</a>
	<br>
	<p></p>
</div>
<?php
$pre='<div class="preloader"><img src="'.get_bloginfo('template_directory').'/public/img/preloader.gif" alt="Loading"></div>';
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php bloginfo('template_directory') ?>/public/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/public/js/owl.carousel.min.js"></script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory') ?>/public/js/scripts.js"></script>
<script>


	function submitform()
	{
		if (screen.width<1024) {
			$('.filter').hide(200);
		}
		$('.products-list .row').html('<div class="preloader"><h2>Фильтрация данных</h2><img src="http://virazh.blink.kz/wp-content/themes/virash/public/img/preloader.gif" alt="Loading"></div><br><br><br><br><br><br><br><br><br><br>');


		$('.preloader').css('display','flex');
		setTimeout(function () {
			$('#form_filter').submit();
		},1000);


	}


	function clearfilter(){
		$('#form_filter').find("input[type=checkbox]").prop('checked', false);
		$('#form_filter').submit();
	}

	function filter_open() {
		var e=$('.filter');
		var attr=e.attr('style');
		if (!attr) {attr='display: '+e.css('display');}
			attr = attr.split(';');
			console.log(attr);
			$.each(attr, function (key, val) {
				val = val.split(': ');

				if (val[0] == 'display') {
					console.log(val);
					var el = $('.products-list');
					if (val[1]!='none') {
						el.removeClass('col-sm-9');
						el.addClass('col-sm-12');
					}
					else
					{
						el.addClass('col-sm-9');
						el.removeClass('col-sm-12');
					}

				}
			});
		e.toggle(200);



	}

</script>
<script type="text/javascript" src="//callback.blink.kz/client/script/GET/"></script>
<script src="https://callback.blink.kz/resources/callback/js/mailer.js" ></script>
<script>
	var submitSMG = new BMModule();
	submitSMG.submitForm(function(success) { $('.blink-mailer input[type=submit]').val('Отправить'); $('.success-mail-text').html(success); $('.blink-mailer').hide(500);  $('.success-mail-text').show(500);  }, function(error) {});
</script>
<style>

	div.bubble_info
	{
		left: 200px;
		display: none;
		position: absolute;
		width: auto;
		max-width: 33%;
		height: auto;
		z-index: 99999;
		padding: 3px;
		background: #FFFFFF;
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
		border: rgba(0,0,0,.5) solid 1px;
		box-shadow: 0 15px 24px rgba(0,0,0,0.5);
	}

	div.bubble_info:after
	{

		content: '';
		position: absolute;
		border-style: solid;
		border-width: 15px 15px 0;
		border-color: #ffffff transparent;
		display: none;
		width: 0;
		z-index: 0;
		bottom: -14px;
		left: 25px;
	}

	div.bubble_info:before
	{
		content: '';
		position: absolute;
		border-style: solid;
		border-width: 15px 15px 0;
		border-color: white transparent;
		display:  block;
		width: 0;
		z-index: 0;
		bottom: -14px;
		left: 25px;
	}
</style>
<?=get_field('google',4)?>
<?=get_field('yandex',4)?>
<?php wp_footer() ?>
</body>
</html>