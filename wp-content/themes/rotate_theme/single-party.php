<?php
get_header();
?>
<section id="primary" class="content-area">
   <main id="main" class="site-main"> 
 
        <article class="single-view">
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
        <div class="lige-streg"></div>
        <p class="farve">COLOUR: </p>
        <div class="circle_singleview"></div>
       


        <div class="size_flexbox_1"> 
            <p class="select">SELECT SIZE (EU)</p>
            <p class="guide">SIZE GUIDE</p>
        </div>

        <div class="size_flexbox_2"> 
            <p class="size-button">32</p>
            <p class="size-button">34</p>
            <p class="size-button">36</p>
            <p class="size-button">38</p>
            <p class="size-button">40</p>
            <p class="size-button">42</p>
            <p class="size-button">44</p>
            <p class="size-button">46</p>
        </div>
        <div class="button_box"> 
        <button class="button_add_to_cart" onclick="showCartMenu()"> ADD TO CART</button>
        </div>

        <p class="details">PRODUCT DETAILS</p>
        <p class="shipping">SHIPPING & RETURNS</p>
      </div>

         
        </article>
        <div class="add_to_cart">
          <div>
            YOUR CART: (1)
          </div>
        <div class="add_indhold">
          <div class="add_billede">
            <img class="cart_pic" src="" alt="" >
          </div>
          <div class="add_data">
            <h4 class="cart_title"></h4>
            <p class="cart_farve">COLOUR: </p>
            <p class="cart_size">SIZE: </p>
            <p>QTY: 1 </p>
            <h5 class="cart_pris"></h5>
          </div>
          
        
        </div>
        <hr>
        <div class="add_buttons">
            <h5 class="cart_subtotal">SUBTOTAL</h5>
            <a href="https://loststudios.dk/kea/rotate/cart/"><button class="checkOutButton">PROCEED TO CHECK OUT</button></a>
           <button class="closeShopping" onclick="closeCartMenu()">CONTINUE SHOPPING</button>
            <p class="terms_and_conditions">BY PROCEEDING WITH THIS PAYMENT, YOU ACCEPT THE TERMS AND CONDITIONS AND CONFIRM THAT YOU HAVE READ AND UNDERSTOOD THE PRIVACY POLICY </p>
          </div>
        </div>

        <div class="shadow_overlay"></div>
   </main>

    <script>
        let party; /* Opretter en variabel "news" for at gemme data om produktet. */
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/party/"+<?php echo get_the_ID() ?>; /* Opretter en konstant "dbUrl" med URL'en til WordPress REST API-endepunktet for at hente detaljer om den aktuelle post. */

        async function getJson() { /* Starter en asynkron funktion "getJson", der håndterer fetching af JSON-data. */
            const data = await fetch(dbUrl); /* Fetcher data fra den angivne URL og venter på svaret. */
            party = await data.json();  /* Oversætter data til JSON-format og gemmer det i "news" variablen. */
            console.log(party);/* Udskriver "news" objektet til konsollen. For at tjekke om det virker*/
            visParty(); /* Kalder funktionen "visNews()" for at opdatere HTML-elementerne med data. */
            buildCartMenu();
        }

        function visParty() { /* Starter en funktion "visNews" for at opdatere HTML-elementerne med data om produktet */
        console.log(party)
                document.querySelector(".title").textContent = party.title.rendered;
                document.querySelector(".pic").src = party.produktbillede[0].guid;
                document.querySelector(".pic_2").src = party.produktbillede[1].guid; /* Opdaterer billedets kilde med produktets billede. */
                document.querySelector(".pic_3").src = party.produktbillede[2].guid; /* Opdaterer billedets kilde med produktets billede. */
                document.querySelector(".pris").textContent = party.prisdk;
                document.querySelector(".farve").textContent = document.querySelector(".farve").textContent.concat(party.color); /* concat sættes, så den tilføjer hvad der står i html'et merger det */
                document.querySelector(".circle_singleview").style.backgroundColor = party.farve; 

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

    

 getJson();

 
        // Get all size buttons
        const sizeButtons = document.querySelectorAll('.size-button');

// Function to handle button click
function handleButtonClick() {
  // Remove 'active' class from all buttons
  sizeButtons.forEach(button => button.classList.remove('active-size'));

  // Add 'active' class to the clicked button
  this.classList.add('active-size');

  active_size = this.textContent;
  buildCartMenu()
}

// Attach click event listeners to each size button
sizeButtons.forEach(button => button.addEventListener('click', handleButtonClick));
let active_size = 32;

function buildCartMenu() {
  document.querySelector(".cart_title").textContent = party.title.rendered;
  document.querySelector('.cart_pic').src = party.produktbillede[0].guid;
  document.querySelector(".cart_pris").textContent = party.prisdk;
  document.querySelector(".cart_farve").textContent = 'COLOUR: ' + party.color;
  document.querySelector(".cart_size").textContent = 'Size: ' + active_size;
  document.querySelector(".cart_subtotal").textContent = 'SUBTOTAL: ' + party.prisdk;
}

function showCartMenu() {
  let sideMenu = document.querySelector('.add_to_cart');
  let sideOverlay = document.querySelector('.shadow_overlay');
  sideMenu.classList.add('active_add_to_cart');
  sideOverlay.classList.add('active_shadow_overlay');
}

function closeCartMenu() {
  let sideMenu = document.querySelector('.add_to_cart');
  let sideOverlay = document.querySelector('.shadow_overlay');
  sideMenu.classList.remove('active_add_to_cart');
  sideOverlay.classList.remove('active_shadow_overlay');
}
 </script>
 
</section>

<?php
get_footer();
?>