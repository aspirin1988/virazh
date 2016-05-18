<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package virash
 */

get_header(); ?>

		<?php
		if ( have_posts() ) : ?>

			<div class="container text-center">
				<div class="title-square-container">
					<h1><?php printf( esc_html__( 'Результаты поиска: %s', 'virash' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					<div class="title-square"></div>
				</div>
			</div>
			<div class="container articles-list">
			<div class="row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
			</div>
		</div>

<?php
get_footer();
