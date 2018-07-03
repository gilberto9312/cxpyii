<?php
	// $dataProvider presenta instancias de un array con campos definidos en API consultarCuenta
?>
<h1>Consulta de Cuenta</h1>

<p>
<?php 
	$this->widget('bootstrap.widgets.BootLabel', array(
		'type'=>'important', // '', 'success', 'warning', 'important', 'info' or 'inverse'
		'label'=>$persona['label'],
	));
	echo "&nbsp;&nbsp;&nbsp;";
	$this->widget('bootstrap.widgets.BootLabel', array(
		'type'=>'info', // '', 'success', 'warning', 'important', 'info' or 'inverse'
		'label'=>$persona['extra'],
	));
?>
</p>
<p>
<?php 
	$saldo=$totalCargos=$totalAbonos=0;
	$_totales = Yii::app()->cyaApi->calculaSaldo($key,$persona['id']);
	$saldo = $_totales[0];
	$totalCargos = $_totales[1];
	$totalAbonos = $_totales[2];
	
	
	echo "&nbsp;&nbsp;&nbsp;Total Cargos:";
	$this->widget('bootstrap.widgets.BootLabel', array(
		'type'=>'info', // '', 'success', 'warning', 'important', 'info' or 'inverse'
		'label'=>Yii::app()->format->money($totalCargos),
	));
	echo "&nbsp;&nbsp;&nbsp;Total Abonos:";
	$this->widget('bootstrap.widgets.BootLabel', array(
		'type'=>'info', // '', 'success', 'warning', 'important', 'info' or 'inverse'
		'label'=>Yii::app()->format->money($totalAbonos),
	));
	echo "&nbsp;&nbsp;&nbsp;Pendiente por Abonar:";
	$this->widget('bootstrap.widgets.BootLabel', array(
		'type'=>'info', // '', 'success', 'warning', 'important', 'info' or 'inverse'
		'label'=>Yii::app()->format->money($saldo),
	));
?>
</p>

<ul class='listaopcioneslinks'>
	<li><?php echo Yii::app()->cyaui->getLinkCrearOtroCargo($persona['id'],$key);?></li>
	<li><?php echo Yii::app()->cyaui->getLinkCrearOtroAbono($persona['id'],$key);?></li>
</ul>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'grid-consulta-cuenta',
		'dataProvider'=>$dataProvider,
		'rowCssClassExpression'=>'strtolower($data[\'tipocuentatxt\'])',
		'columns'=>array(
			array('name'=>'id', 'header'=>'#MVTO'
				,'type'=>'number'
				,'htmlOptions'=>array(
					'style'=>"width: 50px;",
					'class'=>'primeracolumna', // IMPORTANTE, usada en _comboEditBoxCGridView
				)),
			array('name'=>'fecha', 'header'=>'Fecha'
				,'type'=>'date'
				,'htmlOptions'=>array('style'=>'width: 100px;')),
			array('name'=>'tipocuentatxt', 'header'=>'Tipo'
				,'htmlOptions'=>array('style'=>'width: 50px;')
				),
			array('name'=>'estatustxt', 'header'=>'Estatus'
				,'htmlOptions'=>array('style'=>'width: 50px;')
				),
			array('name'=>'concepto', 'header'=>'Concepto'
				),
			array('name'=>'refno', 'header'=>'#ref'
				),
			array(
					'class'=>'CLinkColumn',
					'header'=>'Cargo',
					'labelExpression'=>'Yii::app()->format->formatMoney($data[\'monto\'])',
					'urlExpression'=>'array(\'auditarcuenta\',\'data\'=>serialize($data),\'key\'=>\''.$key.'\')',
					'htmlOptions'=>array('style'=>'width: 100px; text-align: right;',
						'title'=>'click para auditar cuenta. (control+click para verla en una ventana nueva)'),
				),
			array('name'=>'montoabonado', 'header'=>'Abono',
				'value'=>'$data[\'tipocuenta\']==Yii::app()->cyaApi->getParamCargo(\''.$key.'\') ? Yii::app()->format->formatMoney($data[\'montoabonado\']) : \'...\'',
				'htmlOptions'=>array('style'=>'width: 100px; text-align: right;')
				),
			array('name'=>'montopendiente', 'header'=>'Saldo',
				'value'=>'$data[\'tipocuenta\']==Yii::app()->cyaApi->getParamCargo(\''.$key.'\') ? Yii::app()->format->formatMoney($data[\'montopendiente\']) : \'...\'',
				'htmlOptions'=>array('style'=>'width: 100px; text-align: right;'),
				),
		),
	)); 
	?>	
