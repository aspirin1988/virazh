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
				<?php $img_id = get_post_thumbnail_id(); $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true); ?>
				<img class="img-responsive" src="<?=get_the_post_thumbnail_url()?>" alt="<?=$alt_text?>" >
			</div>
			<div class="product-thumbs">
				<div class="owl-carousel owl-carousel-products">
					<?php foreach ($images as $key=>$value):?>
						<?php $alt_text = get_post_meta($value , '_wp_attachment_image_alt', true);?>
						<div class="thumb-container">
							<a href="#" data-img="<?=wp_get_attachment_image_url($value,'full') ?>" class="thumb">
								<img class="img-responsive" src="<?=wp_get_attachment_image_url($value,'full')?>" <?php get_the_thumbnail_tag_by_id($value)?>>
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

				<?=do_shortcode(get_the_excerpt(),false)?>

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
				<li><a data-toggle="tab" href="#menu4"><?=get_field('tab-3-name')?></a></li>
			<?php endif; ?>
		</ul>
		<div class="tab-content">
			<div id="menu0" class="tab-pane fade in active">
				<article>
				<?php the_content()?>
				</article>
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
			<a href="" onclick="return false;"></a>
			<?php if (get_field('tab-1')): ?>
			<div id="menu2" class="tab-pane fade">
				<article>
				<?=do_shortcode(get_field('tab-1'),false);?>
				</article>
				<?php endif; ?>
			</div>
			<?php if (get_field('tab-2')): ?>
			<div id="menu3" class="tab-pane fade">
				<article>
				<?=do_shortcode(get_field('tab-2'),false);?>
				</article>
				<?php endif; ?>
			</div>
				<?php if (get_field('tab-3')): ?>
			<article>
			<div id="menu4" class="tab-pane fade">
				<?=do_shortcode(get_field('tab-3'),false);?>
				<?php endif; ?>
			</div>
			</article>

		</div>
	</div>
</div>

<!--КОНЕЦ табы и содержимое-->
<?php endwhile; // end of the loop. ?>


<?php
get_sidebar();
get_footer(); ?>
