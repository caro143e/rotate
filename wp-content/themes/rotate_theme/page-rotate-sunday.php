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
        <section class="cardcontainer"></section>
    </main>

    <script>
        let sundays;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/sunday?per_page=100";

        async function getJson() {
            const data = await fetch(dbUrl);
            sundays = await data.json();
            console.log(sundays);
            visSundays();
        }

        function visSundays() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".cardcontainer")sundays.forEach(sunday => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector("h2").textContent = party.navn;
                klon.querySelector("img").src = billedUrl+ sunday.billede;
                klon.querySelector(".pris").textContent = sunday.pris;
                klon.querySelector(".farve").textContent = sunday.farve;
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