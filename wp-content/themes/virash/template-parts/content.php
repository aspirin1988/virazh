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
		<div class="col-sm-8 article" id="articleContent">
			<h2><?=get_the_title()?></h2>
			<p class="article-date"><?=get_the_date()?></p>
			<img class="img-responsive" src="<?=get_the_post_thumbnail_url()?>">
			<?=get_the_content();?>
		</div>
		<div class="col-sm-4" id="otherArticles">
			<h2 class="text-center other-news">Читайте так же</h2>
			<?php $count=0; $other_post=get_posts( array('category_name'=>$current_category[0]->slug)); /*print_r($other_post);*/ ?>
			<?php foreach ($other_post as $key=>$value): if ($value->ID!=get_the_ID()):  ?>
			<div class="other-article">
				<a href="<?=get_permalink($value->ID)?>"><img class="img-responsive" src="<?=get_the_post_thumbnail_url($value->ID)?>"></a>
				<h2><a href="<?=get_permalink($value->ID)?>"><?=$value->post_title?></a></h2>
				<p class="article-date"><?=$value->post_date?></p>
				<p class="article-fragment">
				<?=mb_substr(strip_tags($value->post_content),0,128).'...'?>
				</p>
				<a href="<?=get_permalink($value->ID)?>" class="btn">Читать далее</a>
			</div>
			<?php   endif; endforeach; ?>
		</div>
	</div>
</div>
<!-- КОНЕЦ статья-->
