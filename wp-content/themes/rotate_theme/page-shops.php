<?php
get_header();
?>
<template>
            <article>
                <img src="" alt="">
                <div>
                    <h2></h2>
                    <p>pris</p>
                    <p>farve</p>
                </div>
            </article>
        </template>
<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="produktcontainer"></section>
    </main>

    <script>
        let shops;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/shops?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            sundays = await data.json();
            console.log(shops);
            visShops();
        }

        function visShops() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".produktcontainer")shops.forEach(ret => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector("h2").textContent = shop.navn;
                klon.querySelector("img").src = billedUrl+ shop.billede;
                klon.querySelector(".pris").textContent = shop.pris;
                klon.querySelector(".farve").textContent = shop.farve;
                klon.querySelector("article").addEventListener("click", ()=> {location.href = "restdb-single.html?id"+sunday._id;})
                container.appendChild(klon);
            })
        }

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>