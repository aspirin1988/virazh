<!--НАЧАЛО main section -->
<div id="carousel-example-generic" class="carousel slide main-section" data-ride="carousel" data-interval="4000">
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
<div class="articles-on-main container">
	<h2>Сегодня в автосалонах вираж</h2>
	<div class="row">
		<div class="square"></div>  <!--синяя полурамка -->
		<?php
		$args = array( 'category_name'=> 'news' ,'numberposts'=>5 , 'order'=>'ASC' );
		$categories=get_posts($args );
		foreach ($categories as $key=> $value) :
		?>
		<div class="col-sm-<?php if ($key==3): ?>8<?php else :?>4<?php endif; ?> article">
			<a href="<?=get_permalink($value->ID)?>">
				<img src="<?=get_the_post_thumbnail_url($value->ID)?>">
				<h3><?=$value->post_title?></h3>
			</a>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<!--КОНЕЦ articles on main -->

<!--НАЧАЛО transport types -->
<div class="transport-types container">
	<h2 class="text-center">Каталог техники</h2>
	<div class="row car-gallery">

		<?php
		$homeProducts = get_products_cat_by_slug_parent('types_of_transport'); $first=$homeProducts[0]; ?>
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
<div class="brands-on-main container hidden-xs">
	<h2 class="text-center">Бренды</h2>

	<div class="owl-carousel">
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

<?php
function get_product_cat_bu_slug ($slug){
	$args = array(
		'child_of'     => 0,
		'parent'       => 0,
		'orderby'      => 'id',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'exclude'      => '',
		'include'      => '',
		'number'       => 0,
		'taxonomy'     => 'product_cat',
		'pad_counts'   => false,
		// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
	);
	$homeProducts = get_categories( $args );
	foreach ($homeProducts as  $value)
	{
		if ($value->slug==$slug)
		{
			return $value;
		}
	}
	return array();
}

function get_products_cat_by_slug_parent($slug){
	$parent=get_product_cat_bu_slug($slug);
	$args = array(
		'child_of'     => 0,
		'parent'       => $parent->term_id,
		'orderby'      => 'id',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'exclude'      => '',
		'include'      => '',
		'number'       => 0,
		'taxonomy'     => 'product_cat',
		'pad_counts'   => false,
		// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
	);

	return get_categories( $args );
}