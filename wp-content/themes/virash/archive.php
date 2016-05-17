<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package virash
 */
$current_object=get_queried_object();
get_header(); ?>

	<!-- НАЧАЛО заголовок с декор-рамкой-->
	<div class="container text-center">
		<div class="title-square-container">
			<h1><?=$current_object->name?></h1>
			<div class="title-square"></div>
		</div>
	</div>
	<!-- КОНЕЦ заголовок с декор-рамкой-->

	<!-- НАЧАЛО список статей-->
	<div class="container articles-list">
		<div class="row">
<?php
if ( have_posts() ) : ?>
	<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'post' );
	endwhile;
else :

	get_template_part( 'template-parts/content', 'none' );
		?>
			<div class="article-item col-md-4 col-sm-6">
				<a href="#"><img class="img-responsive" src="img/articles/tractor.jpg"></a>
				<h2><a href="#">Название сататьи</a></h2>
				<p class="article-date">23/05/2016</p>
				<p class="article-fragment">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<button class="btn" type="button" name="button">Читать далее</button>
			</div>
<?php endif; ?>
		</div>
	</div>
	<!-- КОНЕЦ список статей-->

	<!--НАЧАЛО пагинация-->
	<div class="container text-center">
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
	<!--КОНЕЦ пагинация-->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
