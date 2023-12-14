<?php
get_header();
?>
  
   
 <template>
        <article>
            <img src="" alt="" height="603px" width="403px">
             <div class="indhold">
                 <p class="title"></p>
                 <p class="pris"></p>
                 <div class="circle"></div>
             </div>
        </article>
    </template>

<section id="primary" class="content-area">
     <div class="banner">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/pictures/rotate.svg" alt="Rotate logo" class="responsive-svg" height="197px" width="928px">
    </div>
   
    <main id="main" class="site-main">   
        <section class="cardcontainer"></section>
    </main>

    <script>
        let party;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/party?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            party = await data.json();
            console.log(party);
            visParty();
        }

        function visParty() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".cardcontainer")
            party.forEach(party => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector(".title").textContent = party.title.rendered;
                klon.querySelector("img").src = party.produktbillede[0].guid;
                klon.querySelector(".pris").textContent = party.prisdk;
                klon.querySelector(".circle").style.backgroundColor = party.farve; 
                klon.querySelector("article").addEventListener("mouseover", (event) => {
                event.currentTarget.querySelector("img").src = party.produktbillede[1].guid;

             });

              klon.querySelector("article").addEventListener("mouseout", (event) => {
                event.currentTarget.querySelector("img").src = party.produktbillede[0].guid;
                }); /*her siger så at når vi hover væk fra articlen podukt(card)over billedet skal billedet gå tilbage til det originale altsp news.produktbillede[0].guid, dette er billede nr 1 i JSON*/

                klon.querySelector("article").addEventListener("click", ()=> {location.href = party.link; })
                container.appendChild(klon);

         })
        
        }

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>
