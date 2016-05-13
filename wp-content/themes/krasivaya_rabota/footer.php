
<!--начало FOOTER-->
<div class="footer-wrapper">
	<?php $args = array( 'category_name'=> 'service' ,'numberposts'=>20 , 'order'=>'ASC' );
	$column=4;
	$categories=get_posts($args);
	$row=round(count($categories)/$column);
	/*print_r($categories);*/?>
	<footer class="container">
		<div class="row">
			<h3>Услуги:</h3>
			<?php $col=0; foreach($categories as $key => $value): ?>
			<?php if (!$col) : ?>
			<div class="col-lg-2 col-md-4 col-sm-6">
				<ul>
			<?php endif; ?>
					<li><a href="<?=get_permalink($value->ID)?>"><?=$value->post_title?></a></li>
			<?php $col++;  if ($col==$row||$key==count($categories)-1) : $col=0; ?>
				</ul>
			</div>
				<?php endif; ?>
			<?php endforeach;
			?>
			<!--<div class="col-lg-2 col-md-4 col-sm-6">
			</div>-->
<!--			<div class="col-lg-2 col-md-4 col-sm-6">
				<ul>
					<li><a href="#">Лазерная эпиляция</a></li>
					<li><a href="#">Мезотерапия</a></li>
					<li><a href="#">Биоревитализация</a></li>
					<li><a href="#">Фотоомоложение</a></li>
					<li><a href="#">Лазерная шлифовка</a></li>
				</ul>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-6">
				<ul>
					<li><a href="#">Плазмолифтинг</a></li>
					<li><a href="#">RF лифтинг</a></li>
					<li><a href="#">Ботокс</a></li>
					<li><a href="#">Диспорт</a></li>
					<li><a href="#">Botulax</a></li>
				</ul>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-6">
				<ul>
					<li><a href="#">Лечение целлюлита</a></li>
					<li><a href="#">Растяжки</a></li>
					<li><a href="#">Удаление шрамов</a></li>
					<li><a href="#">Удаление татуажа</a></li>
					<li><a href="#">Удаление татуировки</a></li>
					<li><a href="#">Подтяжка нитями</a></li>
				</ul>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-6">
			</div>-->
			<div class="col-lg-2 col-md-4 col-sm-6 address">
				<h3>Адрес:</h3>
				<p><a href="#"><?=get_field('address',4) ?></a></p>
				<?php if (!is_category()) :?>
				<button class="btn-company-style" data-toggle="modal" data-target="#serviceRequest">записаться на приём</button>
				<?php endif;
				?>
		</div>
	</footer>
</div>
<!--конец FOOTER-->

<!-- начало MODAL WINDOW -->
<div id="serviceRequest" class="modal fade modal-service-request" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body service-request">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Запись на прием в центр эстетической медицины <br>
					«Красивая работа»</h4>
				<form class="row blink-mailer">
					<h4>Пожалуйста, заполните форму</h4>
					<div class="col-sm-6 col">
						<input type="text" style="display: none;" name="title" value="Запись на приём">
						<div class="form-group">
							<label for="fullName">Представьтесь</label>
							<input name="Имя" type="text" class="form-control" id="fullName" placeholder="имя">
						</div>
						<div class="form-group">
							<label for="phoneNumber">Номер телефона, по котому с Вами можно связаться</label>
							<input name="Телефон" type="tel" class="form-control" id="phoneNumber" placeholder="телефон">
						</div>
						<div class="form-group">
							<label for="emailAddress">Введите адрес электронной почты</label>
							<input name="email" type="email" class="form-control" id="emailAddress" placeholder="e-mail">
						</div>
					</div>
					<div class="col-sm-6 col">
						<div class="form-group">
							<label for="serviceType">Укажите процедуру на которую хотите записаться</label>
							<select name="Процедура" type="text" class="form-control" id="serviceType"
									placeholder="название процедуры">
								<?php  $args = array( 'category_name'=> 'service' ,'numberposts'=>20 , 'order'=>'ASC' );
								$categories=get_posts($args);
								foreach($categories as $value): ?>
									<option <?php if ($current_post->ID==$value->ID){ echo 'selected="selected"';}?> value="<?=$value->post_title?>" ><?=$value->post_title?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="date">Выберите  желаемую дату посещения</label>
							<input name="Дата" type="date" class="form-control" id="date" placeholder="дата">
						</div>
						<div class="form-group">
							<label for="time">Выберите время посещения</label>
							<input name="Время" type="time" class="form-control" id="time" placeholder="Время">
						</div>
					</div>
					<div class="col-lg-12 col">
						<input type="submit" class="btn-company-style" value="Отправить">
						<p>дата и время посещения центра будут <br>
							дополнительно обговариваться по телефону.</p>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
<!-- конец MODAL WINDOW -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php bloginfo('template_directory') ?>/public/js/bootstrap.min.js"></script>
<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/public/js/jquery.smartmenus.js"></script>
<!-- SmartMenus jQuery Bootstrap Addon -->
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/public/js/jquery.smartmenus.bootstrap.js"></script>
<script src="https://callback.blink.kz/resources/callback/js/mailer.js"></script>
<script>
	var submitSMG = new BMModule();
	submitSMG.submitForm(function(success) { $('.blink-mailer input[type=submit]').val('Отправить'); }, function(error) {});
</script>
<script>
	$('.container.before-after a').click(function(){
		var src = $(this).find('img').attr('src');
		$('#beforeAndAfterGallery img').attr('src',src);
	});
</script>
</body>
</html>