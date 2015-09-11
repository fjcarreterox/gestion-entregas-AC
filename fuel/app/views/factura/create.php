<h2>Emitir una nueva <span class='muted'>factura</span></h2>
<br/>
<?php $data['num_fact'] = $num_fact;
echo render('factura/_form',$data); ?>
<p><?php echo Html::anchor('welcome', 'Cancelar', array('class' => 'btn btn-danger')); ?></p>
