const favoritos = document.getElementById('favoritos');
const nav_favoritos = document.getElementById('nav_favoritos');
const principal = document.getElementById('principal');
const nav_principal = document.getElementById('nav_principal');
const informes = document.getElementById('informes');
const nav_informes = document.getElementById('nav_informes');
const usuarios = document.getElementById('usuarios');
const nav_usuarios = document.getElementById('nav_usuarios');
const buzon = document.getElementById('buzon');
const nav_buzon = document.getElementById('nav_buzon');
const destacados = document.getElementById('destacados');
const nav_destacados = document.getElementById('nav_destacados');
const cargar = document.getElementById('cargar');
const nav_cargar = document.getElementById('nav_cargar');
const origen = document.getElementById('origen');
const config = document.getElementById('config');
const eliminar_us = document.getElementById('eliminar_us');
const rango_us = document.getElementById('rango_us');
const rango_us_prin = document.getElementById('rango_us_prin');
const rango_us_ascender = document.getElementById('rango_us_ascender');
const rango_us_degradar = document.getElementById('rango_us_degradar');
const sec_asc = document.getElementById('sec_asc');
const sec_deg = document.getElementById('sec_deg');
const info_usuario = document.getElementById('info_usuario');
const cambiar_nombre = document.getElementById('cambiar_nombre');
const cambiar_email = document.getElementById('cambiar_email');
const cambiar_contraseña = document.getElementById('cambiar_contraseña');
const desc = document.getElementById('descripcion');
var id;
var breadcrumb = "<p class='p-2 text-light'><a href='index.php'>Inicio</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a style='color:grey; user-select:none;'>Mi Perfil</a></p>";
document.getElementById("sec").innerHTML = breadcrumb;

function descripcion() {
    favoritos.style.display = "none";
    if (usuarios) {
        usuarios.style.display = "none";
    }
    destacados.style.display = "none";
    informes.style.display = "none";
    buzon.style.display = "none";
    if (cargar) {
        cargar.style.display = "none";
    }
    desc.style.display = "none";
    principal.style.display = "none";
    desc.style.display = "flex";
    nav_favoritos.style.textDecoration = "none";
    nav_informes.style.textDecoration = "none";
    nav_buzon.style.textDecoration = "none";
    if (nav_usuarios) {
        nav_usuarios.style.textDecoration = "none";
    }
    if (nav_cargar) {
        nav_cargar.style.textDecoration = "none";
    }
    nav_dest.style.textDecoration = "none";
    nav_principal.style.textDecoration = "underline";
    var breadcrumb = "<p class='p-2 text-light'><a href='index.php'>Inicio</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a style='color:grey; user-select:none;'>Mi Perfil</a> <a></a></p>";
    document.getElementById("sec").innerHTML = breadcrumb;
}

function principal_aparecer() {
    favoritos.style.display = "none";
    if (usuarios) {
        usuarios.style.display = "none";
    }
    informes.style.display = "none";
    if (cargar) {
        cargar.style.display = "none";
    }
    desc.style.display = "none";
    buzon.style.display = "none";
    destacados.style.display = "none";

    principal.style.display = "flex";
    nav_favoritos.style.textDecoration = "none";
    nav_informes.style.textDecoration = "none";
    nav_buzon.style.textDecoration = "none";
    if (nav_usuarios) {
        nav_usuarios.style.textDecoration = "none";
    }
    if (nav_cargar) {
        nav_cargar.style.textDecoration = "none";
    }
    nav_destacados.style.textDecoration = "none";
    nav_principal.style.textDecoration = "underline";
    var breadcrumb = "<p class='p-2 text-light'><a href='index.php'>Inicio</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a style='color:grey; user-select:none;'> Mi perfil</a></p>";
    document.getElementById("sec").innerHTML = breadcrumb;
}

function favoritos_aparecer() {
    principal.style.display = "none";
    informes.style.display = "none";
    if (cargar) {
        cargar.style.display = "none";
    }
    desc.style.display = "none";
    if (usuarios) {
        usuarios.style.display = "none";
    }
    buzon.style.display = "none";
    destacados.style.display = "none";
    favoritos.style.display = "flex";
    nav_principal.style.textDecoration = "none";
    nav_buzon.style.textDecoration = "none";
    nav_informes.style.textDecoration = "none";
    if (nav_usuarios) {
        nav_usuarios.style.textDecoration = "none";
    }
    if (nav_cargar) {
        nav_cargar.style.textDecoration = "none";
    }
    nav_destacados.style.textDecoration = "none";
    nav_favoritos.style.textDecoration = "underline";
    var breadcrumb = "<p class='p-2 text-light'><a href='index.php'>Inicio</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a href='my_profile.php'>Mi Perfil</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a style='color:grey; user-select:none;'>Favoritos</a></p>";
    document.getElementById("sec").innerHTML = breadcrumb;
}

function informes_aparecer() {
    principal.style.display = "none";
    if (cargar) {
        cargar.style.display = "none";
    }
    if (usuarios) {
        usuarios.style.display = "none";
    }
    buzon.style.display = "none";
    destacados.style.display = "none";
    favoritos.style.display = "none";
    desc.style.display = "none";
    informes.style.display = "flex";
    nav_principal.style.textDecoration = "none";
    nav_buzon.style.textDecoration = "none";
    nav_favoritos.style.textDecoration = "none";
    if (nav_usuarios) {
        nav_usuarios.style.textDecoration = "none";
    }
    if (nav_cargar) {
        nav_cargar.style.textDecoration = "none";
    }
    nav_destacados.style.textDecoration = "none";
    nav_informes.style.textDecoration = "underline";
    var breadcrumb = "<p class='p-2 text-light'><a href='index.php'>Inicio</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a href='my_profile.php'>Mi Perfil</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a style='color:grey; user-select:none;'>Mis informes</a></p>";
    document.getElementById("sec").innerHTML = breadcrumb;
}

function usuarios_aparecer() {
    principal.style.display = "none";
    informes.style.display = "none";
    desc.style.display = "none";
    buzon.style.display = "none";
    destacados.style.display = "none";
    favoritos.style.display = "none";
    if (cargar) {
        cargar.style.display = "none";
    }
    if (usuarios) {
        usuarios.style.display = "flex";
    }
    nav_principal.style.textDecoration = "none";
    nav_buzon.style.textDecoration = "none";
    nav_favoritos.style.textDecoration = "none";
    nav_informes.style.textDecoration = "none";
    if (nav_cargar) {
        nav_cargar.style.textDecoration = "none";
    }
    if (nav_usuarios) {
        nav_usuarios.style.textDecoration = "underline";
    }
    nav_destacados.style.textDecoration = "none";
    var breadcrumb = "<p class='p-2 text-light'><a href='index.php'>Inicio</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a href='my_profile.php'>Mi Perfil</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a style='color:grey; user-select:none;'>Usuarios</a></p>";
    document.getElementById("sec").innerHTML = breadcrumb;
}

function buzon_aparecer() {
    principal.style.display = "none";
    desc.style.display = "none";
    if (usuarios) {
        usuarios.style.display = "none";
    }
    if (cargar) {
        cargar.style.display = "none";
    }
    favoritos.style.display = "none";
    informes.style.display = "none";
    buzon.style.display = "flex";
    destacados.style.display = "none";
    nav_principal.style.textDecoration = "none";
    nav_informes.style.textDecoration = "none";
    nav_favoritos.style.textDecoration = "none";
    if (nav_usuarios) {
        nav_usuarios.style.textDecoration = "none";
    }
    if (nav_cargar) {
        nav_cargar.style.textDecoration = "none";
    }
    nav_destacados.style.textDecoration = "none";
    nav_buzon.style.textDecoration = "underline";
    var breadcrumb = "<p class='p-2 text-light'><a href='index.php'>Inicio</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a href='my_profile.php'>Mi Perfil</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a style='color:grey; user-select:none;'>Buzon</a></p>";
    document.getElementById("sec").innerHTML = breadcrumb;
}

function destacados_aparecer() {
    principal.style.display = "none";
    desc.style.display = "none";
    if (usuarios) {
        usuarios.style.display = "none";
    }
    if (cargar) {
        cargar.style.display = "none";
    }
    favoritos.style.display = "none";
    informes.style.display = "none";
    buzon.style.display = "none";
    destacados.style.display = "flex";
    nav_principal.style.textDecoration = "none";
    nav_informes.style.textDecoration = "none";
    nav_favoritos.style.textDecoration = "none";
    if (nav_usuarios) {
        nav_usuarios.style.textDecoration = "none";
    }
    if (nav_cargar) {
        nav_cargar.style.textDecoration = "none";
    }
    nav_destacados.style.textDecoration = "underline";
    nav_buzon.style.textDecoration = "none";
    var breadcrumb = "<p class='p-2 text-light'><a href='index.php'>Inicio</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a href='my_profile.php'>Mi Perfil</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a href='my_profile.php?seccion=buzon'>Buzon</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a style='color:grey; user-select:none;'>Destacados</a></p>";
    document.getElementById("sec").innerHTML = breadcrumb;
}

function cargar_aparecer() {
    principal.style.display = "none";
    desc.style.display = "none";
    if (usuarios) {
        usuarios.style.display = "none";
    }
    favoritos.style.display = "none";
    informes.style.display = "none";
    destacados.style.display = "none";
    buzon.style.display = "none";
    if (cargar) {
        cargar.style.display = "flex";
    }
    nav_principal.style.textDecoration = "none";
    nav_informes.style.textDecoration = "none";
    nav_favoritos.style.textDecoration = "none";
    if (nav_usuarios) {
        nav_usuarios.style.textDecoration = "none";
    }
    nav_buzon.style.textDecoration = "none";
    if (nav_cargar) {
        nav_cargar.style.textDecoration = "underline";
    }
    nav_destacados.style.textDecoration = "none";
    var breadcrumb = "<p class='p-2 text-light'><a href='index.php'>Inicio</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a href='my_profile.php'>Mi Perfil</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a style='color:grey; user-select:none;'>Carga</a></p>";
    document.getElementById("sec").innerHTML = breadcrumb;
}

function descripcion() {
    principal.style.display = "none";
    desc.style.display = "flex";
    if (usuarios) {
        usuarios.style.display = "none";
    }
    favoritos.style.display = "none";
    informes.style.display = "none";
    buzon.style.display = "none";
    destacados.style.display = "none";
    nav_principal.style.textDecoration = "none";
    nav_informes.style.textDecoration = "none";
    nav_favoritos.style.textDecoration = "none";
    if (nav_usuarios) {
        nav_usuarios.style.textDecoration = "none";
    }
    nav_destacados.style.textDecoration = "none";
    nav_buzon.style.textDecoration = "underline";
    document.querySelector("#descripcion form textarea").value = document.getElementById("descripcion_txt").innerHTML;
}

function desc_c() {
    principal.style.display = "flex";
    desc.style.display = "none";
}

function eliminar_us_abrir(id) {
    
    if (eliminar_us) {
        eliminar_us.style.display = "block";
    }
    document.getElementById('seca').value = id;
}

function eliminar_us_cerrar() {
    if (eliminar_us) {
        eliminar_us.style.display = "none";
    }
    origen.style.display = "block";
}

function rango_us_abrir(ad) {
    
    if (rango_us) {
        rango_us.style.display = "block";
        rango_us_degradar.style.display = "none";
        rango_us_ascender.style.display = "none";
        rango_us_prin.style.display = "block";
    }
    sec_asc.value = ad;
    sec_deg.value = ad;
}

function rango_us_cerrar() {
    if (rango_us) {
        rango_us.style.display = "none";
    }
    origen.style.display = "block";
}

function rango_us_asc() {
    rango_us_prin.style.display = "none";
    rango_us_degradar.style.display = "none";
    if (rango_us_ascender) {
        rango_us_ascender.style.display = "block";
    }
}

function rango_us_deg() {
    rango_us_prin.style.display = "none";
    rango_us_ascender.style.display = "none";
    if (rango_us_degradar) {
        rango_us_degradar.style.display = "block";
    }
}

function modificar_vent(data) {
    const tag = document.getElementById(data);
    const span = document.createElement("span");
    span.setAttribute("class", "bg-dark text-white");
    span.setAttribute("style", "padding:5px; opacity:0.9;");
    const texto = document.createTextNode("Modificar " + data);
    span.appendChild(texto);
    tag.appendChild(span);
}

function eliminar_vent(data) {
    const tag = document.getElementById(data);
    tag.removeChild(tag.lastElementChild);
}

function configuracion() {
    origen.style.display = "none";
    config.style.display = "block";
    var breadcrumb = "<p class='p-2 text-light'><a href='index.php'>Inicio</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a href='my_profile.php'>Mi Perfil</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a style='color:grey; user-select:none;'>Ajustes</a></p>";
    document.getElementById("sec").innerHTML = breadcrumb;
}

function configuracion_salir() {
    origen.style.display = "block";
    config.style.display = "none";
    window.location.href = "my_profile.php";
    var breadcrumb = "<p class='p-2 text-light'><a href='index.php'>Inicio</a> <i class='fa-solid fa-caret-right' style='color: darkgrey;'></i> <a href='my_profile.php'>Mi Perfil</a></p>";
    document.getElementById("sec").innerHTML = breadcrumb;
}

function nombre_change() {
    cambiar_nombre.style.display = "block";
    cambiar_contraseña.style.display = "none";
    cambiar_email.style.display = "none";
    info_usuario.style.display = "none";
}

function email_change() {
    cambiar_nombre.style.display = "none";
    cambiar_contraseña.style.display = "none";
    cambiar_email.style.display = "block";
    info_usuario.style.display = "none";
}

function contra_change() {
    cambiar_nombre.style.display = "none";
    cambiar_contraseña.style.display = "block";
    cambiar_email.style.display = "none";
    info_usuario.style.display = "none";
}

function volver_infousu() {
    cambiar_nombre.style.display = "none";
    cambiar_contraseña.style.display = "none";
    cambiar_email.style.display = "none";
    info_usuario.style.display = "block";
}

document.getElementById("imgf").addEventListener('input', () => {
    document.getElementById("file_2").style.display = "block";
});

function env_c(a) {
    const form = document.createElement("form");
    form.setAttribute("style", "display:none;");
    form.setAttribute("method", "POST");
    form.setAttribute("action", "cargar.php");
    const input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("value", a);
    input.setAttribute("name", "tabla");
    form.appendChild(input);
    const button = document.createElement("button");
    button.setAttribute("type", "submit");
    button.setAttribute("id", "envta");
    form.appendChild(button);
    document.body.appendChild(form);
    document.getElementById("envta").click();
}

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

function msjm_d(id) {
    $.ajax({
        type: "POST",
        url: 'my_profile.php',
        data: { "msjm_d": true, "id": id },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.msjm == true) {
                document.querySelector("#buzon div").removeChild(document.querySelector("#buzon div .acm_" + id))
                document.querySelector("#buzon h5 span").innerHTML = parseInt(document.querySelector("#buzon h5 span").innerHTML) - 1;
                if (document.querySelector("#destacados div .acm_" + id)) {
                    document.querySelector("#destacados div").removeChild(document.querySelector("#destacados div .acm_" + id))
                    document.querySelector("#destacados h5 span").innerHTML = parseInt(document.querySelector("#destacados h5 span").innerHTML) - 1;
                }
            }
        }
    });
}

function msjc_d(id) {
    $.ajax({
        type: "POST",
        url: 'my_profile.php',
        data: { "msjc_d": true, "id": id },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.msjc == true) {
                document.querySelector("#buzon div").removeChild(document.querySelector("#buzon div .acc_" + id))
                document.querySelector("#buzon h5 span").innerHTML = parseInt(document.querySelector("#buzon h5 span").innerHTML) - 1;
                if (document.querySelector("#destacados div .acc_" + id)) {
                    document.querySelector("#destacados div").removeChild(document.querySelector("#destacados div .acc_" + id))
                    document.querySelector("#destacados h5 span").innerHTML = parseInt(document.querySelector("#destacados h5 span").innerHTML) - 1;
                }
            }
        }
    });
}

function msj_d(id) {
    $.ajax({
        type: "POST",
        url: 'my_profile.php',
        data: { "msj_d": true, "id": id },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.msj == true) {
                document.querySelector("#buzon div").removeChild(document.querySelector("#buzon div .aco_" + id))
                document.querySelector("#buzon h5 span").innerHTML = parseInt(document.querySelector("#buzon h5 span").innerHTML) - 1;
                if (document.querySelector("#destacados div .aco_" + id)) {
                    document.querySelector("#destacados div").removeChild(document.querySelector("#destacados div .aco_" + id))
                    document.querySelector("#destacados h5 span").innerHTML = parseInt(document.querySelector("#destacados h5 span").innerHTML) - 1;
                }
            }
        }
    });
}

function msjm_s(id) {
    $.ajax({
        type: "POST",
        url: 'my_profile.php',
        data: { "msjm_s": true, "id": id },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.msjms == true) {
                const boton_fav = document.querySelector(".acm_" + id + " .modal-body .modal-footer div .btn_destacar")
                boton_fav.innerHTML = "<i class='fa-regular fa-star'></i> Remover destacado"
                boton_fav.removeAttribute("onclick")
                boton_fav.setAttribute("onclick", "msjm_a(" + id + ")")
                const clone = document.querySelector("#buzon div .acm_" + id).cloneNode(true);
                document.querySelector("#destacados div").prepend(clone)
                const dest = document.querySelector("#buzon div .acm_" + id + " .modal-header .card-text .star_f")
                dest.removeAttribute("hidden");
                const span = document.createElement("span");
                span.setAttribute("class", "bg-dark text-white");
                span.setAttribute("style", "padding:5px; opacity:0.9;");
                const texto = document.createTextNode("¡Agregado a destacados!");
                span.appendChild(texto);
                dest.prepend(span);
                setTimeout(terminar_fav, 2000)
                function terminar_fav() {
                    dest.removeChild(document.querySelector("#buzon div .acm_" + id + " .modal-header .card-text .star_f span"))
                }
                document.querySelector("#destacados h5 span").innerHTML = parseInt(document.querySelector("#destacados h5 span").innerHTML) + 1;
            }
        }
    });
}

function msjc_s(id) {
    $.ajax({
        type: "POST",
        url: 'my_profile.php',
        data: { "msjc_s": true, "id": id },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.msjcs == true) {
                const boton_fav = document.querySelector(".acc_" + id + " .modal-body .modal-footer div .btn_destacar")
                boton_fav.innerHTML = "<i class='fa-regular fa-star'></i> Remover destacado"
                boton_fav.removeAttribute("onclick")
                boton_fav.setAttribute("onclick", "msjc_a(" + id + ")")
                const clone = document.querySelector("#buzon div .acc_" + id).cloneNode(true);
                document.querySelector("#destacados div").prepend(clone)
                const dest = document.querySelector("#buzon div .acc_" + id + " .modal-header .card-text .star_f")
                dest.removeAttribute("hidden");
                const span = document.createElement("span");
                span.setAttribute("class", "bg-dark text-white");
                span.setAttribute("style", "padding:5px; opacity:0.9;");
                const texto = document.createTextNode("¡Agregado a destacados!");
                span.appendChild(texto);
                dest.prepend(span);
                setTimeout(terminar_fav, 2000)
                function terminar_fav() {
                    dest.removeChild(document.querySelector("#buzon div .acc_" + id + " .modal-header .card-text .star_f span"))
                }
                document.querySelector("#destacados h5 span").innerHTML = parseInt(document.querySelector("#destacados h5 span").innerHTML) + 1;
            }
        }
    });
}

function msj_s(id) {
    $.ajax({
        type: "POST",
        url: 'my_profile.php',
        data: { "msj_s": true, "id": id },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.msjs == true) {
                const boton_fav = document.querySelector(".aco_" + id + " .modal-body .modal-footer div .btn_destacar")
                boton_fav.innerHTML = "<i class='fa-regular fa-star'></i> Remover destacado"
                boton_fav.removeAttribute("onclick")
                boton_fav.setAttribute("onclick", "msj_a(" + id + ")")
                const clone = document.querySelector("#buzon div .aco_" + id).cloneNode(true);
                document.querySelector("#destacados div").prepend(clone)
                const dest = document.querySelector("#buzon div .aco_" + id + " .modal-header .card-text .star_f")
                dest.removeAttribute("hidden");
                const span = document.createElement("span");
                span.setAttribute("class", "bg-dark text-white");
                span.setAttribute("style", "padding:5px; opacity:0.9;");
                const texto = document.createTextNode("¡Agregado a destacados!");
                span.appendChild(texto);
                dest.prepend(span);
                setTimeout(terminar_fav, 2000)
                function terminar_fav() {
                    dest.removeChild(document.querySelector("#buzon div .aco_" + id + " .modal-header .card-text .star_f span"))
                }
                document.querySelector("#destacados h5 span").innerHTML = parseInt(document.querySelector("#destacados h5 span").innerHTML) + 1;
            }
        }
    });
}

function msjm_a(id) {
    $.ajax({
        type: "POST",
        url: 'my_profile.php',
        data: { "msjm_a": true, "id": id },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.msjma == true) {
                const boton_fav = document.querySelector("#buzon div .acm_" + id + " .modal-body .modal-footer div .btn_destacar")
                boton_fav.innerHTML = "<i class='fa-solid fa-star'></i> Destacar"
                boton_fav.removeAttribute("onclick")
                boton_fav.setAttribute("onclick", "msjm_s(" + id + ")")
                document.querySelector("#destacados div").removeChild(document.querySelector("#destacados div .acm_" + id))
                document.querySelector("#buzon div .acm_" + id + " .modal-header .card-text .star_f").setAttribute("hidden",true)
                document.querySelector("#destacados h5 span").innerHTML = parseInt(document.querySelector("#destacados h5 span").innerHTML) - 1;
            }
        }
    });
}

function msjc_a(id) {
    $.ajax({
        type: "POST",
        url: 'my_profile.php',
        data: { "msjc_a": true, "id": id },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.msjca == true) {
                const boton_fav = document.querySelector("#buzon div .acc_" + id + " .modal-body .modal-footer div .btn_destacar")
                boton_fav.innerHTML = "<i class='fa-solid fa-star'></i> Destacar"
                boton_fav.removeAttribute("onclick")
                boton_fav.setAttribute("onclick", "msjc_s(" + id + ")")
                document.querySelector("#destacados div").removeChild(document.querySelector("#destacados div .acc_" + id))
                document.querySelector("#buzon div .acc_" + id + " .modal-header .card-text .star_f").setAttribute("hidden",true)
                document.querySelector("#destacados h5 span").innerHTML = parseInt(document.querySelector("#destacados h5 span").innerHTML) - 1;
            }
        }
    });
}

function msj_a(id) {
    $.ajax({
        type: "POST",
        url: 'my_profile.php',
        data: { "msj_a": true, "id": id },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.msja == true) {
                const boton_fav = document.querySelector("#buzon div .aco_" + id + " .modal-body .modal-footer div .btn_destacar")
                boton_fav.innerHTML = "<i class='fa-solid fa-star'></i> Destacar"
                boton_fav.removeAttribute("onclick")
                boton_fav.setAttribute("onclick", "msj_s(" + id + ")")
                document.querySelector("#destacados div").removeChild(document.querySelector("#destacados div .aco_" + id))
                document.querySelector("#buzon div .aco_" + id + " .modal-header .card-text .star_f").setAttribute("hidden",true)
                document.querySelector("#destacados h5 span").innerHTML = parseInt(document.querySelector("#destacados h5 span").innerHTML) - 1;
            }
        }
    });
}