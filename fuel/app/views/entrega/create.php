<?php $name=Model_Proveedor::find(\Fuel\Core\Session::get('ses_prov'))->get('nombre');?>
<h2>Registrar nueva entrega de mercancía de <span class='muted'><?php echo $name;?></span></h2>
<br>
<?php echo render('entrega/_form'); ?>
<p><?php echo Html::anchor('entrega', 'Volver'); ?></p>
