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




// добавление полей в категорию
add_action('admin_init', 'category_custom_fields', 1);

// функция расширения функционала административного раздела
function category_custom_fields()
{
	$taxonomy = 'edited_' . $_GET['taxonomy'];
	if (!$_GET['taxonomy']) {
		$taxonomy = 'edited_' . $_POST['taxonomy'];
	}

	// добавления действия после отображения формы ввода параметров категории
	add_action('edit_category_form_fields', 'category_custom_fields_form');
	add_action('edit_tag_form_fields', 'category_custom_fields_form');

	// добавления действия при сохранении формы ввода параметров категории
	add_action("edited_category", 'category_custom_fields_save');
	add_action("$taxonomy", 'category_custom_fields_save');
}

function category_custom_fields_form($tag)
{
	$t_id = $tag->term_id;
	$cat_meta = get_option("{$tag->taxonomy}_{$t_id}");
	if (!$cat_meta){$cat_meta=get_fields("{$tag->taxonomy}_{$t_id}");}
	foreach ($cat_meta as $key=>$value):
		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="extra1"><?php _e($key); ?></label></th>
			<td>
				<input type="text" name="Cat_meta[<?=$key?>]" id="Cat_meta[<?=$key?>]" size="25" style="width:60%;"
					   value="<?php echo
					   $cat_meta[$key] ? $cat_meta[$key] : ''; ?>"><br/>
				<span class="description"><?php _e($key); ?></span>
			</td>
		</tr>
		<?php
	endforeach;
}

function category_custom_fields_save()
{
	$tag = $_POST['taxonomy'];
	$term_id = $_POST['tag_ID'];
	if (isset($_POST['Cat_meta'])) {
		$t_id = $term_id;
		$cat_meta = get_option("{$tag}_{$t_id}");
		$cat_keys = array_keys($_POST['Cat_meta']);
		foreach ($cat_keys as $key) {
			if (isset($_POST['Cat_meta'][$key])) {
				$cat_meta[$key] = $_POST['Cat_meta'][$key];
			}
		}
		//save the option array
		update_option("{$tag}_{$t_id}", $cat_meta);
	}
}