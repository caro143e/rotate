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
    <div class="banner2">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/pictures/sunday.svg" alt="Rotate logo" class="responsive-svg">
    </div>
   <main id="main" class="site-main">
     <section class="cardcontainer"></section> 
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
            sundays.forEach(sundays => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector(".title").textContent = sundays.title.rendered;
                klon.querySelector("img").src = sundays.produktbillede.guid;
                klon.querySelector(".pris").textContent = sundays.prisdk;
                klon.querySelector(".circle").style.backgroundColor = sundays.farve; 
                klon.querySelector("article").addEventListener("mouseover", (event) => {
                event.currentTarget.querySelector("img").src = sundays.produktbillede[1].guid;
                });
                klon.querySelector("article").addEventListener("mouseout", (event) => {
                event.currentTarget.querySelector("img").src = sundays.produktbillede[0].guid;
                }); /*her siger så at når vi hover væk fra articlen podukt(card)over billedet skal billedet gå tilbage til det originale altsp news.produktbillede[0].guid, dette er billede nr 1 i JSON*/

                klon.querySelector("article").addEventListener("click", ()=> {location.href = sundays.link; })
                container.appendChild(klon);

            })
        }

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>