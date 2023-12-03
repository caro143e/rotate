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
        let news;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/news?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            news = await data.json();
            console.log(news);
            visNews();
        }

        function visNews() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".cardcontainer")
            news.forEach(news => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector(".title").textContent = news.title.rendered;
                klon.querySelector("img").src = news.produktbillede[0].guid;
                klon.querySelector(".pris").textContent = news.pris;
                klon.querySelector("article").addEventListener("mouseover", (event) => {
                event.currentTarget.querySelector("img").src = news.produktbillede[1].guid;
                }); /*her siger jeg at når vi hover hen over artcilen (card) skal billedet ændre sig til news.produktbillede[1].guid, dette er billede nr 2 i JSON*/

                klon.querySelector("article").addEventListener("mouseout", (event) => {
                event.currentTarget.querySelector("img").src = news.produktbillede[0].guid;
                }); /*her siger så at når vi hover væk fra articlen podukt(card)over billedet skal billedet gå tilbage til det originale altsp news.produktbillede[0].guid, dette er billede nr 1 i JSON*/

                klon.querySelector("article").addEventListener("click", ()=> {location.href = news.link; })
                container.appendChild(klon);

            })
        }

        

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>
<style>
    .partycontainer {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    padding: 50px;
    width: 100%;
    max-width: 1500px;
    margin: 0 auto;
    background-color: #f0ede6;
  }
  
  .partycontainer img {
    border-bottom: solid 2px black;
  }
</style>