<?php
get_header();
?>
<section id="primary" class="content-area">
   <main id="main" class="site-main"> 
 
      <article>   <!-- Dette er html skelettet til produktet -->
            <img class="pic" src="" alt="">
             <div class="indhold">
                 <p class="title"></p>
                 <p class="pris"></p>
                 <div class="circle"></div>
             </div>
        </article>
   </main>

    <script>
        let news; /* Opretter en variabel "news" for at gemme data om produktet. */
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/news/"+<?php echo get_the_ID() ?>; /* Opretter en konstant "dbUrl" med URL'en til WordPress REST API-endepunktet for at hente detaljer om den aktuelle post. */

        async function getJson() { /* Starter en asynkron funktion "getJson", der håndterer fetching af JSON-data. */
            const data = await fetch(dbUrl); /* Fetcher data fra den angivne URL og venter på svaret. */
            news = await data.json(); /* Oversætter data til JSON-format og gemmer det i "news" variablen. */
            console.log(news);  /* Udskriver "news" objektet til konsollen. For at tjekke om det virker*/
            visNews(); /* Kalder funktionen "visNews()" for at opdatere HTML-elementerne med data. */
        }

        function visNews() { /* Starter en funktion "visNews" for at opdatere HTML-elementerne med data om produktet */
          
                document.querySelector(".title").textContent = news.title.rendered;   /* Opdaterer titlen med produktets titel. */
                document.querySelector(".pic").src = news.produktbillede.guid; /* Opdaterer billedets kilde med produktets billede. */
                document.querySelector(".pris").textContent = news.pris; /* Opdaterer prisen med produktets pris. */

            }
        

    

        getJson(); /* Kalder "getJson()" funktionen for at starte hentningen af data. */

     </script>
 
</section>

<?php
get_footer();
?>