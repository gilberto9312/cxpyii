<?php 
	/*
		recibe:
		
		'idpersona'			escalar
		'key'				escalar
		'model' 			instancia de cyaSeleccionaCargos
		'dataProvider'		dataProvider de api.listarCuentasNoPagadas
		'persona'			persona obtenida con api.buscarPersona
	*/
?>
<div class="form">

<h1>Seleccione los Cargos a Abonar</h1>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seleccionacargos-form',
	'enableAjaxValidation'=>false,
)); ?>

	
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
	$_totales = Yii::app()->cyaApi->calculaSaldo($key,$idpersona);
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
	<li><?php echo Yii::app()->cyaui->getLinkConsultarCuenta($idpersona,$key);?></li>
</ul>
	
	<h6>Cuentas pendiente:</h6>
	
<p class='hint'>Escriba el monto que quiere abonar para cada cargo de la lista:</p>
	
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
			array('name'=>'monto', 'header'=>'Monto'
				,'type'=>'money'
				,'htmlOptions'=>array(
						'style'=>'width: 100px; text-align: right;',
					)
				),
			array('name'=>'montoabonado', 'header'=>'Abonado', 'type'=>'money',
				'htmlOptions'=>array('style'=>'width: 100px; text-align: right;')
				),
			array('name'=>'montopendiente', 'header'=>'Pendiente', 'type'=>'money',
				'htmlOptions'=>array('style'=>'width: 100px; text-align: right;'),
				),
			array(
					'name'=>'editbox',
					'header'=>'Monto a Abonar',
					'type'=>'raw',							  // IMPORTANTE:
					'htmlOptions'=>array('class'=>'editbox'), // marca para que ponga el editbox aqui
															  // usada en: _comboEditBoxCGridView
				),
		),
	)); 
	?>	
	
	<?php 
		// va a copiar los valores del POST de las cajas de texto puestas en el CGridView
		// para que via jquery estos valores sean captados y puestos a los textbox
		//
		echo "<div id='hiddenfieldvalues'>";
		$attributes = $model->getAttributes();
		if(count($attributes['monto']) > 0)
		foreach($attributes['monto'] as $m=>$v)
			echo CHtml::hiddenField('monto_'.$m,$v);
		echo "</div>";
	?>
	<script>_comboEditBoxCGridView();</script>
	
	<div class="row buttons">
		<?php 
			$this->widget('bootstrap.widgets.BootButton'
				, array(
					'buttonType'=>'submit', 
					'type'=>'primary', 
					'icon'=>'ok white', 
					'label'=>'Siguiente',
					'size'=>'small',
				)
			);
		?>
	</div>
	
	<?php echo $form->errorSummary($model); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->