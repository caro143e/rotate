<?php
get_header();
?>
 <main id="main" class="site-main">
    <h2>Rotate party</h2>
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
            partys.forEach(party => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector(".title").textContent = party.title.rendered;
                klon.querySelector("img").src = party.produktbillede.guid;
                klon.querySelector(".pris").textContent = party.pris;

                container.appendChild(klon);

            })
        }

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>