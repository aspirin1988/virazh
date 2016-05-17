<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package virash
 */
 $current_category=get_the_category();
?>

<!-- НАЧАЛО статья-->
<div class="container single-article">
	<div class="row">
		<div class="col-sm-8 article">
			<h2><?=get_the_title()?></h2>
			<p class="article-date"><?=get_the_date()?></p>
			<img class="img-responsive" src="<?=get_the_post_thumbnail_url()?>">
			<?=get_the_content();?>
		</div>
		<div class="col-sm-4">
			<h2 class="text-center other-news">Другие новости</h2>
			<?php $count=0; $other_post=get_posts( array('category_name'=>$current_category[0]->slug)); /*print_r($other_post);*/ ?>
			<?php foreach ($other_post as $key=>$value): if ($value->ID!=get_the_ID()): if ($count<3): $count++; ?>
			<div class="other-article">
				<a href="<?=get_permalink($value->ID)?>"><img class="img-responsive" src="<?=get_the_post_thumbnail_url($value->ID)?>"></a>
				<h2><a href="<?=get_permalink($value->ID)?>"><?=$value->post_title?></a></h2>
				<p class="article-date"><?=$value->post_date?></p>
				<p class="article-fragment">
				<?=mb_substr(strip_tags($value->post_content),0,128).'...'?>
				</p>
				<a href="<?=get_permalink($value->ID)?>" class="btn">Читать далее</a>
			</div>
			<?php   endif;endif; endforeach; ?>
		</div>
	</div>
</div>
<!-- КОНЕЦ статья-->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php virash_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'virash' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'virash' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php virash_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
