<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package virash
 */
$query=explode('page', $_SERVER["QUERY_STRING"]); $query=$query[0];
$page=(int)get_field('display_count_post',4);
$current_object=get_queried_object();
$offset=get_query_var('page')*$page;
//$wp_query->query_vars['posts_per_page']=$page;
$post_count=round(count(query_posts( array('category_name'=>$current_object->slug) ))/$page);
$temp_post=query_posts( array('category_name'=>$current_object->slug, 'posts_per_page'=>$page, 'offset'=>$offset) );
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
		<?php if($post_count>1):?>
			<ul class="pagination ">
				<li >
					<a href="?<?php  if ($_GET['page']>0):echo $query.'page='.($_GET['page']-1);else: echo $query.'page='.($_GET['page']); endif;?>"  aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				<?php for($i=0;$i<$post_count; $i++):?>
					<li class="<?php if ($_GET['page']==$i):?>active<?php endif; ?>"><a href="?<?=$query.'page='.($i)?>"><?=$i+1?></a></li>
				<?php endfor; ?>
				<li>
					<a href="?<?php if ($_GET['page']<$post_count-1):echo $query.'page='.($_GET['page']+1);else: echo $query.'page='.($post_count-1); endif;?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
			</ul>
		<?php endif; ?>
	</div>
	<!--КОНЕЦ пагинация-->



<?php
get_footer();
