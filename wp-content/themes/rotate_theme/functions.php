<?php
add_action( 'wp_enqueue_scripts', 'enqueue_important_files' );
function enqueue_important_files() {
/*hent parent stylesheet i parenttemaets mappe*/
wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
?>

<?php  add_action('wp_enqueue_scripts', 'enqueue_parent_styles' );  
function enqueue_parent_styles() { 'Enqueue the parent theme style.css', wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css'); } ?>