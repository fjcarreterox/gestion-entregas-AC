<h2>Viewing <span class='muted'>#<?php echo $anticipo->id; ?></span></h2>

<p>
	<strong>Fecha:</strong>
	<?php echo $anticipo->fecha; ?></p>
<p>
	<strong>Idprov:</strong>
	<?php echo $anticipo->idprov; ?></p>
<p>
	<strong>Numcheque:</strong>
	<?php echo $anticipo->numcheque; ?></p>
<p>
	<strong>Idbanco:</strong>
	<?php echo $anticipo->idbanco; ?></p>
<p>
	<strong>Cuantia:</strong>
	<?php echo $anticipo->cuantia; ?></p>
<p>
	<strong>Recogido:</strong>
	<?php echo $anticipo->recogido; ?></p>

<?php echo Html::anchor('anticipo/edit/'.$anticipo->id, 'Edit'); ?> |
<?php echo Html::anchor('anticipo', 'Back'); ?>