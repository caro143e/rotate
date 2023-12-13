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
        <button> ADD TO CART</button>
        </div>

        <p class="details">PRODUCT DETAILS</p>
        <p class="shipping">SHIPPING & RETURNS</p>
      </div>

         
        </article>
   </main>

    <script>
        let shops;
        const dbUrl = "https://loststudios.dk/kea/rotate/wp-json/wp/v2/shop/"+<?php echo get_the_ID() ?>;

        async function getJson() {
            const data = await fetch(dbUrl);
            shops = await data.json();
            console.log(shops);
            visShop();
        }

        function visShop() {
          console.log(shops)
                document.querySelector(".title").textContent = shops.title.rendered;
                document.querySelector(".pic").src = shops.produktbillede[0].guid;
                document.querySelector(".pic_2").src = shops.produktbillede[1].guid; /* Opdaterer billedets kilde med produktets billede. */
                document.querySelector(".pic_3").src = shops.produktbillede[2].guid; /* Opdaterer billedets kilde med produktets billede. */
                document.querySelector(".pris").textContent = shops.prisdk;
                document.querySelector(".farve").textContent = document.querySelector(".farve").textContent.concat(shops.color); /* concat sættes, så den tilføjer hvad der står i html'et merger det */
                document.querySelector(".circle_singleview").style.backgroundColor = shops.farve; 
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
}

// Attach click event listeners to each size button
sizeButtons.forEach(button => button.addEventListener('click', handleButtonClick));

     </script>
 
</section>

<?php
get_footer();
?>