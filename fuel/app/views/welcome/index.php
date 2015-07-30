<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aceitunas Coria S.L.</title>
	<?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('styles.css'); ?>
	<style>

	</style>
</head>
<body>
	<header>
		<div class="container">
			<div id="logo"></div>
		</div>
	</header>
	<div class="container">
		<div class="jumbotron">
			<h1>Aceitunas Coria S.L.</h1>
			<p>Área de gestión. ¡Qué tal, <b><?php echo \Fuel\Core\Session::get('username'); ?></b>!</p>
            <p><small><a href="welcome/guide">Guía de uso básico de la aplicación</a></small></p>
            <p><small><a href="logout">Salir del sistema</a></small></p>
		</div>
        <div class="row">
            <div class="col-md-4">
                <h2>Acciones más frecuentes</h2>
                <ul>
                    <li><a href="entrega/create">Registrar nueva entrega</a></li>
                    <li><a href="puesto">Entrada diaria</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Entregas y albaranes</h2>
                <ul>
                    <li><a href="entrega/list">Ver todas las entregas hasta la fecha</a></li>
                    <li><a href="albaran/list">Ver todos los albaranes hasta la fecha</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Informes</h2>
                <li><a href="proveedor/final">Ficha final del proveedor</a></li>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h2>Anticipos</h2>
                <ul>
                    <li><a href="anticipo">Cálculo de anticipos</a></li>
                    <li><a href="anticipo/list">Resumen de anticipos</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Facturación</h2>
                <ul>
                    <li><a href="factura/create">Generar nueva factura</a></li>
                    <li><a href="factura/list">Ver todas las facturas hasta la fecha</a></li>

                </ul>
            </div>
            <div class="col-md-4">
                <h2>Gestión de la aplicación</h2>
                <li><a href="proveedor">Proveedores campaña 2015/2016</a></li>
                <li><a href="variedad">Variedades de aceitunas</a></li>
                <li><a href="user">Usuarios del sistema</a></li>
                <li><a href="puesto">Puestos de la empresa</a></li>
                <li><a href="banco">Bancos con los que trabajamos</a></li>
            </div>
        </div>
		<hr/>
		<footer>
            <p class="pull-right"><small>Developed and designed with love by <a href="mailto:rentonr11@gmail.com">jaxxrenton</a>.</small></p>
            <!--<p class="pull-right">COntenido cargado en {exec_time}s usando {mem_usage}mb de memoria.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo Fuel::VERSION; ?></small>
			</p>-->
		</footer>
	</div>
</body>
</html>
