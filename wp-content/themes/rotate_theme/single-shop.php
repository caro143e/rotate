<?php
get_header();
?>
<section id="primary" class="content-area">
   <main id="main" class="site-main"> 
 
        <article>
            <img class="pic" src="" alt="">
             <div class="indhold">
                 <p class="title"></p>
                 <p class="pris"></p>
                 <div class="circle"></div>
             </div>
        </article>
   </main>

    <script>
        let shop;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/shop/"+<?php echo get_the_ID() ?>;

        async function getJson() {
            const data = await fetch(dbUrl);
            shop = await data.json();
            console.log(shop);
            visShop();
        }

        function visShop() {
          
                document.querySelector(".title").textContent = shop.title.rendered;
                document.querySelector(".pic").src = shop.produktbillede.guid;
                document.querySelector(".pris").textContent = shop.pris;

            }
        

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>