<?php
add_action( 'wp_enqueue_scripts', 'enqueue_important_files' );
function enqueue_important_files() {
/*hent parent stylesheet i parenttemaets mappe*/
wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
/* 
Enqueue child style og tilføj afhængighed af parent-style for at sikre child-style bliver loadet efter parent (bruger array).
Bemærk at vi ikke bruger 'get_template_directory_uri' men 'get_stylesheet_directory_uri'.
*/
wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/style.css', array('parent-style') );
}
?>