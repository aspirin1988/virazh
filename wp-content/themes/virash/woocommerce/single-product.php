<?php get_header() ?>
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
		<?php  ?>
		<div class="col-md-7 preview-col">
			<div class="product-main-photo">
				<img class="img-responsive" src="img/product/auto.png">
				<div class="square"></div>
			</div>
			<div class="row">
				<div class="col-xs-3">
					<a href="#" data-img="img/product/auto.png" class="thumb">
						<img class="img-responsive" src="img/product/auto.png">
					</a>
				</div>
				<div class="col-xs-3">
					<a href="#" data-img="img/product/auto2.png" class="thumb">
						<img class="img-responsive" src="img/product/auto2.png">
					</a>
				</div>
				<div class="col-xs-3">
					<a href="#" data-img="img/product/auto3.png" class="thumb">
						<img class="img-responsive" src="img/product/auto3.png">
					</a>
				</div>
				<div class="col-xs-3">
					<a href="#" data-img="img/product/auto4.png" class="thumb">
						<img class="img-responsive" src="img/product/auto4.png">
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-5 summary-col">
			<p>
				<?=get_comment()?>
			</p>
		</div>
	</div>
</div>
<!-- КОНЕЦ одиночный товар-->

<!--НАЧАЛО табы и содержимое-->
<div class="container single-product-tabs">
	<ul class="nav tabs">
		<li class="active"><a data-toggle="tab" href="#menu0">Описание</a></li>
		<li><a data-toggle="tab" href="#menu1">Характеристики</a></li>
		<li><a data-toggle="tab" href="#menu2">Таб</a></li>
		<li><a data-toggle="tab" href="#menu3">Ещё таб</a></li>
	</ul>
	<div class="tab-content">
		<div id="menu0" class="tab-pane fade in active">
			<h3>HOME</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
				<tr>
					<td>Тип топлива:</td>
					<td>дизель</td>
				</tr>
				<tr>
					<td>Номинальная грузоподъёмность:</td>
					<td>3000кг</td>
				</tr>
				<tr>
					<td>ВЫСОТА ПОДЪЕМА:</td>
					<td>3000 ММ</td>
				</tr>
				<tr>
					<td>УГОЛ НАКЛОНА(ПЕРЕД/НАЗАД)Г: </td>
					<td>6°/12°</td>
				</tr>
				<tr>
					<td>СКОРОСТЬ (ПЕРЕДНИЙ ХОД) ДВИЖЕНИЕ <br>
						С ГРУЗОМ/БЕЗ ГРУЗА: </td>
					<td>18/19 КМ/Ч</td>
				</tr>
				<tr>
					<td>РАЗМЕР ВИЛ:</td>
					<td>1070*125*45 ММ</td>
				</tr>
				<tr>
					<td>КОЛЕСНАЯ БАЗА:</td>
					<td>1700 ММ</td>
				</tr>
				<tr>
					<td>ПНЕВМАТИЧЕСКИЕ ШИНЫ <br>
						НОМИНАЛЬНАЯ МОЩНОСТЬ:</td>
					<td>37 КВТ</td>
				</tr>
				<tr>
					<td>ОБЪЕМ ДВИГАТЕЛЯ:</td>
					<td>2.54 Л</td>
				</tr>
				<tr>
					<td>НАПРЯЖЕНИЕ:</td>
					<td>12 ВОЛЬТ</td>
				</tr>
				</tbody>
			</table>
		</div>
		<div id="menu2" class="tab-pane fade">
			<h3>Menu 2</h3>
			<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
		</div>
		<div id="menu3" class="tab-pane fade">
			<h3>Menu 3</h3>
			<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
		</div>
	</div>
</div>
<!--КОНЕЦ табы и содержимое-->

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
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

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

<?php get_footer( 'shop' ); ?>
