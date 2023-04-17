<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<div class="sb-sidenav-menu-heading">Principal</div>
				<a class="nav-link" href="<?php echo $server_name; ?>">
					<div class="sb-nav-link-icon">
						<i class="bi bi-house"></i></div>
					Inicio
				</a>
				
				<!-- División Acedemico -->
				
				<div class="sb-sidenav-menu-heading">Academico</div>
				
				<!-- Alumnos -->
				
				<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAlumnos" aria-expanded="false" aria-controls="collapseAlumnos">
					<div class="sb-nav-link-icon">
						<i class="bi bi-people-fill"></i></div>
					Alumnos
					<div class="sb-sidenav-collapse-arrow">
						<i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseAlumnos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="<?php echo $server_name; ?>students"><i class="bi bi-person-vcard"></i>&nbsp;&nbsp;Alumnos</a>
					</nav>
				</div>
				
				<!-- Fin de Alumnos -->
				
				<!-- Calificaciones -->
				
				<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCalificaciones" aria-expanded="false" aria-controls="collapseCalificaciones">
					<div class="sb-nav-link-icon">
						<i class="bi bi-award"></i></div>
					Calificaciones
					<div class="sb-sidenav-collapse-arrow">
						<i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseCalificaciones" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
					<nav class="sb-sidenav-menu-nested nav">
					    <a class="nav-link" href="<?php echo $server_name; ?>capture"><i class="bi bi-pencil"></i>&nbsp;&nbsp;Capturar</a>
						<a class="nav-link" href="<?php echo $server_name; ?>score"><i class="bi bi-list-ol"></i>&nbsp;&nbsp;Listas</a>
					</nav>
				</div>
				
				<!-- Fin de Calificaciones --> 

				<!-- Lista de Alumnos-->   
				<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseListas" aria-expanded="false" aria-controls="collapseListas">
					<div class="sb-nav-link-icon">
						<i class="bi bi-award"></i></div>
					Listas Alumnos
					<div class="sb-sidenav-collapse-arrow">
						<i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseListas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
					<nav class="sb-sidenav-menu-nested nav">
					    <a class="nav-link" href="<?php echo $server_name; ?>index"><i class="bi bi-file-earmark-pdf"></i>&nbsp;&nbsp;Imprimirr</a>
					</nav>
				</div>
				<!-- Fin Lista de Alumnos -->
				
				<!-- Fin de Academico -->
				
				<!-- División Administrador -->
				
				<div class="sb-sidenav-menu-heading">Administrador</div>
				
				<!-- PERIODO -->
				
				<a class="nav-link" href="<?php echo $server_name; ?>school_period">
					<div class="sb-nav-link-icon">
						<i class="bi bi-calendar-week"></i></div>
						Periodo
				</a>
				
				<!-- DOCENTES -->
				<a class="nav-link" href="<?php echo $server_name; ?>teachers">
					<div class="sb-nav-link-icon">
						<i class="bi bi-person-workspace"></i></div>
						Docentes
				</a>
				
				<!-- MATERIAS -->
				<a class="nav-link" href="<?php echo $server_name; ?>materias">
					<div class="sb-nav-link-icon">
						<i class="bi bi-book-fill"></i></div>
						Materias
				</a>
				
				<!-- Nivel -->
				
				<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNivel" aria-expanded="false" aria-controls="collapseNivel">
					<div class="sb-nav-link-icon">
						<i class="bi bi-flag-fill"></i></div>
					    Nivel
					<div class="sb-sidenav-collapse-arrow">
						<i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseNivel" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="<?php echo $server_name; ?>levels"><i class="bi bi-mortarboard"></i>&nbsp;&nbsp;Niveles</a>
								<a class="nav-link" href="<?php echo $server_name; ?>grades_groups">Grados y Grupos</a>
							</nav>
						</div>
				
				<!-- Fin de Nivel -->
				
				<!-- Fin de Periodo -->
				
			</div>
		</div>
		<div class="sb-sidenav-footer">
			Sistema de Control Escolar
		</div>
	</nav>
</div>