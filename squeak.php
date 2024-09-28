<?php
require_once "includes/config.php";
if (isset($_SESSION['usuario'])) {
	require_once "includes/contactos.php";
}
if (isset($_SESSION['usuario']['cambio']) && (isset($_GET['pref']) || isset($_GET['prem']) || isset($_GET['prey']) || isset($_POST['comentario']) || isset($_POST['like']) || isset($_POST['fav']) || isset($_POST['respuesta']))) {
	$id = $_SESSION['usuario']['cambio'];
} else {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		header("Location: forum.php");
	}
}

if (intval($id) == 0 && intval($id) < 1) {
	$error = "si";
} else {
	$query = "SELECT COUNT(il.informe_id),i.usuario_id,titulo,i.fecha_alta,i.fecha_modificacion,contenido,encabezado, (
			SELECT COUNT(*) FROM informe_vistas WHERE informe_id = " . $id . "
		) contador_vistas FROM informes AS i
		LEFT JOIN informe_likes AS il
			ON i.id = il.informe_id
		WHERE i.id = " . $id . " AND i.fecha_baja IS NULL
		GROUP BY il.informe_id";
	$resultado = consulta($query, $link, 1);

	if (!is_array($resultado)) {
		$error = "si";
	} else {
		$query = "SELECT sub.ciu,usuarios.id,user_name,rango,descripcion,foto FROM (
		SELECT usuario_id,COUNT(*) AS ciu FROM informes WHERE usuario_id = " . $resultado['usuario_id'] . " AND fecha_baja IS NULL
		) sub
INNER JOIN usuarios
ON sub.usuario_id = usuarios.id
INNER JOIN rango_usuario
ON usuarios.id = rango_usuario.usuario_id
INNER JOIN rangos
ON rango_usuario.rango_id = rangos.id
WHERE usuarios.id = " . $resultado['usuario_id'] . " AND
rango_usuario.fecha_baja IS NULL";
		$propietario = consulta($query, $link);
		if (count($propietario) == 0) {
			$propietario[0]['id'] = 0;
			$propietario[0]['user_name'] = "UsuarioEliminado";
			$propietario['rango'] = 1;
			$propietario[0]['descripcion'] = "";
			$propietario[0]['foto'] = "../../pajarito.jpg";
		} else {
			$propietario[0]['ciu'] = intval($propietario[0]['ciu']);
			$mode = "user";
			foreach ($propietario as $ran) {
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

			$propietario['rango'] = $rangos[$mode];
		}
		$query = "SELECT categoria FROM categoria_informe AS ci
		INNER JOIN categorias AS c
		ON ci.categoria_id = c.id
		WHERE ci.informe_id = " . $id . " AND
		fecha_baja IS NULL";
		$resultado['tags'] = consulta($query, $link);

		$resultado = fecha($resultado, $meses);

		if (isset($resultado['fecha_modificacion'])) {
			$resultado = fecha($resultado, $meses, 1);
		}
		$fecha = date("Y-m-d h:i:s", time());

		$query = "SELECT COUNT(*) FROM informe_likes WHERE fecha_baja IS NULL AND informe_id = " . $id;

		$recuperacion = consulta($query, $link, 1);
		$resultado['likes'] = $recuperacion['COUNT(*)'];

		$query = "SELECT COUNT(*) FROM informe_dislikes WHERE fecha_baja IS NULL AND informe_id = " . $id;

		$recuperacion = consulta($query, $link, 1);
		$resultado['dislikes'] = $recuperacion['COUNT(*)'];

		if (isset($_SESSION['usuario'])) {
			if (isset($_GET['pref']) || isset($_GET['prem']) || isset($_GET['prey']) || isset($_POST['comentario']) || isset($_POST['like']) || isset($_POST['fav']) || isset($_POST['respuesta'])) {
				$change = true;
			} else {
				if (isset($_GET['id'])) {
					$_SESSION['usuario']['cambio'] = $_GET['id'];
				}
			}

			$query = "SELECT * FROM informe_vistas WHERE informe_id = " . $id . " AND usuario_id = " . $_SESSION['usuario']['id'];
			if (consulta($query, $link, 3) == 0) {
				$query = "INSERT INTO informe_vistas(usuario_id,informe_id,fecha_alta) VALUES(" . $_SESSION['usuario']['id'] . ",$id,'$fecha')";
				consulta($query, $link, 4);
			}

			$query = "SELECT * FROM informe_likes WHERE fecha_baja IS NULL AND informe_id = " . $id . " AND usuario_id = " . $_SESSION['usuario']['id'];
			if (consulta($query, $link, 3) == 1) {
				$like = "<i class='fa-solid fa-thumbs-up'></i>";
			} else {
				$like = "<i class='fa-regular fa-thumbs-up'></i>";
			}

			$query = "SELECT * FROM informe_dislikes WHERE fecha_baja IS NULL AND informe_id = " . $id . " AND usuario_id = " . $_SESSION['usuario']['id'];
			if (consulta($query, $link, 3) == 1) {
				$dislike = "<i class='fa-solid fa-thumbs-down'></i>";
			} else {
				$dislike = "<i class='fa-regular fa-thumbs-down'></i>";
			}

			$query = "SELECT * FROM favoritos WHERE fecha_baja IS NULL AND informe_id = " . $id . " AND usuario_id = " . $_SESSION['usuario']['id'];
			if (consulta($query, $link, 3) == 1) {
				$fav = "<i class='fa-solid fa-star'></i>";
			} else {
				$fav = "<i class='fa-regular fa-star'></i>";
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

			$_SESSION['usuario']['rango'] = $rangos[$mode];
		} else {
			$id = $_GET['id'];
		}
		$query = "SELECT usuarios.id AS ui,comentarios.id,comentario_padre_id,informe_id,comentario,user_name,foto FROM comentarios
INNER JOIN usuarios
ON comentarios.usuario_id = usuarios.id
WHERE comentarios.fecha_baja IS NULL AND informe_id = " . $id;
		$comentarios = consulta($query, $link);
		$comentarios = array_reverse($comentarios);

		if (isset($_POST['titulo']) && strlen($_POST["titulo"]) <= 35 && isset($_POST['contenido']) && isset($_POST['encabezado']) && strlen($_POST["encabezado"]) <= 70 && isset($_SESSION['usuario']) && isset($_GET['pref'])) {
			$id = $_SESSION['usuario']['cambio'];
			$_POST['titulo'] = insultos($_POST['titulo'], $link);
			$_POST['contenido'] = insultos($_POST['contenido'], $link);
			$_POST['encabezado'] = insultos($_POST['encabezado'], $link);
			if (isset($id)) {
				if (isset($_POST['portada'])) {
					$portada = explode(",", $_POST['portada']);
				}
				if ($_POST['portada'] == false || count($portada) == 1) {
					preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $_POST['contenido'], $image);
					if (count($image) > 0) {
						$file = 'img/portadas/p' . $_SESSION['usuario']['cambio'] . '.jpg';
						if (file_exists($file)) {
							unlink($file);
						}
						file_put_contents('img/portadas/p' . $id . '.jpg', file_get_contents($image['src']));
					} else {
						$file = 'img/portadas/p' . $_SESSION['usuario']['cambio'] . '.jpg';
						if (file_exists($file)) {
							unlink($file);
						}
					}
				} else {
					file_put_contents('img/portadas/p' . $id . '.jpg', base64_decode($portada[1]));
				}
				$query = "UPDATE informes SET titulo = '" . $_POST['titulo'] . "',contenido = '" . $_POST['contenido'] . "',fecha_modificacion = '" . $fecha . "',encabezado = '" . $_POST['encabezado'] . "'
	WHERE id = " . $id;
				consulta($query, $link, 4);
				$query = "UPDATE categoria_informe SET fecha_baja = '" . $fecha . "'
	WHERE informe_id = " . $id;
				consulta($query, $link, 4);
				$query = "INSERT INTO categoria_informe(informe_id,fecha_alta,categoria_id)
        VALUES(" . $id . ",'" . $fecha . "',";
				$cont_tags = 0;
				if (isset($_POST['flora']) && $_POST['flora'] == "true") {
					$cont_tags++;
					if ($cont_tags != 1) {
						$query .= ",(" . $id . ",'" . $fecha . "',";
					}
					$query .= "1)";
				}
				if (isset($_POST['fauna']) && $_POST['fauna'] == "true") {
					$cont_tags++;
					if ($cont_tags != 1) {
						$query .= ",(" . $id . ",'" . $fecha . "',";
					}
					$query .= "2)";
				}
				if (isset($_POST['clima']) && $_POST['clima'] == "true") {
					$cont_tags++;
					if ($cont_tags != 1) {
						$query .= ",(" . $id . ",'" . $fecha . "',";
					}
					$query .= "3)";
				}
				if (isset($_POST['oceano']) && $_POST['oceano'] == "true") {
					$cont_tags++;
					if ($cont_tags != 1) {
						$query .= ",(" . $id . ",'" . $fecha . "',";
					}
					$query .= "4)";
				}
				if (isset($_POST['medio_ambiente']) && $_POST['medio_ambiente'] == "true") {
					$cont_tags++;
					if ($cont_tags != 1) {
						$query .= ",(" . $id . ",'" . $fecha . "',";
					}
					$query .= "5)";
				}
				if (isset($_POST['medidas']) && $_POST['medidas'] == "true") {
					$cont_tags++;
					if ($cont_tags != 1) {
						$query .= ",(" . $id . ",'" . $fecha . "',";
					}
					$query .= "6)";
				}
				if (strlen($query) < 100) {
					echo json_encode(array("exito" => true));
					die();
				}
				if ($cont_tags > 0) {
					consulta($query, $link, 4);
					echo json_encode(array("exito" => true));
					die();
				}
				echo json_encode(array("exito" => true));
				die();
			} else {
				echo json_encode(array("error" => true));
				die();
			}
		}

		if (isset($_POST['eliminar']) && isset($_SESSION['usuario']) && isset($_GET['prem'])) {
			$query = "UPDATE informes SET fecha_baja = '$fecha' WHERE fecha_baja IS NULL AND id = " . $_SESSION['usuario']['cambio'];
			$file = 'img/portadas/p' . $_SESSION['usuario']['cambio'] . '.jpg';
			if (file_exists($file)) {
				unlink($file);
			}
			consulta($query, $link, 4);
			header("Location: forum.php");
		}

		if (isset($_POST['eliminar']) && isset($_SESSION['usuario']) && isset($_GET['prey'])) {
			$query = "INSERT INTO moderaciones(usuario_id, moderacion, informe_id,fecha_alta,tipo) VALUES(" . $_SESSION['usuario']['id'] . ", '" . $_POST['ban_info'] . "','" . $_SESSION['usuario']['cambio'] . "','$fecha','informe')";
			consulta($query, $link, 4);
			$query = "UPDATE informes SET fecha_baja = '$fecha' WHERE fecha_baja IS NULL AND id = " . $_SESSION['usuario']['cambio'];
			$file = 'img/portadas/p' . $_SESSION['usuario']['cambio'] . '.jpg';
			if (file_exists($file)) {
				unlink($file);
			}
			consulta($query, $link, 4);
			header("Location: forum.php");
		}

		if (isset($_POST['comentario']) && isset($_SESSION['usuario']) && strlen($_POST['comentario']) > 0) {
			$at = insultos($_POST['comentario'], $link);
			$query = 'INSERT INTO comentarios(usuario_id,comentario,informe_id,fecha_alta) VALUES(' . $_SESSION['usuario']['id'] . ',"' . $at . '",' . $id . ',"' . $fecha . '")';
			consulta($query, $link, 4);
			echo json_encode(array("comentario" => $_POST['comentario'], "comentario_id" => mysqli_insert_id($link), "foto" => $_SESSION['usuario']['foto'], "user_name" => $_SESSION['usuario']['user_name'], "usuario_id" => $_SESSION['usuario']['id']));
			die();
			//header("Location: squeak.php?id=" . $id . "&#comentarios");
		}

		if (isset($_POST['like']) && isset($_SESSION['usuario'])) {
			$query = "SELECT * FROM informe_likes WHERE fecha_baja IS NULL AND informe_id = " . $id . " AND usuario_id = " . $_SESSION['usuario']['id'];
			if (consulta($query, $link, 3) == 1) {
				$query = "UPDATE informe_likes SET fecha_baja = '$fecha' WHERE fecha_baja IS NULL AND informe_id = " . $id . " AND usuario_id = " . $_SESSION['usuario']['id'];
				consulta($query, $link, 4);
				echo json_encode(array("like" => false));
				die();
				//header("Location: squeak.php?id=" . $id . "&#titulo");
			} else {
				$query = "INSERT INTO informe_likes(usuario_id,informe_id,fecha_alta) VALUES(" . $_SESSION['usuario']['id'] . "," . $id . ",'$fecha')";
				consulta($query, $link, 4);
				echo json_encode(array("like" => true));
				die();
				//header("Location: squeak.php?id=" . $id . "&#titulo");
			}
		}

		if (isset($_POST['dislike']) && isset($_SESSION['usuario'])) {
			$query = "SELECT * FROM informe_dislikes WHERE fecha_baja IS NULL AND informe_id = " . $id . " AND usuario_id = " . $_SESSION['usuario']['id'];
			if (consulta($query, $link, 3) == 1) {
				$query = "UPDATE informe_dislikes SET fecha_baja = '$fecha' WHERE fecha_baja IS NULL AND informe_id = " . $id . " AND usuario_id = " . $_SESSION['usuario']['id'];
				consulta($query, $link, 4);
				echo json_encode(array("dislike" => false));
				die();
				//header("Location: squeak.php?id=" . $id . "&#titulo");
			} else {
				$query = "INSERT INTO informe_dislikes(usuario_id,informe_id,fecha_alta) VALUES(" . $_SESSION['usuario']['id'] . "," . $id . ",'$fecha')";
				consulta($query, $link, 4);
				echo json_encode(array("dislike" => true));
				die();
				//header("Location: squeak.php?id=" . $id . "&#titulo");
			}
		}

		if (isset($_POST['fav']) && isset($_SESSION['usuario'])) {
			$query = "SELECT * FROM favoritos WHERE fecha_baja IS NULL AND informe_id = " . $id . " AND usuario_id = " . $_SESSION['usuario']['id'];

			if (consulta($query, $link, 3) == 1) {
				$query = "UPDATE favoritos SET fecha_baja = '$fecha' WHERE informe_id = " . $id . " AND usuario_id = " . $_SESSION['usuario']['id'];
				consulta($query, $link, 4);
				echo json_encode(array("star" => false));
				die();
				//header("Location: squeak.php?id=" . $id . "&#titulo");
			} else {
				$query = "INSERT INTO favoritos(usuario_id,informe_id,fecha_alta) VALUES(" . $_SESSION['usuario']['id'] . "," . $id . ",'$fecha')";
				consulta($query, $link, 4);
				echo json_encode(array("star" => true));
				die();
				//header("Location: squeak.php?id=" . $id . "&#titulo");
			}
		}

		if (isset($_POST['respuesta']) && isset($_POST['comentid']) && isset($_SESSION['usuario'])) {
			if (ctype_digit($_POST['comentid']) == "int" && strlen($_POST['respuesta']) > 0) {
				$_POST['respuesta'] = insultos($_POST['respuesta'], $link);
				$query = "SELECT * FROM comentarios WHERE fecha_baja IS NULL AND id = " . $_POST['comentid'] . " AND informe_id = " . $id;
				if (consulta($query, $link, 3) == 1) {
					$query = 'INSERT INTO comentarios(comentario_padre_id,usuario_id,comentario,informe_id,fecha_alta) VALUES(' . $_POST['comentid'] . ',' . $_SESSION['usuario']['id'] . ',"' . $_POST['respuesta'] . '",' . $id . ',"' . $fecha . '")';
					consulta($query, $link, 4);
					echo json_encode(array("comentario" => $_POST['respuesta'], "comentario_id" => $_POST['comentid'], "foto" => $_SESSION['usuario']['foto'], "user_name" => $_SESSION['usuario']['user_name'], "usuario_id" => $_SESSION['usuario']['id']));
					die();
					//header("Location: squeak.php?id=" . $id . "&#comentarios");
				} else {
					die();
				}
			} else {
				//header("Location: squeak.php?id=" . $id . "&#comentarios");
				die();
			}
		}
	}
}
$section = "squeak";
require_once "views/layout.php";