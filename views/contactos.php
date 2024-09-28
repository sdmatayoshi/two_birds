<?php 
if(!isset($section)){
    header("Location: ../index.php");
}
?>
<p class="p-2 text-light"><a href="index.php">Inicio</a> <i class="fa-solid fa-caret-right" style="color: darkgrey;"></i> <a style="color:grey; user-select:none;">Contactos</a></p>
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->


    <!-- Navbar & Hero End -->


    <!-- Full Screen Search Start -->
    <!-- Full Screen Search End -->


    <!-- About Start -->
    <div class="container-xxl py-5" style="font-family: 'Montserrat Alternates', sans-serif;">
        <div class="container px-lg-5">
            <div class="row g-5 align-items-center">
                <div class="section-title position-relative text-center mx-auto mb-4 pb-4 wow fadeInUp" data-wow-delay="0.1s" aling=right style=" max-width: 600px;" data-wow-delay="0.1s">
                    <h1 id="p1" align="center">CONTACTOS</h1>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="pt-5" align="center">
                        Puedes comunicarte con nosotros utilizando las redes sociales de Two Birds
                        <br>
                    <div style="text-align:center ;max-width: 600px;">
                        <a class="btn btn-light btn-social" href="https://twitter.com/twobirds002" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-light btn-social" href=""><i class="fab fa-reddit"></i></a>
                        <a class="btn btn-light btn-social" href=""><i class="fab fa-discord"></i></a>
                    </div>
                    </p>
                </div>
                <br>

                </p>
                <br><br>

            </div>
        </div>
    </div>




</div>
<div style="font-family: Monserrat Alternates, sans-serif;">
    <div class="col-md-6section-title position-relative text-center mx-auto mb-4 pb-4 wow fadeInUp" data-wow-delay="0.1s" aling=right style=" max-width: 600px;" data-wow-delay="0.1s">
        <div class="section-title position-relative text-center mx-auto mb-4 pb-4 wow fadeInUp" data-wow-delay="0.1s" aling=right style=" max-width: 600px;" data-wow-delay="0.1s">

            <i align="center" class="bi bi-chat-square-text alt fa-7x text-primary mb-3"> </i>


        </div>

        <!--Section: Contact v.2-->
        <section class="mb-4">

            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Nuestros contactos</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">¿Tiene alguna pregunta? Por favor, no dude en contactarnos directamente. Nuestro equipo le responderá en
                unos momentos para ayudarte.</p>
<h3>Porfavor elija su método de contacto</h3>
            <div align="left">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" id="nav_tel" name="cmethod" value="phone" onclick="tel_aparecer()">
                    <label class="form-check-label" for="nav_tel">Teléfono</label>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" id="nav_correo" name="cmethod" value="mail" onclick="correo_aparecer()">
                    <label class="form-check-label" for="nav_correo">Correo</label>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" id="nav_otro" name="cmethod" value="post" onclick="otro_aparecer()">
                    <label class="form-check-label" for="nav_otro">Otro</label>
                </div>
            </div>
            <div class="row">

                <div class="modal-content" id="telefono" style="display:none;">
                    <h2>Teléfono</h2>
                    <br>
                    <p>Llamanos a este número o envíanos un mensaje por whatsapp o telegram.</p>
                    <br>
                    <h4><i class="bi bi-telephone-fill"></i> : +01 234 5678</h4>
                    <h4><i class="bi bi-whatsapp"></i> : +01 234 5678</h4>
                    <h4><i class="bi bi-telegram"></i> : +01 234 5678</h4>
                </div>

                <div class="modal-content" id="otro" style="display: none;">
                    <h2>Otro</h2>
                    <br>
                    <p>Elija opción de contacto</p>
                    <br>
                    <div align="left">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" id="nav_tel" name="cmethod" value="phone">
                            <label class="form-check-label" for="nav_tel">En desarrollo</label>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" id="nav_correo" name="cmethod" value="mail">
                            <label class="form-check-label" for="nav_correo">En desarrollo</label>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" id="nav_otro" name="cmethod" value="post">
                            <label class="form-check-label" for="nav_otro">En desarrollo</label>
                        </div>
                    </div>
                </div>

                <div class="modal-content" id="correo" style="display:none; align-items:center">
                <br>
                <h2>Correo</h2>
                    <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" class="">Nombre de usuario</label>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" class="">Correo electronico</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">Encabezado</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="5" class="form-control md-textarea"></textarea>
                                    <label for="message">Cuerpo</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                        <button class="btn btn-primary" onclick="document.getElementById('contact-form').submit();" disabled>Enviar correo <i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>


<?php if (isset($_SESSION['usuario']) && (!isset($_GET['id']) || (isset($_GET['id']) && $_GET['id'] == $_SESSION['usuario']['id']))) { ?>
    <script src="js/contacto.js"></script>
    <?php if (isset($_GET['seccion'])) {
        if ($_GET['seccion'] == "telefono") { ?>
            <script type="text/javascript">
                teln_aparecer();
            </script>
        <?php }
        if ($_GET['seccion'] == "correo") { ?>
            <script type="text/javascript">
                correo_aparecer();
            </script>
        <?php }
        if (isset($_GET['seccion']) == "send") { ?>
            <script type="text/javascript">
                abrir_chat();
            </script>
        <?php } ?>
<?php }
}
