<?php 
if(!isset($section)){
    header("Location: ../index.php");
}
?>
<p class="p-2 m-0 text-light"><a href="index.php">Inicio</a> <i class="fa-solid fa-caret-right" style="color: darkgrey;"></i> <a style="color:grey; user-select:none;">Iniciar sesión</a></p>
<div class="bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->

    <div class=" mb-5" style="padding-bottom:40px; font-family: 'Montserrat Alternates', sans-serif;"> <!--fondo login y register  background-image: url(img/buu.jpg); background-repeat:no-repeat;background-size: cover;-->
        <div class="container py-5 px-lg-5" style="padding-top:0;background-image: url('img/fondo_login.png');">
            <div class="row g-5">
                <div class="col-lg-12 pt-5 text-center text-lg-start">
                    <style>
                        .gren {
                            color:lightgreen;
                            font-size: 45px;
                        }
                    </style>
                    <h1 class="gren" style="width:60%; text-align:center; margin-left:20%; text-shadow: 1px  0px 0px black, 0px  1px 0px black, -1px  0px 0px black, 0px -1px 0px black;">Bienvenido a la seccion de login</h1>
                    <div class="modal-content mx-auto" style="width: 40%;">
                        <div id="formulario">
                            <h2 class="mb-1" style="width:60%; text-align:center; margin-left:20%;">Iniciar sesión</h2>
                            <br>
                                <div id="error" class="bg-danger" hidden style="width:60%; text-align:center; margin-left:20%; color:white; background-color:red; border-radius:40px; padding-top:15px; padding-left:10px; padding-bottom:1px;">
                                    <p style="text-align:center;">Contraseña o nombre de usuario incorrecto</p>
                                </div>
                                <br>
                            <div class="form-element mx-auto" style="width: 70%;">
                                <label style="font-family: 'Montserrat', sans-serif;">Nombre de usuario o correo:</label>
                                <div class="input-group flex-nowrap">
                                    <input id="username" type="text" class="form-control" name="username" onkeydown="a_send(event)" maxlength="25" minlength="1" aria-label="username" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <br>
                            <div class="form-element mx-auto" style="width: 70%;">
                                <label style="font-family: 'Montserrat', sans-serif;">Contraseña: </label>
                                <div class="container px-2">
                                    <div class="row">
                                        <div class="col-10 px-0"><input maxlength="50" minlength="8" onkeydown="a_send(event)" type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="font-family: 'Montserrat', sans-serif; border-top-right-radius:0; border-bottom-right-radius:0;" required></div>
                                        <div class="col-2 p-0" onclick="eye('exampleInputEmail1','icon-ey-1')" style="text-align:center;"><i class="bi bi-eye-slash-fill form-control" id="icon-ey-1" style="cursor:pointer; border-radius:0; background-color:white; border-top-right-radius:5px; border-bottom-right-radius:5px; width:100%;"></i></div>
                                    </div>
                                </div>
                                <br>
                                <div class="input-group flex-nowrap" style="text-align:center ;">
                                    <input style="cursor:pointer;" type="checkbox" id="cierto">
                                    <label for="cierto">&nbsp;&nbsp;Mantener la sesion abierta</label>
                                </div>
                                <br>
                                <br>
                                <div style="text-align:center">
                                <input id="send" type="button" name="insert" value="Iniciar sesión" class="btn btn-success" style="font-family: 'Montserrat', sans-serif;">
                                </div>

                        <br><br>
                        <p align="center">¿No tiene cuenta? <a href="register.php" style="color:green; border-bottom: 0.5px solid darkgreen;">Registrese</a></p>
                    </div>
                    </div>
                    <?php // if (isset($_GET['error'])) { 
                    ?>
                    <!-- <div class="modal fade show" id="exampleModalLive" tabindex="-1" aria-labelledby="exampleModalLiveLabel" aria-modal="true" role="dialog" style="display: block; background-color:red;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLiveLabel">:(</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Contraseña o nombre de usuario invalido</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <?php // } 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/log_in.js"></script>