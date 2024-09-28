<?php
if (!isset($section)) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Two Birds</title>
    <link rel="icon" href="img/planetita.png" height=32px weight=32px>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://static.ecestaticos.com/file/03b/cf5/ccb/03bcf5ccbb6b0898a03ef09229a424db.css" rel="stylesheet">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body style="width:100%; margin-left:0; margin-right:0;">
    <?php
    $section = (isset($section)) ? $section : 'home';
    require_once "views/navbar.php";
    if ($section == "home") {
        //require_once "views/carousel.php";
    } else { ?>
        <div style="background-color:#7EBC12; width:100%; height:90px;"></div>
    <?php }
    require_once $section . ".php";
    if ($section == "log_in.php" || $section == "register.php") {
        echo "a";
    } else {
        require_once "views/footer.php";
    }
    ?>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script>
        var urli = [];
        var urlu = [];
        document.addEventListener('click', e => {
            if(document.getElementById("cbus").style.display == "block"){
                document.getElementById("cbus").style.display = "none"
            }
        })
        document.getElementById("buscre").addEventListener("input", () => {
            if (document.getElementById("buscre").value) {
                $.ajax({
                    type: "POST",
                    url: 'buscar-fast.php',
                    data: {
                        "busqueda": document.getElementById("buscre").value
                    },
                    success: function(response) {
                        var jsonData = JSON.parse(response);
                        const n = document.querySelector("#cbus")
                        n.innerHTML = "";
                        var concat = "";
                        if (jsonData.resultados.length > 0) {
                            urli = [];
                            urli.push("squeak.php?id=" + jsonData.resultados[0].id)
                            concat = '<li style="cursor:pointer; padding:10px;" onclick="ir(0)">'+jsonData.resultados[0].titulo+'</li>';
                            if (jsonData.resultados[1]) {
                                urli.push("squeak.php?id=" + jsonData.resultados[1].id)
                                concat += '<li style="cursor:pointer; padding:10px;" onclick="ir(1)">'+jsonData.resultados[1].titulo+'</li>';
                            }
                            if (jsonData.resultados[2]) {
                                urli.push("squeak.php?id=" + jsonData.resultados[2].id)
                                concat += '<li style="cursor:pointer; padding:10px;" onclick="ir(2)">'+jsonData.resultados[2].titulo+'</li>';
                            }
                        }
                        if (jsonData.usuarios.length > 0) {
                            concat += '<li style="cursor:default; opacity:0.5; font-size:14px; padding-left:6px; ">Usuarios</li>';
                            urlu = [];
                            urlu.push("my_profile.php?id=" + jsonData.usuarios[0].id)
                            concat += '<li style="cursor:pointer; padding:10px;" onclick="ir_a(4,0)">'+jsonData.usuarios[0].user_name+'</li>';
                            if (jsonData.usuarios[1]) {
                                urlu.push("my_profile.php?id=" + jsonData.resultados[1].id)
                                concat += '<li style="cursor:pointer; padding:10px;" onclick="ir_a(5,1)">'+jsonData.usuarios[1].user_name+'</li>';
                            }
                            if (jsonData.usuarios[2]) {
                                urlu.push("my_profile.php?id=" + jsonData.usuarios[2].id)
                                concat += '<li style="cursor:pointer; padding:10px;" onclick="ir_a(6,2)">'+jsonData.usuarios[2].user_name+'</li>';
                            }
                        }
                        n.innerHTML = concat;
                        n.style.display = "block";
                    }
                });
            }
        })

        function ir(a) {
            const t = document.querySelectorAll("#cbus li")[a]
            if (t) {
                window.location.replace(urli[a])
            }
        }
        function ir_a(a,b) {
            const t = document.querySelectorAll("#cbus li")[a]
            if (t) {
                window.location.replace(urlu[b])
            }
        }
    </script>
    <script defer>
        $(document).ready(function() {
            <?php if (isset($_SESSION['usuario'])) { ?>
                document.getElementById("desp").addEventListener("click", () => {
                    const nav = document.getElementById("drop_user")
                    if (nav.style.marginTop == "0px") {
                        nav.style.marginTop = "30px"
                    } else {
                        nav.style.marginTop = "0px"
                    }
                })
                <?php if ($section != "my_profile") { ?>

                    function modificar_vent(data) {
                        const tag = document.getElementById(data);
                        const span = document.createElement("span");
                        span.setAttribute("class", "bg-dark text-white");
                        span.setAttribute("style", "padding:5px; opacity:0.9;");
                        const texto = document.createTextNode("Modificar " + data);
                        span.appendChild(texto);
                        tag.appendChild(span);
                    }
                <?php } ?>
                document.querySelector("#drop_user").addEventListener("click", () => {
                    const nav = document.querySelector("#drop_user div")
                    if (!document.querySelector("#dropdown_contacto") || document.querySelector("#dropdown_contacto").style.display == "none") {
                        if (nav.style.display == "none") {
                            nav.style.display = "block"
                        } else {
                            nav.style.display = "none"
                        }
                    }
                })
                document.querySelector("#drop_user").addEventListener("mouseover", () => {
                    if (!document.querySelector("#dropdown_contacto") || document.querySelector("#dropdown_contacto").style.display == "none") {
                        document.querySelector("#drop_user div").style.display = "block"
                    }
                })
                document.querySelector("#drop_user").addEventListener("mouseout", () => {
                    if (!document.querySelector("#dropdown_contacto") || document.querySelector("#dropdown_contacto").style.display == "none") {
                        document.querySelector("#drop_user div").style.display = "none"
                    }
                })
                <?php if (isset($contactos) && count($contactos) > 0) { ?>
                    document.querySelector("#drop_contac").addEventListener("click", () => {
                        document.querySelector("#dropdown_menu").style.display = "none"
                        document.querySelector("#dropdown_contacto").style.display = "block";
                    })
                    document.querySelector("#dropdown_contacto i").addEventListener("click", () => {
                        document.querySelector("#dropdown_menu").style.display = "block";
                        document.querySelector("#dropdown_contacto").style.display = "none";
                    })
                <?php } ?>
                var conn = new WebSocket('ws://localhost:8080');
                var content = {
                    id: '<?php echo $_SESSION['usuario']['id']; ?>'
                }
                setTimeout(function() {
                    conn.send(JSON.stringify(content))
                }, 1000)
                const pop = document.getElementById("popnh")
                pop.style.position = "fixed";
                <?php if ($section == "my_profile" && isset($_GET['id']) && !isset($error)) { ?>
                    const nombre_des = "<?php echo $usuario['user_name']; ?>";
                    var conten = {
                        idp: '<?php echo $_GET['id']; ?>'
                    }
                    setTimeout(function() {
                        conn.send(JSON.stringify(conten))
                    }, 2000)
                    document.getElementById("nav_chat").addEventListener("click", function() {
                        var contin = {
                            visto: true
                        }
                        setTimeout(function() {
                            conn.send(JSON.stringify(contin))
                        }, 2000)
                        document.getElementById("cont_msg").scrollTop = document.getElementById("cont_msg").scrollHeight;
                        document.getElementById("msg").focus();
                    })
                    document.getElementById("nav_principal").addEventListener("click", function() {
                        var conton = {
                            visto: false
                        }
                        setTimeout(function() {
                            conn.send(JSON.stringify(conton))
                        }, 2000)
                    })
                    conn.onmessage = function(e) {
                        var amp = jQuery.parseJSON(e.data);
                        const men = document.createElement("div");
                        if (amp.activo == false && !document.getElementById("mer") && amp.id != <?php echo $_SESSION['usuario']['id']; ?>) {
                            const mer = document.createElement("h5");
                            mer.setAttribute("id", "mer");
                            mer.setAttribute("style", "text-align:center; color:black; background-color:lightgrey; font-weight:bold;");
                            mer.innerHTML = "Mensajes nuevos";
                            document.getElementById("cont_msg").appendChild(mer);
                        }
                        if (amp.nuevo) {
                            const drop = document.querySelector("#dropdown_contacto div");
                            for ($i = 0; $i < drop.childNodes.length; $i++) {
                                if (drop.childNodes[$i].id == "y" + amp.nuevo) {
                                    document.querySelector("#dropdown_contacto div #y" + amp.nuevo + " p .tap").style.color = "green";
                                }
                            }
                        }
                        if (amp.activos) {
                            const drop = document.querySelector("#dropdown_contacto div");
                            for ($i = 0; $i < drop.childNodes.length; $i++) {
                                for ($j = 0; $j < amp.activos.length; $j++) {
                                    if (drop.childNodes[$i].id == amp.activos[$i]) {
                                        document.querySelector("#dropdown_contacto div #y" + amp.activos[$j] + " p .tap").style.color = "green";
                                    }
                                }
                            }
                        }
                        if (!amp.nuevo && !amp.activos && !amp.chau) {
                            if (amp.person) {
                                men.className = "row";
                                men.setAttribute("style", "margin-left:30%; width:70%; border:solid 1px; margin-top:10px; background-color:lightgreen; border-radius:10px; padding-left:10px; padding-top:5px; padding-bottom:5px;");
                                men.innerHTML = "Tu<p></p>" + amp.msg;
                            } else {
                                men.className = "row";
                                men.setAttribute("style", "margin-left:0.1%; width:70%; border:solid 1px; margin-top:10px; background-color:lightgreen; border-radius:10px; padding-left:10px; padding-top:5px; padding-bottom:5px;");
                                men.innerHTML = nombre_des + "<p></p>" + amp.msg;
                            }
                        }
                        document.getElementById("cont_msg").appendChild(men);
                        document.getElementById("cont_msg").scrollTop = document.getElementById("cont_msg").scrollHeight;
                    };

                    document.getElementById("msg").addEventListener("keydown", (event) => {
                        if (event.key == "Enter") {
                            jQuery("#btn").click();
                        }
                    })
                    jQuery("#btn").click(function() {
                        var msg = jQuery("#msg").val();
                        if (msg.length < 1) {
                            return;
                        }
                        document.getElementById("msg").value = "";
                        var content = {
                            msg: msg
                        }
                        conn.send(JSON.stringify(content));
                    })
                <?php } else if (!isset($error)) { ?>
                    conn.onmessage = function(e) {
                        var amp = jQuery.parseJSON(e.data);
                        if (amp.chau) {
                            const drop = document.querySelector("#dropdown_contacto div");
                            for ($i = 0; $i < drop.childNodes.length; $i++) {
                                if (drop.childNodes[$i].id == "y" + amp.chau) {
                                    document.querySelector("#dropdown_contacto div #y" + amp.chau + " p .tap").style.color = "red";
                                }
                            }
                        }
                        if (amp.id && amp.nombre) {
                            document.getElementById("popnh").className = "toast show";
                            document.getElementById("toast_text").innerHTML = "¡Tienes un nuevo mensaje de " + amp.nombre + "!";
                            document.getElementById("ir").href = "my_profile.php?id=" + amp.id + "&seccion=send";
                        }
                        if (amp.nuevo) {
                            const drop = document.querySelector("#dropdown_contacto div");
                            for ($i = 0; $i < drop.childNodes.length; $i++) {
                                if (drop.childNodes[$i].id == "y" + amp.nuevo) {
                                    document.querySelector("#dropdown_contacto div #y" + amp.nuevo + " p .tap").style.color = "green";
                                }
                            }
                        }
                        if (amp.activos) {
                            const drop = document.querySelector("#dropdown_contacto div");
                            for ($i = 0; $i < drop.childNodes.length; $i++) {
                                for ($j = 0; $j < amp.activos.length; $j++) {
                                    if (drop.childNodes[$i].id == amp.activos[$i]) {
                                        document.querySelector("#dropdown_contacto div #y" + amp.activos[$j] + " p .tap").style.color = "green";
                                    }
                                }
                            }
                        }
                    };
                <?php }
                if (isset($repetidos)) { ?>
                    var contente = {
                        idea: [<?php
                                for ($i = 0; $i < count($repetidos); $i++) {
                                    echo $repetidos[$i];
                                    if ($i != count($repetidos) - 1) {
                                        echo ",";
                                    }
                                }
                                ?>]
                    }
                    setTimeout(() => {
                        conn.send(JSON.stringify(contente))
                    }, 2000)
                <?php }
            } else { ?>
                document.getElementById("desp").addEventListener("click", () => {
                    const nav = document.getElementById("secciones")
                    if (nav.style.marginBottom == "0px") {
                        nav.style.marginBottom = "30px"
                        document.getElementById("bot_log").className = "btn btn-secondary py-2 px-4";
                    } else {
                        nav.style.marginBottom = "0px"
                        document.getElementById("bot_log").className = "btn btn-secondary py-2 px-4 ms-3";
                    }
                })
            <?php } ?>
        })
    </script>
    <!--Boton de volver arriba (si necesitan que haga la animacion copien y peguen el boton en cada seccion que lo necesite)-->
    <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</body>

</html>