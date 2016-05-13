<!--начало ГЛАВНЫЙ БАННЕР-->
<div class="banner-main">
	<div class="container">
		<?php the_field('slug',4) ?>
	</div>
</div>
<!--начало ГЛАВНЫЙ БАННЕР-->

<!--начало ВИДЫ УСЛУГ-->
<div class="container services-on-main">
	<div class="row">
		<?php $main=explode(',',get_field('main-service',4)); foreach ($main as $value) : $post=get_post($value) ?>
		<div class="col-sm-6 col-md-3">
			<a href="<?=get_permalink($post->ID)?>">
			<img src="<?=get_the_post_thumbnail_url($post->ID)?>" alt="<?=$post->post_title?>">
			<h4><?=$post->post_title?></h4>
			<p><?=mb_substr($post->post_content,0,55)?>...</p>
			</a>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<!--конец ВИДЫ УСЛУГ-->

<!-- начало АНТИВОЗРАСТНАЯ КОСМЕТОЛОГИЯ-->
<?php
$args = array( 'category_name'=> 'anti_aging_cosmetology' ,'numberposts'=>4 , 'order'=>'ASC' );
$categories=get_posts($args);
//print_r($categories);
?>

<div class="anti-age-cosmetology">
	<div class="container">
		<div class="anti-age-cosmetology__heading">
			<figure></figure>
			<h2>Антивозрастная косметология</h2>
			<figure></figure>
		</div>

		<div class="row">
			<?php foreach ($categories as $value): ?>
			<div class="col-md-6 anti-age-cosmetology__section">
				<div class="row">
					<div class="col-sm-7">
						<img src="<?=get_the_post_thumbnail_url($value->ID)?>" alt="">
					</div>
					<div class="col-sm-5 summary">
						<a href="<?=get_permalink($value->ID)?>"><?=$value->post_title?></a>
						<p><?=mb_substr($value->post_content,0,128).'...'?></p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<!-- конец АНТИВОЗРАСТНАЯ КОСМЕТОЛОГИЯ-->

<!--начало НЕМНОГО О КРАСИВОЙ РАБОТЕ-->
<div class="container about-on-main">
	<h3><a href="<?=get_permalink(15)?>">НЕМНОГО О «КРАСИВОЙ РАБОТЕ»</a></h3>
	<img class="img-responsive" src="<?=get_the_post_thumbnail_url(15)?>" alt="Доктор">
	<div class="text-block clearfix">
		<p><?php $post=get_post(15); echo mb_substr($post->post_content,0,512).'...'?></p>
		Читать далее</a>
	</div>
</div>
<!--конец НЕМНОГО О КРАСИВОЙ РАБОТЕ-->