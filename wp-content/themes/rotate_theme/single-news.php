<?php
get_header();
?>
<section id="primary" class="content-area">
   <main id="main" class="site-main"> 
 
      <article class="single-view">   <!-- Dette er html skelettet til produktet -->
      <div class="container_1"> 
            <!-- Slideshow container -->
            <div class="slideshow-container">
            <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img class="pic" src="" alt="" >
            </div>

            <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img class="pic_2" src="" alt="">
            </div>

            <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img class="pic_3" src="" alt="">
            </div>

            <!-- Next og previous knapper-->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!--  dots/circles -->
            <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            </div>
           
      </div>
      <div class="container_2"> 
        <h2 class="title"></h2>
        <h3 class="pris"></h3>
        <p class="farve">COLOUR: </p>
        <div class="circle_singleview"></div>


        <div class="size_flexbox_1"> 
            <p>SELECT SIZE</p>
            <p>SIZE GUIDE</p>
        </div>

        <div class="size_flexbox_2"> 
            <p>32</p>
            <p>34</p>
            <p>36</p>
            <p>38</p>
            <p>40</p>
            <p>42</p>
            <p>44</p>
            <p>46</p>
        </div>
        <div class="button_box"> 
        <button> ADD TO CART</button>
        </div>

        <p class="details">PRODUCT DETAILS</p>
        <p class="shipping">SHIPPING & RETURNS</p>
      </div>
        </article>
   </main>

    <script>
        let news; /* Opretter en variabel "news" for at gemme data om produktet. */
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/news/"+<?php echo get_the_ID() ?>; /* Opretter en konstant "dbUrl" med URL'en til WordPress REST API-endepunktet for at hente detaljer om den aktuelle post. */

        async function getJson() { /* Starter en asynkron funktion "getJson", der håndterer fetching af JSON-data. */
            const data = await fetch(dbUrl); /* Fetcher data fra den angivne URL og venter på svaret. */
            news = await data.json(); /* Oversætter data til JSON-format og gemmer det i "news" variablen. */
            console.log(news);  /* Udskriver "news" objektet til konsollen. For at tjekke om det virker*/
            visNews(); /* Kalder funktionen "visNews()" for at opdatere HTML-elementerne med data. */
        }

        function visNews() { /* Starter en funktion "visNews" for at opdatere HTML-elementerne med data om produktet */
                console.log(news)
                document.querySelector(".title").textContent = news.title.rendered;   /* Opdaterer titlen med produktets titel. */
                document.querySelector(".pic").src = news.produktbillede[0].guid; /* Opdaterer billedets kilde med produktets billede. */
                document.querySelector(".pic_2").src = news.produktbillede[1].guid; /* Opdaterer billedets kilde med produktets billede. */
                document.querySelector(".pic_3").src = news.produktbillede[2].guid; /* Opdaterer billedets kilde med produktets billede. */
                document.querySelector(".pris").textContent = news.prisdk; /* Opdaterer prisen med produktets pris. */
                document.querySelector(".farve").textContent = document.querySelector(".farve").textContent.concat(news.color); /* concat sættes, så den tilføjer hvad der står i html'et merger det */
                document.querySelector(".circle_singleview").style.backgroundColor = news.farve; 

            }


        
            let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
        

    

        getJson(); /* Kalder "getJson()" funktionen for at starte hentningen af data. */

     </script>
 
</section>

<?php
get_footer();
?>