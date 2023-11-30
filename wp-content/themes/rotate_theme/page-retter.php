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
        let party;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/ret?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            party = await data.json();
            console.log(retter);
            //visParty();
        }

        function visRetter() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".produktcontainer")retter.forEach(ret => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector("h2").textContent = ret.title.rendered;
                klon.querySelector("img").src = produktbillede.guid;
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