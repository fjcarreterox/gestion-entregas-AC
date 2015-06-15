<h2>Editando datos del <span class='muted'>usuario:</span></h2>
<br>

<?php echo render('user/_form_edit'); ?>
<p>
	<?php echo Html::anchor('user/view/'.$user->id, 'Ver ficha'); ?> |
	<?php echo Html::anchor('user', 'Volver'); ?></p>
