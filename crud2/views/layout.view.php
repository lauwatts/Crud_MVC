<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="public/vendor/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<nav>
		<div class="nav-wrapper cyan darken-4">
			<a href="/crud2" class="brand-logo">
				<i class="material-icons">local_pharmacy</i>
			</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="medicamentos">Medicamentos</a></li>
				<li><a href="badges.html">Ventas</a></li>
				<li><a href="collapsible.html">Inventario</a></li>
			</ul>
		</div>
	</nav>
	
	<?= $view_content ?>
	
	<script src="public/vendor/js/jquery.min.js"></script>
	<script src="public/vendor/js/materialize.min.js"></script>
	<script src="public/js/main.js"></script>
</body>
</html>