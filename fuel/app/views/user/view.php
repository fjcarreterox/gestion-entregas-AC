<h2>Mostrando los datos del <span class='muted'>usuario <?php /*echo $user->id;*/ ?></span>seleccionado:</h2>

<p>
	<strong>Nombre de usuario:</strong>
	<?php echo $user->username; ?></p>
<p>
	<strong>Contraseña:</strong>
	<?php echo $user->pass; ?></p>

<?php echo Html::anchor('user/edit/'.$user->id, 'Editar'); ?> |
<?php echo Html::anchor('user', 'Volver'); ?>