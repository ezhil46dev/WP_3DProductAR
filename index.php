<?php
/*
Plugin Name: WP_3DProductAR
Description: Transform your WooCommerce store by effortlessly incorporating 3D models, revolutionizing how customers engage with and explore your products.
Version: 1.0
Author: Ezhilarasan and Durga
*/

// Add the custom dashboard page
function custom_dashboard_page() {
    add_menu_page(
        'WP_3DProductAR Page',
        'WP_3DProductAR',
        'manage_options',
        'custom-dashboard-slug',
        'wp_3dproductar_products_page',
        'dashicons-art', 
        20
    );
}
add_action('admin_menu', 'custom_dashboard_page');


function wp_3dproductar_products_page() {
    echo '<div>
    <h1>WP 3DProductAR Plugin</h1>
    <p>Transform your WooCommerce store by effortlessly incorporating 3D models, revolutionizing how customers engage with and explore your products.</p>
    </div>';
    
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        echo 'Yes, WooCommerce is enabled'.'<br>';
        echo '<br>';
        echo '<br>';
    } else {
        echo 'WooCommerce is NOT enabled!';
    }

    display_woocommerce_products();
}

function display_woocommerce_products() {
    $products = wc_get_products(array(
        'status' => 'publish', 
        'limit' => -1,         
        'orderby' => 'ID',    
        'order' => 'ASC',      
    ));
    
    $product_no = 0;
    foreach ($products as $product) {
        echo 'product no : '. $product_no++ . '<br>';
        echo 'Product Name: ' . $product->get_name() . '<br>';
        echo 'Product SKU: ' . $product->get_sku() . '<br>';
        echo 'Product Price: ' . $product->get_price() . '<br>';
        echo '<button>Upload Your 3D Model</button>';
        echo '<br>';
        echo '<br>';
    }   
    
}
