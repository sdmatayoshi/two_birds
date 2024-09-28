 
<?php
require_once "includes/config.php";
if (isset($_SESSION['usuario'])) {
	require_once "includes/contactos.php";
}
if (!isset($_SESSION['usuario']) && !isset($_GET["id"])) {
    header("Location: log_in.php");
}
function comprobar_contra($contra)
{
    $mayusculas = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $minusculas = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    $signos = array('!', '¡', '¿', '?', '"', "'", '$', '%', '#', '&', '/', '(', ')', '|', '°', '¬', '\\', '=', '*', '+', '~', '´', '¨', '{', '}', '^', '`', '[', ']', '-', '_', '.', ',', ':', ';', '<', '>', '@');
    $numeros = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $pass = str_split($contra);
    $s = false;
    $mi = false;
    $ma = false;
    $n = false;
    for ($i = 0; $i < count($pass); $i++) {
        if (array_search($pass[$i], $mayusculas) != false) {
            $ma = true;
        }
        if (array_search($pass[$i], $minusculas) != false) {
            $mi = true;
        }
        if (array_search($pass[$i], $signos) != false) {
            $s = true;
        }
        if (array_search($pass[$i], $numeros) != false) {
            $n = true;
        }
    }
    if ($n == false || $s == false || $mi == false || $ma == false) {
        return false;
    } else {
        return true;
    }
}

if (isset($_SESSION['usuario']['id']) && isset($_FILES['archivo']) && ($_FILES['archivo']['type'] == 'image/jpeg' || $_FILES['archivo']['type'] == 'image/png') && $_FILES['archivo']['error'] == 0) {
    $nombre = $_SESSION['usuario']['id'];
    mkdir("img/usuarios/" . $nombre . "");
    if ($_SESSION['usuario']['foto'] != "../../pajarito.jpg") {
        unlink("img/usuarios/" . $_SESSION['usuario']['id'] . "/" . $_SESSION['usuario']['foto']);
    }
    $ruta = "img/usuarios/" . $nombre . "/" . $_FILES['archivo']['name'];
    $nombre_imagen = $_FILES['archivo']['name'];
    $ruta2 = $nombre_imagen;
    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta)) {
        $query = "UPDATE usuarios SET foto = '" . $ruta2 . "' WHERE id = '" . $nombre . "';";
        consulta($query, $link, 4);
        $_SESSION['usuario']['foto'] = $ruta2;
        header("Location: my_profile.php");
    } else {
        echo "No se pudo subir la imagen";
    }
}

if (isset($_SESSION['usuario']) && (!isset($_GET['id']) || isset($_GET['id']) && $_GET['id'] == $_SESSION['usuario']['id'])) {
    $query = "SELECT informes.id,informes.usuario_id,titulo,informes.fecha_alta,encabezado,fecha_modificacion,informes.fecha_baja FROM informes INNER JOIN favoritos ON informes.id = favoritos.informe_id WHERE informes.fecha_baja IS NULL AND favoritos.fecha_baja IS NULL AND favoritos.usuario_id = " . $_SESSION['usuario']['id'];

    $resultado = consulta($query, $link);
    
    if (is_array($resultado)) {
        $resultado = array_reverse($resultado);
        for ($i = 0; $i < count($resultado); $i++) {
            $resultado[$i] = fecha($resultado[$i], $meses);
            if (file_exists("img/portadas/p" . $resultado[$i]['id'] . ".jpg")) {
                $resultado[$i]['portada'] = "p" . $resultado[$i]['id'] . ".jpg";
            } else {
                $resultado[$i]['portada'] = "defecto.png";
            }
        }
    }
    $sql = "SELECT * FROM informes WHERE fecha_baja IS NULL AND usuario_id = " . $_SESSION['usuario']['id'];
    $resultado1 = consulta($sql, $link);
    $cant_inf = 0;
    if (is_array($resultado1)) {
        $resultado1 = array_reverse($resultado1);
        for ($i = 0; $i < count($resultado1); $i++) {
            $resultado1[$i] = fecha($resultado1[$i], $meses);
            if (file_exists("img/portadas/p" . $resultado1[$i]['id'] . ".jpg")) {
                $resultado1[$i]['portada'] = "p" . $resultado1[$i]['id'] . ".jpg";
            } else {
                $resultado1[$i]['portada'] = "defecto.png";
            }
        }
        $cant_inf = count($resultado1);
    }
    $admin = false;
    $mod = false;
    foreach ($_SESSION['usuario']['rangos'] as $ran) {
        if ($ran['rango'] == "admin") {
            $admin = true;
        }
        if ($ran['rango'] == "mod") {
            $mod = true;
        }
    }
    if ($admin == true || $mod == true) {
        $query = "SELECT id ,user_name FROM usuarios WHERE fecha_baja IS NULL";
        $users = consulta($query, $link);

        if (count($users) > 0) {
            $query = "SELECT ru.usuario_id,r.rango FROM rango_usuario AS ru
            INNER JOIN rangos AS r
                ON ru.rango_id = r.id
            WHERE ru.fecha_baja IS NULL";
            $rangos_users = consulta($query, $link);
            for ($i = 0; $i < count($users); $i++) {
                foreach ($rangos_users as $ru) {
                    if ($users[$i]['id'] == $ru['usuario_id']) {
                        $users[$i]['rangos'][] = $ru['rango'];
                    }
                }
            }
        }
    }


    $query = "SELECT titulo,moderacion,tipo,m.id,user_name,m.fecha_alta,u.id AS ui,destacado FROM informes AS i
    INNER JOIN moderaciones AS m
    ON  i.id = m.informe_id
    INNER JOIN usuarios AS u
    ON  m.usuario_id = u.id
    WHERE i.usuario_id = " . $_SESSION['usuario']['id'] . " AND
    m.fecha_baja IS NULL";
    $moderacion = consulta($query, $link);

    $query = "SELECT titulo,comentario,c.id,user_name,c.usuario_id,i.id AS asi,c.fecha_alta,destacado FROM informes AS i
    INNER JOIN comentarios AS c
    ON  i.id = c.informe_id
    INNER JOIN usuarios AS u
    ON  c.usuario_id = u.id
    WHERE i.usuario_id = " . $_SESSION['usuario']['id'] . " AND
    c.usuario_id != " . $_SESSION['usuario']['id'] . " AND
    c.notificacion_baja IS NULL AND
    i.fecha_baja IS NULL";
    $comentarios = consulta($query, $link);

    $query = "SELECT mensaje,emisor_id,user_name,m.fecha_alta,m.id,destacado FROM mensajes AS m
    INNER JOIN usuarios AS u
    ON m.emisor_id = u.id
    WHERE usuario_id = " . $_SESSION['usuario']['id'] . " AND
    notificacion_baja IS NULL";
    $mensajos = consulta($query, $link);
    $buzon = array_merge($comentarios, $moderacion, $mensajos);
    usort($buzon, function ($a, $b) {
        return strcmp($a["fecha_alta"], $b["fecha_alta"]);
    });
    $buzon = array_reverse($buzon);
    $destacados = array($buzon);
    
    for($i = 0; $i < count($destacados[0]); $i++){
        if(!isset($destacados[0][$i]["destacado"])){
            array_splice($destacados[0],$i,1);
            $i--;
        }
    }
    $destacados = $destacados[0];
    usort($destacados, function ($a, $b) {
        return strcmp($a["destacado"], $b["destacado"]);
    });
    $destacados = array_reverse($destacados);

    if (isset($_POST['msjc_d']) && isset($_POST['id'])) {
        if (ctype_digit($_POST['id'])) {
            $query = "SELECT i.usuario_id FROM comentarios AS c
            INNER JOIN informes AS i
            ON c.informe_id = i.id
            WHERE c.id = " . $_POST['id'] . " AND
            c.notificacion_baja IS NULL";
            $msj_el = consulta($query, $link, 1);

            if ($msj_el['usuario_id'] == $_SESSION['usuario']['id']) {
                $query = "UPDATE comentarios
                SET notificacion_baja = '" . date("Y-m-d h:i:s", time()) . "'
                WHERE id = " . $_POST['id'];
                consulta($query, $link, 4);
                echo json_encode(array("msjc" => true));
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            } else {
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            }
        } else {
            die();
            //header("Location: my_profile.php?seccion=buzon#atajo");
        }
    }

    if (isset($_POST['msjm_d']) && isset($_POST['id'])) {
        if (ctype_digit($_POST['id'])) {
            $query = "SELECT usuario_id FROM mensajes
            WHERE id = " . $_POST['id'] . " AND
            notificacion_baja IS NULL";
            $msj_el = consulta($query, $link, 1);

            if ($msj_el['usuario_id'] == $_SESSION['usuario']['id']) {
                $query = "UPDATE mensajes
                SET notificacion_baja = '" . date("Y-m-d h:i:s", time()) . "'
                WHERE id = " . $_POST['id'];
                consulta($query, $link, 4);
                echo json_encode(array("msjm" => true));
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            } else {
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            }
        } else {
            die();
            //header("Location: my_profile.php?seccion=buzon#atajo");
        }
    }

    if (isset($_POST['msj_d']) && isset($_POST['id'])) {
        if (ctype_digit($_POST['id'])) {
            $query = "SELECT i.usuario_id FROM moderaciones AS m
            INNER JOIN informes AS i
            ON m.informe_id = i.id
            WHERE m.id = " . $_POST['id'] . " AND
            m.fecha_baja IS NULL";
            $msj_el = consulta($query, $link, 1);

            if ($msj_el['usuario_id'] == $_SESSION['usuario']['id']) {
                $query = "UPDATE moderaciones
                SET fecha_baja = '" . date("Y-m-d h:i:s", time()) . "'
                WHERE id = " . $_POST['id'];
                consulta($query, $link, 4);
                echo json_encode(array("msj" => true));
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            } else {
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            }
        } else {
            die();
            //header("Location: my_profile.php?seccion=buzon#atajo");
        }
    }

    if (isset($_POST['msjc_s']) && isset($_POST['id'])) {
        if (ctype_digit($_POST['id'])) {
            $query = "SELECT i.usuario_id FROM comentarios AS c
            INNER JOIN informes AS i
            ON c.informe_id = i.id
            WHERE c.id = " . $_POST['id'] . " AND
            c.destacado IS NULL AND
            notificacion_baja IS NULL";
            $msj_el = consulta($query, $link, 1);

            if (isset($msj_el['usuario_id']) && $msj_el['usuario_id'] == $_SESSION['usuario']['id']) {
                $query = "UPDATE comentarios
                SET destacado = '" . date("Y-m-d h:i:s", time()) . "'
                WHERE id = " . $_POST['id'];
                consulta($query, $link, 4);
                echo json_encode(array("msjcs" => true));
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            } else {
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            }
        } else {
            die();
            //header("Location: my_profile.php?seccion=buzon#atajo");
        }
    }

    if (isset($_POST['msjm_s']) && isset($_POST['id'])) {
        if (ctype_digit($_POST['id'])) {
            $query = "SELECT usuario_id FROM mensajes
            WHERE id = " . $_POST['id'] . " AND
            destacado IS NULL AND
            notificacion_baja IS NULL";
            $msj_el = consulta($query, $link, 1);

            if (isset($msj_el['usuario_id']) && $msj_el['usuario_id'] == $_SESSION['usuario']['id']) {
                $query = "UPDATE mensajes
                SET destacado = '" . date("Y-m-d h:i:s", time()) . "'
                WHERE id = " . $_POST['id'];
                consulta($query, $link, 4);
                echo json_encode(array("msjms" => true));
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            } else {
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            }
        } else {
            die();
            //header("Location: my_profile.php?seccion=buzon#atajo");
        }
    }

    if (isset($_POST['msj_s']) && isset($_POST['id'])) {
        if (ctype_digit($_POST['id'])) {
            $query = "SELECT i.usuario_id FROM moderaciones AS m
            INNER JOIN informes AS i
            ON m.informe_id = i.id
            WHERE m.id = " . $_POST['id'] . " AND
            m.fecha_baja IS NULL AND
            destacado IS NULL";
            $msj_el = consulta($query, $link, 1);

            if (isset($msj_el['usuario_id']) && $msj_el['usuario_id'] == $_SESSION['usuario']['id']) {
                $query = "UPDATE moderaciones
                SET destacado = '" . date("Y-m-d h:i:s", time()) . "'
                WHERE id = " . $_POST['id'];
                consulta($query, $link, 4);
                echo json_encode(array("msjs" => true));
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            } else {
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            }
        } else {
            die();
            //header("Location: my_profile.php?seccion=buzon#atajo");
        }
    }

    if (isset($_POST['msjc_a']) && isset($_POST['id'])) {
        if (ctype_digit($_POST['id'])) {
            $query = "SELECT i.usuario_id FROM comentarios AS c
            INNER JOIN informes AS i
            ON c.informe_id = i.id
            WHERE c.id = " . $_POST['id'] . " AND
            notificacion_baja IS NULL";
            $msj_el = consulta($query, $link, 1);

            if (isset($msj_el['usuario_id']) && $msj_el['usuario_id'] == $_SESSION['usuario']['id']) {
                $query = "UPDATE comentarios
                SET destacado = NULL
                WHERE id = " . $_POST['id'];
                consulta($query, $link, 4);
                echo json_encode(array("msjca" => true));
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            } else {
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            }
        } else {
            die();
            //header("Location: my_profile.php?seccion=buzon#atajo");
        }
    }

    if (isset($_POST['msjm_a']) && isset($_POST['id'])) {
        if (ctype_digit($_POST['id'])) {
            $query = "SELECT usuario_id FROM mensajes
            WHERE id = " . $_POST['id'] . " AND
            notificacion_baja IS NULL";
            $msj_el = consulta($query, $link, 1);

            if (isset($msj_el['usuario_id']) && $msj_el['usuario_id'] == $_SESSION['usuario']['id']) {
                $query = "UPDATE mensajes
                SET destacado = NULL
                WHERE id = " . $_POST['id'];
                consulta($query, $link, 4);
                echo json_encode(array("msjma" => true));
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            } else {
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            }
        } else {
            die();
            //header("Location: my_profile.php?seccion=buzon#atajo");
        }
    }

    if (isset($_POST['msj_a']) && isset($_POST['id'])) {
        if (ctype_digit($_POST['id'])) {
            $query = "SELECT i.usuario_id FROM moderaciones AS m
            INNER JOIN informes AS i
            ON m.informe_id = i.id
            WHERE m.id = " . $_POST['id'] . " AND
            m.fecha_baja IS NULL";
            $msj_el = consulta($query, $link, 1);

            if (isset($msj_el['usuario_id']) && $msj_el['usuario_id'] == $_SESSION['usuario']['id']) {
                $query = "UPDATE moderaciones
                SET destacado = NULL
                WHERE id = " . $_POST['id'];
                consulta($query, $link, 4);
                echo json_encode(array("msja" => true));
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            } else {
                die();
                //header("Location: my_profile.php?seccion=buzon#atajo");
            }
        } else {
            die();
            //header("Location: my_profile.php?seccion=buzon#atajo");
        }
    }
    
    if (isset($_POST['id_d'])) {
        if (ctype_digit($_POST['id_d']) && $_POST['id_d'] != $_SESSION['usuario']['id']) {
            $query = "SELECT r.rango FROM rango_usuario AS ru
            INNER JOIN rangos AS r
            ON ru.rango_id = r.id
            INNER JOIN usuarios AS u
            ON ru.usuario_id = u.id
            WHERE ru.usuario_id = " . $_POST['id_d'] . " AND
            u.fecha_baja IS NULL";
            $baneado = consulta($query, $link);

            if (count($baneado) == 0) {
                header("Location: my_profile.php?seccion=usuario#atajo");
            }

            $mod = "user";
            foreach ($baneado as $ran) {
                if ($ran == "admin") {
                    $mod = "admin";
                    break;
                } else if ($ran == "mod") {
                    $mod = "mod";
                }
            }

            $mode = "user";
            foreach ($_SESSION['usuario']['rangos'] as $ran) {
                if ($ran['rango'] == "admin") {
                    $mode = "admin";
                    break;
                } else if ($ran['rango'] == "mod") {
                    $mode = "mod";
                }
            }

            $rangos = array(
                "user" => 1,
                "mod" => 2,
                "admin" => 3
            );

            $mode = $rangos[$mode];
            $ban = $rangos[$mod];
            if ($mode < $ban) {
                header("Location: my_profile.php?seccion=usuario#atajo");
            } else {
                $query = "UPDATE usuarios
                SET fecha_baja = '" . date("Y-m-d h:i:s", time()) . "'
                WHERE id = " . $_POST['id_d'];
                consulta($query, $link, 4);
                header("Location: my_profile.php?seccion=usuario#atajo");
            }
        } else {
            header("Location: my_profile.php?seccion=usuario#atajo");
        }
    }
    if (isset($_POST['id_asc'])) {
        if (ctype_digit($_POST['id_asc']) && $_POST['id_asc'] != $_SESSION['usuario']['id']) {
            $query = "SELECT r.rango FROM rango_usuario AS ru
            INNER JOIN rangos AS r
            ON ru.rango_id = r.id
            INNER JOIN usuarios AS u
            ON ru.usuario_id = u.id
            WHERE ru.usuario_id = " . $_POST['id_asc'] . " AND
            u.fecha_baja IS NULL AND
            ru.fecha_baja IS NULL";
            $ascendido = consulta($query, $link);

            if (in_a("mod", $ascendido) && !in_a("admin", $ascendido) && in_a("admin", $_SESSION['usuario']['rangos'])) {
                $query = "INSERT INTO rango_usuario(rango_id,usuario_id,fecha_alta) VALUES(3," . $_POST['id_asc'] . ",'" . date("Y-m-d h:i:s", time()) . "')";
                consulta($query, $link, 4);
                header("Location: my_profile.php?seccion=usuario#atajo");
            } else if (in_a("user", $ascendido) && !in_a("mod", $ascendido) && (in_a("admin", $_SESSION['usuario']['rangos']) || in_a("mod", $_SESSION['usuario']['rangos']))) {
                $query = "INSERT INTO rango_usuario(rango_id,usuario_id,fecha_alta) VALUES(2," . $_POST['id_asc'] . ",'" . date("Y-m-d h:i:s", time()) . "')";
                consulta($query, $link, 4);
                header("Location: my_profile.php?seccion=usuario#atajo");
            } else {
                header("Location: my_profile.php?seccion=usuario#atajo");
            }
        }
    }
    if (isset($_POST['id_deg'])) {
        if (ctype_digit($_POST['id_deg']) && $_POST['id_deg'] != $_SESSION['usuario']['id']) {
            $query = "SELECT r.rango FROM rango_usuario AS ru
            INNER JOIN rangos AS r
            ON ru.rango_id = r.id
            INNER JOIN usuarios AS u
            ON ru.usuario_id = u.id
            WHERE ru.usuario_id = " . $_POST['id_deg'] . " AND
            u.fecha_baja IS NULL AND
            ru.fecha_baja IS NULL";
            $degradado = consulta($query, $link);

            if (in_a("admin", $degradado) && in_a("admin", $_SESSION['usuario']['rangos'])) {
                $query = "UPDATE rango_usuario SET fecha_baja = '" . date("Y-m-d h:i:s", time()) . "' WHERE usuario_id = " . $_POST['id_deg'] . " AND rango_id = 3  AND fecha_baja IS NULL";
                consulta($query, $link, 4);
                header("Location: my_profile.php?seccion=usuario#atajo");
            } else if (in_a("mod", $degradado) && (in_a("admin", $_SESSION['usuario']['rangos']) || in_a("mod", $_SESSION['usuario']['rangos']))) {
                $query = "UPDATE rango_usuario SET fecha_baja = '" . date("Y-m-d h:i:s", time()) . "' WHERE usuario_id = " . $_POST['id_deg'] . " AND rango_id = 2  AND fecha_baja IS NULL";
                consulta($query, $link, 4);
                header("Location: my_profile.php?seccion=usuario#atajo");
            } else {
                header("Location: my_profile.php?seccion=usuario#atajo");
            }
        }
    }
    if (isset($_POST['username']) && strlen($_POST['username']) > 0 && strlen($_POST['username']) <= 25) {
        $_POST['username'] = insultos($_POST['username'], $link);
        $query = "SELECT user_name FROM usuarios WHERE user_name = '" . $_POST['username'] . "' AND fecha_baja IS NULL";
        if (consulta($query, $link, 3) == 0) {
            $query = "UPDATE usuarios SET user_name = '" . $_POST['username'] . "' WHERE id = " . $_SESSION['usuario']['id'];
            consulta($query, $link, 4);
            $_SESSION['usuario']['user_name'] = $_POST['username'];
            header("Location: my_profile.php");
        } else {
            header("Location: my_profile.php");
        }
    }
    if (isset($_POST['email']) && strlen($_POST['email']) > 0 && strlen($_POST['email']) <= 50) {
        if (count(explode("@", $_POST['email'])) > 1) {
            $query = "SELECT email FROM usuarios WHERE email = '" . $_POST['email'] . "' AND fecha_baja IS NULL";
            if (consulta($query, $link, 3) == 0) {
                $query = "UPDATE usuarios SET email = '" . $_POST['email'] . "' WHERE id = " . $_SESSION['usuario']['id'];
                consulta($query, $link, 4);
                $_SESSION['usuario']['email'] = $_POST['email'];
                header("Location: my_profile.php");
            } else {
                header("Location: my_profile.php");
            }
        } else {
            header("Location: my_profile.php");
        }
    }
    if (isset($_POST['actual']) && strlen($_POST['actual']) > 0 && strlen($_POST['actual']) <= 50 && isset($_POST['contra']) && strlen($_POST['contra']) > 0 && strlen($_POST['contra']) <= 50 && isset($_POST['comp']) && strlen($_POST['comp']) > 0 && strlen($_POST['comp']) <= 50) {
        if (comprobar_contra($_POST['contra']) == true) {
            $query = "SELECT password FROM usuarios WHERE id = " . $_SESSION['usuario']['id'] . " AND password = MD5('" . $_POST['actual'] . "')";
            if (consulta($query, $link, 3) == 1 && $_POST['contra'] == $_POST['comp']) {
                $query = "UPDATE usuarios SET password = MD5('" . $_POST['contra'] . "') WHERE id = " . $_SESSION['usuario']['id'];
                consulta($query, $link, 4);
                $_SESSION['usuario']['password'] = $_POST['contra'];
                header("Location: my_profile.php");
            } else {
                header("Location: my_profile.php");
            }
        } else {
            header("Location: my_profile.php");
        }
    }
    if (isset($_POST['desc']) && strlen($_POST['actual']) <= 100) {
        $query = "UPDATE usuarios SET descripcion = '" . $_POST['desc'] . "' WHERE id = " . $_SESSION['usuario']['id'];
        consulta($query, $link, 4);
        $_SESSION['usuario']['descripcion'] = $_POST['desc'];
        header("Location: my_profile.php");
    }
} else if (isset($_GET['id'])) {
    $a = intval($_GET['id']);
    if (is_int($a) && $_GET['id'] > 0) {
        $query = "SELECT * FROM usuarios WHERE id = " . $a . " AND fecha_baja IS NULL";
        $usuario = consulta($query, $link, 1);
        if (is_array($usuario)) {
            $usuario = fecha($usuario, $meses);
            $query = "SELECT id,titulo,encabezado,fecha_alta FROM informes WHERE usuario_id = " . $a . " AND fecha_baja IS NULL";
            $resultado1 = consulta($query, $link);
            $cant_inf = 0;
            if (count($resultado1) > 0) {
                for ($i = 0; $i < count($resultado1); $i++) {
                    $resultado1[$i] = fecha($resultado1[$i], $meses);
                    if (file_exists("img/portadas/p" . $resultado1[$i]['id'] . ".jpg")) {
                        $resultado1[$i]['portada'] = "p" . $resultado1[$i]['id'] . ".jpg";
                    } else {
                        $resultado1[$i]['portada'] = "defecto.png";
                    }
                }
                $cant_inf = count($resultado1);
            }
            if (isset($_SESSION['usuario'])) {
                $query = "SELECT mensaje,usuario_id,emisor_id,vista FROM mensajes WHERE fecha_baja IS NULL AND ((usuario_id = " . $_SESSION['usuario']['id'] . " AND emisor_id = $a) OR (emisor_id = " . $_SESSION['usuario']['id'] . " AND usuario_id = $a))";
                $mensajes = consulta($query, $link);
            }
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
}
$title = "Perfil";
$section = "my_profile";
require_once "views/layout.php";
