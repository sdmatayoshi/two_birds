<?php
if (!isset($pb)) {
	$log_er = true;
	require_once 'includes/config.php';
}
if (isset($_SESSION['usuario'])) {
	header("Location: my_profile.php");
}
if ((isset($_POST["username"]) && isset($_POST["password"])) || (isset($_COOKIE["username"]) && isset($_COOKIE["pass"]))) {
	$username = isset($_POST["username"]) ? $_POST["username"] : $_COOKIE["username"];
	$pass = isset($_POST["password"]) ? $_POST["password"] : $_COOKIE["pass"];
	$query = "SELECT * FROM usuarios WHERE BINARY user_name = '" . $username . "' AND password = MD5('" . $pass . "') AND fecha_baja IS NULL";
	$rec = consulta($query, $link, 1);
	if (is_array($rec)) {
		$_SESSION['usuario'] = $rec;
		$query = "SELECT r.rango FROM rango_usuario AS ru
			INNER JOIN rangos AS r
			ON ru.rango_id = r.id
			WHERE ru.usuario_id = " . $_SESSION['usuario']['id'] . " AND
			fecha_baja IS NULL";
		$rec = consulta($query, $link);
		if (count($rec) > 0) {
			$_SESSION['usuario']['rangos'] = $rec;
		}
		if (isset($_COOKIE["pass"]) && isset($_COOKIE["username"]) && !isset($pb)) {
			setcookie("username", "", time() - 60);
			setcookie("pass", "", time() - 60);
		}
		if (isset($_POST['cierto']) && $_POST['cierto'] == "true") {
			setcookie("username", $username, time() + 60 * 60 * 24 * 30);
			setcookie("pass", $pass, time() + 60 * 60 * 24 * 30);
		}
		if(!isset($pb)){
			echo json_encode(array("exito" => true));
			die();
		}
	} else {
		$query = "SELECT * FROM usuarios WHERE BINARY email = '" . $username . "' AND password = MD5('" . $pass . "') AND fecha_baja IS NULL";
		$rec = consulta($query, $link, 1);
		if (is_array($rec)) {
			$_SESSION['usuario'] = $rec;
			$query = "SELECT r.rango FROM rango_usuario AS ru
			INNER JOIN rangos AS r
			ON ru.rango_id = r.id
			WHERE ru.usuario_id = " . $_SESSION['usuario']['id'] . " AND
			fecha_baja IS NULL";
			$rec = consulta($query, $link);
			if (count($rec) > 0) {
				$_SESSION['usuario']['rangos'] = $rec;
			}
			if (isset($_COOKIE["pass"]) && isset($_COOKIE["username"]) && !isset($pb)) {
				setcookie("username", "", time() - 60);
				setcookie("pass", "", time() - 60);
			}
			if (isset($_POST['cierto']) && $_POST['cierto'] == true) {
				setcookie("username", $username, time() + 60 * 60 * 24 * 30);
				setcookie("pass", $pass, time() + 60 * 60 * 24 * 30);
			}
			if(!isset($pb)){
				echo json_encode(array("exito" => true));
				die();
			}
		} else {
			echo json_encode(array("error" => true));
			die();
		}
	}
} else {
	$title = "Iniciar sesión";
	$section = "log_in";
	require_once "views/layout.php";
}
