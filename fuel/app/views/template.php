<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('styles.css'); ?>
    <?php echo Asset::js('jquery.js') ?>
    <?php echo Asset::js('bootstrap.js') ?>
    <?php echo Asset::js('anticipo.js') ?>
	<style>
		body { margin: 40px; }
	</style>
</head>
<body>
<?php
if(Session::get('username')==""){
    return \Fuel\Core\Response::redirect('/');
}
?>
	<div class="container">
		<div class="col-md-12">
			<!--<h1><?php /*echo $title;*/ ?></h1>-->
            <a href="http://localhost/fuel/public/"><?php echo Asset::img('aceitunas.jpg',array("class"=>"logo")); ?></a>
            <h1>Aceitunas Coria S.L.</h1>
			<hr>
<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Correcto</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-danger">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
		</div>
		<div class="col-md-12">
<?php echo $content; ?>
		</div>
		<footer>
			<p class="pull-right">Contenido cargado en {exec_time}s usando {mem_usage}mb de memoria.</p>
			<!--<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php /*echo e(Fuel::VERSION);*/ ?></small>
			</p>-->
		</footer>
	</div>
</body>
</html>
