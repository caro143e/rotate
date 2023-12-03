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
        let news;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/news/"+<?php echo get_the_ID() ?>;

        async function getJson() {
            const data = await fetch(dbUrl);
            news = await data.json();
            console.log(news);
            visNews();
        }

        function visNews() {
          
                document.querySelector(".title").textContent = news.title.rendered;
                document.querySelector(".pic").src = news.produktbillede.guid;
                document.querySelector(".pris").textContent = news.pris;

            }
        

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>