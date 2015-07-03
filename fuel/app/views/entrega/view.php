<?php
    $idalbaran=Model_Albaran::find('first', array(
        'where' => array(
            array('IdAlbaran',$entrega->albaran),
        )))->get('id');
?>
<h2>Mostrando detalle de <span class='muted'>entrega de mercancía</span>:</h2>

<p>
	<strong>Fecha de la entrega:</strong>
	<?php echo date_conv($entrega->fecha); ?></p>
<p>
	<strong>Núm. Albaran:</strong>
	<?php echo Html::anchor('albaran/view/'.$idalbaran, $entrega->albaran,array('target'=>'_blank')); ?></p>
<p>
	<strong>Variedad de aceituna registrada:</strong>
	<?php echo Model_Variedad::find($entrega->variedad)->get('nombre'); ?></p>
<p>
	<strong>Tamaño de la muestra:</strong>
	<?php echo $entrega->tam; ?></p>
<p>
	<strong>Total pasada:</strong>
	<?php echo $entrega->total; ?> kgrs.</p>
<p>
	<strong>Porcentaje de picado:</strong>
	<?php echo $entrega->rate_picado; ?>%</p>
<p>
	<strong>Porcentaje de molestado:</strong>
	<?php echo $entrega->rate_molestado; ?>%</p>
<p>
	<strong>Porcentaje de morado:</strong>
	<?php echo $entrega->rate_morado; ?>%</p>
<p>
	<strong>Porcentaje de mosca:</strong>
	<?php echo $entrega->rate_mosca; ?>%</p>
<p>
	<strong>Porcentaje de azofairón:</strong>
	<?php echo $entrega->rate_azofairon; ?>%</p>
<p>
	<strong>Porcentaje de agostado:</strong>
	<?php echo $entrega->rate_agostado; ?>%</p>
<p>
	<strong>Porcentaje de granizado:</strong>
	<?php echo $entrega->rate_granizado; ?>%</p>
<p>
	<strong>Porcentaje de perdigón:</strong>
	<?php echo $entrega->rate_perdigon; ?>%</p>
<p>
	<strong>Porcentaje de taladro:</strong>
	<?php echo $entrega->rate_taladro; ?>%</p>

<?php echo Html::anchor('entrega/edit/'.$entrega->id, 'Editar'); ?> |
<?php echo Html::anchor('entrega/list', 'Volver'); ?>