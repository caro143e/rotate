<?php
get_header();
?>
 <main id="main" class="site-main">
  <section class="cardcontainer"></section>  
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
   
        
    </main>

    <script>
        let sundays;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/sunday?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            sundays = await data.json();
            console.log(sundays);
            visSundays();
        }

        function visSundays() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".cardcontainer")
            sundays.forEach(sunday => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector(".title").textContent = sunday.title.rendered;
                klon.querySelector("img").src = sunday.produktbillede.guid;
                klon.querySelector(".pris").textContent = sunday.pris;

                container.appendChild(klon);

            })
        }

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>