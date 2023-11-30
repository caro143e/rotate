<?php
get_header();
?>
 <main id="main" class="site-main">
    <h2>Shop</h2>
  <section class="cardcontainer"></section>  
    <template>
        <article>
            <img src="" alt="">
             <div>
                 <p class="title"></p>
                 <p class="pris"></p>
             </div>
        </article>
    </template>

<section id="primary" class="content-area">
   
        
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
            let container = document.querySelector(".cardcontainer")
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