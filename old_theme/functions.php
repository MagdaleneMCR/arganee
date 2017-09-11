<?php

function arganee_load_js() {
    wp_enqueue_script( 'arganee', get_stylesheet_directory_uri() . '/js/arganee.js', array( 'jquery' ), '1.12' );
}
add_action( 'wp_enqueue_scripts', 'arganee_load_js' );

?>