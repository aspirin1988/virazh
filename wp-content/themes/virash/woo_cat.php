<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 16.05.16
 * Time: 13:44
 */


function get_product_cat_bu_slug ($slug=''){
    $args = array(
        'child_of'     => 0,
        'parent'       => '',
        'orderby'      => 'id',
        'order'        => 'ASC',
        'hide_empty'   => 1,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => 0,
        'taxonomy'     => 'product_cat',
        'pad_counts'   => false,
        // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
    );
    $homeProducts = get_categories( $args );
    foreach ($homeProducts as  $value)
    {
        if ($value->slug==$slug)
        {
            return $value;
        }
    }
    return $homeProducts;
}

function get_products_cat_by_slug_parent($slug){
    $parent=get_product_cat_bu_slug($slug);
    $args = array(
        'child_of'     => 0,
        'parent'       => $parent->term_id,
        'orderby'      => 'id',
        'order'        => 'ASC',
        'hide_empty'   => 1,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => 0,
        'taxonomy'     => 'product_cat',
        'pad_counts'   => false,
        // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
    );

    return get_categories( $args );
}

function get_id_products_cat_by_slug_parent($slug){
    $parent=get_product_cat_bu_slug($slug);
    return $parent->term_id;
}