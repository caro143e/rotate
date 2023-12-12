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


<template>
        <article>
            <img src="" alt="">
             <div class="indhold">
                 <p class="title"></p>
                 <p class="pris"></p>
                 <div class="circle"></div>
             </div> 
        </article>
    </template>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="cardcontainer"></section>
    </main>

<script>
        let alt_data;
        const current_path = window.location.pathname; // Jeg hiver nuværende path ud. F.eks. /kea/rotate/category/rotate-sunday/xxx/
        const chosen_category = current_path.split("/")[3]; // Jeg splitter path ud fra '/' sådan at ovenstående bliver til ["", "kea", "rotate", "category", "rotate-sunday", "xxx"] og vælger indeks 4 (rotate-sunday. Altså den valgte kategori)
        const filter_cat = current_path.split("/")[4];
        const slug_map = { // Opslagsbog til at oversætte fra kategorien vi fandt i path til den aktuelle slug. "new-arrivals" bliver har f.eks. slug'en "news"
            "new-arrivals": "news",
            "rotate-sunday": "sunday",
            "rotate-party": "party",
            "shop-all": "shop",
        }
        
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/"+slug_map[chosen_category]+"?per_page=100"; // Jeg opbygger min dbUrl dynamisk baseret på hvilken kategori der er valgt.

        /*henter kategoriener fra backend*/
        const catUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/categories?per_page=100";

        async function getJson() { 
            const data = await fetch(dbUrl);
            const catdata = await fetch(catUrl);
            alt_data = await data.json();
            categories = await catdata.json();
            console.log(filter_cat);
            console.log(categories);
            const catId = getCatId(filter_cat, categories);
            visTilhørendeProdukter(alt_data, catId);
        }
        function getCatId(cat_name,categories) {
            const cat = categories.find(cat => cat.slug == cat_name);
            console.log(cat);
            return cat.id;
        }
        
        function visTilhørendeProdukter(data, catId) {
            let temp = document.querySelector("template");
            let container = document.querySelector(".cardcontainer")
            data.forEach(data => {
                if( data.categories.includes(catId)){
                    let klon = temp.cloneNode(true).content;
                klon.querySelector(".title").textContent = data.title.rendered;
                klon.querySelector("img").src = data.produktbillede[0].guid;
                klon.querySelector(".pris").textContent = data.prisdk;
                klon.querySelector(".circle").style.backgroundColor = data.farve; 
                klon.querySelector("article").addEventListener("mouseover", (event) => {
                event.currentTarget.querySelector("img").src = data.produktbillede[1].guid;
                }); /*her siger jeg at når vi hover hen over artcilen (card) skal billedet ændre sig til data.produktbillede[1].guid, dette er billede nr 2 i JSON*/

                klon.querySelector("article").addEventListener("mouseout", (event) => {
                event.currentTarget.querySelector("img").src = data.produktbillede[0].guid;
                }); /*her siger så at når vi hover væk fra articlen podukt(card)over billedet skal billedet gå tilbage til det originale altsp data.produktbillede[0].guid, dette er billede nr 1 i JSON*/

                klon.querySelector("article").addEventListener("click", ()=> {location.href = data.link; })
                container.appendChild(klon);
                }
                

            })
        }

        getJson();
        
     </script>
<?php get_footer(); ?>