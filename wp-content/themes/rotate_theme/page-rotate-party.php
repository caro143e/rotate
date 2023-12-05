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
        <section class="cardcontainer"></section>
    </main>

    <script>
        let partys;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/party?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            partys = await data.json();
            console.log(partys);
            visPartys();
        }

        function visPartys() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".cardcontainer")
            partys.forEach(partys => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector(".title").textContent = partys.title.rendered;
                klon.querySelector("img").src = partys.produktbillede.guid;
                klon.querySelector(".pris").textContent = partys.pris;
                klon.querySelector(".circle").style.backgroundColor = partys.farve; 
                klon.querySelector("article").addEventListener("mouseover", (event) => {
                event.currentTarget.querySelector("img").src = partys.produktbillede[1].guid;

             });

              klon.querySelector("article").addEventListener("mouseout", (event) => {
                event.currentTarget.querySelector("img").src = partys.produktbillede[0].guid;
                }); /*her siger så at når vi hover væk fra articlen podukt(card)over billedet skal billedet gå tilbage til det originale altsp news.produktbillede[0].guid, dette er billede nr 1 i JSON*/

                klon.querySelector("article").addEventListener("click", ()=> {location.href = partys.link; })
                container.appendChild(klon);

         })
        
        }

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>
