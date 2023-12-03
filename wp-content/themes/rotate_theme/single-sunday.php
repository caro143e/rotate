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
        let sunday;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/sunday/"+<?php echo get_the_ID() ?>;

        async function getJson() {
            const data = await fetch(dbUrl);
            sunday = await data.json();
            console.log(sunday);
            visSunday();
        }

        function visSunday() {
          
                document.querySelector(".title").textContent = sunday.title.rendered;
                document.querySelector(".pic").src = sunday.produktbillede.guid;
                document.querySelector(".pris").textContent = sunday.pris;

            }
        

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>