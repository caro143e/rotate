<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>


<div> <h2>Hello world</h2></div>

<script>
        let news;
        const current_path = window.location.pathname; // Jeg hiver nuværende path ud. F.eks. /kea/rotate/category/rotate-sunday/xxx/
        const chosen_category = current_path.split("/")[4]; // Jeg splitter path ud fra '/' sådan at ovenstående bliver til ["", "kea", "rotate", "category", "rotate-sunday", "xxx"] og vælger indeks 4 (rotate-sunday. Altså den valgte kategori)
        const slug_map = { // Opslagsbog til at oversætte fra kategorien vi fandt i path til den aktuelle slug. "new-arrivals" bliver har f.eks. slug'en "news"
            "new-arrivals": "news",
            "rotate-sunday": "sunday",
            "rotate-party": "party",
            "shop-all": "shop",
        }
        
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/"+slug_map[chosen_category]+"?per_page=100"; // Jeg opbygger min dbUrl dynamisk baseret på hvilken kategori der er valgt.

        async function getJson() { 
            const data = await fetch(dbUrl);
            news = await data.json();
            console.log(news);
            //visNews();
        }

        getJson();
        
     </script>
<?php get_footer(); ?>