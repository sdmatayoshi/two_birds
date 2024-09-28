<?php 
if(!isset($section)){
    header("Location: ../index.php");
}
?>
<p class="p-2 text-light"><a href="index.php">Inicio </a> <i class="fa-solid fa-caret-right" style="color: darkgrey;"></i> <a style="color:grey; user-select:none;"> Acerca de nosotros</a></p>


<div class="container my-5 py-5 px-lg-5" style="font-family: 'Montserrat Alternates', sans-serif;">
    <div class="row g-5">
        <div align="center">
            <h1 class="animated slideInLeft" style="font-size: 500%;">Acerca de nosotros</h1>
        </div>
    </div>
</div>
<head >
	<meta charset="utf-8">

	<meta name="mrf-extractable" content="false">



	<div class="mainContainer" >
		<!-- HEADER -->
		<section class="section section--light section--cards" >
			<div class="container relative">
				<div class="row" style="width:875px">
					<div class="col">
						<div class="card card--header" style="background-color:rgb(126, 188, 18)">
							<h1 class="title">¿Que hacemos?</h1>
							<p class="excerpt"><br>
								Nosotros estamos haciendo un proyecto, en el cual consiste elegir un tema, desarrollarlo
								y al final del año presentado.
								En este grupo nosotros elegimos el cambio climático y la contaminación.<a
									id="headerArrow">

						</div>
					</div>
				</div>
				<img class="header__image"
					src="https://www.ecestaticos.com/file/fd583d95c378706d1eac4d323fb1420b/1602839624-bitmap.png"
					width="526" height="617" alt="Ilustración quiénes somos"
					title="Hace 20 años se creó El Confidencial con el propósito de defender el derecho de los ciudadanos a saber la verdad y contar lo que otros callan">
			</div>
		</section>
		<!-- FIN HEADER -->

		<!-- MAIN -->
		<main id="mainContent" class="main">
			<!-- SECTION: Propósito -->
			<section class="section section" style="background-color:rgb(126, 188, 18)">
				<div class="container">
					<div class="row row--column">
						<font color="white">
							<h2 class="section__title relative">¿Por qué?</h2>
							<h3 class="featured featured--small">Porque nos resultó muy interesante e importante el
								tema.
								Nos Gustaría aunque sea un poco concientizar a las demás personas sobre el tema y la
								máxima
								urgencia de cambiarlo.</h3>
						</font>
					</div>
				</div>
			</section>
			<!-- FIN SECTION: Propósito -->

			<!-- SECTION: Visión -->
			
			<!-- FIN SECTION: Visión -->

			<!-- SECTION: Valores y principios -->
			<section class="section section--light section--cards" style="background-color:rgb(179, 255, 170)">
				<div class="container">
					<div class="row row--column">
					<br><br>
						<h2 class="title"><font color="white">Nuestros valores y principios</font></h2>
						<div class="row row--wrap row--between cards">
							<div class="col col--5 col--card">
								<div class="row row--column  card card--content" style="background-color:rgb(126, 188, 18)">
									<span class="card__number">01</span>
									<h1 class="title">Detener el cambio climatico</h1>
									<p>Detener el cambio climatico.Todos podemos contribuir a
										limitar el cambio climático. Desde el modo en que nos desplazamos, hasta la
										electricidad que utilizamos y los alimentos que comemos, podemos marcar la
										diferencia.
									</p>
								</div>
							</div>
							<div class="col col--5 col--card">
								<div class="row row--column  card card--content" style="background-color:rgb(126, 188, 18)">
									<span class="card__number">02</span>
									<h1 class="title">Concientizar el cambio climatico
									</h1>
									<p>
										La conciencia ambiental es una filosofía de vida que se
										preocupa por el medioambiente y lo protege con el fin de conservarlo y de
										garantizar su equilibrio presente y futuro.
									</p>
								</div>
							</div>
							<div class="col col--5 col--card">
								<div class="row row--column  card card--content" style="background-color:rgb(126, 188, 18)">
									<span class="card__number">03</span>
									<h1 class="title">Concientizar la contaminacion
									</h1>
									<p>La concientizar la contaminacion es muy importante
										ya un medio para proteger a este pero también para educar a los niños del
										mañana.
									</p>
								</div>
							</div>
							<div class="col col--5 col--card">
								<div class="row row--column  card card--content" style="background-color:rgb(126, 188, 18)">
									<span class="card__number">04</span>
									<h1 class="title">Solucionar el problema
										<br><br>
									</h1>
									<p>
										Debemos ser conscientes de que uno
										de los aspectos que más deteriora la naturaleza es el hombre.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- FIN SECTION: Valores y principios -->


			<div id="milestonesCarousel">
				<div class="col col--milestone milestone milestone--first">

				</div>
			</div>
	</div>
	<div>
		<a id="prevNav">
		</a>
		<div id="barNav">
			<div id="progressNav"></div>
		</div>
		<a id="nextNav">
		</a>
	</div>
	<div id="milestonesCarouselDots"></div>

	<!-- SECTION: Quiénes somos -->
	<section class="section section--light">
		<div class="container">
			<div class="row row--column">

				<div class="team">
					<div class="team__wrapper">
						<div id="teamCarousel" class="row row--astart team__carousel">


						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- FIN SECTION: Quiénes somos -->





	</main>
	<!-- FIN MAIN -->
	<script src="https://www.ecestaticos.com/file/dcfca34f4703af8efa1eb3262f209cb3/1608210709-main.js"></script>
	<script>
		/*window.ECCO.emit('amplitude,deepbi', {
			dataEventName: 'page_view',
			data: {'page': 'quienes_somos'}
		});*/
	</script>
	<script async type="text/javascript"
		src="/_Incapsula_Resource?SWJIYLWA=719d34d31c8e3a6e6fffd425f7e032f3&ns=1&cb=736274570"></script>
	</div>
	<link rel="stylesheet" href="//www.ecestaticos.com/build/css/web/el-confidencial/modules/footer/footer.css" />
	<script type="module" src="//www.ecestaticos.com/build/js/module/file-list/special/file-list-7947bfc9.js"
		type="module"></script>
	<script nomodule
		src="https://polyfill.io/v3/polyfill.js?features=es5,es6,es7%2CElement.prototype.dataset%2Cdocument.currentScript%2Cfetch%2CURL%2CIntersectionObserver%2CIntersectionObserverEntry%2CCustomEvent%2CSymbol%2CArray.prototype.%40%40iterator%2CDOMTokenList.prototype.%40%40iterator%2CNodeList.prototype.%40%40iterator%2CString.prototype.%40%40iterator%2CWeakMap%2CrequestIdleCallback%2CrequestAnimationFrame%2CArray.prototype.flat%2CObject.fromEntries%2CArray.prototype.flatMap%2Cdefault&flags=gated"></script>
	<script nomodule src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.12.1/polyfill.min.js"></script>
	<script nomodule src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"></script>
	<script nomodule
		src="https://cdnjs.cloudflare.com/ajax/libs/webcomponentsjs/2.6.0/webcomponents-bundle.min.js"></script>
	<script nomodule src="//www.ecestaticos.com/build/js/nomodule/file-list/special/file-list-7947bfc9.js"></script>
	<script async type="text/javascript"
		src="/_Incapsula_Resource?SWJIYLWA=719d34d31c8e3a6e6fffd425f7e032f3&ns=1&cb=704368023"></script>
	</body>

	

            <!--<div class="container-xxl py-5">
                <div class="container px-lg-5">
                    <div class="section-title position-relative text-center mx-auto mb-5 pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <div class="-lg-5">
                            <h2 align="center">Nos encontramos aca</h2>
                            <br><br>
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.6563810286125!2d-58.40788848255616!3d-34.61284959999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccb87409a19cb%3A0xca5521b461138618!2sEsc.%20T%C3%A9cnica%20N%C2%B0%2026%20Confederaci%C3%B3n%20Suiza!5e0!3m2!1ses-419!2sar!4v1661725027699!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                        -->
                <center>
                    <h1 class="mb-3">Contacta con nosotros</h1>
                    <p>Si tenes alguan duda o sugeriencia no dudes en contactar con nosotros y hablaremos sobre el proyecto y su vialidad</p>
                </center>
            </div>

            <div class="center">

                <center><a href="mailto:sebastianpardo583@gmail.com" data-ix="show-popug" class="btn btn-secondary py-sm-3 px-sm-5 me-3 animated slideInLeft" class="center">Contactanos</a>
                </center>
                <a href="https://docs.google.com/document/d/1r_8zCHurSl0yns21x8hqqbvkZv5GvBaIfgbLQ69ngoQ/edit?usp=sharing" target="_blank" class="download-dossier__link w-inline-block">
                    <div>
                        <br>
                        <p>Guia del proyecto</p>
                </a>
                <br><br>
                <!-- Team Start -->
                <div class="container-xxl py-5" style="font-family: 'Montserrat Alternates', sans-serif;">
                    <div class="container px-lg-5">
                        <div class="section-title position-relative text-center mx-auto mb-5 pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                            <h1 class="mb-3">Equipo de desarrollo</h1>
                            <p class="mb-1">Estas Personas son las que se encargaron de crear y diseñar la pagina web con mucho esfuerzo y tambien errores que solucionaron </p>
                        </div>
                        <div class="row g-4">

                            <div class="col-lg-3 col-md-6 wow fadeInUp btn" data-wow-delay="0.1s" type="button" data-bs-toggle="modal" data-bs-target="#GabiInfo">
                                 <!-- Modal -->
                                 <div class="modal fade fadeInUp btn" data-wow-delay="0.1s" id="GabiInfo" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3>Información del desarrollador:</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Nombre: Gabriel Valera<br>Edad:<br>Curso: 4° 12°<br>Ciclo: 2022<br>Escuela: E.T.N°26 Confederación Suiza<br>Descripción: </p>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <div class="team-item border-top border-5 border-primary rounded shadow overflow-hidden">
                                    <div class="text-center p-4">
                                        <img class="rounded-circle" src="img/buho.jpg" alt="" style="width: 200px; height: 200px; object-fit:cover; background-color:white;" align="center">
                                        <h5 class="fw-bold mb-1">Gabriel<br>Valera</h5>
                                        <small style="font-family: 'Montserrat Alternates', sans-serif; color:black;">Programación</small>
                                    </div>
                                    <div class="d-flex justify-content-center bg-primary p-3">
                                    <h2>ㅤ</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 wow fadeInUp btn" data-wow-delay="0.2s" type="button" data-bs-toggle="modal" data-bs-target="#MataInfo">
                                 <!-- Modal -->
                                 <div class="modal fade fadeInUp btn" data-wow-delay="0.1s" id="MataInfo" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3>Información del desarrollador:</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <p>Nombre: Santiago Matayoshi<br>Edad:<br>Curso: 4° 12°<br>Ciclo: 2022<br>Escuela: E.T.N°26 Confederación Suiza<br>Descripción: </p>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <div class="team-item border-top border-5 border-primary rounded shadow overflow-hidden">
                                    <div class="text-center p-4">
                                        <img class="rounded-circle" src="img/Bocchi.jpg" alt="" style="width: 200px; height: 200px; object-fit:cover; background-color:white;" align="center">
                                        <h5 class="fw-bold mb-1">Santiago<br>Matayoshi</h5>
                                        <small style="font-family: 'Montserrat Alternates', sans-serif;">Coordinación</small>
                                    </div>
                                    <div class="d-flex justify-content-center bg-primary p-3">
                                    <h2>ㅤ</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 wow fadeInUp btn" data-wow-delay="0.3s" type="button" data-bs-toggle="modal" data-bs-target="#JooorInfo">
                                 <!-- Modal -->
                                 <div class="modal fade fadeInUp btn" data-wow-delay="0.1s" id="JooorInfo" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3>Información del desarrollador:</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Nombre: Jorge Ochoa<br>Edad:<br>Curso: 4° 12°<br>Ciclo: 2022<br>Escuela: E.T.N°26 Confederación Suiza<br>Descripción: </p>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <div class="team-item border-top border-5 border-primary rounded shadow overflow-hidden">
                                    <div class="text-center p-4">
                                        <img class="rounded-circle" src="img/gato.jpg" alt="" style="width: 200px; height: 200px; object-fit:cover; background-color:white;" align="center">
                                        <h5 class="fw-bold mb-1">Jorge<br>Ochoa</h5>
                                        <small style="font-family: 'Montserrat Alternates', sans-serif;">Coordinación</small>
                                    </div>
                                    <div class="d-flex justify-content-center bg-primary p-3">
                                    <h2>ㅤ</h2>                  
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 wow fadeInUp btn" data-wow-delay="0.4s" type="button" data-bs-toggle="modal" data-bs-target="#EveInfo">
                                 <!-- Modal -->
                                 <div class="modal fade fadeInUp btn" data-wow-delay="0.1s" id="EveInfo" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3>Información del desarrollador:</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Nombre: Evelyn Torres<br>Edad:<br>Curso: 4° 12°<br>Ciclo: 2022<br>Escuela: E.T.N°26 Confederación Suiza<br>Descripción: </p>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <div class="team-item border-top border-5 border-primary rounded shadow overflow-hidden">
                                    <div class="text-center p-4">
                                        <img class="rounded-circle" src="img/th_1.jfif" alt="" style="width: 200px; height: 200px; object-fit:cover; background-color:white;" align="center">
                                        <h5 class="fw-bold mb-1">Evelyn<br>Torres</h5>
                                        <small style="font-family: 'Montserrat Alternates', sans-serif;">Redes</small>
                                    </div>
                                    <div class="d-flex justify-content-center bg-primary p-3">
                                    <h2>ㅤ</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 wow fadeInUp btn" data-wow-delay="0.5s" type="button" data-bs-toggle="modal" data-bs-target="#DibInfo">
                                 <!-- Modal -->
                                 <div class="modal fade fadeInUp btn" data-wow-delay="0.1s" id="DibInfo" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3>Información del desarrollador:</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Nombre: Lucio Dibman<br>Edad:<br>Curso: 4° 12°<br>Ciclo: 2022<br>Escuela: E.T.N°26 Confederación Suiza<br>Descripción: </p>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <div class="team-item border-top border-5 border-primary rounded shadow overflow-hidden">
                                    <div class="text-center p-4">
                                        <img class="rounded-circle" src="img/Webi_Wabo.jpg" alt="" style="width: 200px; height: 200px; object-fit:cover; background-color:white;" align="center">
                                        <h5 class="fw-bold mb-1">Lucio<br>Dibman</h5>
                                        <small style="font-family: 'Montserrat Alternates', sans-serif;">Diseño</small>
                                    </div>
                                    <div class="d-flex justify-content-center bg-primary p-3">
                                    <h2>ㅤ</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 wow fadeInUp btn" data-wow-delay="0.6s" type="button" data-bs-toggle="modal" data-bs-target="#SebasInfo">
                                 <!-- Modal -->
                                 <div class="modal fade fadeInUp btn" data-wow-delay="0.1s" id="SebasInfo" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3>Información del desarrollador:</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Nombre: Sebastian Pardo<br>Edad:<br>Curso: 4° 12°<br>Ciclo: 2022<br>Escuela: E.T.N°26 Confederación Suiza<br>Descripción: </p>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <div class="team-item border-top border-5 border-primary rounded shadow overflow-hidden">
                                    <div class="text-center p-4">
                                        <img class="rounded-circle" src="img/evergarden.png" alt="" style="width: 200px; height: 200px; object-fit:cover; background-color:white;" align="center">
                                        <h5 class="fw-bold mb-1">Sebastian<br>Pardo</h5>
                                        <small style="font-family: 'Montserrat Alternates', sans-serif;">Investigación</small>
                                    </div>
                                    <div class="d-flex justify-content-center bg-primary p-3">
                                    <h2>ㅤ</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 wow fadeInUp btn" data-wow-delay="0.7s" type="button" data-bs-toggle="modal" data-bs-target="#MtrVoidInfo">
                                 <!-- Modal -->
                                 <div class="modal fade fadeInUp btn" data-wow-delay="0.1s" id="MtrVoidInfo" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3>Información del desarrollador:</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Nombre: Matias Otamendi<br>Edad:<br>Curso: 4° 12°<br>Ciclo: 2022<br>Escuela: E.T.N°26 Confederación Suiza<br>Descripción: </p>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <div class="team-item border-top border-5 border-primary rounded shadow overflow-hidden">
                                    <div class="text-center p-4">
                                        <img class="rounded-circle" src="img/hollow-knight-like-512x512.png" alt="" style="width: 200px; height: 200px; object-fit:cover; background-color:white;" align="center">
                                        <h5 class="fw-bold mb-1">Matias<br>Otamendi</h5>
                                        <small style="font-family: 'Montserrat Alternates', sans-serif;">Diseño</small>
                                    </div>
                                    <div class="d-flex justify-content-center bg-primary p-3">
                                            <h2>ㅤ</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 wow fadeInUp btn" data-wow-delay="0.8s" type="button" data-bs-toggle="modal" data-bs-target="#Luh9090Info">
                                 <!-- Modal -->
                                 <div class="modal fade fadeInUp btn" data-wow-delay="0.1s" id="Luh9090Info" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3>Información del desarrollador:</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">Luca Oshiro<br>Edad:<br>Curso: 4° 12°<br>Ciclo: 2022<br>Escuela: E.T.N°26 Confederación Suiza<br>Descripción: </p>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <div class="team-item border-top border-5 border-primary rounded shadow overflow-hidden">
                                    <div class="text-center p-4">
                                        <img class="rounded-circle" src="img/sdlg.jpg" alt="" style="width: 200px; height: 200px; object-fit:cover; background-color:white;" align="center">
                                        <h5 class="fw-bold mb-1">Luca<br>Oshiro</h5>
                                        <small style="font-family: 'Montserrat Alternates', sans-serif;">Créditos</small>
                                    </div>
                                    <div class="d-flex justify-content-center bg-primary p-3">
                                    <h2>ㅤ</h2>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Team End -->
            </div>
        </div>
    </div>
</div>