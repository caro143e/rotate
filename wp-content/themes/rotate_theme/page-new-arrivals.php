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
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/news?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            news = await data.json();
            console.log(news);
            visNews();
        }

        function visNews() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".newcontainer")
            news.forEach(news => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector(".title").textContent = news.title.rendered;
                klon.querySelector("img").src = news.produktbillede.guid;
                klon.querySelector(".pris").textContent = news.pris;

                container.appendChild(klon);

            })
        }

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>