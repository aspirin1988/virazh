<?php get_header();
$query=explode('&page', $_SERVER["QUERY_STRING"]); $query=$query[0];
$wo_filter=get_products_cat_by_slug_parent('products');
$page=(int)get_field('display_count',4);

$dop_param=wc_get_attribute_taxonomy_names();
$dop_param_label=wc_get_attribute_taxonomies();
$current_filter=array();

foreach ($wo_filter as $key_cat=>$val_cat) {
	foreach ($_GET['one'] as $key => $value) {
		if ($value == 'on') {
			$cat = explode($val_cat->term_id . '@', $key);
			if (substr_count($key, $val_cat->term_id)) {
				$current_filter['one'][$val_cat->slug][$cat[1]]['param']['value'] = $cat[1];
				$current_filter['one'][$val_cat->slug][$cat[1]]['param']['slug'] = $key;
				$current_filter['one'][$val_cat->slug]['filter_id'][] = get_id_products_cat_by_slug_parent($cat[1]);
			}
		} else {

			if (substr_count($key, 'price')) {
				$current_filter[$key] = $value;
			}
		}
	}
}

foreach ($dop_param_label as $key_cat=>$val_cat) {
	foreach ($_GET['second'] as $key => $value) {
		if ($value == 'on') {
			$cat = explode($val_cat->attribute_name . '@', $key);
			if ($cat[0] == 'pa_') {
				if (substr_count($key, $val_cat->attribute_name)) {
					$current_filter['second'][$val_cat->attribute_name][] = $cat[1];
				}
			}
		}
	}
}


$current_cat=get_queried_object();
if (!$current_filter) {
	$current_filter['one']['types_of_transport'][$current_cat->slug]['param']['value'] = $current_cat->slug;
	$current_filter['one']['types_of_transport'][$current_cat->slug]['param']['slug'] = '15' . $current_cat->slug;
	$current_filter['one']['types_of_transport']['filter_id'][] = $current_cat->term_id;
	$current_filter['priceFrom'] = null;
	$current_filter['priceTo'] = null;
}

$filter_array=array(
	'posts_per_page'=>'-1',
	'orderby'      => 'DESC',
	'order'        => 'menu_order',
	'tax_query' => array(

	)
);

$count=0;
foreach ($current_filter['one'] as $value) {
	if (gettype($value) == 'array') {
		$count++;
		$filter_array['tax_query'][] = array(
			'taxonomy' => 'product_cat',
			'field' => 'id',
			'terms' => $value['filter_id'],
			'operator' => 'in',
		);
	}
	if ($count > 1) {
		$filter_array['tax_query']['relation'] = 'AND';
	}
}

if ($count==0){
	$filter_array['tax_query']['relation'] = 'OR';
	$filter_array['tax_query'][] = array(
		'taxonomy' => 'product_cat',
		'field' => 'slug',
		'terms' => 'products',
		'operator' => 'IN',

	);
}

$post_count=ceil(count(query_posts( $filter_array ))/$page);
$filter_array['posts_per_page'] = $page;
$filter_array['offset'] = $_GET['page']*$page;

// Подмена запроса на свой !!!
$temp_post=query_posts( $filter_array );
//print_r($filter_array);

$meta=array();
foreach ($temp_post as $value) {
	$col = 0;
	foreach ($dop_param_label as $value1) {
		if ($value1->attribute_public) {
			$attr = wp_get_post_terms($value->ID, 'pa_' . $value1->attribute_name);
			if ($attr) {
				foreach ($attr as $val) {
					$meta['pa_' . $value1->attribute_name]['lable'] = $value1->attribute_label;
					$meta['pa_' . $value1->attribute_name]['value'][$val->name] = $val->name;
				}
			}

		}
	}
}


function check($filter, $patern, $true='checked="checked"', $false='')
{
	foreach ($filter as $keys => $values) {
		foreach ($values as $keys1 => $values1) {
			if (($patern == $values1['param']['value'])) {
				return $true;
			}
		}
	}
	return $false;
}

function check_second($filter, $patern, $true='checked="checked"', $false='')
{
	foreach ($filter as $keys => $values) {
		foreach ($values as $keys1 => $values1) {
			if (($patern == $values1)) {
				return $true;
			}
		}
	}
	return $false;
}

function collapse ($level,$filter)
{
	foreach ($level as $value) {
		foreach ($filter as $key => $value1) {

			if ($value->slug == $value1['value']) {
				return true;
			}
		}
	}
	return false;
}

//print_r($current_filter);

?>


<!-- НАЧАЛО заголовок с декор-рамкой-->
<div class="container text-center" xmlns="http://www.w3.org/1999/html">
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
		<h3 class="filter-title clearfix" onclick="filter_open()">Фильтр<i class="glyphicon glyphicon-chevron-down pull-right hidden-button "></i> </h3>
		<form id="form_filter" action="" method="get" class="col-sm-3 filter hidden-form ">
			<input type="button" onclick="clearfilter()" value="Очистит фильтр" class="btn" >
			<br>
			<br>

			<?php foreach ($wo_filter as $key => $val): ?>
			<div>
			<?php $collapse=false; $level1=get_products_cat_by_slug_parent($val->slug); $collapse=collapse($level1,$current_filter['one']); if (!$level1): ?>
				<input type="checkbox" id="<?=$val->slug?>"  name="<?=$val->slug?>" <?=check($current_filter['one'],$val->slug)?> > <label for="<?=$val->slug?>"><?=$val->name?></label><br><?=$collapse?>
			<?php else: ?>
				<button type="button" data-toggle="collapse" data-target="#<?=$val->slug?>" aria-expanded="false" aria-controls="<?=$val->slug?>">
					<?=$val->name?>
				</button>
				<div class="collapse in" id="<?=$val->slug?>">
					<?php foreach (get_products_cat_by_slug_parent($val->slug) as $key1=> $val1): ?>
						<?php $collapse=false; $level2=get_products_cat_by_slug_parent($val1->slug); $collapse=collapse($level2,$current_filter['one']); if (!$level2): ?>
						<input type="checkbox" onclick="submitform()"  name="one[<?=$val->cat_ID?>@<?=$val1->slug?>]" id="<?=$val1->slug?>" <?=check($current_filter['one'],$val1->slug); ?> > <label for="<?=$val1->slug?>"><?=$val1->name?></label><br>
						<?php else: ?>
							<button type="button" data-toggle="collapse" class="padding" data-target="#<?=$val1->slug?>" aria-expanded="false"
									aria-controls="<?=$val1->slug?>">
								<span class="glyphicon glyphicon-<?php if ($collapse){echo'minus';}else{echo'plus';} ?>"></span> 
								<input name="one[<?=$val->cat_ID?>@<?=$val1->slug?>]" type="checkbox" onclick="submitform()" <?=check($current_filter['one'],$val1->slug); ?>><?=$val1->name?>
							</button>
							<div class="collapse <?php if($collapse){echo 'in';}; ?>" id="<?=$val1->slug?>">

							<?php /*print_r(get_products_cat_by_slug_parent($val1->slug)); */foreach (get_products_cat_by_slug_parent($val1->slug) as $key2=> $val2): ?>
								<input name="one[<?=$val->cat_ID?>@<?=$val2->slug?>]" onclick="submitform()" type="checkbox" id="<?=$val2->slug?>" <?=check($current_filter['one'],$val2->slug); ?> > <label for="<?=$val2->slug?>"><?=$val2->name?></label><br>
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
			<?php $col=0; foreach ($meta as $key => $val): if ($key!=''): if ($col < 10) :  ?>
			<div>
				<button type="button" data-toggle="collapse" data-target="#<?=$key?>" aria-expanded="false"
						aria-controls="<?=$key?>">
					<?=$val['lable']?>
				</button>
				<div class="collapse in" id="<?=$key?>">
					<?php   foreach ($val['value'] as $key1 => $val1):  if ($key1!=''&&$val1!=''):  ?>
					<input type="checkbox" name="second[<?=$key?>@<?=$val1?>]" onclick="submitform()" <?=check_second($current_filter['second'],$val1); ?> id="<?=$key?><?=$val1?>"> <label for="<?=$key?><?=$val1?>"><?=$val1?></label><br>
					<?php endif;   endforeach; ?>
				</div>
			</div>
			<?php  $col++; endif;  endif;  endforeach; ?>

			<h3>Цена</h3>
			<label for="priceFrom">Цена от:</label>
			<input type="text" id="priceFrom" value="<?=$current_filter['priceFrom']?>" name="priceFrom">
			<label for="priceTo">Цена до:</label>
			<input type="text" id="priceTo" value="<?=$current_filter['priceTo']?>" name="priceTo">
			<br>
			<input type="submit" value="Применить фильтр" class="btn submit-form" >
		</form>
		<br>
		<div class="col-sm-9 products-list" style="position: relative;">
			<div class="row">
<!--				<div style="display: flex" class="preloader"><h2>Фильтрация данных</h2><img src="http://virazh.blink.kz/wp-content/themes/virash/public/img/preloader.gif" alt="Loading"></div>-->
				<?php $count_product=0; if ( have_posts() ) : ?>

					<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php $display=false;
						$price=get_metadata('post', get_the_ID(), '_regular_price', true);
						$price_sale=get_metadata('post', get_the_ID(), '_sale_price', true);
						if($price_sale){$price=$price_sale;}
						$price_param=array();
						if (isset($current_filter['priceFrom']) && $current_filter['priceFrom']!='') {
							$price_param['from']['value'] = $current_filter['priceFrom'];
							$price_param['from']['name'] = 'from';
						}

						if (isset($current_filter['priceTo']) && $current_filter['priceTo']!='') {
							$price_param['to']['value'] = $current_filter['priceTo'];
							$price_param['to']['name'] = 'to';
						}
						switch (count($price_param)) {
							case 1:

								if (isset($price_param['from'])) {
									if ((int)$price >= (int)$price_param['from']['value']) {
										$display = true;
									} else {
										$display = false;
									}
								} else {
									if ((int)$price <= (int)$price_param['to']['value']) {
										$display = true;
									} else {
										$display = false;
									}
								}
								break;
							case 2:
								if ((int)$price >= (int)$price_param['from']['value'] && (int)$price <= (int)$price_param['to']['value']) {
									$display = true;
								} else {
									$display = false;
								}
								break;
							default:
								$display = true;
								break;
						}

						$dop_display=array();
						foreach ($current_filter['second'] as $key=>$value) {
							foreach ($value as $val) {
								global $product;
								$attr_dop = explode(',', $product->get_attribute($key));
								foreach ($attr_dop as $value) {
									if ($value == $val) {
										$dop_display[$key][] = true;
										break;
									} else {
										$dop_display[$key][] = false;
									}
								}
							}
						}
						$dop_display_b=true;
						foreach ($dop_display as $value) {
							$dop_display_b1 = false;
							foreach ($value as $val) {
								$dop_display_b1 += $val;
							}
							$dop_display_b *= $dop_display_b1;
						}
						
						if ($display&&$dop_display_b) {
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

					//do_action( 'woocommerce_after_shop_loop' );

					?>

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>
			</div>
			<?php if($post_count>1):?>
			<ul class="pagination ">
				<li >
					<a href="?<?php  if ($_GET['page']>0):echo $query.'&page='.($_GET['page']-1);else: echo $query.'&page='.($_GET['page']); endif;?>"  aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				<?php for($i=0;$i<$post_count; $i++):?>
				<li class="<?php if ($_GET['page']==$i):?>active<?php endif; ?>"><a href="?<?=$query.'&page='.($i)?>"><?=$i+1?></a></li>
				<?php endfor; ?>
				<li>
					<a href="?<?php if ($_GET['page']<$post_count-1):echo $query.'&page='.($_GET['page']+1);else: echo $query.'&page='.($post_count-1); endif;?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
			</ul>
			<?php endif; ?>

		</div>

	</div>
</div>
<!-- КОНЕЦ список статей-->
<?php get_footer(); ?>

