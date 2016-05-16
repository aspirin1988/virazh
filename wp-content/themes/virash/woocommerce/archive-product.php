<?php get_header();



$wo_filter=get_products_cat_by_slug_parent('products');
$current_filter=array();
foreach ($_GET as $key=>$value) {
	if ($value == 'on') {
		$cat = explode('cat_', $key);
		if (substr_count($key, 'cat_')) {
			$current_filter[$key]['value'] = $cat[1];
			$current_filter['filter_id'][] = get_id_products_cat_by_slug_parent($cat[1]);
		}
	}else {

		if (substr_count($key, 'price')) {
			$current_filter[$key]['value'] = $value;
		}
	}
}
if (!$current_filter)
{
	$current_cat=get_queried_object();
	$current_filter['cat_'.$current_cat->slug]['value'] = $current_cat->slug;
	$current_filter['filter_id'][] = $current_cat->term_id;
}
print_r($current_filter);
$filter_array=array(
	'orderby'      => 'id',
	'order'        => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'id',
			'terms'    => $current_filter['filter_id'],
			'operator' => 'AND',
		)
	)
);
$dop_param=wc_get_attribute_taxonomies();

// Подмена запроса на свой !!!
query_posts( $filter_array );
//print_r();

function check(array $filter, $patern, $true='checked="checked"', $false='')
{
	foreach ($filter as $keys => $values) {
		if (($patern->slug == $values['value'])) { return $true; }
	}
	return $false;
}

function collapse ($level,$filter){
 foreach ($level as $value)
 {
	 foreach ($filter as $key=>$value1)
	 {

		 if ($value->slug==$value1['value'])
		 {
			 return true;
		 }
	 }
 }
	return false;
}

?>


<!-- НАЧАЛО заголовок с декор-рамкой-->
<div class="container text-center">
	<div class="title-square-container">
		<h1>Каталог товаров</h1>
		<div class="title-square"></div>
	</div>
</div>
<!-- КОНЕЦ заголовок с декор-рамкой-->
<?php
?>
<!-- НАЧАЛО список статей-->
<div class="container products-catalog">
	<div class="row">

		<form action="" method="get" class="col-sm-3 filter">
			<h3>Фильтр</h3>
			<?php foreach ($wo_filter as $key => $val): ?>
			<div>
			<?php $collapse=false; $level1=get_products_cat_by_slug_parent($val->slug); $collapse=collapse($level1,$current_filter); if (!$level1): ?>
				<input type="checkbox" id="<?=$val->slug?>" name="cat_<?=$val->slug?>" <?=check($current_filter,$val)?> > <label for="aklasse"><?=$val->name?></label><br><?=$collapse?>
			<?php else: ?>
				<button type="button" data-toggle="collapse" data-target="#<?=$val->slug?>" aria-expanded="false"
						aria-controls="<?=$val->slug?>">
					<?=$val->name?>
				</button>
				<div class="collapse in" id="<?=$val->slug?>">
					<?php foreach (get_products_cat_by_slug_parent($val->slug) as $key1=> $val1): ?>
						<?php $collapse=false; $level2=get_products_cat_by_slug_parent($val1->slug); $collapse=collapse($level2,$current_filter); if (!$level2): ?>
						<input type="checkbox" name="cat_<?=$val1->slug?>" id="<?=$val1->slug?>" <?=check($current_filter,$val1); ?> > <label for="aklasse"><?=$val1->name?></label><br>
						<?php else: ?>
							<button type="button" data-toggle="collapse" data-target="#<?=$val1->slug?>" aria-expanded="false"
									aria-controls="<?=$val1->slug?>">
								<span class="glyphicon glyphicon-<?php if ($collapse){echo'minus';}else{echo'plus';} ?>"></span> 
								<input name="cat_<?=$val1->slug?>" type="checkbox" <?=check($current_filter,$val1); ?>><?=$val1->name?>
							</button>
							<div class="collapse <?php if($collapse){echo 'in';}; ?>" id="<?=$val1->slug?>">
							<?php foreach (get_products_cat_by_slug_parent($val1->slug) as $key2=> $val2): ?>
								<input name="cat_<?=$val2->slug?>" type="checkbox" id="<?=$val1->slug?>" <?=check($current_filter,$val2); ?> > <label for="aklasse"><?=$val2->name?></label><br>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					<?php endforeach;?>
				</div>
				<?php endif; ?>
			</div>
				<br>
			<?php endforeach; ?>


			<h3>Опции</h3>
			<input type="checkbox" id="option1"> <label for="option1">Опция 1</label><br>
			<input type="checkbox" id="option2"> <label for="option2">Опция 2</label><br>
			<input type="checkbox" id="option3"> <label for="option3">Опция 3</label><br>
			<input type="checkbox" id="option4"> <label for="option4">Опция 4</label><br>
			<input type="checkbox" id="option5"> <label for="option5">Опция 5</label><br>
			<input type="checkbox" id="option6"> <label for="option6">Опция 6</label><br>

			<h3>Цена</h3>
			<label for="priceFrom">Цена от:</label>
			<input type="text" id="priceFrom" value="<?=$current_filter['priceFrom']['value']?>" name="priceFrom">
			<label for="priceTo">Цена до:</label>
			<input type="text" id="priceTo" value="<?=$current_filter['priceTo']['value']?>" name="priceTo">
			<input type="submit">
		</form>

		<div class="col-sm-9 products-list">
			<div class="row">

				<?php $count_product=0; if ( have_posts() ) : ?>

					<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php $display=false;
						$price=get_metadata('post', get_the_ID(), '_regular_price', true);
						if (isset($current_filter['priceFrom']['value']) && $current_filter['priceFrom']['value']!=''&& isset($current_filter['priceTo']['value']) && $current_filter['priceTo']['value']!='')
						{
							if ($price >= $current_filter['priceFrom']['value']&&$price <= $current_filter['priceTo']['value']) {
							$display=true;
							}
						}
						else {
							if (isset($current_filter['priceFrom']['value']) && $current_filter['priceFrom']['value'] != '') {
								if ($price >= $current_filter['priceFrom']['value']) {
									$display = true;
								} else {
									$display = false;
								}
							} else {
								$display = true;
								if (isset($current_filter['priceTo']['value']) && $current_filter['priceTo']['value'] != '') {
									if ($price <= $current_filter['priceTo']['value']) {
										$display = true;
									} else {
										$display = false;
									}
								} else {
									$display = true;
								}

							}
						}
						if ($display) {
							$count_product++;
							wc_get_template_part('content', 'product');
						}


						?>


					<?php endwhile; // end of the loop. ?>

					<?php if (!$count_product) {wc_get_template( 'loop/no-products-found.php' );}  woocommerce_product_loop_end(); ?>

					<?php
					/**
					 * woocommerce_after_shop_loop hook.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
					?>

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>
			</div>

			<ul class="pagination">
				<li>
					<a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				<li class="active"><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li>
					<a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- КОНЕЦ список статей-->



		<?php if ( have_posts() ) : ?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer(); ?>

