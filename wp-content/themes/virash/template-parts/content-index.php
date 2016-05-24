
<!--НАЧАЛО main section -->
<div id="carousel-example-generic" style="background-image: url(<?=get_field('slider_bg')?>)" class="carousel slide main-section" data-ride="carousel" data-interval="4000">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php $args = array( 'category_name'=> 'slider' ,'numberposts'=>100 , 'order'=>'ASC' );
		$categories=get_posts($args );
		foreach ($categories as $key=> $value) :
		?>
		<li data-target="#carousel-example-generic" data-slide-to="<?=$key?>" <?php if (!$key): ?> class="active"<?php endif; ?>></li>
		<?php endforeach; ?>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<?php foreach ($categories as $key => $value) : ?>
		<div class="item <?php if (!$key): ?>active<?php endif; ?>">
			<div class="carousel-content container">
				<div class="row">

					<div class="col-sm-6 animated bounceInDown">
						<?=get_field('left_text',$value->ID)?>
					</div>
					<div class="col-sm-6 animated bounceInRight">
						<?=get_field('right_text',$value->ID)?>
						<?php if (get_field('link',$value->ID)) : ?>
						<a  href="<?=get_permalink($value->ID)?>" class="btn btn-blue animated bounceInUp" type="button" name="button">Подробнее</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- КОНЕЦ main section -->

<!--НАЧАЛО articles on main -->
<!--<div class="articles-on-main container">
	<h2>Сегодня в автосалонах вираж</h2>
	<div id="carousel-articles" class="carousel slide" data-ride="carousel">
		<?php /*$args = array( 'category_name'=> 'slider' ,'numberposts'=>100 , 'order'=>'ASC' );
		$categories=get_posts($args );*/?>

		<ol class="carousel-indicators">
			<?php /*$col=1; $class='active'; foreach ($categories as $key=> $value) : if ($col==3): */?>
			<li data-target="#carousel-articles" data-slide-to="<?/*=$key*/?>" class="active"></li>
			<?php /*$col=1; $class=''; endif; $col++; endforeach; */?>
		</ol>-->




		<!-- Wrapper for slides -->
		<!--<div class="carousel-inner" role="listbox" data-interval="20000">
			<div class="item active">

				<img src="<?/*=bloginfo('template_directory')*/?>/public/img/index/articles-sample2.jpg" alt="Статья">
				<div class="carousel-caption">
					<div class="article-preview">
						<h4>Статья 1</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias
							aliquam aliquid ea facere facilis inventore.
						</p>
						<p><a href="#">Читать далее..</a></p>
					</div>
					<div class="article-preview visible-lg visible-md">
						<h4>Статья 2</h4>
						<p>Lorem ipsum dolor sit amet magnam minus mollitia omnis repellat sed veniam
							voluptatem.
						</p>
						<p><a href="#">Читать далее..</a></p>
					</div>
					<div class="article-preview visible-lg">
						<h4>Очень очень длинное название статьи, прямо-таки вредное.</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vagnam minus mollitia omnis repellat sed veniam
							voluptatem.
						</p>
						<p><a href="#">Читать далее..</a></p>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="<?/*=bloginfo('template_directory')*/?>/public/img/index/articles-sample.jpg" alt="Статья">
				<div class="carousel-caption">
					<div class="article-preview">
						<h4>Статья 1</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias
							aliquam aliquid ea facere facilis inventore.
						</p>
						<p><a href="#">Читать далее..</a></p>
					</div>
					<div class="article-preview visible-lg visible-md">
						<h4>Статья 2</h4>
						<p>Lorem ipsum dolor sit amet magnam minus mollitia omnis repellat sed veniam
							voluptatem.
						</p>
						<p><a href="#">Читать далее..</a></p>
					</div>
					<div class="article-preview visible-lg">
						<h4>Очень очень длинное название статьи, прямо-таки вредное.</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vagnam minus mollitia omnis repellat sed veniam
							voluptatem.
						</p>
						<p><a href="#">Читать далее..</a></p>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="<?/*=bloginfo('template_directory')*/?>/public/img/index/articles-sample3.jpg" alt="Статья">
				<div class="carousel-caption">
					<div class="article-preview">
						<h4>Статья 1</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias
							aliquam aliquid ea facere facilis inventore.
						</p>
						<p><a href="#">Читать далее..</a></p>
					</div>
					<div class="article-preview visible-lg visible-md">
						<h4>Статья 2</h4>
						<p>Lorem ipsum dolor sit amet magnam minus mollitia omnis repellat sed veniam
							voluptatem.
						</p>
						<p><a href="#">Читать далее..</a></p>
					</div>
					<div class="article-preview visible-lg">
						<h4>Очень очень длинное название статьи, прямо-таки вредное.</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vagnam minus mollitia omnis repellat sed veniam
							voluptatem.
						</p>
						<p><a href="#">Читать далее..</a></p>
					</div>
				</div>
			</div>
		</div>-->

		<!-- Controls -->
		<!--<a class="left carousel-control" href="#carousel-articles" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-articles" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>-->
<!--КОНЕЦ articles on main -->

<div class="news-on-main container hidden-sm">
	<h2 class="text-center">Сегодня в автосалонах вираж</h2>

	<div class="owl-carousel-news">
		<?php
		$args = array( 'category_name'=> 'news' ,'numberposts'=>100 , 'order'=>'ASC' );
		$categories=get_posts($args );
		foreach ($categories as $key=>$value) : ?>
			<div>
				<a href="<?=get_permalink($value->ID)?>">
					<img src="<?=get_the_post_thumbnail_url($value->ID);?>">
					<h4><?=$value->post_title?></h4>
					<p class="hidden-xs"><?=mb_substr(strip_tags($value->post_content),0,128)?>...</p>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>


<!--НАЧАЛО transport types -->
<div class="transport-types container">
	<h2 class="text-center">Каталог техники</h2>
	<div class="row car-gallery">

		<?php
		$homeProducts = get_products_cat_by_slug_parent('types_of_transport'); $first=$homeProducts[0];

		?>
		<style>
			.transport-types .type-list ul li.light-car<?=0?>::before {
				content: url('<?=get_field('icon','product_cat_'.$first->term_id)?>'); }
		</style>
		<div class="col-sm-7 picture-of-car">
			<div class="car-pic-container">
				<img src="<?=wp_get_attachment_url(get_woocommerce_term_meta( $first->term_id, 'thumbnail_id', true ));?>" class="img-responsive">
			</div>
			<div class="square"></div>  <!--синяя полурамка -->
		</div>

		<div class="col-sm-5 type-list">
			<h2>Виды транспорта</h2>
			<ul>
				<?php
				foreach ($homeProducts as $key=>$value): if($value->category_parent):;
				?>
					<style>
						.transport-types .type-list ul li.light-car<?=$key?>::before {
							content: url('<?=get_field('icon','product_cat_'.$value->term_id)?>'); }
					</style>
				<li   class="light-car<?=$key?>">
					<a href="<?=get_term_link($value->term_id)?>" data-img="<?=wp_get_attachment_url(get_woocommerce_term_meta( $value->term_id, 'thumbnail_id', true ));?>" class="zoom"><?=$value->name?></a>
				</li>
				<?php endif; endforeach; ?>
			</ul>
		</div>
	</div>
</div>
<!--КОНЕЦ transport types -->

<!--НАЧАЛО brands on main -->
<div class="brands-on-main container <!--hidden-xs-->">
	<h2 class="text-center">Бренды</h2>

	<div class="owl-carousel-brands">
		<?php 
		
		$homeProducts = get_products_cat_by_slug_parent('brands');
		foreach ($homeProducts as $key=>$value) : ?>
		<div>
			<a href="<?=get_term_link($value->term_id)?>"><img src="<?=wp_get_attachment_url(get_woocommerce_term_meta( $value->term_id, 'thumbnail_id', true ));?>"></a>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<!--КОНЕЦ brands on main -->

<!--НАЧАЛО филиалы (КАРТА) (дублируется с картой на странице контакты)-->
<h2 class="text-center">Сеть автосалонов Вираж</h2>
<?=get_field('map');?>
<!--КОНЕЦ филиалы (КАРТА) (дублируется с картой на странице контакты)-->

