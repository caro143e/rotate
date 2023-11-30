<?php
get_header();
?>
<template>
    <article>
            <div>
                <p class="title"></p>
            </div>
    </article>
</template>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="shopcontainer"></section>
    </main>

    <script>
        let shops;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/shop?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            shops = await data.json();
            console.log(shops);
            visShops();
        }

        function visShops() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".shopcontainer")
            shops.forEach(shop => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector(".title").textContent = shop.title.rendered;
                klon.querySelector("img").src = shop.produktbillede.guid;
                klon.querySelector(".pris").textContent = shop.pris;

                container.appendChild(klon);

            })
        }

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>