<?php
if (!isset($section)) {
	header("Location: ../index.php");
}
?>
<?php if (isset($_SESSION['usuario']) && (!isset($_GET['id']) || (isset($_GET['id']) && $_GET['id'] == $_SESSION['usuario']['id']))) { ?>
	<span id="sec"></span></p>
<?php } else if (isset($_GET['id']) && !isset($_GET['id'])) { ?>
	<p class="p-2 text-light"><a href="index.php">Inicio</a> <i class="fa-solid fa-caret-right" style="color: darkgrey;"></i> <a style="color:grey; user-select:none;">Perfiles</a> <i class="fa-solid fa-caret-right" style="color: darkgrey;"></i> <a href="my_profile.php?id=<?php echo $_GET['id']; ?>"><?php echo $usuario['user_name']; ?></a></p>
<?php } else { ?>
	<p class="p-2 text-light"><a href="index.php">Inicio</a> <i class="fa-solid fa-caret-right" style="color: darkgrey;"></i> <a style="color:grey; user-select:none;">Perfiles</a></p>
<?php } ?>

<div id="cont_p" class="container-xxl bg-white p-0">
	<br>
	<br>
	<br>
	<!-- Spinner Start -->
	<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
		<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	<p id="atajo"></p>
	<?php
	if (isset($_SESSION['usuario']) && (!isset($_GET['id']) || (isset($_GET['id']) && $_GET['id'] == $_SESSION['usuario']['id']))) {
	?>
		<div class="container modal-content" id="origen" style="display:block; background-color:rgb(160,245,101);  background-repeat: no-repeat; background-size: cover; font-family: 'Montserrat Alternates', sans-serif; border:3px solid #000">
			<div class="row bg-light" style="font-size:20px; text-align:center; border:1px solid #000">
				<p style="margin-top:1%;" class="user-select-none">
					<button class="btn border" onclick="principal_aparecer()"><a id="nav_principal" style="cursor:pointer; text-decoration:underline;" class="btn-link"> <i class="fa-solid fa-user m-1"></i>Perfil</a></button>

					<button class="btn border" onclick="favoritos_aparecer()"><a id="nav_favoritos" style="cursor:pointer; text-decoration:none;" class="btn-link"><i class="fa-solid fa-star m-1"></i>Favoritos</a></button>

					<button class="btn border" onclick="informes_aparecer()"><a id="nav_informes" style="cursor:pointer; text-decoration:none;" class="btn-link"><i class="fa-solid fa-file-invoice m-1"></i>Informes</a></button>

					<button class="btn border" onclick="buzon_aparecer()"><a id="nav_buzon" style="cursor:pointer; text-decoration:none;" class="btn-link"><i class="fa-solid fa-envelopes-bulk m-1"></i>Notificaciones</a></button>
					<?php if (isset($users)) { ?>
						<button class="btn border" onclick="usuarios_aparecer()"><a id="nav_usuarios" style="cursor:pointer; text-decoration:none;" class="btn-link"><i class="fa-solid fa-user-plus m-1"></i>Usuarios</a></button>
					<?php }
					if (isset($users) && in_a("admin", $_SESSION['usuario']['rangos'])) { ?>
						<button class="btn border" onclick="cargar_aparecer()"><a id="nav_cargar" style="cursor:pointer; text-decoration:none;" class="btn-link"><i class="fa-solid fa-upload m-1"></i>Cargar registros</a></button>
					<?php } ?>
					<button class="btn border" onclick="configuracion()"><a class="btn-link" style="cursor:pointer; text-decoration:none;" style="font-size:25px;"><i class="fa-solid fa-sliders m-1"></i>Ajustes de perfil</a></button>
				</p>
			</div>
			<div class="row" id="principal" style="display:flex;">
				<!-- Blog entries-->
				<h1 align="center" style="user-select:none;">ㅤ</h1>

				<div class="row">
					<div class="col-lg-4">
						<div class="card mb-4" style="border: 1px  solid 223,223,223 ;">
							<div class="card-body text-center">
								<img id="demo" class="rounded-circle border border-2 border-dark team-item" type="button" data-bs-toggle="modal" data-bs-target="#img" src="img/usuarios/<?php echo $_SESSION['usuario']['id'] . "/" . $_SESSION['usuario']['foto']; ?>" id="foto" style="width: 250px; height: 250px; object-fit:cover; background-color:white;" data-bs-toggle="tooltip" data-placement="bottom" title="Ver imagen">
								<div class="modal fade fadeInUp" data-wow-delay="0.01s" id="img" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-lg">
										<div class="modal-content team-item border-2 border-primary">
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											<img align="center" type="button" data-bs-toggle="modal" data-bs-target="#img" src="img/usuarios/<?php echo $_SESSION['usuario']['id'] . "/" . $_SESSION['usuario']['foto']; ?>" id="foto" style="object-fit:cover; background-color:white; margin-left:25px;margin-right:25px;">
											<br><a style="color:black;">Archivo: <?php echo $_SESSION['usuario']['foto']; ?></a>
											<div class="modal-body">

											</div>
										</div>
									</div>
								</div>
								<h4><u><?php if (isset($users) && in_a("admin", $_SESSION['usuario']['rangos'])) {
											echo $_SESSION['usuario']['user_name'];
										} else if (isset($users) && in_a("mod", $_SESSION['usuario']['rangos'])) {
											echo $_SESSION['usuario']['user_name'];
										} else {
											echo $_SESSION['usuario']['user_name'];
										} ?></u></h2>
									<p class="text-muted mb-1"><?php if (isset($users) && in_a("admin", $_SESSION['usuario']['rangos'])) {
																	echo '<p class="text-muted mb-1">Administrador</p>';
																} else if (isset($users) && in_a("mod", $_SESSION['usuario']['rangos'])) {
																	echo '<p class="text-muted mb-1">Moderador</p>';
																} else {
																	echo '<p class="text-muted mb-1">Usuario</p>';
																} ?>
								</h4>
								</h5>
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card mb-4">
							<div class="row">
								<div class="card-body">
									<div class="row">
										<h5 class="my-3">Informacion del Usuario:</h5><br><br><br><br>
										<div class="col-sm-3">
											<p class="mb-0">Correo electrónico: </p>
										</div>
										<div class="col-sm-9">
											<p class="text-muted mb-0"><?php echo $_SESSION['usuario']['email']; ?></p>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<p class="mb-0">Informes subidos:</p>
										</div>
										<div class="col-sm-9">
											<p class="text-muted mb-0"><?php echo $cant_inf; ?></p>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<p class="mb-0">Fecha de registro:</p>
										</div>
										<div class="col-sm-9">
											<p class="text-muted mb-0"><?php echo $_SESSION['usuario']['fecha_alta']; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-16">
							<div class="card mb-4">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-3">
											<p class="mb-0">Descripción: </p>
										</div>
										<div class="col-sm-9">
											<p class="text-muted mb-0" id="descripcion_txt"><?php if (isset($_SESSION['usuario']['descripcion'])) {
																								echo $_SESSION['usuario']['descripcion'];
																							} else {
																								echo "sin descripción";
																							} ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>



				<div align="right" style="margin-right: 600px;">
					<br>
					<a href="logout.php" class="btn btn-secondary py-2 px-4 ms-3">Cerrar sesión</a>
				</div>
			</div>





			<div class="row" style="display:none;" id="favoritos">
				<!-- Blog entries-->
				<h1 align="center"><u>Mis favoritos</u></h1>
				<br>
				<br>
				<br>
				<h5 align="center">Informes: <?php echo count($resultado); ?></h5>
				<br>
				<br>
				<br>
				<?php
				if (isset($resultado)) {
					for ($i = 0; $i < count($resultado); $i += 2) {
				?><div class="row">
							<div class="col-lg-1"></div>
							<div class="col-lg-5">
								<div class="card mb-4" style="border:2px solid #000">
									<a href="#!"><img class="card-img-top" height="250px" src="img/portadas/<?php echo $resultado[$i]['portada']; ?>" alt="..." /></a>
									<div class="card-body">
										<div class="small text-muted"><?php echo $resultado[$i]["mes"] . " " . $resultado[$i]["dia"] . ", " . $resultado[$i]["Year"] ?></div>
										<div>
											<?php
											if (isset($resultado[$i]["tags"])) {
												foreach ($resultado[$i]["tags"] as $tag) { ?>
													<span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><?php echo $tag; ?></span>
											<?php }
											} ?>
										</div>
										<h2 class="card-title h4"><?php echo $resultado[$i]['titulo']; ?></h2>
										<p class="card-text" style="color:grey;"><?php echo $resultado[$i]['encabezado'] . "..."; ?></p>
										<a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado[$i]['id']; ?>">Leer Más <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
									</div>
								</div>
							</div>
							<?php if (isset($resultado[$i + 1])) { ?>
								<div class="col-lg-5">
									<div class="card mb-4">
										<a href="#!"><img class="card-img-top" height="250px" src="img/portadas/<?php echo $resultado[$i + 1]['portada']; ?>" alt="..." /></a>
										<div class="card-body">
											<div class="small text-muted"><?php echo $resultado[$i + 1]["mes"] . " " . $resultado[$i + 1]["dia"] . ", " . $resultado[$i + 1]["Year"] ?></div>
											<div>
												<?php
												if (isset($resultado[$i + 1]["tags"])) {
													foreach ($resultado[$i + 1]["tags"] as $tag) { ?>
														<span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><?php echo $tag; ?></span>
												<?php }
												} ?>
											</div>
											<h2 class="card-title h4"><?php echo $resultado[$i + 1]['titulo']; ?></h2>
											<p class="card-text" style="color:grey;"><?php echo $resultado[$i + 1]['encabezado'] . "..."; ?></p>
											<a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado[$i + 1]['id']; ?>">Leer Más <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
				<?php
					}
				} ?>
			</div>
			<div class="row" style="display:none;" id="informes">
				<!-- Blog entries-->
				<h1 align="center"><u>Mis informes</u></h1>
				<br>
				<br>
				<br>
				<h5 align="center">Informes: <?php echo count($resultado1); ?></h5>
				<br>
				<br>
				<br>
				<?php
				if (isset($resultado1)) {
					for ($i = 0; $i < count($resultado1); $i += 2) {
				?><div class="row">
							<div class="col-lg-1"></div>
							<div class="col-lg-5">
								<div class="card mb-4" style="border:2px solid #000">
									<a href="#!"><img class="card-img-top" height="250px" src="img/portadas/<?php echo $resultado1[$i]['portada']; ?>" alt="..." /></a>
									<div class="card-body">
										<div class="small text-muted"><?php echo $resultado1[$i]["mes"] . " " . $resultado1[$i]["dia"] . ", " . $resultado1[$i]["Year"] ?></div>
										<div>
											<?php
											if (isset($resultado1[$i]["tags"])) {
												foreach ($resultado1[$i]["tags"] as $tag) { ?>
													<span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><?php echo $tag; ?></span>
											<?php }
											} ?>
										</div>
										<h2 class="card-title h4"><?php echo $resultado1[$i]['titulo']; ?></h2>
										<p class="card-text" style="color:grey;"><?php echo $resultado1[$i]['encabezado'] . "..."; ?></p>
										<a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado1[$i]['id']; ?>">Leer Más <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
									</div>
								</div>
							</div>
							<?php if (isset($resultado1[$i + 1])) { ?>
								<div class="col-lg-5">
									<div class="card mb-4" style="border:2px solid #000">
										<a href="#!"><img class="card-img-top" height="250px" src="img/portadas/<?php echo $resultado1[$i + 1]['portada']; ?>" alt="..." /></a>
										<div class="card-body">
											<div class="small text-muted"><?php echo $resultado1[$i + 1]["mes"] . " " . $resultado1[$i + 1]["dia"] . ", " . $resultado1[$i + 1]["Year"] ?></div>
											<div>
												<?php
												if (isset($resultado1[$i + 1]["tags"])) {
													foreach ($resultado1[$i + 1]["tags"] as $tag) { ?>
														<span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><?php echo $tag; ?></span>
												<?php }
												} ?>
											</div>
											<h2 class="card-title h4"><?php echo $resultado1[$i + 1]['titulo']; ?></h2>
											<p class="card-text" style="color:grey;"><?php echo $resultado1[$i + 1]['encabezado'] . "..."; ?></p>
											<a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado1[$i + 1]['id']; ?>">Leer Más <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
				<?php
					}
				} ?>
			</div>
			<?php if (isset($users)) { ?>
				<div class="row" style="display:none;" id="usuarios">
					<!-- Blog entries-->
					<h1 align="center"><u>Lista de usuarios</u></h1>
					<br>
					<br>
					<br>
					<br>
					<br>
					<table class="table table-striped" style="text-align:center;">
						<thead>
							<tr>
								<th scope="col" style="user-select:none;"><i class="fa-solid fa-user"></i> Usuario</th>
								<th scope="col" style="user-select:none;"><i class="fa-solid fa-ranking-star"></i> Rango</th>
								<th scope="col" style="user-select:none;"><i class="fa-solid fa-screwdriver-wrench"></i> Acciones</th>
							</tr>
						</thead>
						<tbody>

							<?php
							foreach ($users as $user) {
								$admin1 = false;
								$mod1 = false;
								$user["rango"] = "user";
								foreach ($user['rangos'] as $ran) {
									if ($ran == "admin") {
										$admin1 = true;
										$user["rango"] = "admin";
										break;
									} else if ($ran == "mod") {
										$mod1 = true;
										$user["rango"] = "mod";
									}
								}
								if ($user['id'] != $_SESSION['usuario']['id']) { ?>
									<tr>
										<td><a href="my_profile.php?id=<?php echo $user['id']; ?>"><?php echo $user['user_name']; ?></a></td>
										<td><?php echo $user['rango']; ?></td>
										<?php if ($admin == true || ($mod == true && $admin1 == false)) { ?>
											<td><button type="button" style="border: 2px solid #000" class="btn btn-danger" name="eliminar" onclick="eliminar_us_abrir(<?php echo $user['id']; ?>)"><i class="fa-solid fa-trash-can"></i> Eliminar</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" style="border: 2px solid #000" onclick="rango_us_abrir(<?php echo $user['id']; ?>)" class="btn btn-info"><i class="fa-solid fa-arrow-up-wide-short"></i> Rango</button></td>
										<?php } ?>
									</tr>
							<?php }
							} ?>
						</tbody>
					</table>
				</div>
				<?php if (in_a("admin", $_SESSION['usuario']['rangos'])) { ?>
					<div class="row" style="display:none;" id="cargar">
						<h1 align="center"><u>Tablas disponibles a cargar</u></h1>
						<div class="container">
							<div class="row" style="margin-bottom:30px;">
								<div class="col-1"></div>
								<div class="col-2"><button onclick="env_c('usuarios')" class="btn btn-success" style="width:94%; margin-left:3%;">usuarios</button></div>
								<div class="col-2"><button onclick="env_c('rango_usuario')" class="btn btn-success" style="width:94%; margin-left:3%;">rango_usuario</button></div>
								<div class="col-2"><button onclick="env_c('moderaciones')" class="btn btn-success" style="width:94%; margin-left:3%;">moderaciones</button></div>
								<div class="col-2"><button onclick="env_c('mensajes')" class="btn btn-success" style="width:94%; margin-left:3%;">mensajes</button></div>
								<div class="col-2"><button onclick="env_c('informe_vistas')" class="btn btn-success" style="width:94%; margin-left:3%;">informe_vistas</button></div>
								<div class="col-1"></div>
							</div>
							<div class="row" style="margin-bottom:30px;">
								<div class="col-1"></div>
								<div class="col-2"><button onclick="env_c('informe_likes')" class="btn btn-success" style="width:94%; margin-left:3%;">informe_likes</button></div>
								<div class="col-2"><button onclick="env_c('informes')" class="btn btn-success" style="width:94%; margin-left:3%;">informes</button></div>
								<div class="col-2"><button onclick="env_c('favoritos')" class="btn btn-success" style="width:94%; margin-left:3%;">favoritos</button></div>
								<div class="col-2"><button onclick="env_c('donaciones')" class="btn btn-success" style="width:94%; margin-left:3%;">donaciones</button></div>
								<div class="col-2"><button onclick="env_c('comentarios')" class="btn btn-success" style="width:94%; margin-left:3%;">comentarios</button></div>
								<div class="col-1"></div>
							</div>
							<div class="row" style="margin-bottom:30px;">
								<div class="col-1"></div>
								<div class="col-2"><button onclick="env_c('categoria_informe')" class="btn btn-success">categoria_informe</button></div>
								<div class="col-1"></div>
							</div>
						</div>
					</div>
			<?php }
			} ?>
			<div class="row" style="display:none;" id="buzon">
				<!-- Blog entries-->
				<h1 align="center"><u>Notificaciones</u></h1> <a id="nav_destacados" onclick="destacados_aparecer()" style="cursor:pointer; text-decoration:none;" class="btn-link"><i class="fa-solid fa-star m-1"></i>Destacados</a>
				<br><br><br>
				<h5 align="center">Mensajes: <span><?php echo count($buzon); ?></span></h5>
				<br>
				<br>
				<br>
				<br>
				<br>
				<div class="col-12">
					<?php if (count($buzon) > 0) {
						foreach ($buzon as $e) {
							if (isset($e['mensaje'])) {
								$tipo = "m";
							} else if (isset($e['moderacion'])) {
								$tipo = "o";
							} else {
								$tipo = "c";
							} ?>
							<div style="border:2px solid #000; width:80%; margin-left:10%; margin-bottom:30px;" class="card ac<?php echo $tipo . "_" . $e['id']; ?>">
								<div class="modal-header">
									<?php if (isset($e['moderacion'])) { ?>
										<p class="card-text" style="width:100%; color:black;">Mensaje del moderador/administrador <a href="my_profile.php?id=<?php echo $e['ui']; ?>"><?php echo $e['user_name'] ?></a><a <?php if (!isset($e['destacado'])) {
																																																								echo "hidden";
																																																							} ?> style="float: right;" class="star_f"><i class="fa-solid fa-star"></i></a></p>
									<?php } else if (isset($e['comentario'])) { ?>
										<p class="card-text" style="width:100%;">El usuario <a href="my_profile.php?id=<?php echo $e['usuario_id']; ?>"><?php echo $e['user_name'] ?></a> hizo un comentario en el informe <a href="squeak.php?id=<?php echo $e['asi']; ?>"><?php echo $e['titulo'] ?></a><a <?php if (!isset($e['destacado'])) {
																																																																													echo "hidden";
																																																																												} ?> style="float: right;" class="star_f"><i class="fa-solid fa-star"></i></a></p>
									<?php } else if ($e['mensaje']) { ?>
										<p class="card-text" style="width:100%;">Tiene un nuevo mensaje de <a href="my_profile.php?id=<?php echo $e['emisor_id']; ?>"><?php echo $e['user_name'] ?></a><a <?php if (!isset($e['destacado'])) {
																																																				echo "hidden";
																																																			} ?> style="float: right;" class="star_f"><i class="fa-solid fa-star"></i></a></p>
									<?php } ?>
								</div>
								<?php if (isset($e['moderacion'])) { ?>
									<div class="modal-body">
										<h5 class="card-title">
											<p class="card-text">Su <?php if ($e['tipo'] == "informe") {
																		echo 'Informe "';
																	} else {
																		echo "comentario en ";
																	} ?><?php echo $e['titulo'] ?>" fue eliminado por el moderador <a href="my_profile.php?id=<?php echo $e['ui']; ?>"><?php echo $e['user_name'] ?></a> debido a:</p>
										</h5>
										<p class="card-text"><?php echo $e['moderacion'] ?></p>
										<br>
										<h5>Lamentamos los posibles inconvenientes</h5>
										<div class="modal-footer">
											<div>
												<button type="button" class="btn" onclick="msj_d(<?php echo $e['id']; ?>)" style="float:right; color:red;"><i class="fa-sharp fa-solid fa-trash-can"></i> Eliminar</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php if (!isset($e['destacado'])) { ?><button type="button" class="btn btn_destacar" onclick="msj_s(<?php echo $e['id']; ?>)" style="float:right; color:green;"><i class="fa-solid fa-star"></i> Destacar</button><?php } else { ?><button type="button" class="btn btn_destacar" onclick="msj_a(<?php echo $e['id']; ?>)" style="float:right; color:green;"><i class="fa-regular fa-star"></i> Remover destacado</button><?php } ?>
											</div>
										</div>
									</div>
								<?php } else if (isset($e['comentario'])) { ?>
									<div class="modal-body">
										<p class="card-text"><?php echo $e['comentario'] ?></p>
										<br>
										<div class="modal-footer">
											<div>
												<button type="button" onclick="msjc_d(<?php echo $e['id']; ?>)" class="btn" style="float:right; color:red;"><i class="fa-sharp fa-solid fa-trash-can"></i> Eliminar</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php if (!isset($e['destacado'])) { ?><button type="button" class="btn btn_destacar" onclick="msjc_s(<?php echo $e['id']; ?>)" style="float:right; color:green;"><i class="fa-solid fa-star"></i> Destacar</button><?php } else { ?><button type="button" class="btn btn_destacar" onclick="msjc_a(<?php echo $e['id']; ?>)" style="float:right; color:green;"><i class="fa-regular fa-star"></i> Remover destacado</button><?php } ?>
											</div>
										</div>
									</div>
								<?php } else if (isset($e['mensaje'])) { ?>
									<div class="modal-body">
										<p class="card-text"><?php echo $e['mensaje'] ?></p>
										<br>
										<div class="modal-footer">
											<div>
												<button type="button" onclick="msjm_d(<?php echo $e['id']; ?>)" class="btn" style="float:right; color:red;"><i class="fa-sharp fa-solid fa-trash-can"></i> Eliminar</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php if (!isset($e['destacado'])) { ?><button type="button" class="btn btn_destacar" onclick="msjm_s(<?php echo $e['id']; ?>)" style="float:right; color:green;"><i class="fa-solid fa-star"></i> Destacar</button><?php } else { ?><button type="button" class="btn btn_destacar" onclick="msjm_a(<?php echo $e['id']; ?>)" style="float:right; color:green;"><i class="fa-regular fa-star"></i> Remover destacado</button><?php } ?>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						<?php
						}
					}
					if (count($buzon) == 0) { ?>
						<p style="text-align:center;">Tus mensajes apareceran aqui</p>
					<?php } ?>
				</div>
			</div>
			<div class="row" style="display:none;" id="destacados">
				<h1 align="center"><u>Destacados</u></h1> <a id="nav_buzon" onclick="buzon_aparecer()" style="cursor:pointer; text-decoration:none;" class="btn-link"><i class="fa-solid fa-circle-chevron-left"></i> Volver</a>
				<br><br><br>
				<h5 align="center">Mensajes: <span><?php echo count($destacados); ?></span></h5>
				<br>
				<br>
				<br>
				<br>
				<br>
				<div class="col-12">
					<?php
					$cont_b = 0;
					if (count($destacados) > 0) {
						foreach ($destacados as $e) {
							if (isset($e['mensaje'])) {
								$tipo = "m";
							} else if (isset($e['moderacion'])) {
								$tipo = "o";
							} else {
								$tipo = "c";
							} ?>
							<div style="border:2px solid #000; width:80%; margin-left:10%; margin-bottom:30px;" class="card ac<?php echo $tipo . "_" . $e['id']; ?>">
								<div class="modal-header">
									<?php if (isset($e['moderacion'])) { ?>
										<p class="card-text" style="width:100%;">Mensaje del moderador/administrador <a href="my_profile.php?id=<?php echo $e['ui']; ?>"><?php echo $e['user_name'] ?></a></p>
									<?php } else if (isset($e['comentario'])) { ?>
										<p class="card-text" style="width:100%;">El usuario <a href="my_profile.php?id=<?php echo $e['usuario_id']; ?>"><?php echo $e['user_name'] ?></a> hizo un comentario en el informe <a href="squeak.php?id=<?php echo $e['asi']; ?>"><?php echo $e['titulo'] ?></a></p>
									<?php } else if ($e['mensaje']) { ?>
										<p class="card-text" style="width:100%;">Tiene un nuevo mensaje de <a href="my_profile.php?id=<?php echo $e['emisor_id']; ?>"><?php echo $e['user_name'] ?></a></p>
									<?php } ?>
								</div>
								<?php if (isset($e['moderacion'])) { ?>
									<div class="modal-body">
										<h5 class="card-title">
											<p class="card-text">Su <?php if ($e['tipo'] == "informe") {
																		echo 'Informe "';
																	} else {
																		echo "comentario en ";
																	} ?><?php echo $e['titulo'] ?>" fue eliminado por el moderador <a href="my_profile.php?id=<?php echo $e['ui']; ?>"><?php echo $e['user_name'] ?></a> debido a:</p>
										</h5>
										<p class="card-text"><?php echo $e['moderacion'] ?></p>
										<br>
										<h5>Lamentamos los posibles inconvenientes</h5>
										<div class="modal-footer">
											<div>
												<button type="button" class="btn" onclick="msj_d(<?php echo $e['id']; ?>)" style="float:right; color:red;"><i class="fa-sharp fa-solid fa-trash-can"></i> Eliminar</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" onclick="msj_a(<?php echo $e['id']; ?>)" class="btn btn_destacar" style="float:right; color:green;"><i class='fa-regular fa-star'></i> Remover destacado</button>
											</div>
										</div>
									</div>
								<?php } else if (isset($e['comentario'])) { ?>
									<div class="modal-body">
										<p class="card-text"><?php echo $e['comentario'] ?></p>
										<br>
										<div class="modal-footer">
											<div>
												<button type="button" onclick="msjc_d(<?php echo $e['id']; ?>)" class="btn" style="float:right; color:red;"><i class="fa-sharp fa-solid fa-trash-can"></i> Eliminar</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn_destacar" onclick="msjc_a(<?php echo $e['id']; ?>)" style="float:right; color:green;"><i class="fa-regular fa-star"></i> Remover destacado</button>
											</div>
										</div>
									</div>
								<?php } else if (isset($e['mensaje'])) { ?>
									<div class="modal-body">
										<p class="card-text"><?php echo $e['mensaje'] ?></p>
										<br>
										<div class="modal-footer">
											<div>
												<button type="button" onclick="msjm_d(<?php echo $e['id']; ?>)" class="btn" style="float:right; color:red;"><i class="fa-sharp fa-solid fa-trash-can"></i> Eliminar</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn_destacar" onclick="msjm_a(<?php echo $e['id']; ?>)" style="float:right; color:green;"><i class="fa-regular fa-star"></i> Remover destacado</button>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						<?php
						}
					}
					if (count($destacados) == 0) { ?>
						<p style="text-align:center;">Tus mensajes destacados apareceran aqui</p>
					<?php } ?>
				</div>
			</div>
			<br>
			<br>
		</div>

		<?php if (isset($users)) { ?>
			<!--Eliminar-->
			<div class="modal" tabindex="-1" role="dialog" id="eliminar_us" style="display:none; border-width:5px; background-color:lightred">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content" align="center" style="background-color:lightcoral; border-color: black;">
						<div class="modal-header" style="border-color: black;">
							<h2 class="modal-title" style="color: white; text-shadow: 1px  0px 0px black, 0px  1px 0px black, -1px  0px 0px black, 0px -1px 0px black;">¿Esta seguro?</h2>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST">
								<p><i class="fa-solid fa-triangle-exclamation"></i>Esta acción no es reversible<i class="fa-solid fa-triangle-exclamation"></i></p>
								<p><button type="submit" class="btn btn-danger" name="eliminar" style="background-color: red;">Confirmar eliminacion del usuario</button></p>
								<input type="hidden" name="id_d" value="#" id="seca">
							</form>
						</div>
						<div class="modal-footer" style="border-color: black;">
							<button type="button" onclick="eliminar_us_cerrar()" class="btn btn-success">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

			<!--Rangos-->
			<div class="modal" id="rango_us" tabindex="-1" role="dialog" style="display:none;">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content" align="center" style="background-color:lightgreen; border-color: black;">
						<div class="modal-header" style="border-color: black;">
							<h2 class="modal-title" style="color: white; text-shadow: 1px  0px 0px black, 0px  1px 0px black, -1px  0px 0px black, 0px -1px 0px black;">Rangos</h2>
						</div>
						<div class="modal-body">
							<div class="row" id="rango_us_prin" style="display:block; font-family: monserrat alternates, sans-serif;">
								<p>¿Qué acción quiere realizar?</p>
								<p><button type="button" onclick="rango_us_asc()" class="btn btn-info"><i class="fa-solid fa-arrow-up"></i> Ascender</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" onclick="rango_us_deg()" class="btn btn-warning">Degradar <i class="fa-solid fa-arrow-down"></i></button></p>
							</div>
							<form class="row" id="rango_us_ascender" style="display:none;" method="POST">
								<p>Estas por ascender a un usuario, ¿Concretar ascenso?</p>
								<p><button type="submit" class="btn btn-primary" name="ascender">Confirmar</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" onclick="rango_us_abrir(<?php echo $user['id']; ?>)" class="btn btn-danger">Cancelar</button></p>
								<input type="hidden" name="id_asc" value="#" id="sec_asc">
							</form>
							<form class="row" id="rango_us_degradar" style="display:none;" method="POST">
								<p>Estas por degradar a un usuario, ¿Concretar degradación?</p>
								<p><button type="submit" class="btn btn-primary" name="degradar">Confirmar</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" onclick="rango_us_abrir(<?php echo $user['id']; ?>)" class="btn btn-danger">Cancelar</button></p>
								<input type="hidden" name="id_deg" value="#" id="sec_deg">
							</form>
						</div>
						<div class="modal-footer" style="border-color: black;">
							<button type="button" onclick="rango_us_cerrar()" class="btn btn-danger">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>



		<div id="config" style="display:none; font-family: 'Montserrat Alternates', sans-serif;">
			<div class="modal-header row text-white border border-dark" style="font-size:20px; text-align:center;background-color:lightgreen;">
				<button class="btn-sm bg-secondary border border-dark" style="float:right; width:40px; cursor:pointer; text-shadow: 1px  0px 0px black, 0px  1px 0px black, -1px  0px 0px black, 0px -1px 0px black; color:white;" onclick="configuracion_salir()"><strong><i class="fa-solid fa-xmark"></i></strong></button>
				<p style="color: black;"><strong>
						<h3>Configuración del perfil <i class="fa-solid fa-user-gear"></i>
					</strong></h3>
				</p>
				<!--<i class="fa-brands fa-jenkins"></i> <i class="fa-brands fa-phoenix-framework"></i>-->
			</div>
			<div class="row">
				<div class="col-3 border border-dark" style="padding:0;">
					<ul class="list-group">
						<li class="list-group-item" style="user-select: none;"><i class="fa-solid fa-user-pen"></i> Información del usuario</li>
					</ul>
					<!--<br>
			<ul class="list-group">
				<li class="list-group-item"><i class="fa-solid fa-file-pen"></i> Datos personales</li>
			</ul>
			<ul class="list-group">
				<li class="list-group-item"><i class="fa-solid fa-key"></i> Privacidad</li>
			</ul>
			<ul class="list-group">
				<li class="list-group-item"><i class="fa-solid fa-trash-can"></i> Eliminar cuenta</li>
			</ul>
			<ul class="list-group">
			<img class="rounded-circle border border-dark" src="img/<?php echo $_SESSION['usuario']['foto']; ?>" id="foto" style="margin-left:120px; width: 100px; height: 100px; object-fit:cover; background-color:white;"><br><h4 style="text-align: center;"></h4>
			<h4 style="color: white; text-shadow: 1px  0px 0px black, 0px  1px 0px black, -1px  0px 0px black, 0px -1px 0px black;"><?php if (isset($users) && in_a("admin", $_SESSION['usuario']['rangos'])) {
																																		echo $_SESSION['usuario']['user_name'] . " <i class='fa-solid fa-crown' data-toggle='tooltip' data-placement='top' title='Administrator'></i>";
																																	} else if (isset($users) && in_a("mod", $_SESSION['usuario']['rangos'])) {
																																		echo $_SESSION['usuario']['user_name'] . " <i class='fa-solid fa-splotch' data-toggle='tooltip' data-placement='top' title='Moderator'></i>";
																																	} else {
																																		echo $_SESSION['usuario']['user_name'];
																																	} ?></h4>
			<h3>Vista previa</h3>
		</ul>-->
				</div>
				<div class="col-9 border border-dark" id="info_usuario" style="display:block;">
					<br>
					<div style="border-bottom: 1px solid #AAA;">
						<strong>
							<p style="font-size:25px;" align="center">Modificar informacion del usuario</p>
						</strong>
					</div>
					<br>
					<div style="border-bottom: 1px solid #AAA;">
						<strong>
							<p>Nombre de usuario</p>
						</strong>
						<p id="nombre"><?php echo $_SESSION['usuario']['user_name']; ?> &nbsp;<span style="cursor:pointer;"><i class="fa-solid fa-pen-to-square" onmouseover="modificar_vent('nombre')" onmouseout="eliminar_vent('nombre')" onclick="nombre_change()"></i></span></p>
					</div>
					<br>
					<div style="border-bottom: 1px solid #AAA;">
						<strong>
							<p>Correo electronico</p>
						</strong>
						<p id="email"><?php echo $_SESSION['usuario']['email']; ?> &nbsp;<span style="cursor:pointer;"><i class="fa-solid fa-pen-to-square" onmouseover="modificar_vent('email')" onmouseout="eliminar_vent('email')" onclick="email_change()"></i></span></p>
					</div>
					<br>
					<div style="border-bottom: 1px solid #AAA;">
						<strong>
							<p>Contraseña</p>
						</strong>
						<p id="contraseña">***************** &nbsp;<span style="cursor:pointer;"><i class="fa-solid fa-pen-to-square" onmouseover="modificar_vent('contraseña')" onmouseout="eliminar_vent('contraseña')" onclick="contra_change()"></i></span></p>
					</div>
					<br>
					<div class="form_1" style="border-bottom: 1px solid #AAA;">
						<form method="post" enctype="multipart/form-data" action="my_profile.php">
							<strong>
								<p>Editar foto</p>
							</strong>
							<div class="file-select" id="file_1">
								<button type="button" value="Cambiar foto de perfil" class="btn btn-link team-item border border-dark" onclick="document.getElementById('imgf').click()">Cambiar foto de perfil <i class="fa-solid fa-images"></i></button>
								<input id="imgf" type="file" hidden name="archivo" value="">
							</div>
							<br>
							<div class="file-select" id="file_2" style="display:none;">
								<button type="submit" class="btn btn-success team-item" name="subir-imagen" value="Guardar cambios" style="border-color:black;">Guardar cambios <i class="fa-solid fa-floppy-disk"></i></button>
							</div>
							<br>
							<div></div>
							<a></a>
						</form>
					</div>
					<div>
						<br>
						<strong>
							<p>Cambiar descripción</p>
						</strong>
						<p class="text-muted mb-0"><?php if (strlen($_SESSION['usuario']['descripcion']) > 62) {
														echo substr($_SESSION['usuario']['descripcion'], 0, 60) . "<br>" . substr($_SESSION['usuario']['descripcion'], 61, strlen($_SESSION['usuario']['descripcion']));
													} else {
														echo $_SESSION['usuario']['descripcion'];
													} ?></p><span style="cursor:pointer;"><i class="fa-solid fa-pen-to-square" onclick="descripcion()"></i></span>
						<br><br>
						<div class="row" style="display:none;" id="descripcion">
							<h1 style="text-align:center;">Cambiar descripción...</h1>
							<form method="POST">
								<br>
								<textarea style="resize:none; margin-left:10%; width:80%; height:200px;" maxlength="100" name="desc"><?php echo $_SESSION['usuario']['descripcion']; ?></textarea>
								<br>
								<br>
								<br>
								<p style="text-align:center;"><input type="button" class="btn btn-alert" value="Cancelar" name="eliminar" onclick="desc_c()" style="width:15%; background-color:red; color:white; ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" class="btn btn-success" value="Guardar" style="width:15%; background-color:green; color:white; "></p>
							</form>

						</div>
					</div>
				</div>
				<div class="col-9 border border-dark" id="cambiar_nombre" style="display:none;">
					<form method="post">
						<br>
						<div style="border-bottom: 1px solid #AAA;">
							<strong>
								<p style="font-size:25px;" align="center">Modificar informacion del usuario</p>
							</strong>
						</div>
						<br>
						<i class="fa-solid fa-circle-chevron-left" onclick="volver_infousu()" style="cursor:pointer;"></i>
						<br>
						<br>
						<div class="input-group mb-3" style="width:650px;">
							<span class="input-group-text" id="inputGroup-sizing-default">Cambiar nombre de usuario:</span>
							<input type="text" name="username" class="form-control" maxlength="25" minlength="1" onclick="if(event.key == 'Enter'){document.getElementById('insert_u').click()}" value="<?php echo $_SESSION['usuario']['user_name']; ?>" required />
						</div>
						<br>
						<br>
						<br>
						<button type="submit" id="insert_u" class="btn btn-link team-item border border-dark" value="Guardar cambios" style="font-family: 'Montserrat', sans-serif;">Guardar cambios <i class="fa-solid fa-floppy-disk"></i></button>
						<br>
						<br>
					</form>
				</div>
				<div class="col-9 border border-dark" id="cambiar_email" style="display:none;">
					<form method="post">
						<br>
						<div style="border-bottom: 1px solid #AAA;">
							<strong>
								<p style="font-size:25px;" align="center">Modificar informacion del usuario</p>
							</strong>
						</div>
						<br>
						<i class="fa-solid fa-circle-chevron-left" onclick="volver_infousu()" style="cursor:pointer;"></i>
						<br>
						<br>
						<div class="input-group mb-3" style="width:650px;">
							<span class="input-group-text" id="inputGroup-sizing-default">Nuevo correo electronico:</span>
							<input type="text" class="form-control" maxlength="50" minlength="1" onclick="if(event.key == 'Enter'){document.getElementById('insert_e').click()}" name="email" required />
						</div>
						<br>
						<br>
						<br>
						<button type="submit" id="insert_e" class="btn btn-link team-item border border-dark" value="Guardar cambios" style="font-family: 'Montserrat', sans-serif;">Guardar cambios <i class="fa-solid fa-floppy-disk"></i></button>
						<br>
						<br>
					</form>
				</div>
				<div class="col-9 border border-dark" id="cambiar_contraseña" style="display:none;">
					<form method="post">
						<br>
						<div style="border-bottom: 1px solid #AAA;">
							<strong>
								<p style="font-size:25px;" align="center">Modificar informacion del usuario</p>
							</strong>
						</div>
						<br>
						<i class="fa-solid fa-circle-chevron-left" onclick="volver_infousu()" style="cursor:pointer;"></i>
						<br>
						<br>
						<div class="input-group mb-3" style="width:650px;">
							<span class="input-group-text" id="inputGroup-sizing-default">Contraseña actual:</span>
							<input maxlength="50" minlength="1" onclick="if(event.key == 'Enter'){document.getElementById('insert_c').click()}" type="password" name="actual" class="form-control" placeholder="Ingrese la contraseña actual..." required />
						</div>
						<br>
						<br>
						<div class="input-group mb-3" style="width:650px;">
							<span class="input-group-text" id="inputGroup-sizing-default">Contraseña nueva:</span>
							<input maxlength="50" minlength="1" onclick="if(event.key == 'Enter'){document.getElementById('insert_c').click()}" type="password" name="contra" class="form-control" placeholder="Ingrese la contraseña nueva..." required />
							<small id="emailHelp" class="form-text text-dark" style="opacity:0.8;">La contraseña debe incluir MAYUSCULAS, minusculas, numeros y signos (sin espacios)<br>Minimo 8 caracteres y maximo 50</small>
						</div>
						<br>
						<br>
						<div class="input-group mb-3" style="width:650px;">
							<span class="input-group-text" id="inputGroup-sizing-default">Repita la contraseña nueva:</span>
							<input maxlength="50" minlength="1" onclick="if(event.key == 'Enter'){document.getElementById('insert_c').click()}" type="password" name="comp" class="form-control" placeholder="Ingrese la contraseña nueva..." required />
						</div>
						<br>
						<br>
						<br>
						<button type="submit" name="insert_c" class="btn btn-link team-item border border-dark" value="Guardar cambios" style="font-family: 'Montserrat', sans-serif;">Guardar cambios <i class="fa-solid fa-floppy-disk"></i></button>
						<br>
						<br>
					</form>
				</div>
			</div>
		</div>
</div>
<style>
	p {
		color: black;
	}
</style>
<!-- 
	


Aqui inicia el perfil para visita


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-->
<?php
	} else if (!isset($error) && isset($_GET['id'])) { ?>
	<div class="container" id="origen" style="display:block; background-color:rgb(160,245,101);  background-repeat: no-repeat; background-size: cover; font-family: 'Montserrat Alternates', sans-serif; border:3px solid #000">
		<div class="row bg-light" style="font-size:20px; text-align:center;">
			<p style="margin-top:1%;" class="user-select-none"><a id="nav_principal" onclick="principal_aparecer()" style="cursor:pointer; text-decoration:underline;"><i class="fa-solid fa-user"></i> Ver Perfil</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a id="nav_informes" onclick="informes_aparecer()" style="cursor:pointer; text-decoration:none;"><i class="fa-solid fa-file-invoice"></i> Ver Informes</a><?php if (isset($_SESSION['usuario'])) { ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a id="nav_chat" onclick="abrir_chat()" style="cursor:pointer; text-decoration:none;"><i class="bi bi-chat-dots"></i> Enviar mensaje</a><?php } ?></p>
		</div>
		<div class="row" id="principal" style="display:flex;">
			<!-- Blog entries-->
			<h2 align="center">Informacion general:</h2>


			<div align="center">
				<table>
			</div>
			</table>


			<div class="row">
				<div class="col-lg-4">
					<div class="card mb-4">
						<div class="card-body text-center">
							<img id="demo" class="rounded-circle border border-2 border-dark team-item" type="button" data-bs-toggle="modal" data-bs-target="#img" src="img/usuarios/<?php echo $usuario['id'] . "/" . $usuario['foto']; ?>" id="foto" style="width: 250px; height: 250px; object-fit:cover; background-color:white;" data-bs-toggle="tooltip" data-placement="bottom" title="Ver imagen">
							<div class="modal fade fadeInUp" data-wow-delay="0.01s" id="img" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-lg">
									<div class="modal-content team-item border-2 border-primary">
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										<img align="center" type="button" data-bs-toggle="modal" data-bs-target="#img" src="img/usuarios/<?php echo $usuario['id'] . "/" . $usuario['foto']; ?>" id="foto" style="object-fit:cover; background-color:white; margin-left:25px;margin-right:25px;">
										<br><a style="color:black;">Archivo: <?php echo $usuario['foto']; ?></a>
										<div class="modal-body">
										</div>
									</div>
								</div>
							</div>
							<h4><u><?php echo $usuario['user_name']; ?></u></h2>
								<p class="text-muted mb-1"><?php if (isset($users) && in_a("admin", $usuario['usuario']['rangos'])) {
																echo '<p class="text-muted mb-1">Administrador</p>';
															} else if (isset($users) && in_a("mod", $usuario['usuario']['rangos'])) {
																echo '<p class="text-muted mb-1">Moderador</p>';
															} else {
																echo '<p class="text-muted mb-1">Usuario</p>';
															} ?>
							</h4>
							</h5>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card mb-4">
						<div class="row">
							<div class="card-body">
								<div class="row">
									<h5 class="my-3">Informacion del Usuario:</h5><br><br><br><br>
									<div class="col-sm-3">
										<p class="mb-0" style="color:#000;">Informes subidos: </p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?php echo $cant_inf; ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0" style="color:#000;">Fecha de registro:</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?php echo $usuario["mes"] . " " . $usuario["dia"] . ", " . $usuario["Year"] ?></p>
									</div>
								</div>
								<hr>
							</div>
						</div>
					</div>
					<div class="col-lg-16">
							<div class="card mb-4">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-3">
											<p class="mb-0 text-dark">Descripción: </p>
										</div>
										<div class="col-sm-9">
											<p class="text-muted mb-0" id="descripcion_txt"><?php echo $usuario["descripcion"]; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row" style="display:none;" id="informes">
		<!-- Blog entries-->
		<h2>Informes publicados por el usuario:</h2>
		<br>
		<br>
		<br>
		<br>
		<br>
		<?php
		if (isset($resultado1)) {
			for ($i = 0; $i < count($resultado1); $i += 2) {
		?><div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-5">
						<div class="card mb-4" style="border:2px solid #000">
							<a href="#!"><img class="card-img-top" height="250px" src="img/portadas/<?php echo $resultado1[$i]['portada']; ?>" alt="..." /></a>
							<div class="card-body">
								<div class="small text-muted"><?php echo $resultado1[$i]["mes"] . " " . $resultado1[$i]["dia"] . ", " . $resultado1[$i]["Year"] ?></div>
								<div>
									<?php
									if (isset($resultado1[$i]["tags"])) {
										foreach ($resultado1[$i]["tags"] as $tag) { ?>
											<span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><?php echo $tag; ?></span>
									<?php }
									} ?>
								</div>
								<h2 class="card-title h4"><?php echo $resultado1[$i]['titulo']; ?></h2>
								<p class="card-text" style="color:grey;"><?php echo $resultado1[$i]['encabezado'] . "..."; ?></p>
								<a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado1[$i]['id']; ?>" style="border:2px solid #000">Read more <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
							</div>
						</div>
					</div>
					<?php if (isset($resultado1[$i + 1])) { ?>
						<div class="col-lg-5">
							<div class="card mb-4" style="border:2px solid #000">
								<a href="#!"><img class="card-img-top" height="250px" src="img/portadas/<?php echo $resultado1[$i + 1]['portada']; ?>" alt="..." /></a>
								<div class="card-body">
									<div class="small text-muted"><?php echo $resultado1[$i + 1]["mes"] . " " . $resultado1[$i + 1]["dia"] . ", " . $resultado1[$i + 1]["Year"] ?></div>
									<div>
										<?php
										if (isset($resultado1[$i + 1]["tags"])) {
											foreach ($resultado1[$i + 1]["tags"] as $tag) { ?>
												<span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 20px; margin-left: 10px;"><?php echo $tag; ?></span>
										<?php }
										} ?>
									</div>
									<h2 class="card-title h4"><?php echo $resultado1[$i + 1]['titulo']; ?></h2>
									<p class="card-text" style="color:grey;"><?php echo $resultado1[$i + 1]['encabezado'] . "..."; ?></p>
									<a class="btn btn-primary" href="squeak.php?id=<?php echo $resultado1[$i + 1]['id']; ?>" style="border:2px solid #000">Read more <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
		<?php
			}
		} ?>
	</div>
	<?php if (isset($_SESSION['usuario'])) { ?>
		<div class="row" style="display:none;" id="chat">
			<div class="modal-content border border-dark" style="overflow:auto; background-color:lightyellow; height:500px; margin-left:1%; width:98%;" id="cont_msg">
				<?php if (isset($mensajes)) {
					$p = true;
					foreach ($mensajes as $mensaje) {
						if (!isset($mensaje['vista']) && $p == true && $mensaje['emisor_id'] != $_SESSION['usuario']['id']) { ?>
							<h5 id="mer" style="text-align:center; color:black; background-color:lightgrey; font-weight:bold;">Mensajes nuevos</h5>
						<?php
							$p = false;
						} ?>
						<div class="row modal-content" style="width:70%; border:solid 1px; margin-top:10px; background-color:lightgreen; border-radius:10px; padding-left:10px; padding-top:5px; padding-bottom:5px; <?php if ($mensaje['usuario_id'] == $_SESSION['usuario']['id']) {
																																																							echo "margin-left:0.1%;";
																																																						} else {
																																																							echo "margin-left:30%;";
																																																						} ?>">
							<?php if ($mensaje['usuario_id'] != $_SESSION['usuario']['id']) {
								echo "Tu";
							} else {
								echo $usuario['user_name'];
							} ?>
							<p></p><?php echo $mensaje['mensaje']; ?>
						</div>
				<?php }
				} ?>
			</div>
			<div class="container" id="emojis" style="display:none; margin-left:1%; margin-right:1%; width:98%; background-color:white; height:150px; overflow:auto; overflow-y:none;">
				<div class="row">
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😀')">
							😀
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😃')">
							😃
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😄')">
							😄
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😁')">
							😁
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😆')">
							😆
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😅')">
							😅
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😂')">
							😂
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('🤣')">
							🤣
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😇')">
							😇
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😉')">
							😉
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😊')">
							😊
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('🙂')">
							🙂
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('🤑')">
							🤑
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😎')">
							😎
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😈')">
							😈
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😭')">
							😭
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('🙄')">
							🙄
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('🧐')">
							🧐
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😡')">
							😡
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('🤡')">
							🤡
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('🥳')">
							🥳
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😔')">
							😔
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('🤓')">
							🤓
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('🥵')">
							🥵
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('🤫')">
							🤫
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😪')">
							😪
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('🥶')">
							🥶
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😱')">
							😱
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('😨')">
							😨
						</div>
					</div>
					<div class="col-2" style="font-size:27px; text-align:center;">
						<div style="cursor:pointer;" onclick="addem('👻')">
							👻
						</div>
					</div>
				</div>
			</div>
			<div class="container" style="width:100%; padding-bottom:5px;">
				<div class="row">
					<div class="col-1 px-0"><button class="btn p-0 m-0" style="width:100%; font-size: 25px; color:black"><i class="bi bi-paperclip"></i></button></div>
					<div class="col-8" style="padding-right:0; padding-left:0;"><input id="msg" style="border-right:none; width:100%; outline:none; height:100%;" autocomplete="off" placeholder="Escribe tu mensaje aquí" /></div>
					<div class="col-1 px-0">
						<button onclick="cea()" title="Emojis" class=" p-0 m-0" style="background-color:white; border-left:none; border-top:2px solid ; border-right:2px solid; border-bottom:2px solid grey; width:100%; height:100%; font-size: 25px; color:black;"><i class="bi bi-emoji-smile"></i></button>
					</div>
					<div class="col-2" style="padding-left:0;"><button class="btn-primary" id="btn" style="color:white; width:100%; height:100%;"><i class="fa-solid fa-paper-plane"></i></button></div>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
	</div>
<?php } else {
?>
	<div>
		<h2 align="center">El usuario no existe o fue eliminado</h2>
		<p align="center"><img src="img/buho_con_lupa.png" alt=""></p>
	<?php
	}
	?>
	<?php if (isset($_SESSION['usuario']) && (!isset($_GET['id']) || (isset($_GET['id']) && $_GET['id'] == $_SESSION['usuario']['id']))) { ?>
		<script src="js/perfila.js"></script>
		<?php if (isset($_GET['seccion'])) {
			if ($_GET['seccion'] == "buzon") { ?>
				<script type="text/javascript">
					buzon_aparecer();
				</script>
			<?php }
			if ($_GET['seccion'] == "usuario") { ?>
				<script type="text/javascript">
					usuarios_aparecer();
				</script>
			<?php }
			if ($_GET['seccion'] == "favoritos") { ?>
				<script type="text/javascript">
					favoritos_aparecer();
				</script>
			<?php }
			if ($_GET['seccion'] == "send") { ?>
				<script type="text/javascript">
					abrir_chat();
				</script>
			<?php }
			if ($_GET['seccion'] == "destacados") { ?>
				<script type="text/javascript">
					destacados_aparecer();
				</script>
		<?php }
		}
	} else if (isset($_GET['id'])) { ?>
		<script src="js/perfila_v.js"></script>
		<script type="text/javascript">
			function cea() {
				if (document.getElementById('emojis').style.display == "block") {
					document.getElementById('emojis').style.display = 'none';
				} else {
					document.getElementById('emojis').style.display = 'block';
				}
			}

			function addem(a) {
				document.getElementById("msg").value += a;
			}
		</script>
		<?php if (isset($_GET['seccion']) == "send") { ?>
			<script type="text/javascript">
				setTimeout(() => {
					document.getElementById("nav_chat").click();
				}, 500)
			</script>
	<?php }
	} ?>