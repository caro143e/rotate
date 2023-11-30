<?php
get_header();
?>
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
    <main id="main" class="site-main">
        <section class="newcontainer"></section>
    </main>

    <script>
        let news;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/new?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            news = await data.json();
            console.log(news);
            visNews();
        }

        function visNews() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".newcontainer")
            news.forEach(new => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector(".title").textContent = new.title.rendered;
                klon.querySelector("img").src = new.produktbillede.guid;
                klon.querySelector(".pris").textContent = new.pris;

                container.appendChild(klon);

            })
        }

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>