<?php
if (!isset($section)) {
	header("Location: ../index.php");
}
?>
<p class="p-2 text-light"><a href="index.php">Inicio</a> <i class="fa-solid fa-caret-right" style="color: darkgrey;"></i> <a href="forum.php">Foro</a>
	<?php if (isset($resultado['tags']) && count($resultado['tags']) != 0) { ?>
		<i class="fa-solid fa-caret-right" style="color: darkgrey;"></i> <a style="color:grey; user-select:none;"><?php echo $resultado['titulo']; ?></a>
	<?php } ?>
</p>
<a class="btn btn-primary" type="button" onClick="history.back();" data-toggle="tooltip" data-placement="top" title="Retroceder" style="margin-left: 25px; padding-left:20px;padding-right:20px"><i class="fa-solid fa-arrow-left"></i></a>

<?php if (isset($error)) { ?>
	<a class="btn btn-primary" type="button" onClick="history.go($_GET['busqueda']);" data-toggle="tooltip" data-placement="top" title="Retroceder" style="margin-left: 25px; padding-left:20px;padding-right:20px"><i class="fa-solid fa-arrow-left"></i></a>
	<h1 align="center">Informe no encontrado</h1>
	<p align="center"><img src="img/buho_con_lupa.png" alt=""></p>
<?php } else { ?>
	<div class="container mt-5" id="titulo" style="font-family: 'Montserrat Alternates', sans-serif;">
		<div class="row" id="cont">
			<div class="col-lg-8">
				<!-- Post content-->
				<article>
					<br><br>
					<!-- Post header-->
					<header class="mb-4">
						<!-- Post title-->
						<div class="col-lg-16">
							<div class="card mb-4" style="border:none; background-color: transparent;">
								<div class="card-body" style="padding-left:0;">
									<div class="row">
										<h1 class="mb-0"><?php echo $resultado['titulo']; ?></h1>
									</div>
								</div>
							</div>
						</div>
						<!-- <h1 class="fw-bolder mb-1"><?php //echo $resultado['titulo']; 
														?></h1> -->
						<!-- Post meta content-->
						<div class="text-muted fst-italic mb-2">Subido en <?php echo $resultado['mes'] . " " . $resultado['dia'] . ", " . $resultado['Year'];
																			echo " por";
																			if (isset($propietario[0]['id'])) {
																				echo "<a href='my_profile.php?id=" . $propietario[0]['id'] . "'>&nbsp;" . $propietario[0]['user_name'] . ".</a>";
																			} ?></div>
						<?php if (isset($resultado['mes_m'])) { ?>
							<div class="text-muted fst-italic mb-2">Ultima modificación <?php echo $resultado['mes_m'] . " " . $resultado['dia_m'] . ", " . $resultado['Year_m'] . "." ?></div>
						<?php } ?>
						<!-- Post categories-->
						<div>
							<?php
							foreach ($resultado["tags"] as $tag) { ?>
								<a href="forum.php?categoria=<?php echo $tag['categoria']; ?>"><span class="badge bg-success" style="background-color: rgb(126, 255, 18); margin-bottom: 50px; margin-left: 10px;"><i class="fa-solid fa-tag"></i> <?php echo $tag['categoria']; ?></span></a>
							<?php } ?>
						</div>
					</header>
					<section class="mb-5" id="cont_squeak">
						<?php echo $resultado['contenido']; ?>
					</section>
					<div>
						<?php if (isset($_SESSION['usuario'])) { ?>
							<div style="float:right;">
								<div>
									<button id="fav_send" onclick="fav_s()" class="btn" name="fav" style="padding:0; border:none; font-size:35px; color:black;" data-toggle="tooltip" data-placement="top" title="Favorito"><?php if (isset($fav)) {
																																																								echo $fav;
																																																							} else {
																																																								echo "<i class='fa-regular fa-star'></i>";
																																																							} ?></button>
								</div>
							</div>
						<?php } ?>
						<div>
							<button <?php if (!isset($_SESSION['usuario'])) {
										echo "disabled";
									} ?> class="btn" id="like_send" onclick="like_s()" style="padding:0; border:none; font-size:35px; color:black;" data-toggle="tooltip" data-placement="top" title="Me gusta"><?php if (isset($like)) {
																																																					echo $like;
																																																				} else {
																																																					echo "<i class='fa-regular fa-thumbs-up'></i>";
																																																				} ?></button>
							<span id="likes" style="font-size:20px;">(<span><?php echo $resultado['likes']; ?></span>) </span>
							<button <?php if (!isset($_SESSION['usuario'])) {
										echo "disabled";
									} ?> class="btn" id="dislike_send" onclick="dislike_s()" style="padding:0; margin-top:8px; border:none; font-size:35px; color:black;" data-toggle="tooltip" data-placement="top" title="No me gusta"><?php if (isset($dislike)) {
																																																												echo $dislike;
																																																											} else {
																																																												echo "<i class='fa-regular fa-thumbs-down'></i>";
																																																											} ?></button>
							<span id="dislikes" style="font-size:20px;">(<span><?php echo $resultado['dislikes']; ?></span>)</span>
							<button class="btn" style="color:black; padding-right:0;" disabled aria-disabled="false" data-toggle="tooltip" data-placement="top" title="Visualizaciones"><i class="fa-regular fa-eye" style="font-size:35px; color:black;"></i></button>
							<span style="font-size:20px;">(<?php echo $resultado['contador_vistas']; ?>)</span>
						</div>
					</div>
					<br>
				</article>
				<!-- Comments section-->
				<section class="mb-5" id="comentarios">
					<div class="card bg-light">
						<div class="card-body" id="com_con">
							<!-- Comment form-->
							<h2>Comentarios (<span><?php echo count($comentarios); ?></span>)</h2>
							<?php if (!isset($_SESSION['usuario'])) { ?>
								<div class="alert alert-danger" role="alert">
									<h4 class="alert-heading">Lo sentimos!</h4>
									<p>Para poder comentar es necesario tener una cuenta registrada</p>
									<hr>
									<button type="button" class="btn btn-success"><a href="log_in.php" style="color:white;">Iniciar sesión</a></button>
								</div>
							<?php } else { ?>
								<div class="mb-4" id="atemp_com">
									<textarea required class="form-control" rows="3" placeholder="¡Únete a la discusión y deja un comentario!" style="resize: none;" name="comentario" id="comentario_send"></textarea>
									<br>
									<button id="secom" type="button" class="btn btn-primary" style="cursor:pointer; background-color:#7EBC12;">Comentar</button>
								</div>
							<?php } ?>
							<!-- Comment with nested comments-->
							<div class="comments" style="color: black;">
								<?php
								for ($i = 0; $i < count($comentarios); $i++) {
									if (!isset($comentarios[$i]['comentario_padre_id'])) { ?>
										<br>
										<div class="d-flex">
											<div class="flex-shrink-0"><img class="rounded-circle" src="img/usuarios/<?php echo $comentarios[$i]['ui'] . "/" . $comentarios[$i]['foto']; ?>" alt="..." style="width:40px;height:40px;" /></div>
											<div class="ms-1" style="width:100%;" id="r<?php echo $comentarios[$i]['id']; ?>">
												<div class="fw-bold"><?php echo $comentarios[$i]['user_name']; ?></div>
												<div class="col-lg-16">
													<div class="card mb-4" style="border:none; background-color: transparent;">
														<div class="card-body" style="padding:0; padding-right:10px;">
															<div class="row">
																<p class="mb-0"><?php echo $comentarios[$i]['comentario']; ?></p>
															</div>
														</div>
													</div>
												</div>
												<input type="button" value="Responder" style="border:none; background-color:transparent; font-weight:bold;" onclick="responder('r<?php echo $comentarios[$i]['id']; ?>')">
											</div>
										</div>
										<br>
										<div id="rt<?php echo $comentarios[$i]["id"]; ?>">
											<?php for ($j = 0; $j < count($comentarios); $j++) {
												if ($comentarios[$i]['id'] == $comentarios[$j]['comentario_padre_id']) { ?>
													<div class="d-flex" style="margin-left:50px;">
														<div class="flex-shrink-0"><img class="rounded-circle" src="img/usuarios/<?php echo $comentarios[$i]["ui"] . "/" . $comentarios[$j]['foto']; ?>" alt="..." style="width:40px;height:40px;" /></div>
														<div class="ms-3" style="width:100%;">
															<div class="fw-bold"><?php echo $comentarios[$j]['user_name']; ?></div>
															<div class="col-lg-16">
																<div class="card mb-4" style="border:none; background-color: transparent;">
																	<div class="card-body" style="padding:0; padding-right:30px;">
																		<div class="row">
																			<p class="mb-0"><?php echo $comentarios[$j]['comentario']; ?></p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<br>
											<?php }
											} ?>
										</div>
								<?php }
								} ?>
							</div>
						</div>
				</section>
			</div>
			<!-- ------boton modificar------ -->
			<div class="col-lg-4">
				<?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $resultado['usuario_id']) { ?>
					<br><br>
					<div>
						<button class="btn btn-primary" style="font-family: 'Montserrat', sans-serif; width:140px;" onclick="aparecer()"><i class="fa-solid fa-pen-to-square"></i> Modificar</hbutton>
					</div>
					<br>
					<!-- ------boton eliminar------ -->
					<div>
						<button class="btn btn-secondary" onclick="eliminar_informe_f()" style="font-family: 'Montserrat', sans-serif; width:140px;"><i class="bi bi-trash"></i> Eliminar</button>
					</div>
				<?php } else if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] != $resultado['usuario_id'] && ($_SESSION['usuario']['rango'] == 3 || ($_SESSION['usuario']['rango'] == 2 && $propietario['rango'] != 3))) { ?>
					<br><br>
					<!-- ------boton eliminar------ -->
					<div>
						<button class="btn btn-secondary" onclick="eliminar_informe_f()" style="font-family: 'Montserrat', sans-serif; width:140px;"><i class="bi bi-trash"></i> Eliminar</button>
					</div>
				<?php } ?>
				<br><br>
				<div align="center" class="bg-success bg-gradient" style="border:1px solid; border-bottom:none;">
					<table>
						<tr>
							<img id="demo" class="rounded-circle border border-2 border-dark team-item" type="button" data-bs-toggle="modal" data-bs-target="#img" src="img/usuarios/<?php echo $propietario[0]['id'] . "/" . $propietario[0]['foto']; ?>" id="foto" style="width: 250px; height: 250px; object-fit:cover; background-color:white;" data-bs-toggle="tooltip" data-placement="bottom" title="Ver imagen">
							<div class="modal fade fadeInUp" data-wow-delay="0.01s" id="img" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-lg">
									<div class="modal-content team-item border-2 border-primary">
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										<img align="center" type="button" data-bs-toggle="modal" data-bs-target="#img" src="img/usuarios/<?php echo $propietario[0]['id'] . "/" . $propietario[0]['foto']; ?>" id="foto" style="object-fit:cover; background-color:white; margin-left:25px;margin-right:25px;">
										<br><a style="color:black;">Archivo: <?php echo $propietario[0]['foto']; ?></a>
										<div class="modal-body">

										</div>
									</div>
								</div>
							</div>
						</tr>
					</table>
					<h2 align="center" style="margin:0;"><?php if (strlen($propietario[0]['user_name']) > 11) {
																echo substr($propietario[0]['user_name'], 0, 9) . "...";
															} else {
																echo $propietario[0]['user_name'];
															} ?></h2>
				</div>
				<div align="center">
					<div class="bg-success bg-gradient" style="background-color:white; border:1px solid; border-top:none;">
						<br>
						<strong>
							<p align="left" class="user-select-none">ㅤInformación del usuario:</p>
						</strong>
						<list>
							<ul>
								<li align="left"><b>Informes subidos:</b> <?php echo $propietario[0]['ciu']; ?></li>
							</ul>
							<br>
							<div class="col-lg-16">
								<div class="card mb-4" style="background-color: transparent;">
									<div class="card-body">
										<div class="row">
											<p class="mb-0">Descripción: </p>
											<p class="mb-0" id="descripcion_txt"><?php if (isset($propietario[0]['descripcion'])) {
																						echo $propietario[0]['descripcion'];
																					} else {
																						echo "sin descripción";
																					} ?></p>
										</div>
									</div>
								</div>
							</div>
							<p align="center">
								<a href="my_profile.php?id=<?php echo $propietario[0]['id']; ?>"><button style="width:150px; background-color:#7EBC12;" type="button" class="btn btn-primary">
										Ver perfil
									</button></a>
							</p>
						</list>
					</div>
				</div>
			</div>
		</div>
		<?php
		if (isset($_SESSION['usuario'])) {
			if ($_SESSION['usuario']['id'] == $resultado['usuario_id']) { ?>
				<div class="row" id="coal" style="display:none;">
					<div id="exito_u" style="display:none; position:fixed; background-color:lightgreen; text-align:center; z-index:100; margin-left:12%; width:60%; padding:10px;">La edición fue exitosa!!! <a href="squeak.php?id=<?php echo $_GET['id']; ?>">recargar la pagina</a> para ver los cambios</div>
					<div>
						<div class="modal-content">
							<div class="modal-header">
								<h2 class="modal-title">Editar informe:</h2>
								<button class="btn btn-square bg-secondary" onclick="salir()"><i class="fa-sharp fa-solid fa-xmark"></i></button>
							</div>
							<div class="modal-body">
								<label for="formGroupTitulo" id="tit" class="form-label">Titulo (<?php echo strlen($resultado['titulo']); ?>/35)</label>
								<input type="text" class="form-control" id="formGroupTitulo" oninput="tit()" value="<?php echo $resultado['titulo']; ?>" required>
								<label for="formGroupEncabezado" id="enc" class="form-label mt-3">Encabezado (<?php echo strlen($resultado['encabezado']); ?>/70)</label>
								<input type="text" class="form-control" oninput="enc()" id="formGroupEncabezado" value="<?php echo $resultado['encabezado']; ?>" required />
								<label for="formGroupDescripcion" class="form-label mt-3">Informe:</label>
								<textarea name="contenido" class="form-control" id="siuu"><?php echo $resultado['contenido']; ?></textarea>
								<label for="formGroupTags" class="form-label mt-3"></label>
								<div style="text-align:center;margin-top:20px; margin-bottom:20px;">
									<h3 style="text-align:center;"><i class="fa-solid fa-tag"></i> Categorias</h3>
									<label for="flora">Flora</label>
									<input type="checkbox" <?php if (in_a("flora", $resultado['tags'])) {
																echo "checked";
															} ?> id="flora" style="margin-right:20px;">
									<label for="fauna">Fauna</label>
									<input type="checkbox" <?php if (in_a("fauna", $resultado['tags'])) {
																echo "checked";
															} ?> id="fauna" style="margin-right:20px;">
									<label for="clima">Clima</label>
									<input type="checkbox" <?php if (in_a("clima", $resultado['tags'])) {
																echo "checked";
															} ?> id="clima" style="margin-right:20px;">
									<label for="oceano">Océano</label>
									<input type="checkbox" <?php if (in_a("océano", $resultado['tags'])) {
																echo "checked";
															} ?> id="oceano" style="margin-right:20px;">
									<label for="medio_ambiente">Medio ambiente</label>
									<input type="checkbox" <?php if (in_a("medio ambiente", $resultado['tags'])) {
																echo "checked";
															} ?> id="medio_ambiente" style="margin-right:20px;">
									<label for="medidas">Medidas</label>
									<input type="checkbox" <?php if (in_a("medidas", $resultado['tags'])) {
																echo "checked";
															} ?> id="medidas" style="margin-right:20px;">
								</div>
							</div>
							<div>
								<button type="button" onclick="send()" class="btn btn-success" style="margin-bottom:10px; width:40%; margin-left:30%; background-color:green; color:white;">Guardar cambios</button>
							</div>
						</div>
					</div>
				</div>
				<form class="row" id="lop" method="POST" action="squeak.php?prem=<?php echo "333%yet"; ?>" style="display:none; text-align:center;">
					<div>
						<div class="modal-content">
							<div class="modal-header">
								<h2 align="center">¿Esta seguro?<i class="fa-solid fa-cat-space"></i></h2>
							</div>
							<div class="modal-body">
								<p><i class="fa-solid fa-circle-exclamation" style="color: red;"></i> Ésta acción es irreversible.</p>
							</div>
							<div class="modal-footer">
								<p><button type="submit" class="btn btn-secondary" name="eliminar">Eliminar</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" onclick="salir()" class="btn btn-success">Cancelar</button></p>
							</div>
						</div>
					</div>
				</form>
		<?php }
		} ?>
		<?php
		if (isset($_SESSION['usuario'])) {
			if (($_SESSION['usuario']['rango'] == 3 || ($_SESSION['usuario']['rango'] == 2 && $propietario['rango'] != 3)) && $_SESSION['usuario']['id'] != $resultado['usuario_id']) { ?>
				<form class="row" id="lop" method="POST" action="squeak.php?prey=<?php echo "333%yet"; ?>" style="display:none; text-align:center;">
					<div>
						<div class="modal-content">
							<div class="modal-header">
								<p style="font-weight:bold; font-size:24px;">Razón de la eliminación:</p>
							</div>
							<div class="modal-body">
								<textarea style="resize:none; margin-left:2%; width:80%; height:300px;" name="ban_info" placeholder="Escriba su justificación..." maxlength="1000" required></textarea>
							</div>
							<div class="modal-footer">
								<p><button type="submit" class="btn btn-secondary" name="eliminar">Eliminar</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" onclick="salir()" class="btn btn-success">Cancelar</button></p>
							</div>
						</div>
					</div>
				</form>
		<?php }
		} ?>
	</div>
	<style>
		p {
			color: black;
		}
	</style>
	<script type="text/javascript">
		const stc = document.querySelectorAll("#cont .col-lg-8 article .mb-5 p img")
		if (stc) {
			for (var i = 0; i < stc.length; i++) {
				if (stc[i].width > document.querySelectorAll(".col-lg-8")[0].clientWidth) {
					stc[i].width = document.querySelectorAll(".col-lg-8")[0].clientWidth - 24;
				}
			}
		}
	</script>
	<?php
	if (isset($_SESSION['usuario']) && !isset($error)) {
		if ($_SESSION['usuario']['id'] == $resultado['usuario_id']) { ?>
			<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
			<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
			<script src="js/selector.js" referrerpolicy="origin"></script>
			<script type="text/javascript" src="js/forum.js"></script>
			<script type="text/javascript" src="js/squeak.js"></script>
			<script type="text/javascript">
				function enc() {
					const enc = document.getElementById("formGroupEncabezado").value;
					document.getElementById("enc").innerHTML = "Encabezado (" + enc.length + "/70)"
				}

				function tit() {
					const tit = document.getElementById("formGroupTitulo").value;
					document.getElementById("tit").innerHTML = "Titulo (" + tit.length + "/35)"
				}

				function send() {
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
											console.log()
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
						url: 'squeak.php?pref=<?php echo "333%yet"; ?>',
						data: {
							"titulo": document.getElementById("formGroupTitulo").value,
							"encabezado": document.getElementById("formGroupEncabezado").value,
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
							if (jsonData.exito) {
								document.getElementById("exito_u").style.display = "block";
							}
						}
					});
				}
			</script>
		<?php }
		if ($_SESSION['usuario']['id'] != $resultado['usuario_id'] && (($_SESSION['usuario']['rango'] == 2 && $propietario['rango'] != 3) || $_SESSION['usuario']['rango'] == 3)) { ?>
			<script type="text/javascript" src="js/squeak_admin.js"></script>
		<?php } ?>
		<script type="text/javascript">
			var id = <?php echo $_GET['id']; ?>
		</script>
		<script type="text/javascript" src="js/squeak_c.js"></script>
<?php }
}
?>