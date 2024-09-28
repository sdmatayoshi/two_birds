<?php 
if(!isset($section)){
    header("Location: ../index.php");
}
?>
<!--carousel webiwabo star-->
<!-- class="container-xxl position-relative p-0"      <-esto es lo que modifica el carrusel si lo necesiotan hagan copy paste    -->
   <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
     <div class="carousel-indicators">
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
     </div>
     <div class="carousel-inner">
       <div class="carousel-item active">
         <img src="img/buho2.jpg" class="d-block w-100" style="height:fit-content" alt="...">
         <div class="carousel-caption d-none d-md-block animated fadeIn">
           <h1 style="color: white; text-align:center; text-shadow: 1px  0px 0px black,
               0px  1px 0px black,
              -1px  0px 0px black,
               0px -1px 0px black;">Bienvenido a Two Birds</h1>
           <p style="color: white; text-align:center; text-shadow: 1px  0px 0px black,
               0px  1px 0px black,
              -1px  0px 0px black,
               0px -1px 0px black;">El sitio web para todas las personas que quieren ayudar al planeta.</p>
         </div>
       </div>
       <div class="carousel-item">
         <img src="img/buu2.jpg" class="d-block w-100" alt="...">
         <div class="carousel-caption d-none d-md-block">
           <h1 style="color: white; text-align:center; text-shadow: 1px  0px 0px black,
               0px  1px 0px black,
              -1px  0px 0px black,
               0px -1px 0px black;">Aqui podras encontrar Informes</h1>
           <p style="color: white; text-align:center; text-shadow: 1px  0px 0px black,
               0px  1px 0px black,
              -1px  0px 0px black,
               0px -1px 0px black;">Animate a crear un informe para que la gente pueda verlo y tambien puedes ver los suyos .</p>
         </div>
       </div>
       <div class="carousel-item">
         <img src="img/buhoo2.jpg" class="d-block w-100" alt="...">
         <div class="carousel-caption d-none d-md-block">
           <h1 style="color: white; text-align:center; text-shadow: 1px  0px 0px black,
               0px  1px 0px black,
              -1px  0px 0px black,
               0px -1px 0px black;">Charla con las demas personas </h1>
           <p style="color: white; text-align:center; text-shadow: 1px  0px 0px black,
               0px  1px 0px black,
              -1px  0px 0px black,
               0px -1px 0px black;">En este sitio podras encontrar mas personas que tenga los mismos gusto que vos y no solo el amor por el planeta .</p>
         </div>
       </div>
     </div>
     <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Previous</span>
     </button>
     <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Next</span>
     </button>
   </div>
   <!--carousel webiwabo end-->