<?php 
if(!isset($section)){
    header("Location: ../index.php");
}
?>
<p class="p-2 text-light m-0"><a href="index.php">Inicio</a> <i class="fa-solid fa-caret-right" style="color: darkgrey;"></i> <a style="color:grey; user-select:none;">Registrarse</a></p>
<div class="bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <style>
        .gren {
        color:lightgreen;
        font-size: 45px;
                        }
    </style>
    <!-- Spinner End -->
    <!-- Navbar & Hero Start -->

    <div class=" mb-5" style="padding-bottom:40px; font-family: 'Montserrat Alternates', sans-serif;">
        <div class="container my-5 py-5 px-lg-5" style="padding-top:0;">
            <div class="row g-9">
                <div class="col-lg-12 pt-5 text-center text-lg-start">
                    <h1 class="gren" style="width:60%; text-align:center; margin-left:20%; text-shadow: 1px  0px 0px black, 0px  1px 0px black, -1px  0px 0px black, 0px -1px 0px lightgreen;">Bienvenido a la Seccion de Registro</h1>
                    <div class="modal-content mx-auto" style="width: 40%;">
                        <div>
                            <h2 class="mb-3" style="width:60%; text-align:center; margin-left:20%;">Registrarse</h2>
                                <div class="alert alert-success" hidden role="alert" style="background-color:lightgreen ; text-align:center; margin-left:20%; width:30%;">
                                    Cuenta registrada con éxito! <a href="log_in.php">iniciar sesión</a>
                                </div>
                                <div class="alert alert-light" hidden id="error_nom" role="alert" style="background-color:red ; color:white; text-align:center; margin-left:20%; width:60%;">
                                    El nombre de usuario ya estan en uso
                                </div>
                                <div class="alert alert-light" hidden id="error_cor" role="alert" style="background-color:red ; color:white; text-align:center; margin-left:20%; width:60%;">
                                    El correo electronico ya estan en uso
                                </div>
                                <div class="alert alert-light" hidden id="error_cre" role="alert" style="background-color:red ; color:white; text-align:center; margin-left:20%; width:60%;">
                                    El nombre o el correo no son validos
                                </div>
                                <div class="alert alert-light" hidden id="error_con" role="alert" style="background-color:red ; color:white; text-align:center; margin-left:20%; width:60%;">
                                    La contraseña debe incluir mayusculas, minusculas, numeros y caracteres especiales
                                </div>
                            <div class="form-element" style="width:60%; text-align:center; margin-left:20%;">
                                <div class="form-group">
                                    <label for="exampleInputEmail0" class="form-label" style="font-family: 'Montserrat', sans-serif;">Usuario:</label>
                                    <input onkeydown="a_send(event)" type="text" name="username" class="form-control" id="exampleInputEmail0" aria-describedby="emailHelp" style="font-family: 'Montserrat', sans-serif;" maxlength="25" minlength="1" required>
                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                </div>
                            </div>
                            <div class="form-element" style="width:60%; text-align:center; margin-left:20%;">
                                <div class="form-element">
                                    <div class="form-group">
                                        <label for="exampleInputEmail12" class="form-label mt-4" style="font-family: 'Montserrat', sans-serif;">Correo electrónico:</label>
                                        <input onkeydown="a_send(event)" type="email" name="email" class="form-control" id="exampleInputEmail12" aria-describedby="emailHelp" style="font-family: 'Montserrat', sans-serif;" maxlength="50" minlength="5" required>
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                            </div>
                            <div class="form-element" style="width:60%; text-align:center; margin-left:20%;">
                                <div class="form-element">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label mt-4" style="font-family: 'Montserrat', sans-serif;">Contraseña:</label>
                                        <div class="container px-2">
                                            <div class="row">
                                                <div class="col-10 px-0"><input onkeydown="a_send(event)" minlength="8" type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="font-family: 'Montserrat', sans-serif; border-top-right-radius:0; border-bottom-right-radius:0;" required></div>
                                                <div class="col-2 align-self-center p-0" style="text-align:center;" onclick="eye('exampleInputEmail1','icon-ey-1')"><i class="bi bi-eye-slash-fill form-control" id="icon-ey-1" style="cursor:pointer; border-radius:0; background-color:white; border-top-right-radius:5px; border-bottom-right-radius:5px;"></i></div>
                                            </div>
                                        </div>
                                        <small id="emailHelp" class="form-text text-dark" style="opacity:0.8;">La contraseña debe incluir MAYUSCULAS, minusculas, numeros y signos (sin espacios)<br>Minimo 8 caracteres y maximo 50</small>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div style="text-align: center; margin-right: 90px;">
                                <input type="button" onclick="send()" name="insert" value="Registrarse" class="btn btn-success" style="font-family: 'Montserrat', sans-serif; margin-left:20%;">
                            </div>
                            </div>
                        <br>
                        <p style="width:60%; text-align:center; margin-left:20%;">¿Ya tienes una cuenta? <a href="log_in.php" style="color:green; border-bottom: 0.5px solid darkgreen;">Inicie sesión</a></p>
                    </div>
                </div>
            <?php if ($exito == true) { ?>
                <div class="alert alert-success" role="alert" style="background-color:lightgreen ; text-align:center; margin-left:20%; width:30%;">
                    Cuenta registrada con éxito! <a href="log_in.php">iniciar sesión</a>
                </div>
            <?php } else if (isset($_GET['error'])) { ?>
                <div class="alert alert-light" role="alert" style="background-color:red ; color:white; text-align:center; margin-left:20%; width:30%;">
                    El nombre o correo ya estan en uso
                </div>
            <?php } ?>


        </div>
    </div>
</div>
<script type="text/javascript">
    function eye(a, b) {
        if (document.getElementById(a).type == "text") {
            document.getElementById(a).type = "password"
        } else {
            document.getElementById(a).type = "text"
        }
        if (document.getElementById(b).className == "bi bi-eye-slash-fill form-control") {
            document.getElementById(b).className = "bi bi-eye-fill form-control"
        } else {
            document.getElementById(b).className = "bi bi-eye-slash-fill form-control"
        }
    }

    function a_send(event){
        if(event.key == "Enter"){
            send();
        }
    }

    function send(){
    if (document.getElementById("exampleInputEmail1").value && document.getElementById("exampleInputEmail0").value && document.getElementById("exampleInputEmail12").value) {
        console.log("a");
        $.ajax({
            type: "POST",
            url: 'register.php',
            data: { "password": document.getElementById("exampleInputEmail1").value, "username": document.getElementById("exampleInputEmail0").value, "email" : document.getElementById("exampleInputEmail12").value },
            success: function (response) {
                var jsonData = JSON.parse(response);
                console.log(jsonData);
                if (jsonData.error_cre) {
                    document.getElementById("error_cor").setAttribute("hidden",true)
                    document.getElementById("error_con").setAttribute("hidden",true)
                    document.getElementById("error_nom").setAttribute("hidden",true)
                    document.getElementById("error_cre").removeAttribute("hidden")
                }
                else if (jsonData.error_con) {
                    document.getElementById("error_cor").setAttribute("hidden",true)
                    document.getElementById("error_cre").setAttribute("hidden",true)
                    document.getElementById("error_nom").setAttribute("hidden",true)
                    document.getElementById("error_con").removeAttribute("hidden")
                }
                else if (jsonData.error_cor) {
                    document.getElementById("error_cre").setAttribute("hidden",true)
                    document.getElementById("error_con").setAttribute("hidden",true)
                    document.getElementById("error_nom").setAttribute("hidden",true)
                    document.getElementById("error_cor").removeAttribute("hidden")
                }
                else if (jsonData.error_nom) {
                    document.getElementById("error_cor").setAttribute("hidden",true)
                    document.getElementById("error_con").setAttribute("hidden",true)
                    document.getElementById("error_cre").setAttribute("hidden",true)
                    document.getElementById("error_nom").removeAttribute("hidden")
                }
                else if(jsonData.exito){
                    location.href = "my_profile.php";
                }
            }
        });
    }
}
</script>
