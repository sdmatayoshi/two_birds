<?php 
if(!isset($section)){
    header("Location: ../index.php");
}
?>
<div class=" bg-white p-0" style="margin:0; width:100%;">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->

    <div class="py-5 bg-primary hero-header mb-5" style="font-family: 'Montserrat Alternates', sans-serif;">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5">
                <div class="col-lg-6 pt-5 text-center text-lg-start">
                    <h1 class="display-4 text-white mb-4 animated slideInLeft"></h1>
                    <h1 class="text-white mb-4 animated slideInLeft">
                        Bienvenido/a a nuestra página web
                    </h1>
                    <p class="mb-1 animated slideInLeft"
                        style="color:white; font-family: 'Montserrat Alternates', sans-serif;">ㅤAquí podrás explorar
                        informacion acerca del cambio climatico y otras problematicas. Además cuenta con un foro en el
                        cual puedes expresar tus ideas y responder comentarios de otros usuarios.<br><br>
                        ㅤPero eso no es lo único, ¡Tambien puedes publicar tus propios informes! Más abajo te hempos
                        dejado intrucciones sobre como hacerlo.<br><br>
                        ㅤ¡Aún no te vallas!<br>
                        Tambien dejamos una explicación acerca del calentamiento global y como combatirlo. Puedes leerlo
                        para enterarte más.
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid animated zoomIn" src="img/planetita.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

<!-- Domain Search Start -->
<div class="container-xxl domain mb-5" style="margin-top: 90px;">
    <div class="container px-lg-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title position-relative text-center mx-auto mb-4 pb-4 wow fadeInUp"
                    data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">¿Qué puedes hacer en este sitio web?</h1>
                    <p class="mb-animated wow fadeInUp" data-wow-delay="0.2s"
                        style="font-family: 'Montserrat', sans-serif">Este sitio es un pequeño foro diseñado para que
                        las personas puedan conocer todas las opiniones de los usuarios acerca del cambio climatico y
                        demás cosas que ocurren en nuestro planeta tierra.
                        <br> Tú tambien puedes contribuir y publicar tus ideas en forma de informes que, tanto los demás
                        usuarios del mundo, como tú podrán leer y comentar.
                        <br><br> Intenta crear tu primer informe (require de una cuenta de usuario)
                    </p><a href="forum.php?subir=true"
                        class="btn btn-primary py-sm-3 px-sm-5 me-3 animated wow fadeInUp" data-wow-delay="0.3s">Crea tu
                        primer informe aquí</a>
                    <br><br><br>
                    <p class="mb-1 animated wow fadeInUp" data-wow-delay="0.4s"
                        style="font-family: 'Montserrat', sans-serif;">Si no tienes una cuenta puedes empezar por crear
                        una</p>
                    <a href="register.php" class="btn btn-terciary py-sm-3 px-sm-5 me-3 animated FadeInUp"
                        data-wow-delay="0.5s" style="color:green">Crea tu cuenta</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Domain Search End -->


<!-- About Start -->
<div>
    <div>
        <div align="center">
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s" align="left">
                <h3>¿Por qué el nombre "<u>Two Birds</u>"?</h3>
                <p>El nombre de Two Birds fue elegido por nuestro equipo ya que representa la colaboracion de nuestro
                    grupo y otras organizaciones como por ejemplo<br> <a
                        href="http://localhost/22-4.12-proyectos/foromilitar/"><u>GlobalElite</u></a>, <a
                        href="http://localhost/22-4.12-proyectos/gannis/"><u>PetOrporation</u><a> o <a
                                href="http://localhost/22-4.12-proyectos/home_cooking/"><u>Misk'i</u></a>. También
                            creimos que puede simbolizar la colaboracion entre los miembros, la ayuda mutua y los lazos
                            que logramos formar con todo el equipo. Two Birds no solo son dos simples pájaros, si no
                            que, es una mustra de la misma convivencia que nosotros queremos lograr en el mundo.</p>
            </div>
            <br>
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s" align="right">
                <h3>Objetivos de nustra agrupacion</h3>
                <p>Al igual que hemos mencionado en el punto anterior, queremos lograr una convivencia entre todos en el
                    mundo, ya sean ,animales, plantas, o incluso los microorganismos que habitan en todos lados. Esto lo
                    queremos lograr mediante un foro en el que cada persona puede expresarse y ayudar a combatir las
                    problemáticas que nos afectan hasta hoy en día.</p>
            </div>
            <br>
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s" align="left">
                <h3>Foro</h3>
                <p>El foro fue diseñado y preparado para que cada usuario pueda subir sus informes (siempre y cuando
                    tenga una cuenta registrada) y comentar sobre ellos. Estos informes los llamamos "Squeaks" y aunque
                    actualmente las imagenes estan limitadas por vínculos esperamos algun día mejorarlo y que sea más
                    intuitivo.</p>
            </div>
            <br>
            <div class="modal-footer col-lg-7 wow fadeInUp" data-wow-delay="0.1s"></div><br>
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s" align="left">
                <h3>Nuestra siguiente meta</h3>
                <p>Actualmente, nuestro equipo está trabajando en la implemetacion de un chat privado para poder
                    comunicarte con tus amigos sin necesidad de utilizar los comentarios de los Squeaks. Esperamos que
                    esta adición fomente la socialisación entre los usuarios y puedan encontrar mejores maneras de
                    aportar algo a nuestra comunidad.<br> También buscamos mejorar los Squeaks ya que no se pueden
                    añadir imagenes pre-guardadas en los dispositivos locales, por lo tanto estamos trabajando en ello.
                    <br> Lamentamos cualquier molestia que puedan traer estos pequeños errores y esperamos mejorar en lo
                    posible. <br><br> atte.: Equipo de desarrollo de Two Birds.<br><br> P.D.: Gracias por elegir nuestra
                    comunidad para ayudar al planeta
                </p>
            </div>
            <div class="modal-footer col-lg-7 wow fadeInUp" data-wow-delay="0.1s"></div><br>
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                <div class="section-title position-relative mb-4 pb-4">

                    <br>


                    <?php
                    function random_user()
                    {
                        $vrandom = rand(1, 10000);
                        return ($vrandom);
                    }
                    function random_info()
                    {
                        $vrandom2 = rand(1, 300);
                        return ($vrandom2);
                    }
                    ?>
                    <div class="row g-3">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="bg-light rounded text-center p-4"
                                style="border:2px solid #000; width:200px; height:250px;">
                                <i class="fa fa-temperature-high fa-2x text-primary mb-2"></i>
                                <div class="modal-body">
                                    <h5 class="mb-1">
                                        <div class="alert alert-dark bg-secondary"
                                            style="width: 175px; margin-left:-25%;" role="alert">
                                            Coming Soon
                                        </div>
                                    </h5>
                                </div>
                                <div class="modal-footer">
                                    <p class="mb-0" style="font-family: 'Montserrat', sans-serif">Temperatura actual</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="bg-light rounded text-center p-4"
                                style="border:2px solid #000; width:200px; height:250px;">
                                <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                <div class="modal-body">
                                    <div class="alert alert-dark bg-white border-0"
                                        style="width: 175px; margin-left:-25%" role="alert">
                                        <h5 class="mb-1" data-toggle="counter-up">
                                            <?php echo random_user() ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <p class="mb-0" style="font-family: 'Montserrat', sans-serif">Usuarios activos</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="bg-light rounded text-center p-4"
                                style="border:2px solid #000; width:200px; height:250px;">
                                <i class="fa fa-file-circle-plus fa-2x text-primary mb-2"></i>
                                <div class="modal-body">
                                    <div class="alert alert-dark bg-white border-0"
                                        style="width: 175px; margin-left:-25%" role="alert">
                                        <h5 class="mb-1" data-toggle="counter-up">
                                            <?php echo random_info() ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <p class="mb-0" style="font-family: 'Montserrat', sans-serif">Informes nuevos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s"
        style="font-family: 'Montserrat Alternates', sans-serif;">
        <div class="container px-lg-5">
            <div class="owl-carousel testimonial-carousel">
                <?php foreach ($usuarios as $us) { ?>
                <div
                    class="testimonial-item position-relative bg-light border-top border-5 border-primary rounded p-4 mt-4">
                    <div class="d-flex align-items-center justify-content-center position-absolute top-0 start-0 ms-5 translate-middle bg-primary rounded-circle"
                        style="width: 45px; height: 45px; margin-top: -3px;">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                    <p class="mt-3" style="font-size:12px;">
                        <?php if (strlen($us['descripcion']) > 20) {
                        echo substr($us['descripcion'], 0, 20) . '...';
                    } else {
                        ;
                        echo $us['descripcion'];
                    } ?>
                    </p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle"
                            src="img/usuarios/<?php echo $us['id'] . "/" . $us['foto'] ?>"
                            style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">
                                <?php if (strlen($us['user_name']) > 14) {
                        echo substr($us['user_name'], 0, 14) . "...";
                    } else {
                        echo $us['user_name'];
                    } ?>
                            </h6>
                            <a href="my_profile.php?id=<?php echo $us['id']; ?>"><button style=" width:150px;"
                                    type="button" class="btn btn-primary bg-success">
                                    Ver perfil
                                </button></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->




    <!-- Back to Top -->

</div>