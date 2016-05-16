<?php get_header() ?>

<!-- НАЧАЛО заголовок с декор-рамкой-->
<div class="container text-center">
	<div class="title-square-container">
		<h1>Каталог товаров</h1>
		<div class="title-square"></div>
	</div>
</div>
<!-- КОНЕЦ заголовок с декор-рамкой-->

<!-- НАЧАЛО список статей-->
<div class="container products-catalog">
	<div class="row">
		<div class="col-sm-3 filter">
			<h3>Вид транспорта</h3>
			<div>
				<button type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false"
						aria-controls="collapse1">
					<span class="glyphicon glyphicon-plus"></span> <input type="checkbox"> Mercedes-Benz
				</button>
				<div class="collapse" id="collapse1">
					<input type="checkbox" id="aklasse"> <label for="aklasse">A-Klasse</label><br>
					<input type="checkbox" id="bklasse"> <label for="bklasse">B-Klasse</label><br>
					<input type="checkbox" id="cklasse"> <label for="cklasse">C-Klasse</label><br>
					<button type="button" data-toggle="collapse" data-target="#eklasse" aria-expanded="false"
							aria-controls="eklasse">
						<span class="glyphicon glyphicon-plus"></span> <input type="checkbox"> E-Klasse
					</button>
					<div class="collapse" id="eklasse">
						<input type="checkbox" id="e200"> <label for="e200">E200</label><br>
						<input type="checkbox" id="e240"> <label for="e240">E240</label><br>
						<input type="checkbox" id="e320"> <label for="e320">E320</label><br>
						<input type="checkbox" id="e550"> <label for="e550">E550</label><br>
					</div>
				</div>
			</div>
			<div>
				<button type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false"
						aria-controls="collapse2">
					<span class="glyphicon glyphicon-plus"></span> <input type="checkbox"> BMW
				</button>
				<div class="collapse" id="collapse2">
					<button type="button" data-toggle="collapse" data-target="#1series" aria-expanded="false"
							aria-controls="1series">
						<span class="glyphicon glyphicon-plus"></span> <input type="checkbox"> 1-series
					</button>
					<div class="collapse" id="1series">
						<input type="checkbox" id="sub2series114"> <label for="sub2series114">114</label><br>
						<input type="checkbox" id="sub2series116"> <label for="sub2series116">116</label><br>
						<input type="checkbox" id="sub2series118"> <label for="sub2series118">118</label><br>
						<input type="checkbox" id="sub2series120"> <label for="sub2series120">120</label><br>
					</div>
					<button type="button" data-toggle="collapse" data-target="#2series" aria-expanded="false"
							aria-controls="1series">
						<span class="glyphicon glyphicon-plus"></span> <input type="checkbox"> 2-series
					</button>
					<div class="collapse" id="2series">
						<input type="checkbox" id="sub2series214"> <label for="sub2series214">214</label><br>
						<input type="checkbox" id="sub2series216"> <label for="sub2series216">216</label><br>
						<input type="checkbox" id="sub2series218"> <label for="sub2series218">218</label><br>
						<input type="checkbox" id="sub2series220"> <label for="sub2series220">220</label><br>
					</div>
					<input type="checkbox" id="3series"> <label for="3series">3-series</label><br>
					<input type="checkbox" id="5series"> <label for="5series">5-series</label><br>
					<input type="checkbox" id="6series"> <label for="6series">6-series</label><br>
					<input type="checkbox" id="7series"> <label for="7series">7-series</label><br>
				</div>
			</div>
			<div>
				<button type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false"
						aria-controls="collapse3">
					<span class="glyphicon glyphicon-plus"></span> <input type="checkbox"> Audi
				</button>
				<div class="collapse" id="collapse3">
					<input type="checkbox" id="a1Series"> <label for="a1Series">A1-series</label><br>
					<input type="checkbox" id="a2Series"> <label for="a2Series">A2-series</label><br>
					<input type="checkbox" id="a4Series"> <label for="a4Series">A4-series</label><br>
					<input type="checkbox" id="a6Series"> <label for="a6Series">A6-series</label><br>
					<input type="checkbox" id="a8Series"> <label for="a8Series">A8-series</label><br>
					<input type="checkbox" id="ttSeries"> <label for="ttSeries">TT-series</label><br>
				</div>
			</div>
			<h3>Опции</h3>
			<input type="checkbox" id="option1"> <label for="option1">Опция 1</label><br>
			<input type="checkbox" id="option2"> <label for="option2">Опция 2</label><br>
			<input type="checkbox" id="option3"> <label for="option3">Опция 3</label><br>
			<input type="checkbox" id="option4"> <label for="option4">Опция 4</label><br>
			<input type="checkbox" id="option5"> <label for="option5">Опция 5</label><br>
			<input type="checkbox" id="option6"> <label for="option6">Опция 6</label><br>

			<h3>Цена</h3>
			<label for="priceFrom">Цена от:</label>
			<input type="text" id="priceFrom">
			<label for="priceTo">Цена до:</label>
			<input type="text" id="priceTo">

		</div>
		<div class="col-sm-9 products-list">
			<div class="row">
				<div class="col-md-4 col-sm-6 item">
					<a href="#"><img src="img/products/auto.png" class="img-responsive"></a>
					<h4><a href="#">Название товара</a></h4>
					<div class="square"></div>
				</div>
				<div class="col-md-4 col-sm-6 item">
					<a href="#"><img src="img/products/auto.png" class="img-responsive"></a>
					<h4><a href="#">Название товара</a></h4>
					<div class="square"></div>
				</div>
				<div class="col-md-4 col-sm-6 item">
					<a href="#"><img src="img/products/auto.png" class="img-responsive"></a>
					<h4><a href="#">Название товара</a></h4>
					<div class="square"></div>
				</div>
				<div class="col-md-4 col-sm-6 item">
					<a href="#"><img src="img/products/auto.png" class="img-responsive"></a>
					<h4><a href="#">Название товара</a></h4>
					<div class="square"></div>
				</div>
				<div class="col-md-4 col-sm-6 item">
					<a href="#"><img src="img/products/auto.png" class="img-responsive"></a>
					<h4><a href="#">Название товара</a></h4>
					<div class="square"></div>
				</div>
				<div class="col-md-4 col-sm-6 item">
					<a href="#"><img src="img/products/auto.png" class="img-responsive"></a>
					<h4><a href="#">Название товара</a></h4>
					<div class="square"></div>
				</div>
				<div class="col-md-4 col-sm-6 item">
					<a href="#"><img src="img/products/auto.png" class="img-responsive"></a>
					<h4><a href="#">Название товара</a></h4>
					<div class="square"></div>
				</div>
				<div class="col-md-4 col-sm-6 item">
					<a href="#"><img src="img/products/auto.png" class="img-responsive"></a>
					<h4><a href="#">Название товара</a></h4>
					<div class="square"></div>
				</div>
				<div class="col-md-4 col-sm-6 item">
					<a href="#"><img src="img/products/auto.png" class="img-responsive"></a>
					<h4><a href="#">Название товара</a></h4>
					<div class="square"></div>
				</div>
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


<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

/*if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}*/

//get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

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

