<?php
get_header();
?>
<template>
            <article>
                <img src="" alt="">
                <div>
                    <h2></h2>
                    <p>pris</p>
                    <p>farve</p>
                </div>
            </article>
        </template>
<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="produktcontainer"></section>
    </main>

    <script>
        let retter;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/ret?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            retter = await data.json();
            console.log(retter);
            visRetter();
        }

        function visRetter() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".produktcontainer")retter.forEach(ret => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector("h2").textContent = ret.title.rendered;
                klon.querySelector("img").src = ret.produktbillede.guid;
                klon.querySelector(".pris").textContent = ret.pris;
                klon.querySelector(".farve").textContent = ret.farve;
                //klon.querySelector("article").addEventListener("click", ()=> {location.href = "restdb-single.html?id"+sunday._id;})
                container.appendChild(klon);
            })
        }

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>