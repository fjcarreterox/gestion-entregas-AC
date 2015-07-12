<h2>Editando datos del <span class='muted'>albarán</span> seleccionado:</h2>
<br>
<?php echo render('albaran/_form'); ?>
<p>
    <?php echo Html::anchor('albaran/view/'.$albaran->id, 'Ver datos'); ?> |
	<?php echo Html::anchor('albaran/list', 'Volver'); ?></p>
