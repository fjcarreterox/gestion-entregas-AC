<h2>Mostrando los datos del <span class='muted'>usuario <?php /*echo $user->id;*/ ?></span>seleccionado:</h2>
<br/>
<p>
	<strong>Nombre de usuario:</strong>
	<?php echo $user->username; ?></p>
<p>
	<strong>Puesto de recogida:</strong>
	<?php echo Model_Puesto::find($user->idpuesto)->get('nombre'); ?></p>
<?php echo Html::anchor('user/edit/'.$user->id, 'Editar'); ?> |
<?php echo Html::anchor('user', 'Volver'); ?>