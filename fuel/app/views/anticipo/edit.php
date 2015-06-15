<h2>Editing <span class='muted'>Anticipo</span></h2>
<br>

<?php echo render('anticipo/_form'); ?>
<p>
	<?php echo Html::anchor('anticipo/view/'.$anticipo->id, 'View'); ?> |
	<?php echo Html::anchor('anticipo', 'Back'); ?></p>
