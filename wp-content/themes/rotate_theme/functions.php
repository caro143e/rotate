<?php 
add_action('wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
    // Enqueue the parent theme style.css
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
?>
