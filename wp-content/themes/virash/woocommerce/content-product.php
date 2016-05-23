<?php
//echo(wc_attribute_label($attribute['name']).' '.$product->get_attribute($attribute['name']));

?>

<div class="col-md-4 col-sm-6 item">
	<a href="<?=get_permalink()?>"><img src="<?=get_the_post_thumbnail_url()?>" class="img-responsive"></a>
	<h4><a href="<?=get_permalink()?>"><?=get_the_title()?></a></h4>
	<div class="square"><?php
/*		global $product;
		$attributes = $product->get_attributes();
		foreach ($attributes as $attribute):
			print_r(wc_attribute_label($attribute['name']).' '.$product->get_attribute($attribute['name']));
			echo '<br>';
		endforeach;
		*/?>
	</div>
</div>
