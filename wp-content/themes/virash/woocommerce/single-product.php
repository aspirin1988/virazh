<?php get_header() ?>
<?php while ( have_posts() ) : the_post();
	global $post, $product, $woocommerce;
	$images=$product->get_gallery_attachment_ids();
//	print_r($product->get_gallery_attachment_ids());
	?>

<!-- НАЧАЛО заголовок с декор-рамкой-->
<div class="container text-center">
	<div class="title-square-container">
		<h1><?=get_the_title()?></h1>
		<div class="title-square"></div>
	</div>
</div>
<!-- КОНЕЦ заголовок с декор-рамкой-->

<!-- НАЧАЛО одиночный товар-->
<div class="container single-product">
	<div class="row">
		<div class="col-md-7 preview-col">
			<div class="product-main-photo">
				<img class="img-responsive" src="<?=get_the_post_thumbnail_url()?>">
			</div>
			<div class="product-thumbs">
				<div class="owl-carousel owl-carousel-products">
					<?php foreach ($images as $key=>$value):?>
						<div class="thumb-container">
							<a href="#" data-img="<?=wp_get_attachment_image_url($value,'full') ?>" class="thumb">
								<img class="img-responsive" src="<?=wp_get_attachment_image_url($value,'full') ?>">
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="col-md-5 summary-col">
			<p class="prices">
				<?php $price=get_metadata('post', get_the_ID(), '_regular_price', true); if($price): ?>
				Цена: <span class="price-gen"><?=get_metadata('post', get_the_ID(), '_regular_price', true);?></span> тг. <br>
				<?php $price_sale=get_metadata('post', get_the_ID(), '_sale_price', true); if($price_sale): ?>
				Цена со скидкой: <span class="price-promotion"><?=$price_sale?></span> тг.

				<?php endif; endif; ?>
			</p>
			<p>

				<?=get_the_excerpt()?>

			</p>
		</div>
	</div>
</div>
<!-- КОНЕЦ одиночный товар-->

<!--НАЧАЛО табы и содержимое-->
<div class="container single-product-tabs">
	<div class="row">
		<ul class="nav tabs">
			<li class="active"><a data-toggle="tab" href="#menu0">Описание</a></li>
			<li><a data-toggle="tab" href="#menu1">Характеристики</a></li>
			<?php if (get_field('tab-1')): ?>
				<li><a data-toggle="tab" href="#menu2"><?=get_field('tab-1-name')?></a></li>
			<?php endif; ?>
			<?php if (get_field('tab-2')): ?>
				<li><a data-toggle="tab" href="#menu3"><?=get_field('tab-2-name')?></a></li>
			<?php endif; ?>
			<?php if (get_field('tab-3')): ?>
				<li><a data-toggle="tab" href="#menu3"><?=get_field('tab-3-name')?></a></li>
			<?php endif; ?>
		</ul>
		<div class="tab-content">
			<div id="menu0" class="tab-pane fade in active">
				<?=get_the_content()?>
			</div>
			<div id="menu1" class="tab-pane fade">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>Параметр</th>
						<th>Значение</th>
					</tr>
					</thead>
					<tbody>
					<?php $attributes = $product->get_attributes();
					foreach ($attributes as $attribute):
						?>
						<tr>
							<td><?= wc_attribute_label($attribute['name']) ?>:</td>
							<td><?= $product->get_attribute($attribute['name']) ?></td>
						</tr>
					<?php endforeach;
					?>
					</tbody>
				</table>
			</div>
			<?php if (get_field('tab-1')): ?>
			<div id="menu2" class="tab-pane fade">
				<?= get_field('tab-1');
				endif; ?>
			</div>
			<?php if (get_field('tab-2')): ?>
			<div id="menu3" class="tab-pane fade">
				<?= get_field('tab-2');
				endif; ?>
				<?php if (get_field('tab-3')): ?>
			<div id="menu4" class="tab-pane fade">
				<?= get_field('tab-3');
				endif; ?>
			</div>
		</div>
	</div>
</div>
<!--КОНЕЦ табы и содержимое-->
<?php endwhile; // end of the loop. ?>


<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
/*
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//get_header( 'shop' ); ?>
	123
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 *//*
		do_action( 'woocommerce_before_main_content' );
	?>



	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 *//*
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 *//*
		do_action( 'woocommerce_sidebar' );
	?>
*/
get_footer(); ?>
