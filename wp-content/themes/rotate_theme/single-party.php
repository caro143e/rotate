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
        let party;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/party/"+<?php echo get_the_ID() ?>;

        async function getJson() {
            const data = await fetch(dbUrl);
            party = await data.json();
            console.log(party);
            visParty();
        }

        function visParty() {
          
                document.querySelector(".title").textContent = party.title.rendered;
                document.querySelector(".pic").src = party.produktbillede.guid;
                document.querySelector(".pris").textContent = party.pris;

            }
        

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>