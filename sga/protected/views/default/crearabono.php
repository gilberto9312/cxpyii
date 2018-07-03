<?php 
	// model: instancia de CyaCrearAbono
	// 
?>
<div class="form">

<h1>Crear un Abono a Cuenta</h1>

<p class='hint'>
	Un abono a cuenta es un monto que se le va a anexar a una persona natural o juridica
	seleccionada a continuacion.
</p>

<hr/>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'crearabono-form',
	'enableAjaxValidation'=>false,
)); ?>

	
<p>
	<?php 
		$this->widget('bootstrap.widgets.BootLabel', array(
			'type'=>'important', // '', 'success', 'warning', 'important', 'info' or 'inverse'
			'label'=>$model->persona['label'],
		));
		echo "&nbsp;&nbsp;&nbsp;";
		$this->widget('bootstrap.widgets.BootLabel', array(
			'type'=>'info', // '', 'success', 'warning', 'important', 'info' or 'inverse'
			'label'=>$model->persona['extra'],
		));
	?>
</p>
	
<p>
<?php 
	$saldo=$totalCargos=$totalAbonos=0;
	$_totales = Yii::app()->cyaApi->calculaSaldo($key,$model->persona['id']);
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

	<div class='row itemsabonando'>
		<h4>Items que esta abonando:</h4>
		<div class='enlace'>
			<?php echo Yii::app()->cyaui->getLinkConsultarCuenta($model->persona['id'],$key);?>
			<p class='hint'>control+click abre en ventana nueva</p>
		</div>
		<ul class='listaitems'>
			<?php 
				foreach($model->montos as $item=>$v){
					if($v != '')
						echo "<li><div class='item'>#$item</div><div class='valor'>"
							.Yii::app()->format->formatMoney($v)."</div></li>";
				}
			?>
		</ul>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'concepto'); ?>
		<?php echo $form->textField($model,'concepto',array('maxlength'=>512,'size'=>45)); ?>
		<?php echo $form->error($model,'concepto'); ?>
		<p class='hint'>Ejemplos: "Pago de comision", "Retorno de gastos", "pago factura de servicio abc"</p>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha',array('maxlength'=>10)); ?>
		<?php echo $form->error($model,'fecha'); ?>
		<p class='hint'>Es la fecha para la cual aplica este abono</p>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto',array('maxlength'=>7,'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'monto'); ?>
		<p class='hint'>El valor monetario del abono. Este valor no se puede modificar porque esta relacionado con la seleccion de cargos que hizo previamente.</p>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itemno'); ?>
		<?php echo $form->textField($model,'itemno',array('maxlength'=>40)); ?>
		<?php echo $form->error($model,'itemno'); ?>
		<p class='hint'>use este campo para asociar numeros de registro o lo que necesite.</p>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'docnum'); ?>
		<?php echo $form->textField($model,'docnum',array('maxlength'=>45)); ?>
		<?php echo $form->error($model,'docnum'); ?>
		<p class='hint'>Numero de cheque, transferencia o deposito.</p>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'doctipo'); ?>
		<?php echo $form->dropDownList($model,'doctipo',array(''=>'-seleccione-')
			+Yii::app()->cyaApi->getTiposDeDoc()); ?>
		<?php echo $form->error($model,'doctipo'); ?>
		<p class='hint'>Tipo de documento con que se hace el abono</p>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'docentidad'); ?>
		<?php echo $form->textField($model,'docentidad',array('maxlength'=>45)); ?>
		<?php echo $form->error($model,'docentidad'); ?>
		<p class='hint'>Nombre del banco.</p>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Volver a la Seleccion de Cargos',array('name'=>'volver')); ?>
		<?php 
			$this->widget('bootstrap.widgets.BootButton'
				, array(
					'buttonType'=>'submit', 
					'type'=>'primary', 
					'icon'=>'ok white', 
					'label'=>'Crear Abono',
					'size'=>'small',
				)
			);
		?>
	</div>
	
	<?php echo $form->errorSummary($model); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->