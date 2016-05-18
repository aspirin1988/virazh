<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package virash
 */

?>

<section class="no-results not-found ">
<div class="text-center">
		<div class="title-square-container text-center ">
			<h1 class="page-title"><?php esc_html_e( 'Ничего не найдено', 'virash' ); ?></h1>
			<div class="title-square"></div>
		</div>
</div>


	<div class="page-content container">

		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'virash' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Извините, но ничего нет соответствующего условиям поиска. Пожалуйста, попытайтесь снова с другими ключевыми словами.', 'virash' ); ?></p>
			<?php

		else : ?>

			<p><?php esc_html_e( 'Кажется, мы не можем найти то, что вы ищете. Воспользуйтесь поиском.', 'virash' ); ?></p>
			<?php

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
