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
        <section class="retcontainer"></section>
    </main>

    <script>
        let ret;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/ret?per_page=100";

        async function getJson() {
            let response = await fetch(url);
            retter = await respone.json();
            console.log(sundays);
            visRetter();
        }

    

        getJson();

     </script>
 
</section>

<?php
get_footer();
?>