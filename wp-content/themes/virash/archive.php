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

		?>
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



<?php
get_footer();
