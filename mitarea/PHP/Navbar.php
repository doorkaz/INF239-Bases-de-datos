<nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #1b3039">
	<div class="container-fluid">
		<a class="navbar-brand fs-4 txt-shadow" style="color: white" href="index.php">PrestigeTravels</a>
		<button class="navbar-toggler btn btn-light" style="background-color: #e8eaeb" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active fs-6" style="color: white" href="paquetes.php">Paquetes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active fs-6" style="color: white" href="hoteles.php">Hoteles</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active fs-6" style="color: white" href="mycart.php">Carrito 
						
						<?php quantityOnCart($_SESSION['id_usuario'])?>
						
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle fs-6" style="color: white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Cuenta
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="cuenta.php">Mi perfil</a></li>
						<li><a class="dropdown-item" href="reviews.php">Mis reseñas</a></li>
						<li><a class="dropdown-item" href="mywishlist.php">Mi wishlist</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
					</ul>
				</li>
			</ul>
			<span class="navbar-text me-2" style="color: white">
				<i class="bi bi-person-circle"></i> Cuenta activa en <?=$_SESSION['Nombre']?>
			</span>	
			
		</div>
	</div>
</nav>