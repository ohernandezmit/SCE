 <?php include "temp/01.php"; ?>   
    <main class="bg-image" 
        style="background-image: url('img/apple.jpg'); background-repeat: no-repeat; background-size: 100% 100%; background-position-x: center; background-color: #6ed2cb;">
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-3">

                                <div class="card-body body-login">
									<!--Start Logo -->                                
                                	<div class="pb-2 d-lg-block" style="text-align: center">
                                         <a class="logo align-items-center w-auto">
                                    		<img src="img/favicon.png" alt="">
                                    	 </a>
                                     	<!-- <span class="text-logo">Logo y nombre de la escuela</span> --> 
                                    </div>
                                    
                                    <!--End Logo -->
                                
                                    <div class="pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Sistema de Control Escolarrrrr</h5>
                                        <p class="text-center small">Ingrese su nombre de usuario y contraseña</p>
                                    </div>

                                    <form id="loginForm" action="autentication.php" method="post" class="row g-3 needs-validation" novalidate>

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Nombre de usuario</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                                                <input type="text" name="username" class="form-control" id="yourUsername" required>
                                                <div class="invalid-feedback">Por favor ingrese su nombre de usuario.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Contraseña</label>
                                            <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-lock"></i></span>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Por favor ingrese su contraseña.</div>
                                            </div>
                                        </div>
                                        <div id="cargando" class="loader" style="display: none" ></div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" onclick="mostrar();">Iniciar Sesión</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<?php include "temp/03.php"; ?>