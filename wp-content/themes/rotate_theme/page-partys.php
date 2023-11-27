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
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/partys?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            party = await data.json();
            console.log(partys);
            visPartys();
        }

        function visPartys() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".produktcontainer")partys.forEach(ret => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector("h2").textContent = party.navn;
                klon.querySelector("img").src = billedUrl+ party.billede;
                klon.querySelector(".pris").textContent = party.pris;
                klon.querySelector(".farve").textContent = party.farve;
                klon.querySelector("article").addEventListener("click", ()=> {location.href = "restdb-single.html?id"+sunday._id;})
                container.appendChild(klon);
            })
        }

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>