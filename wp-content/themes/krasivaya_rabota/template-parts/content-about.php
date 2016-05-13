<!--начало НЕМНОГО О КРАСИВОЙ РАБОТЕ-->
<div class="container about-header">
	<h3>НЕМНОГО О «КРАСИВОЙ РАБОТЕ»</h3>
</div>
<div class="about-on-about">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<img class="img-responsive" src="<?=get_the_post_thumbnail_url()?>" alt="Доктор">
			</div>
			<div class="col-sm-8">
				<p><?=get_the_content()?></p>
			</div>
		</div>
	</div>
</div>
<!--конец НЕМНОГО О КРАСИВОЙ РАБОТЕ-->

<!--начало ВИДЕО О НАС-->
<div class="video-section">
	<div class="container">
		<h3>ПОСМОТРИТЕ ВИДЕО О НАС</h3>
		<div class="video-wrapper">
			<div class='embed-container'>
				<iframe src='<?=get_field('video')?>' frameborder='0' allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
<!--конец ВИДЕО О НАС-->

<!--начало ОБОРУДОВАНИЕ-->
<div class="container equipment">
	<h3 class="text-right">НАШЕ ОБОРУДОВАНИЕ</h3>
<?php
$args = array( 'category_name'=> 'our_equipment' ,'numberposts'=>4 , 'order'=>'ASC' );
$categories=get_posts($args);?>
	<div class="row">
		<?php foreach ($categories as $value): ?>
		<div class="col-sm-6 col-md-3">
			<img class="img-responsive" src="<?=get_the_post_thumbnail_url($value->ID)?>">
			<h4><?=$value->post_title?></h4>
			<p><?=$value->post_content?></p>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<!--конец ОБОРУДОВАНИЕ-->