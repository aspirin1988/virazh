<?php
/*
Plugin Name: PP Gallery
Plugin URI: pp-gallery.kz
Description: Posts and pages gallery
Author: Sharipkanov Yertay
Version: 0.0.1
*/

require_once (dirname(dirname(dirname(__DIR__))) . '/wp-config.php');

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

define('PPGALLERYPATH', ABSPATH . 'wp-content/plugins/pp-gallery/');

if(isset($_FILES['files'])) {
    pp_gallery_upload();
}

if(isset($_POST['removeId'])) {
    pp_gallery_remove($_POST['removeId']);
}

if(isset($_POST['editId'])) {
    echo pp_gallery_edit($_POST['editId']);
}

function get_the_post_thumbnail_tag($id=false)
{
    if (!$id) {
        global $post;
        $id=$post->ID;
    }
    return $id;
}

function pp_gallery_upload() {
    global $wp_query;
    $postid = $wp_query->post->ID;

    echo $postid;

    $pp_upload_data['images'] = $_FILES['files'];
    $pp_upload_data['id'] = $_GET['postID'];

    global $wpdb;

    foreach($pp_upload_data['images']['error'] as $key => $value) {
        if($value == 0) {
            $target_dir = ABSPATH . "/wp-content/uploads/pp_gallery/" . $pp_upload_data['id'] . '/';
            $target_file = $target_dir . basename($pp_upload_data['images']["name"][$key]);
            $uploadOk = 1;

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                if (move_uploaded_file($pp_upload_data['images']["tmp_name"][$key], $target_file)) {
                    $name=basename($pp_upload_data['images']["name"][$key]);
                    $fileUrl = "/wp-content/uploads/pp_gallery/" . $pp_upload_data['id'] . '/' . $name;
                    $name=explode('.',$name);
                    $name=$name[0];
                    $query = "INSERT INTO pp_gallery_data (url, pp_id,name,alt) VALUES ('$fileUrl','{$pp_upload_data['id']}','{$name}','{$name}')";
                    $wpdb->query($query);

                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}

function pp_gallery_activation() {
    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();
    $table_name = 'pp_gallery_data';
    $sql = "CREATE TABLE $table_name (
        id int(9) NOT NULL AUTO_INCREMENT,
        url varchar(255) DEFAULT '' NOT NULL,
        pp_id int(9) NOT NULL,
        name TEXT,
        alt TEXT,
        description TEXT,
        UNIQUE KEY id (id)
    ) $charset_collate;";

    dbDelta( $sql );
}

function pp_gallery_get($id) {
    global $wpdb;

    $pp_gallery_get_query = "SELECT * FROM pp_gallery_data WHERE pp_id = '{$id}'";

    return $wpdb->get_results($pp_gallery_get_query);
}

function pp_gallery_remove($id) {
    global $wpdb;

    $pp_gallery_get_query = "DELETE FROM pp_gallery_data WHERE id = '{$id}'";

    return json_encode($wpdb->get_results($pp_gallery_get_query));
}

function pp_gallery_edit($id) {

    global $wpdb;
    $pp_data=$_POST['pp'];
    $pp_gallery_get_query = "UPDATE pp_gallery_data set nam='{$pp_data['name']}',alt='{$pp_data['alt']}',description='{$pp_data['description']}' WHERE id = '{$id}'";
    file_put_contents('text.txt',$pp_gallery_get_query);
//    return $pp_gallery_get_query;
    return json_encode($wpdb->get_results($pp_gallery_get_query));
}

function pp_gallery_widget_render() {
    $postID = get_the_ID();
    $pp_gallery_current_images = pp_gallery_get($postID);

    include(PPGALLERYPATH. 'pp-gallery-widget.php');
}

function pp_gallery_boxes() {
    add_meta_box('pp_gallery', 'PP Gallery', 'pp_gallery_widget_render', 'post');
    add_meta_box('pp_gallery', 'PP Gallery', 'pp_gallery_widget_render', 'page');
}

function my_enqueue($hook) {
    wp_enqueue_script( 'my_custom_uikit',  '/wp-content/plugins/pp-gallery/bower_components/uikit/js/uikit.min.js' );
    wp_enqueue_script( 'my_custom_upload', '/wp-content/plugins/pp-gallery/bower_components/uikit/js/components/upload.min.js' );
    wp_enqueue_script( 'my_custom_notify', '/wp-content/plugins/pp-gallery/bower_components/uikit/js/components/notify.min.js' );
    wp_enqueue_script( 'my_custom_pp-gallery', '/wp-content/plugins/pp-gallery/pp-gallery.js' );

}

add_action( 'admin_init', 'my_enqueue' );

register_activation_hook( __FILE__, 'pp_gallery_activation');
add_action('add_meta_boxes', 'pp_gallery_boxes');
add_action('save_post', 'pp_gallery_upload');
