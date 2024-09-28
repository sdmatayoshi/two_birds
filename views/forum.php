<?php
if (!isset($section)) {
    header("Location: ../index.php");
}
?>
<p class="p-2 text-light"><a href="index.php">Inicio</a> <i class="fa-solid fa-caret-right" style="color: darkgrey;"></i> <a <?php if (isset($_GET['busqueda']) || isset($_GET['categoria'])) {
                                                                                                                                    echo 'href="forum.php"';
                                                                                                                                } else {
                                                                                                                                    echo 'style="color:grey;user-select:none;"';
                                                                                                                                } ?>>Foro</a>
    <?php if (isset($_GET['categoria']) && isset($resultado)) {
        $a = str_split($_GET['categoria']);
        $cat = strtoupper($a[0]);
        for ($i = 1; $i < count($a); $i++) {
            $cat .= $a[$i];
        } ?>
        <i class="fa-solid fa-caret-right" style="color: darkgrey;"></i><a style="color:grey; user-select:none;"><a style="color:grey; user-select:none;"> <?php echo $cat; ?> <i class="fa-solid fa-tag"></i></a> <a style="color:grey; user-select:none;"></a>
        <?php } else if (isset($_GET['busqueda']) && isset($resultado)) { ?>
            <i class="fa-solid fa-caret-right" style="color: darkgrey;"></i> <a style="color: grey; user-select:none;"><?php if (strlen($_GET['busqueda']) < 41) {
                                                                                                                            echo $_GET['busqueda'];
                                                                                                                        } else {
                                                                                                                            echo substr($_GET['busqueda'], 0, 40) . "...";
                                                                                                                        } ?> <i class="fa-solid fa-magnifying-glass" style="font-size: 13px;"></i></a>
        <?php } ?>
</p>

<div class="container" style="font-family: 'Montserrat Alternates', sans-serif;">
    <br>
    <br>
    <div class="row" id="cont" style="font-family: 'Montserrat Alternates', sans-serif;">
        <h1 style="font-size:60px; margin-bottom:20px;">Foro</h1>
        <!-- Blog entries-->
        <?php if (!isset($_GET['busqueda']) && !isset($_GET['categoria'])) { ?>
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a style="height:250px;" href="squeak.php?id=<?php echo $resultado[0]['id']; ?>"><img class="card-img-top" src="img/portadas/<?php echo $resultado[0]['portada']; ?>" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted"><?php echo $resultado[0]["mes"] . " " . $resultado[0]["dia"] . ", " . $resultado[0]["Year"] ?></div>
                        <div style="height:110px;">
                            <?php
                            if (isset($resultado[0]["tags"])) {
                                foreach ($resultado[0]["tags"] as $tag) { ?>
                                    <a href="forum.php?categoria=<?php echo $tag; ?>"><span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><i class="fa-solid fa-tag"></i> <?php echo $tag; ?></span></a>
                            <?php }
                            } ?>
                        </div>
                        <h2 class="card-title" style="height:75px;"><?php echo $resultado[0]['titulo']; ?></h2>
                        <p class="card-text" style="color:grey; height:40px;"><?php echo $resultado[0]['encabezado'] . "..."; ?></p>
                        <a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado[0]['id']; ?>">Leer Más <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4" style="height: 600px;">
                            <a style="height:250px;" href="squeak.php?id=<?php echo $resultado[1]['id']; ?>"><img class="card-img-top" height="250" src="img/portadas/<?php echo $resultado[1]['portada']; ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted"><?php echo $resultado[1]["mes"] . " " . $resultado[1]["dia"] . ", " . $resultado[1]["Year"] ?></div>
                                <div style="height:110px;">
                                    <?php
                                    if (isset($resultado[1]["tags"])) {
                                        foreach ($resultado[1]["tags"] as $tag) { ?>
                                            <a href="forum.php?categoria=<?php echo $tag; ?>"><span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><i class="fa-solid fa-tag"></i> <?php echo $tag; ?></span></a>
                                    <?php }
                                    } ?>
                                </div>
                                <h2 class="card-title h4" style="height:75px;"><?php echo $resultado[1]['titulo']; ?></h2>
                                <p class="card-text" style="color:grey; height:40px;"><?php echo $resultado[1]['encabezado'] . "..."; ?></p>
                                <a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado[1]['id']; ?>">Leer Más <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        <!-- Blog post-->
                        <div class="card mb-4" style="height: 600px;">
                            <a style="height:250px;" href="squeak.php?id=<?php echo $resultado[2]['id']; ?>"><img class="card-img-top" height="250" src="img/portadas/<?php echo $resultado[2]['portada']; ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted"><?php echo $resultado[2]["mes"] . " " . $resultado[2]["dia"] . ", " . $resultado[2]["Year"] ?></div>
                                <div style="height:110px;">
                                    <?php
                                    if (isset($resultado[2]["tags"])) {
                                        foreach ($resultado[2]["tags"] as $tag) { ?>
                                            <a href="forum.php?categoria=<?php echo $tag; ?>"><span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><i class="fa-solid fa-tag"></i> <?php echo $tag; ?></span></a>
                                    <?php }
                                    } ?>
                                </div>
                                <h2 class="card-title h4" style="height:75px;"><?php echo $resultado[2]['titulo']; ?></h2>
                                <p class="card-text" style="color:grey; height:40px;"><?php echo $resultado[2]['encabezado'] . "..."; ?></p>
                                <a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado[2]['id']; ?>">Leer Más <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4" style="height: 600px;">
                            <a style="height:250px;" href="squeak.php?id=<?php echo $resultado[3]['id']; ?>"><img class="card-img-top" height="250" src="img/portadas/<?php echo $resultado[3]['portada']; ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted"><?php echo $resultado[3]["mes"] . " " . $resultado[3]["dia"] . ", " . $resultado[3]["Year"] ?></div>
                                <div style="height:110px;">
                                    <?php
                                    if (isset($resultado[3]["tags"])) {
                                        foreach ($resultado[3]["tags"] as $tag) { ?>
                                            <a href="forum.php?categoria=<?php echo $tag; ?>"><span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><i class="fa-solid fa-tag"></i> <?php echo $tag; ?></span></a>
                                    <?php }
                                    } ?>
                                </div>
                                <h2 class="card-title h4" style="height:75px;"><?php echo $resultado[3]['titulo']; ?></h2>
                                <p class="card-text" style="color:grey; height:40px;"><?php echo $resultado[3]['encabezado'] . "..."; ?></p>
                                <a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado[3]['id']; ?>">Leer Más <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        <!-- Blog post-->
                        <div class="card mb-4" style="height: 600px;">
                            <a style="height:250px;" href="squeak.php?id=<?php echo $resultado[4]['id']; ?>"><img class="card-img-top" height="250" src="img/portadas/<?php echo $resultado[4]['portada']; ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted"><?php echo $resultado[4]["mes"] . " " . $resultado[4]["dia"] . ", " . $resultado[4]["Year"] ?></div>
                                <div style="height:110px;">
                                    <?php
                                    if (isset($resultado[4]["tags"])) {
                                        foreach ($resultado[4]["tags"] as $tag) { ?>
                                            <a href="forum.php?categoria=<?php echo $tag; ?>"><span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><i class="fa-solid fa-tag"></i> <?php echo $tag; ?></span></a>
                                    <?php }
                                    } ?>
                                </div>
                                <h2 class="card-title h4" style="height:75px;"><?php echo $resultado[4]['titulo']; ?></h2>
                                <p class="card-text" style="color:grey; height:40px;"><?php echo $resultado[4]['encabezado'] . "..."; ?></p>
                                <a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado[4]['id']; ?>">Leer Más <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else if (!isset($error) && (isset($_GET['busqueda']) || isset($_GET['categoria'])) && (count($resultado) > 0 || (!isset($_GET['categoria']) && count($usuarios) > 0))) { ?>
                <div class="col-lg-8">
                    <?php if (isset($_GET['busqueda'])) { ?>
                        <div class="modal-content" style="border:2px solid darkgrey; border-radius: 25px; height:75px;">
                            <div class="modal-header border-0">
                                <h4>ㅤResultados de la busqueda "<?php if (strlen($_GET['busqueda']) <= 14) {
                                                                    echo $_GET['busqueda'];
                                                                } else {
                                                                    echo substr($_GET['busqueda'], 0, 12) . "...";
                                                                } ?>"</h4>
                                <h2><span><a href="forum.php" data-toggle="tooltip" data-placement="top" title="Eliminar búsqueda"> <i class="fa-solid fa-circle-xmark" style="color:maroon; margin-top:0.5%;"></i></a></span></h2>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="modal-content" style="border:2px solid darkgrey; border-radius: 25px; height:75px;">
                            <div class="modal-header border-0">
                                <h4>ㅤBuscar por categoria "<?php if (strlen($_GET['categoria']) <= 14) {
                                                                echo $_GET['categoria'];
                                                            } else {
                                                                echo substr($_GET['categoria'], 0, 12) . "...";
                                                            } ?>"</h4>
                                <h2><span><a href="forum.php" data-toggle="tooltip" data-placement="top" title="Eliminar búsqueda"> <i class="fa-solid fa-circle-xmark" style="color:maroon; margin-top:0.5%;"></i></a></span></h2>
                            </div>
                        </div>
                    <?php }
                    if (isset($_GET['busqueda']) && isset($usuarios)) { ?>
                        <br>
                        <h2>Usuarios encontrados: <?php echo count($usuarios); ?></h2>
                        <?php if (count($usuarios) > 3) { ?>
                            <div class="row">
                                <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="container px-lg-5">
                                        <div class="owl-carousel testimonial-carousel">
                                            <?php foreach ($usuarios as $us) { ?>
                                                <div class="p-2 my-1 card team-item bg-primary border-black border-3 rounded btn" style="align-items: center;">
                                                    <a href="my_profile.php?id=<?php echo $us['id']; ?>"><img class="rounded-circle border border-success" src="img/usuarios/<?php echo $us['id'] . "/" . $us['foto']; ?>" alt="" style="width: 150px; height: 150px; object-fit:cover; border:solid 5px #7EBC12;"></a>
                                                    <h5 style="text-align:center; margin-top:10px;"><?php if (strlen($us['user_name'] > 10)) {
                                                                                                        echo substr($us['user_name'], 0, 9) . "...";
                                                                                                    } else {
                                                                                                        echo $us['user_name'];
                                                                                                    } ?></h5>
                                                    <a href="my_profile.php?id=<?php echo $us['id']; ?>"><button style=" width:150px;" type="button" class="btn btn-primary bg-success">
                                                            Ver perfil
                                                        </button></a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <?php foreach ($usuarios as $us) { ?>
                                    <div class="p-2 my-1 card team-item bg-primary border-black border-3 rounded btn" style="align-items: center; max-width:250px">
                                        <a href="my_profile.php?id=<?php echo $us['id']; ?>"><img class="rounded-circle border border-success" src="img/usuarios/<?php echo $us['id'] . "/" . $us['foto']; ?>" alt="" style="width: 150px; height: 150px; object-fit:cover; border:solid 5px #7EBC12;"></a>
                                        <h5 style="text-align:center; margin-top:10px;"><?php if (strlen($us['user_name'] > 10)) {
                                                                                            echo substr($us['user_name'], 0, 9) . "...";
                                                                                        } else {
                                                                                            echo $us['user_name'];
                                                                                        } ?></h5>
                                        <a href="my_profile.php?id=<?php echo $us['id']; ?>"><button style=" width:150px;" type="button" class="btn btn-primary bg-success">
                                                Ver perfil
                                            </button></a>
                                    </div>
                                <?php } ?>
                            </div>
                    <?php }
                    } ?>
                    <div class="modal-header"></div>
                    <br><br>
                    <h2>Informes encontrados: <?php echo count($resultado); ?></h2>
                    <?php
                    for ($i = 0; $i < count($resultado); $i += 2) {
                    ?><div class="row">
                            <?php if (isset($resultado[$i])) { ?>
                                <div class="col-lg-6">
                                    <div class="card mb-4" style="height: 600px;">
                                        <a style="height:250px;" href="squeak.php?id=<?php echo $resultado[$i]['id']; ?>"><img class="card-img-top" height="250px" src="img/portadas/<?php echo $resultado[$i]['portada']; ?>" alt="..." /></a>
                                        <div class="card-body">
                                            <div class="small text-muted"><?php echo $resultado[$i]["mes"] . " " . $resultado[$i]["dia"] . ", " . $resultado[$i]["Year"] ?></div>
                                            <div style="height:110px;">
                                                <?php
                                                if (isset($resultado[$i]["tags"])) {
                                                    foreach ($resultado[$i]["tags"] as $tag) { ?>
                                                        <a href="forum.php?categoria=<?php echo $tag; ?>"><span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><i class="fa-solid fa-tag"></i> <?php echo $tag; ?></span></a>
                                                <?php }
                                                } ?>
                                            </div>
                                            <h2 class="card-title h4" style="height:75px;"><?php echo $resultado[$i]['titulo']; ?></h2>
                                            <p class="card-text" style="color:grey; height:40px;"><?php echo $resultado[$i]['encabezado'] . "..."; ?></p>
                                            <a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado[$i]['id']; ?>">Leer Más <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                            <br>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (isset($resultado[$i + 1])) { ?>
                                <div class="col-lg-6">
                                    <div class="card mb-4" style="height: 600px;">
                                        <a style="height:250px;" href="squeak.php?id=<?php echo $resultado[$i + 1]['id']; ?>"><img class="card-img-top" height="250px" src="img/portadas/<?php echo $resultado[$i + 1]['portada']; ?>" alt="..." /></a>
                                        <div class="card-body">
                                            <div class="small text-muted"><?php echo $resultado[$i + 1]["mes"] . " " . $resultado[$i + 1]["dia"] . ", " . $resultado[$i + 1]["Year"] ?></div>
                                            <div style="height:110px;">
                                                <?php
                                                if (isset($resultado[$i + 1]["tags"])) {
                                                    foreach ($resultado[$i + 1]["tags"] as $tag) { ?>
                                                        <a href="forum.php?categoria=<?php echo $tag; ?>"><span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><i class="fa-solid fa-tag"></i> <?php echo $tag; ?></span></a>
                                                <?php }
                                                } ?>
                                            </div>
                                            <h2 class="card-title h4" style="height:75px;"><?php echo $resultado[$i + 1]['titulo']; ?></h2>
                                            <p class="card-text" style="color:grey; height:40px;"><?php echo $resultado[$i + 1]['encabezado'] . "..."; ?></p>
                                            <a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado[$i + 1]['id']; ?>">Leer más <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                            <br>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php
                    }
                } else if (isset($error) || count($resultado) == 0) {
                    ?>
                    <div class="col-lg-8">
                        <div class="modal-content" style="border:2px solid darkgrey; border-radius: 25px; height:75px;">
                            <div class="modal-header border-0">
                                <?php if (isset($_GET['busqueda'])) { ?>
                                    <h4>ㅤResultados de la busqueda "<?php if (strlen($_GET['busqueda']) <= 14) {
                                                                        echo $_GET['busqueda'];
                                                                    } else {
                                                                        echo substr($_GET['busqueda'], 0, 12) . "...";
                                                                    } ?>"</h4>
                                    <h2><span><a href="forum.php" data-toggle="tooltip" data-placement="top" title="Eliminar búsqueda"> <i class="fa-solid fa-circle-xmark" style="color:maroon; margin-top:0.5%;"></i></a></span></h2>
                                <?php } else if ($_GET['categoria']) { ?>
                                    <h4>ㅤBusqueda por categoria "<?php if (strlen($_GET['categoria']) <= 14) {
                                                                        echo $_GET['categoria'];
                                                                    } else {
                                                                        echo substr($_GET['categoria'], 0, 12) . "...";
                                                                    } ?>"</h4>
                                    <h2><span><a href="forum.php" data-toggle="tooltip" data-placement="top" title="Eliminar búsqueda"> <i class="fa-solid fa-circle-xmark" style="color:maroon; margin-top:0.5%;"></i></a></span></h2>
                                <?php } ?>
                            </div>
                        </div>
                        <br>
                        <h2 align="center">No se encontraron resultados</h2>
                        <p align="center"><img src="img/buho_con_lupa.png" alt=""></p>
                    <?php
                }
                    ?>
                    <!-- Pagination-->
                    <?php if (!isset($error) && (isset($_GET['categoria']) || isset($_GET['busqueda']))) {
                        if ($cant_inf['COUNT(*)'] > 0) { ?>
                            <nav aria-label="Pagination">
                                <hr class="my-0" />
                                <ul class="pagination justify-content-center my-4">
                                    <?php if (isset($_GET['pag'])) { ?>
                                        <?php if ($_GET['pag'] > 1) { ?>
                                            <li class="page-item"><a class="page-link" href="forum.php?<?php if (isset($_GET['busqueda'])) {
                                                                                                            echo "busqueda=" . $_GET['busqueda'];
                                                                                                        } else {
                                                                                                            echo "categoria=" . $_GET['categoria'];
                                                                                                        }
                                                                                                        if ($_GET['pag'] - 1 != 1) {
                                                                                                            echo "&pag=" . $_GET['pag'] - 1;
                                                                                                        } ?>" tabindex="-1" aria-disabled="true">Anterior</a></li>
                                        <?php }
                                    }
                                    if (isset($_GET['pag'])) {
                                        if ($_GET['pag'] > 1) { ?>
                                            <li class="page-item" aria-current="page"><a class="page-link" href="forum.php?<?php if (isset($_GET['busqueda'])) {
                                                                                                                                echo "busqueda=" . $_GET['busqueda'];
                                                                                                                            } else {
                                                                                                                                echo "categoria=" . $_GET['categoria'];
                                                                                                                            }
                                                                                                                            if ($_GET['pag'] - 1 != 1) {
                                                                                                                                echo "&pag=" . $_GET['pag'] - 1;
                                                                                                                            } ?>"><?php echo $_GET['pag'] - 1; ?></a></li>
                                        <?php }
                                    } else { ?>
                                        <li class="page-item active" aria-current="page"><a class="page-link" href="forum.php?<?php if (isset($_GET['busqueda'])) {
                                                                                                                                    echo "busqueda=" . $_GET['busqueda'];
                                                                                                                                } else {
                                                                                                                                    echo "categoria=" . $_GET['categoria'];
                                                                                                                                } ?>">1</a></li>
                                    <?php }
                                    if (isset($_GET['pag'])) { ?>
                                        <li class="page-item active"><a class="page-link" href="forum.php?<?php if (isset($_GET['busqueda'])) {
                                                                                                                echo "busqueda=" . $_GET['busqueda'];
                                                                                                            } else {
                                                                                                                echo "categoria=" . $_GET['categoria'];
                                                                                                            } ?>&pag=<?php echo $_GET['pag']; ?>"><?php echo $_GET['pag']; ?></a></li>
                                    <?php } else if ($pags >= 2) { ?>
                                        <li class="page-item"><a class="page-link" href="forum.php?<?php if (isset($_GET['busqueda'])) {
                                                                                                        echo "busqueda=" . $_GET['busqueda'];
                                                                                                    } else {
                                                                                                        echo "categoria=" . $_GET['categoria'];
                                                                                                    } ?>&pag=2">2</a></li>
                                        <?php }
                                    if (isset($_GET['pag'])) {
                                        if ($_GET['pag'] + 1 <= $pags) { ?>
                                            <li class="page-item"><a class="page-link" href="forum.php?<?php if (isset($_GET['busqueda'])) {
                                                                                                            echo "busqueda=" . $_GET['busqueda'];
                                                                                                        } else {
                                                                                                            echo "categoria=" . $_GET['categoria'];
                                                                                                        } ?>&pag=<?php echo $_GET['pag'] + 1; ?>"><?php echo $_GET['pag'] + 1; ?></a></li>
                                        <?php }
                                    } else if ($pags >= 3) { ?>
                                        <li class="page-item"><a class="page-link" href="forum.php?<?php if (isset($_GET['busqueda'])) {
                                                                                                        echo "busqueda=" . $_GET['busqueda'];
                                                                                                    } else {
                                                                                                        echo "categoria=" . $_GET['categoria'];
                                                                                                    } ?>&pag=3">3</a></li>
                                    <?php } ?>
                                    <?php if (isset($_GET['pag'])) {
                                        if ($_GET['pag'] != $pags && $_GET['pag'] != $pags - 1) { ?>
                                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                                            <li class="page-item"><a class="page-link" href="forum.php?<?php if (isset($_GET['busqueda'])) {
                                                                                                            echo "busqueda=" . $_GET['busqueda'];
                                                                                                        } else {
                                                                                                            echo "categoria=" . $_GET['categoria'];
                                                                                                        } ?>&pag=<?php echo $pags; ?>"><?php echo $pags ?></a></li>
                                        <?php }
                                    } else if ($pags > 3) { ?>
                                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                                        <li class="page-item"><a class="page-link" href="forum.php?<?php if (isset($_GET['busqueda'])) {
                                                                                                        echo "busqueda=" . $_GET['busqueda'];
                                                                                                    } else {
                                                                                                        echo "categoria=" . $_GET['categoria'];
                                                                                                    } ?>&pag=<?php echo $pags; ?>"><?php echo $pags ?></a></li>
                                    <?php } ?>
                                    <?php if ($pags != 1 && !isset($_GET['pag'])) { ?>
                                        <li class="page-item"><a class="page-link" href="forum.php?<?php if (isset($_GET['busqueda'])) {
                                                                                                        echo "busqueda=" . $_GET['busqueda'];
                                                                                                    } else {
                                                                                                        echo "categoria=" . $_GET['categoria'];
                                                                                                    } ?>&pag=2">Siguiente</a></li>
                                        <?php } else if (isset($_GET['pag'])) {
                                        if ($_GET['pag'] < $pags && $_GET['pag'] > 0) { ?>
                                            <li class="page-item"><a class="page-link" href="forum.php?<?php if (isset($_GET['busqueda'])) {
                                                                                                            echo "busqueda=" . $_GET['busqueda'];
                                                                                                        } else {
                                                                                                            echo "categoria=" . $_GET['categoria'];
                                                                                                        } ?>&pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a></li>
                                    <?php }
                                    } ?>
                                </ul>
                            </nav>
                    <?php }
                    } ?>
                    </div>

                    <!-- Side widgets-->
                    <div class="col-lg-4">
                        <!-- Search widget-->
                        <div class="card mb-4">
                            <div class="card-header" style="font-family: 'Montserrat Alternates', sans-serif; color:black;">Buscar</div>
                            <div class="card-body">
                                <form action="" method="GET" class="input-group">
                                    <input name="busqueda" class="form-control" type="text" placeholder="Buscar un informe..." aria-label="..." aria-describedby="button-search" style="font-family: 'Montserrat Alternates', sans-serif;" />
                                    <button class="btn btn-primary" id="button-search" type="submit"><i class="fas fa-magnifying-glass server me-3"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Categories widget-->
                        <div class="card mb-4">
                            <div class="card-header" style="font-family: 'Montserrat Alternates', sans-serif; color:black;">Categorias</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="forum.php?categoria=fauna" style="font-family: 'Montserrat Alternates', sans-serif;">‣ Fauna</a></li>
                                            <li><a href="forum.php?categoria=flora" style="font-family: 'Montserrat Alternates', sans-serif;">‣ Flora</a></li>
                                            <li><a href="forum.php?categoria=clima" style="font-family: 'Montserrat Alternates', sans-serif;">‣ Clima</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="forum.php?categoria=océano" style="font-family: 'Montserrat Alternates', sans-serif;">‣ Océano</a></li>
                                            <li><a href="forum.php?categoria=medio ambiente" style="font-family: 'Montserrat Alternates', sans-serif;">‣ Medio ambiente</a></li>
                                            <li><a href="forum.php?categoria=medidas" style="font-family: 'Montserrat Alternates', sans-serif;">‣ Medidas</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4" style=" text-align:center; cursor: pointer;">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalXl" id="subir_btn">
                                <i class="fas fa-file-arrow-up server me-3"></i>Subir un informe
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalXl" aria-labelledby="exampleModalXlLabel" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <?php if (!isset($_SESSION['usuario'])) { ?>
                                                <h5 class="modal-title h4" id="exampleModalXlLabel">:(</h5>
                                            <?php } else { ?>
                                                <h5 class="modal-title h4" id="exampleModalXlLabel">Informe</h5>
                                            <?php } ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            if (!isset($_SESSION['usuario'])) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <h4 class="alert-heading">Lo sentimos!</h4>
                                                    <p>Para poder publicar un informe es necesario tener una cuenta registrada</p>
                                                    <hr>
                                                    <button type="button" class="btn btn-success"><a href="log_in.php" style="color:white;">Iniciar sesión</a></button>
                                                </div>

                                            <?php } else { ?>
                                                <div class="row" id="coal" style="color:black;">
                                                    <label for="formGroupTitulo" id="tit" class="form-label" style="font-family: 'Montserrat', sans-serif;">Titulo (0/35)</label>
                                                    <input id="titulo" type="text" class="form-control" maxlength="35" minlength="1" oninput="tit()" required>
                                                    <label for="formGroupEncabezado" id="enc" class="form-label mt-3" style="font-family: 'Montserrat', sans-serif;">Encabezado (0/70)</label>
                                                    <input id="encabezado" type="text" class="form-control" maxlength="70" minlength="1" required oninput="enc()" />
                                                    <label for="formGroupDescripcion" class="form-label mt-3" style="font-family: 'Montserrat', sans-serif;">Informe:</label>
                                                    <textarea name="contenido" class="form-control contenido" id="siuu"></textarea>
                                                    <!-- <label for="formGroupTags" class="form-label mt-3" style="font-family: 'Montserrat', sans-serif;">Tags:</label>
                                                <input id="tags" name="tags" type="text" class="form-control" id="formGroupTags" style="width:100px; height:20px; border-radius:0;" onkeydown="insertar_tag(event)">
                                                <div id="etiquetas"></div> -->
                                                    <div style="text-align:center;margin-top:20px; margin-bottom:20px;">
                                                        <h3 style="text-align:center;"><i class="fa-solid fa-tag"></i> Categorias</h3>


                                                        <label for="flora">Flora</label>
                                                        <input type="checkbox" id="flora" style="margin-right:20px;">
                                                        <label for="fauna">Fauna</label>
                                                        <input type="checkbox" id="fauna" style="margin-right:20px;">
                                                        <label for="clima">Clima</label>
                                                        <input type="checkbox" id="clima" style="margin-right:20px;">
                                                        <label for="océano">Océano</label>
                                                        <input type="checkbox" id="oceano" style="margin-right:20px;">
                                                        <label for="medio_ambiente">Medio ambiente</label>
                                                        <input type="checkbox" id="medio_ambiente" style="margin-right:20px;">
                                                        <label for="medidas">Medidas</label>
                                                        <input type="checkbox" id="medidas" style="margin-right:20px;">
                                                    </div>
                                                    <input type="button" class="btn btn-primary" value="Publicar" id="publicar" onclick="send()">
                                                    <!-- <input hidden type="text" id="tagg" name="tags" value=""> -->
                                                    <br>
                                                    <br>
                                                    <div class="alert alert-success" hidden role="alert" style="position:fixed; z-index:100; background-color:lightgreen ; text-align:center; margin-left:12%; width:60%;" id="exito">
                                                        Informe creado con éxito! <a href="forum.php">Ir a ver</a>
                                                    </div>
                                                    <div class="alert alert-success" hidden role="alert" style="color:white; position:fixed; z-index:100; background-color:red ; text-align:center; margin-left:12%; width:60%;" id="error">
                                                        No se pudo subir el informe, revise que todos los campos esten llenos
                                                        <span style="float:right;"><i class="fa-solid fa-circle-xmark" onclick="document.getElementById('error').setAttribute('hidden',true)" style="color:lightgreen; margin-top:0.5%; font-size:20px;"></i></span>
                                                    </div>
                                                <?php } ?>
                                                </div>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

    </div>
    <style>
        p {
            color: black;
        }
    </style>
    <?php if (isset($_GET['subir'])) { ?>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("subir_btn").click();
            })
        </script>
    <?php } ?>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="js/selector.js" referrerpolicy="origin"></script>
    <script type="text/javascript" src="js/forum.js"></script>
    <?php if (isset($_SESSION['usuario'])) { ?>
        <script type="text/javascript">
            function enc() {
                const enc = document.getElementById("encabezado").value;
                document.getElementById("enc").innerHTML = "Encabezado (" + enc.length + "/70)"
            }

            function tit() {
                const tit = document.getElementById("titulo").value;
                document.getElementById("tit").innerHTML = "Titulo (" + tit.length + "/35)"
            }

            function send() {
                if (document.getElementById("titulo").value.length <= 35 && document.getElementById("titulo").value.length > 0 && document.getElementById("encabezado").value.length <= 70) {
                    const ini = document.querySelector("#siuu_ifr").contentWindow.document.querySelector('body')
                    var cot = 0;
                    var portada = false;
                    for (var i = 0; i < ini.childNodes.length; i++) {
                        function buscar_img(a) {
                            if (a) {
                                if (a.nodeName == "IMG" && a.src.split("blob:").length > 1) {
                                    var canvas = document.createElement("canvas")
                                    canvas.setAttribute("width", a.width);
                                    canvas.setAttribute("height", a.height);
                                    var context = canvas.getContext("2d")
                                    context.drawImage(a, 0, 0)
                                    var dataurl = canvas.toDataURL("image/png")
                                    a.src = dataurl;
                                    cot++;
                                    if (cot == 1) {
                                        portada = dataurl;
                                    }
                                    return;
                                } else if (a.childNodes) {
                                    for (var j = 0; j < a.childNodes.length; j++) {
                                        if (a.childNodes[j].nodeName == "IMG" && a.childNodes[j].src.split("blob:").length > 1) {
                                            var canvas = document.createElement("canvas")
                                            canvas.setAttribute("width", a.childNodes[j].width);
                                            canvas.setAttribute("height", a.childNodes[j].height);
                                            var context = canvas.getContext("2d")
                                            context.drawImage(a.childNodes[j], 0, 0)
                                            var dataurl = canvas.toDataURL("image/png")
                                            a.childNodes[j].src = dataurl;
                                            cot++;
                                            if (cot == 1) {
                                                portada = dataurl;
                                            }
                                            return;
                                        } else if (a.childNodes[j].childNodes) {
                                            for (var k = 0; k < a.childNodes.length; k++) {
                                                buscar_img(a.childNodes[j].childNodes[k]);
                                            }
                                        } else {
                                            return;
                                        }
                                    }
                                } else {
                                    return;
                                }
                            }
                        }
                        buscar_img(ini.childNodes[i]);
                    }
                    $.ajax({
                        type: "POST",
                        url: 'forum.php',
                        data: {
                            "titulo": document.getElementById("titulo").value,
                            "encabezado": document.getElementById("encabezado").value,
                            "contenido": document.querySelector("#siuu_ifr").contentWindow.document.querySelector('body').innerHTML,
                            "fauna": document.getElementById("fauna").checked,
                            "clima": document.getElementById("clima").checked,
                            "oceano": document.getElementById("oceano").checked,
                            "medio_ambiente": document.getElementById("medio_ambiente").checked,
                            "medidas": document.getElementById("medidas").checked,
                            "flora": document.getElementById("flora").checked,
                            "portada": portada
                        },
                        success: function(response) {
                            var jsonData = JSON.parse(response);
                            console.log(jsonData);
                            if (jsonData.exito) {
                                document.querySelector("#exito a").href = "squeak.php?id=" + jsonData.exito;
                                if (document.getElementById("exito").hidden) {
                                    document.getElementById("exito").removeAttribute("hidden");
                                }
                                document.getElementById("publicar").value = "Publicado ✓";
                                document.getElementById("publicar").setAttribute("disabled", true);
                            } else if (jsonData.error) {
                                if (document.getElementById("error").hidden) {
                                    document.getElementById("error").removeAttribute("hidden");
                                }
                            }
                        }
                    });
                }
            }
        </script>
    <?php } ?>