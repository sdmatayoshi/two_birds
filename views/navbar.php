<?php
if (!isset($section)) {
  header("Location: ../index.php");
}
?>
<link href="css/tipografia.css" rel="stylesheet">
<div class="position-relative p-0">

  <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0" style="font-family: 'Montserrat Alternates', sans-serif;">
    <a href="index.php" class="navbar-brand p-0">
      <h1 class="m-0"><i class="fas fa-crow server me-3"></i>Two Birds <i class="fas fa-dove server me-3 fa-flip-horizontal"></i></h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" id="desp">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarToggleExternalContent">
      <div class="navbar-nav ms-auto py-0" style="margin-bottom:0px;" id="secciones">
        <a href="index.php" class="nav-item nav-link <?php if ($section == "home") {
                                                        echo "active";
                                                      } ?>"><i class="fa-solid fa-house-chimney"></i> Home</a>
        <a href="forum.php" class="nav-item nav-link <?php if ($section == "forum" || $section == "squeak") {
                                                        echo "active";
                                                      } ?>"><i class="fa-solid fa-icons"></i> Foro</a>
        <a href="donations.php" class="nav-item nav-link <?php if ($section == "donations") {
                                                            echo "active";
                                                          } ?>"><i class="fa-solid fa-earth-americas"></i> Como colaborar</a>
        <a href="about.php" class="nav-item nav-link <?php if ($section == "about") {
                                                        echo "active";
                                                      } ?>"><i class="fa-solid fa-people-group"></i> Acerca de nosotros</a>
        <a class="nav-item nav-link">
          <form action="forum.php" method="GET" class="input-group search" style="max-height:10px; margin-top:-3%">
            <input id="buscre" type="text" autocomplete="off" name="busqueda" class="form-control" style="max-width: 300px; border:1px solid #000;" placeholder="Buscar en la página..." aria-label="..." aria-describedby="button-search" style="font-family: 'Montserrat Alternates', sans-serif;" />
            <button class="btn" style="border:1px solid #000; width:45px; background:red; color:white;" id="button-search" type="submit"><i class="fas fa-magnifying-glass server me-3"></i></button>
          </form>
          <div id="cbus" style="display:none; color:black !important; font-size:15px; position: absolute; width:100%; z-index:100; margin-top:28px; background-color:white; border:1px solid black;">
            <li style="padding:10px;" onclick="ir(0)"></li>
            <li style="padding:10px;" onclick="ir(1)"></li>
            <li style="padding:10px;" onclick="ir(2)"></li>
            <li style="opacity:0.5; font-size:14px; padding-left:6px; ">Usuarios</li>
            <li style="padding:10px;" onclick="ir_a(4,0)"></li>
            <li style="padding:10px;" onclick="ir_a(5,1)"></li>
            <li style="padding:10px;" onclick="ir_a(6,2)"></li>
          </div>
        </a>
        <?php if (isset($_SESSION['usuario'])) { ?>
          <div style="margin-top:0px;" id="drop_user">
            <button class="btn" style="margin-top: -15px; padding-right:80px; height:90px"><a style="width:40px;" class="nav-link <?php if ($section == "log_in" || $section == "my_profile" || $section == "register") {
                                                                                                                                    echo "active";
                                                                                                                                  } ?>"><img class=" border border-dark rounded-circle" src="img/usuarios/<?php echo $_SESSION['usuario']['id'] . "/" . $_SESSION['usuario']['foto']; ?>" style="width:40px; height:40px; object-fit:cover;" alt=""></a></button>
            <div class="dropdown-menu" style="display: none;" id="dropdown_menu">
              <a href="my_profile.php?section=principal" class="dropdown-item"><i class="bi bi-person-square"></i> Mi Perfil</a>
              <a href="my_profile.php?seccion=buzon" class="dropdown-item"><i class="bi bi-bell-fill"></i> Notificaciones</a>
              <a href="my_profile.php?seccion=favoritos" class="dropdown-item"><i class="bi bi-star-fill"></i> Favoritos</a>
              <?php if (isset($contactos) && count($contactos) > 0) { ?>
                <p class="dropdown-item" id="drop_contac" style="cursor:pointer;"><i class="bi bi-person-fill"></i> Contactos <i class="bi bi-caret-right-fill"></i></p>
              <?php } ?>
              <hr class="dropdown-divider">
              <a href="logout.php" class="dropdown-item"><i class="fa-solid fa-door-open"></i> Cerrar sesión</a>
            </div>
            <?php if (isset($contactos) && count($contactos) > 0) { ?>
              <div style="display:none; overflow:auto; height:100px;" class="dropdown-menu" id="dropdown_contacto">
                <i class="bi bi-caret-left-fill" style="cursor:pointer;"></i>
                <h5 style="text-align:center;"><b>Contactos</b></h5>
                <p style="text-align:center;" id="cont_chats">Chats: </p>
                <div>
                  <?php
                  $repetidos = array();
                  foreach ($contactos as $c) {
                    if (in_a($c['id'], $repetidos) == false) {
                      $repetidos[] = $c['id']; ?>
                      <a href="my_profile.php?id=<?php echo $c['id']; ?>&seccion=send" style="cursor:pointer;" id="y<?php echo $c["id"]; ?>">
                        <p><i class="bi bi-person-fill"></i> <?php if (strlen($c["user_name"]) < 12) {
                                                                echo $c['user_name'];
                                                              } else {
                                                                echo substr($c['user_name'], 0, 8) . "...";
                                                              } ?>&nbsp;&nbsp;<i class="fa-solid fa-circle tap" style="color:red; float:right; margin-right:3px; font-size:14px;"></i></p>
                      </a>
                  <?php }
                  } ?>
                </div>
                <script>
                  document.getElementById("cont_chats").innerHTML = "Chats: <?php echo count($repetidos); ?>";
                </script>
              </div>
            <?php } ?>
          </div>
          <div class="toast hide" style="position:fixed; bottom:0; right:0; width:260px;" id="popnh" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
              <span id="toast_text">Hello, world! This is a toast message.</span>
              <div class="mt-2 pt-2 border-top">
                <a id="ir" href="#"><button type="button" class="btn btn-primary btn-sm">Ir</button></a>
                <button type="button" class="btn btn-secondary btn-sm" onclick="document.getElementById('popnh').className = 'toast hide'">Cerrar</button>
              </div>
            </div>
          <?php } ?>
          </div>

          <?php if (!isset($_SESSION['usuario'])) { ?>
            <a href="log_in.php" class="nav-item">
              <button class="btn btn-secondary py-2 px-4 ms-3" id="bot_log">Iniciar sesión</button>
            </a>
          <?php } ?>
          <!-- <butaton type="button" class="btn text-secondary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"></butaton> -->
      </div>
    </div>
  </nav>
  <div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content" style="background: rgba(29, 40, 51, 0.8);">
        <div class="modal-header border-0">
          <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
        </div>
        <div class="modal-body d-flex align-items-center justify-content-center">
          <h1 style="color: white;">Buscar informes: ㅤ</h1>
          <form action="forum.php" method="get" class="input-group" style="max-width: 600px;">
            <input name="busqueda" type="text" class="form-control bg-transparent border-light p-3" placeholder="Busca lo que necesites.">
            <button type="submit" class="btn btn-light px-4"><i class="bi bi-search"></i></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>