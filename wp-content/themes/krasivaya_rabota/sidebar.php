<?php
$current_cats = get_the_category();
$current_cats=$current_cats[0];
$current_post = get_post();
$args = array( 'cat'=> $current_cats->term_id ,'numberposts'=>20 , 'order'=>'ASC' );

$posts=get_posts($args);/* print_r($posts);*/
if(!get_the_content()){$post=$posts[0];}
$categories=get_category_by_slug('service');
//print_r(get_category_by_slug('service'));
$args = array(
	'ID'=> 'term_id',
	'type'         => 'post',
	'child_of'     => 0,
	'parent'       => $categories->term_id,
	'orderby'      => 'name',
	'order'        => 'ASC',
	'hide_empty'   => 1,
	'hierarchical' => 1,
	'exclude'      => '',
	'include'      => '',
	'number'       => 0,
	'taxonomy'     => 'category',
	'pad_counts'   => false,
	// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
);
$categories = get_categories( $args );
//print_r($categories)
?>
<!--начало АККОРДЕОН И ТЕКСТ-->
<div class="container accordion-and-text">
	<div class="row">
		<div class="col-sm-4">
			<!--начало Акконрдеон -->
			<div class="panel-group" id="accordion">
				<?php foreach ($categories as $key => $value ): ?>
					<div class="panel panel-default">
						<div data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key?>" class="panel-heading">
							<h4 class="panel-title">
								<?=$value->name?>
							</h4>
						</div>
						<div id="collapse<?=$key?>" class="<?php if($current_cats->term_id==$value->term_id) : ?>panel-collapse collapse in<?php else: ?>panel-collapse collapse<?php endif; ?>">
							<div class="panel-body">
								<ul>
									<?php
									$active=0;
									if (!get_the_content()){$active=$post->ID;} else {$active=get_the_ID();}
									$args = array( 'cat'=> $value->term_id ,'numberposts'=>20 , 'order'=>'ASC' );
									$posts=get_posts($args);/* print_r($posts);*/
									foreach ($posts as $value1 ){ ?>
										<li<?php if ($active==$value1->ID) : ?> class="active"<?php endif; ?> ><a href="<?=get_permalink($value1->ID)?>"><?php echo $value1->post_title;?></a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<!--конец Акконрдеон -->
		</div>
		<div class="col-sm-8 text-center ">
			<h3 class="text-right text-uppercase"><?=get_the_title()?></h3>
			<img src="<?=get_the_post_thumbnail_url() ?>" >
			<p><?php if(!get_the_content()){echo $post->post_content; $current_post=$post;} else{ echo get_the_content();}?></p>
		</div>
	</div>
</div>
<!--конец АККОРДЕОН И ТЕКСТ-->

<!--начало ФОТО ДО И ПОСЛЕ-->
<div class="container before-after">
	<h3 class="text-right text-uppercase">Фото до и после</h3>
	<div class="row text-center">
		<?php foreach(pp_gallery_get(get_the_ID()) as $value):/* print_r($value);*/ ?>
		<div class="col-sm-6 col-md-3 item">
			<a href="#" data-toggle="modal" data-target="#beforeAndAfterGallery"><img src="<?=$value->url?>" class="img-responsive"></a>
		</div>
		<?php endforeach; ?>

	</div>
</div>
<!--конец ФОТО ДО И ПОСЛЕ-->

<!-- начало ЗАКАЗАТЬ УСЛУГУ -->
<div class="service-request on-services">
	<div class="container">
		<form class="row blink-mailer">
			<h4>Пожалуйста, заполните форму</h4>
			<div class="col-sm-6 col">
				<input type="text" style="display: none;" name="title" value="Запись на приём">
				<div class="form-group">
					<label for="fullName">Представьтесь</label>
					<input name="Имя" type="text" class="form-control" id="fullName" placeholder="Имя">
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
					<label for="date">Выберите желаемую дату посещения</label>
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
<!-- конец ЗАКАЗАТЬ УСЛУГУ -->

<!-- начало MODAL WINDOW BEFORE-AND-AFTER-GALLERY -->
<div id="beforeAndAfterGallery" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content before-and-after-modal">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<img src="" class="img-responsive img-rounded">
			</div>
		</div>

	</div>
</div>
<!-- конец MODAL WINDOW BEFORE-AND-AFTER-GALLERY -->
