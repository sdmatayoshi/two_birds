<?php
require_once "includes/config.php";
if (isset($_SESSION['usuario'])) {
	require_once "includes/contactos.php";
}

if (isset($_POST['titulo']) && strlen($_POST["titulo"]) <= 35 && isset($_POST['contenido']) && isset($_POST['encabezado']) && strlen($_POST["encabezado"]) <= 70 && isset($_SESSION['usuario'])) {
    $fecha = date('Y-m-d h:i:s', time());
    $_POST['titulo'] = insultos($_POST['titulo'], $link);
    $_POST['contenido'] = insultos($_POST['contenido'], $link);
    $_POST['encabezado'] = insultos($_POST['encabezado'], $link);
    $query = "INSERT INTO informes(usuario_id,titulo,contenido,fecha_alta,encabezado)
    VALUES('" . $_SESSION['usuario']['id'] . "','" . $_POST['titulo'] . "','" . $_POST['contenido'] . "','" . $fecha . "','" . $_POST['encabezado'] . "')";
    consulta($query, $link, 4);
    $id = mysqli_insert_id($link);
    if (isset($id)) {
        if(isset($_POST['portada'])){
            $portada = explode(",",$_POST['portada']);
        }
        if ($_POST['portada'] == false || count($portada) == 1) {
            preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $_POST['contenido'], $image);
            if (count($image) > 0) {
                file_put_contents('img/portadas/p' . $id . '.jpg', file_get_contents($image['src']));
            }
        } else {
            file_put_contents('img/portadas/p' . $id . '.jpg', base64_decode($portada[1]));
        }
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
            echo json_encode(array("exito" => $id));
            die();
        }
        if ($cont_tags > 0) {
            consulta($query, $link, 4);
            echo json_encode(array("exito" => $id));
            die();
        }
        echo json_encode(array("exito" => $id));
        die();
    } else{
        echo json_encode(array("error" => true));
        die();
    }
}

if (isset($_GET['busqueda'])) {
    $query = "SELECT user_name,foto,id FROM usuarios
        WHERE fecha_baja IS NULL AND user_name LIKE '%" . $_GET['busqueda'] . "%' ORDER BY fecha_alta DESC";
    $usuarios = consulta($query, $link);
    $query = "SELECT COUNT(*) FROM informes
    WHERE fecha_baja IS NULL AND
    (titulo LIKE '%" . $_GET['busqueda'] . "%' OR
    contenido LIKE '%" . $_GET['busqueda'] . "%' OR
    encabezado LIKE '%" . $_GET['busqueda'] . "%')";
    $cant_inf = consulta($query, $link, 1);
    if ($cant_inf["COUNT(*)"] > 0) {
        $pags = ceil($cant_inf["COUNT(*)"] / 6);
        if (isset($_GET['pag'])) {
            settype($_GET['pag'], "integer");
            if ($_GET['pag'] > 0 && $_GET['pag'] <= $pags) {
                if ($_GET['pag'] == 1) {
                    $pag = 0;
                    $limit = 6;
                } else {
                    $pag = ($_GET['pag'] - 1) * 6;
                    $limit = 6 * $_GET['pag'];
                }
            } else {
                $pag = 0;
                $limit = 6;
                $error = "si";
            }
        } else {
            $pag = 0;
            $limit = 6;
        }
    } else {
        $pag = 0;
        $limit = 6;
    }
    $query = "SELECT id,titulo,fecha_alta,encabezado,contenido,fecha_baja FROM informes
    WHERE fecha_baja IS NULL AND (titulo LIKE '%" . $_GET['busqueda'] . "%' OR
    contenido LIKE '%" . $_GET['busqueda'] . "%' OR
    encabezado LIKE '%" . $_GET['busqueda'] . "%')
    ORDER BY fecha_alta DESC LIMIT " . $pag . "," . $limit;
} else if (isset($_GET['categoria'])) {
    $query = "SELECT COUNT(*) FROM informes AS i
    INNER JOIN categoria_informe AS ci
    ON i.id = ci.informe_id
    INNER JOIN categorias AS c
    ON ci.categoria_id = c.id
    WHERE i.fecha_baja IS NULL AND
    ci.fecha_baja IS NULL AND
    c.categoria = '" . $_GET['categoria'] . "'";
    $cant_inf = consulta($query, $link, 1);
    if ($cant_inf["COUNT(*)"] > 0) {
        $pags = ceil($cant_inf["COUNT(*)"] / 6);
        if (isset($_GET['pag'])) {
            settype($_GET['pag'], "integer");
            if ($_GET['pag'] > 0 && $_GET['pag'] <= $pags) {
                if ($_GET['pag'] == 1) {
                    $pag = 0;
                    $limit = 6;
                } else {
                    $pag = ($_GET['pag'] - 1) * 6;
                    $limit = 6 * $_GET['pag'];
                }
            }
        } else {
            $pag = 0;
            $limit = 6;
        }
    } else {
        $pag = 0;
        $limit = 6;
    }
    $query = "SELECT i.id,titulo,i.fecha_alta,encabezado FROM informes AS i
    INNER JOIN categoria_informe AS ci
    ON i.id = ci.informe_id
    INNER JOIN categorias AS c
    ON ci.categoria_id = c.id
    WHERE i.fecha_baja IS NULL AND
    ci.fecha_baja IS NULL AND
    c.categoria = '" . $_GET['categoria'] . "'
    ORDER BY fecha_alta DESC LIMIT " . $pag . "," . $limit;
} else {
    /*$query = "SELECT * FROM (SELECT COUNT(informe_vistas.id) AS si,informes.id,titulo,informes.fecha_alta,encabezado,informe_vistas.informe_id FROM informes
    LEFT JOIN informe_vistas
    ON informes.id = informe_vistas.informe_id
    WHERE informes.fecha_baja IS NULL
    GROUP BY informe_vistas.informe_id
    ORDER BY informes.fecha_alta DESC LIMIT 0,5) a ORDER BY si DESC";*/
    $query = "SELECT si.id,si.usuario_id,si.titulo,si.fecha_alta,si.encabezado,COUNT(informe_vistas.id) FROM (SELECT id,usuario_id,titulo,fecha_alta,encabezado FROM informes
    WHERE informes.fecha_baja IS NULL
    ORDER BY informes.fecha_alta DESC LIMIT 0,5) si
    LEFT JOIN informe_vistas
    ON si.id = informe_vistas.informe_id
    GROUP BY si.id
    ORDER BY COUNT(informe_vistas.id) DESC";
}

if (!isset($error)) {
    $resultado = consulta($query, $link);
    if (count($resultado) > 0) {
        $query = "SELECT c.categoria,ci.informe_id FROM categoria_informe AS ci
		INNER JOIN categorias AS c
		ON ci.categoria_id = c.id
		WHERE fecha_baja IS NULL AND (ci.informe_id = " . $resultado[0]['id'];
        for ($i = 0; $i < count($resultado); $i++) {

            $resultado[$i] = fecha($resultado[$i], $meses);

            if (file_exists("img/portadas/p" . $resultado[$i]['id'] . ".jpg")) {
                $resultado[$i]['portada'] = "p" . $resultado[$i]['id'] . ".jpg";
            } else {
                $resultado[$i]['portada'] = "defecto.png";
            }
            $query = $query . " OR ci.informe_id = " . $resultado[$i]['id'];
        }
        $query .= ")";
        $tags = consulta($query, $link);
        for ($i = 0; $i < count($resultado); $i++) {
            foreach ($tags as $tag) {
                if ($resultado[$i]['id'] == $tag['informe_id']) {
                    $resultado[$i]['tags'][] = $tag['categoria'];
                }
            }
        }
    }
}

$section = "forum";
$title = "Foro";
require_once "views/layout.php";
