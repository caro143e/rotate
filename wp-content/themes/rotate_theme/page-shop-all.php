<?php
get_header();
?>
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
        <h3>Shop</h3>
        <section class="cardcontainer"></section>  
    </main>

    <script>
        let shop;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/shop?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            shop = await data.json();
            console.log(shop);
            visShop();
        }

        function visShop() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".cardcontainer")
            shop.forEach(shop => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector(".title").textContent = shop.title.rendered;
                klon.querySelector("img").src = shop.produktbillede[0].guid;
                klon.querySelector(".pris").textContent = shop.prisdk;
                klon.querySelector(".circle").style.backgroundColor = shop.farve; 
                klon.querySelector("article").addEventListener("mouseover", (event) => {
                event.currentTarget.querySelector("img").src = shop.produktbillede[1].guid;
             });

             klon.querySelector("article").addEventListener("mouseout", (event) => {
                event.currentTarget.querySelector("img").src = shop.produktbillede[0].guid;
                }); /*her siger så at når vi hover væk fra articlen podukt(card)over billedet skal billedet gå tilbage til det originale altsp news.produktbillede[0].guid, dette er billede nr 1 i JSON*/

                klon.querySelector("article").addEventListener("click", ()=> {location.href = shop.link; })
                container.appendChild(klon);


            })
        }

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>