<?php
if (isset($_SESSION['usuario'])) {
    header("Location: my_profile.php");
}
require_once 'includes/config.php';
function comprobar_contra($contra)
{
    $mayusculas = array('ignorar', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $minusculas = array('ignorar', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    $signos = array('ignorar', '!', '¡', '¿', '?', '"', "'", '$', '%', '#', '&', '/', '(', ')', '|', '°', '¬', '\\', '=', '*', '+', '~', '´', '¨', '{', '}', '^', '`', '[', ']', '-', '_', '.', ',', ':', ';', '<', '>', '@');
    $numeros = array('ignorar', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
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
$exito = false;
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
    $comprobar_email = explode("@", $_POST['email']);
    if (strlen($_POST["username"]) > 0 && strlen($_POST["username"]) <= 25 && strlen($_POST["password"]) >= 8 && strlen($_POST["password"]) <= 50 && strlen($_POST["email"]) >= 5 && count($comprobar_email) > 1) {
        if (comprobar_contra($_POST['password']) == true) {
            $user = $_POST["username"];
            $pass = $_POST["password"];
            $mail = $_POST["email"];
            $_POST['username'] = insultos($_POST['username'], $link);
            $insert = "SELECT email FROM usuarios WHERE email = '" . $mail . "' AND fecha_baja IS NULL";
            $insert1 = "SELECT user_name FROM usuarios WHERE user_name = '" . $user . "' AND fecha_baja IS NULL";
            if (consulta($insert, $link, 3) == 0) {
                if (consulta($insert1, $link, 3) == 0) {
                    $pass = md5($pass);
                    $insert = "INSERT INTO usuarios (id, user_name, password, email, foto,fecha_alta) VALUES (NULL,'$user','$pass','$mail','../../pajarito.jpg','" . date("Y-m-d h:i:s", time()) . "')";
                    $rec = consulta($insert, $link, 4);
                    $insert = "SELECT id FROM usuarios WHERE user_name = '$user' AND email = '$mail' AND password = '$pass' AND fecha_baja IS NULL";
                    $id = consulta($insert, $link, 1);
                    if (is_array($id)) {
                        $insert = "INSERT INTO rango_usuario (rango_id,usuario_id,fecha_alta) VALUES (1," . $id['id'] . ",'" . date("Y-m-d h:i:s", time()) . "')";
                        consulta($insert, $link, 4);
                        setcookie("username", $_POST["username"], time() + 60);
                        setcookie("pass", $_POST["password"], time() + 60);
                        require_once "log_in.php";
                    } else {
                        die("No se admitio a usuario");
                    }
                } else {
                    echo json_encode(array("error_nom" => true));
                    die();
                }
            } else {
                echo json_encode(array("error_cor" => true));
                die();
            }
        } else {
            echo json_encode(array("error_con" => true));
            die();
        }
    } else {
        echo json_encode(array("error_cre" => true));
        die();
    }
}

if (isset($_COOKIE['error_nombre'])) {
    setcookie("error_nombre", true, time() - 120);
    $ern = true;
} else if (isset($_COOKIE['error_correo'])) {
    setcookie("error_correo", true, time() - 120);
    $erc = true;
} else if (isset($_COOKIE['error_credenciales'])) {
    setcookie("error_credenciales", true, time() - 120);
    $ercr = true;
} else if (isset($_COOKIE['error_contra'])) {
    setcookie("error_contra", true, time() - 120);
    $erct = true;
}

$section = "register";
require_once "views/layout.php";