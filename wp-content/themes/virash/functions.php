<?php
/**
 * virash functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package virash
 */

if ( ! function_exists( 'virash_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function virash_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on virash, use a find and replace
	 * to change 'virash' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'virash', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'virash' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'virash_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'virash_setup' );
/*remove_action( 'wp_head', 'wlwmanifest_link' ); // Удаляет ссылку Windows для Live Writer

remove_action( 'wp_head', 'wp_shortlink_wp_head'); // Удаляет короткую ссылку
remove_action( 'wp_head', 'wp_generator' ); // Удаляет информацию о версии WordPress
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head'); // Удаляет ссылки на предыдущую и следующую статьи

// отключение WordPress REST API
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'menu-image' );
remove_action( 'wp_head', 'admin_head-nav-menus.php' );
remove_action( 'wp_head', 'admin_head-nav-menus.php' );
remove_action( 'template_redirect', 'rest_output_link_header');*/
// устаревшие функции
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function virash_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'virash_content_width', 640 );
}
add_action( 'after_setup_theme', 'virash_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function virash_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'virash' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'virash' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'virash_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function virash_scripts() {
	wp_enqueue_style( 'virash-style', get_stylesheet_uri() );

	wp_enqueue_script( 'virash-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'virash-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'virash_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_action( 'widgets_init', 'my_widget' );
function my_widget() {
	register_widget( 'CallBack_Widget' );
	register_widget( 'CallBack_Button_Widget' );
	register_widget( 'Dropdown_Widget' );
}

class CallBack_Widget extends WP_Widget {

	function CallBack_Widget() {
		$widget_ops = array( 'classname' => 'callback-widget', 'description' => __('A widget that displays the authors name ', 'callback-widget') );

		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'callback-widget' );

		$this->WP_Widget( 'callback-widget', __('Callback form', 'callback-widget'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$cc_mail = $instance['cc_mail'];
		$title = $instance['title'];
		$response_color = $instance['response_color'];
		$response_font_size = $instance['response_font_size'];
		$header_title = $instance['header_title'];
		echo
		'
		<style>
			.success-mail-text{
			color: '.$response_color.';
			font-size: '.$response_font_size.';
			text-align: center;
			}
		</style>
		<form action="" class="feedback-form blink-mailer">
		<h3>'.$header_title.'</h3>
		<input type="hidden" name="title" value="'.$title.'">
		<input type="hidden" name="URL" value="'.$_SERVER['REDIRECT_SCRIPT_URI'].'">
		<input type="hidden" name="cc_mail" value="'.$cc_mail.'">
		<div class="label-inputs">
			<div class="label-input">
				<label for="name">Ваше имя:</label>
				<input type="text" name="Имя" id="name" placeholder="Иван Иванов">
			</div>

			<div class="label-input">
				<label for="email">Электронная почта:</label>
				<input type="email" name="email" id="email" placeholder="example@mail.com">
			</div>

			<div class="label-input">
				<label for="phoneNumber">Номер телефона:</label>
				<input type="tel" name="Телефон" id="phoneNumber" placeholder="+707-xxx-xx-xx">
			</div>

			<div class="label-input submit">
				<input type="submit" value="Отправить">
			</div>
		</div>
	</form>
	<div class="success-mail-text">
			
		</div>
		';
	}

	//Update the widget 

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['cc_mail'] = strip_tags( $new_instance['cc_mail'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['header_title'] = strip_tags( $new_instance['header_title'] );
		$instance['response_font_size'] = strip_tags( $new_instance['response_font_size'] );
		$instance['response_color'] = strip_tags( $new_instance['response_color'] );
		return $instance;
	}


	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'cc_mail' => __('callback-widget', 'callback-widget'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		//Title формы.
		<p>
			<label for="<?php echo $this->get_field_id( 'header_title' ); ?>"><?php _e('header_title:', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id( 'header_title' ); ?>" name="<?php echo $this->get_field_name( 'header_title' ); ?>" value="<?php echo $instance['header_title']; ?>" style="width:100%;" />
		</p>
		//Название формы.
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		//Email для отпраки.
		<p>
			<label for="<?php echo $this->get_field_id( 'cc_mail' ); ?>"><?php _e('CC_mail:', 'callback-widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'cc_mail' ); ?>" name="<?php echo $this->get_field_name( 'cc_mail' ); ?>" value="<?php echo $instance['cc_mail']; ?>" style="width:100%;" />
		</p>
		//Цвет шрифта ответа.
		<p>
			<label for="<?php echo $this->get_field_id( 'response_color' ); ?>"><?php _e('Response_color:', 'callback-widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'response_color' ); ?>" name="<?php echo $this->get_field_name( 'response_color' ); ?>" value="<?php echo $instance['response_color']; ?>" style="width:100%;" />
		</p>
		//Размер шрифта ответа.
		<p>
			<label for="<?php echo $this->get_field_id( 'response_font_size' ); ?>"><?php _e('Response_font_size:', 'callback-widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'response_font_size' ); ?>" name="<?php echo $this->get_field_name( 'response_font_size' ); ?>" value="<?php echo $instance['response_font_size']; ?>" style="width:100%;" />
		</p>

		<?php
	}
}

class Dropdown_Widget extends WP_Widget {

	function Dropdown_Widget() {
		$widget_ops = array( 'classname' => 'dropdown_widget', 'description' => __('A widget that displays the authors name ', 'dropdown_widget') );

		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'dropdown_widget' );

		$this->WP_Widget( 'dropdown_widget', __('DropDown Widget', 'dropdown_widget'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$content = $instance['content'];
		$title = $instance['title'];
		$response_color = $instance['response_color'];
		$response_font_size = $instance['response_font_size'];
		$header_title = $instance['header_title'];
		echo
			'
		<div class="btn-group">
		  <a style="text-decoration: underline; cursor: pointer" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			'.$header_title.' 
			<span class="caret">
			
			</span>
		  </a>
		  <div class="dropdown-menu" style="min-width: 20em;">
			'.$content.'
		  </div>
		</div>
		';
	}

	//Update the widget

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['content'] =  $new_instance['content'];
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['header_title'] = strip_tags( $new_instance['header_title'] );
		$instance['response_font_size'] = strip_tags( $new_instance['response_font_size'] );
		$instance['response_color'] = strip_tags( $new_instance['response_color'] );
		return $instance;
	}


	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'content' => __('dropdown_widget', 'dropdown_widget'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		//Title формы.
		<p>
			<label for="<?php echo $this->get_field_id( 'header_title' ); ?>"><?php _e('header_title:', 'dropdown_widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'header_title' ); ?>" name="<?php echo $this->get_field_name( 'header_title' ); ?>" value="<?php echo $instance['header_title']; ?>" style="width:100%;" />
		</p>
		//Название формы.
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'dropdown_widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		//Content.
		<p>
			<label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e('Content:', 'dropdown_widget'); ?></label>
			<textarea id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>"  style="width:100%;" ><?php echo $instance['content']; ?></textarea>
		</p>
		//Цвет шрифта ответа.
		<p>
			<label for="<?php echo $this->get_field_id( 'response_color' ); ?>"><?php _e('Response_color:', 'dropdown_widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'response_color' ); ?>" name="<?php echo $this->get_field_name( 'response_color' ); ?>" value="<?php echo $instance['response_color']; ?>" style="width:100%;" />
		</p>
		//Размер шрифта ответа.
		<p>
			<label for="<?php echo $this->get_field_id( 'response_font_size' ); ?>"><?php _e('Response_font_size:', 'dropdown_widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'response_font_size' ); ?>" name="<?php echo $this->get_field_name( 'response_font_size' ); ?>" value="<?php echo $instance['response_font_size']; ?>" style="width:100%;" />
		</p>

		<?php
	}
}

class CallBack_Button_Widget extends WP_Widget {

	function CallBack_Button_Widget() {
		$widget_ops = array( 'classname' => 'callback_button_widget', 'description' => __('A widget that displays the authors name ', 'callback_button_widget') );

		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'callback_button_widget' );

		$this->WP_Widget( 'callback_button_widget', __('Callback Button', 'callback_button_widget'), $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title = $instance['title'];
		$width = $instance['width'];
		$height = $instance['height'];
		$color = $instance['color_font'];
		$color_hover = $instance['color_font_hover'];
		$font_size = $instance['font_size'];
		if (!(int)$width) $width='auto';
		if (!(int)$height) $height='auto';

			echo '
		<style>
		.blink-cb-module-main-btns a{
		font-size: '.$font_size.' !important;
		color: '.$color.' !important;
		}
		.blink-cb-module-main-btns a:hover{
		color: '.$color_hover.' !important;
		}
		</style>
		<div class="blink-cb-module-main-btns active search-blink-cb-module-btn" style="position: relative;  right: auto;  bottom: auto;  width: auto;  height: auto;  z-index: 99999;     display: block;">
			<div class="blink-cb-module-btns-container" style="width:'.$width.'; height:'.$height.'; " >
				<div class="blink-cb-module-main-btn-container animated bounceInRight" style="width:'.$width.'; height:'.$height.'; background: transparent">
					<div class="blink-cb-open-popup blink-cb-module-main-btn">
						<a href="#recall" class="feedback">'.$title.'</a>
					</div>
				</div>
			</div>
		</div>';
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['height'] = strip_tags( $new_instance['height'] );
		$instance['color_font'] = strip_tags( $new_instance['color_font'] );
		$instance['color_font_hover'] = strip_tags( $new_instance['color_font_hover'] );
		$instance['font_size'] = strip_tags( $new_instance['font_size'] );

		return $instance;
	}
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'color_font' => __('callback_button_widget', 'callback_button_widget'), 'font_size' => __('Bilal Shaheen', 'callback_button_widget'), 'show_info' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		// Title кнопки
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'callback_button_widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		//Цвет шрифта
		<p>
			<label for="<?php echo $this->get_field_id( 'color_font' ); ?>"><?php _e('Color_font:', 'callback_button_widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'color_font' ); ?>" name="<?php echo $this->get_field_name( 'color_font' ); ?>" value="<?php echo $instance['color_font']; ?>" style="width:100%;" />
		</p>
		//Цвет шрифта при наведении
		<p>
			<label for="<?php echo $this->get_field_id( 'color_font_hover' ); ?>"><?php _e('Color_font_hover:', 'callback_button_widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'color_font_hover' ); ?>" name="<?php echo $this->get_field_name( 'color_font_hover' ); ?>" value="<?php echo $instance['color_font_hover']; ?>" style="width:100%;" />
		</p>
		//Размер шрифта
		<p>
			<label for="<?php echo $this->get_field_id( 'font_size' ); ?>"><?php _e('Font_size:', 'callback_button_widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'font_size' ); ?>" name="<?php echo $this->get_field_name( 'font_size' ); ?>" value="<?php echo $instance['font_size']; ?>" style="width:100%;" />
		</p>
		//Ширина виджета
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Width:', 'callback_button_widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" style="width:100%;" />
		</p>
		//Высота виджета
		<p>
			<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Height:', 'callback_button_widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" style="width:100%;" />
		</p>
		<?php
	}
}



