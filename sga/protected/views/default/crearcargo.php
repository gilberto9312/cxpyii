<div class="form">

<h1>Crear un Cargo a Cuenta</h1>

<p class='hint'>
	Un cargo a cuenta es un monto que se le va quedar debiendo bajo un concepto a la persona natural o juridica
	seleccionada a continuacion.
</p>

<hr/>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'crearcargo-form',
	'enableAjaxValidation'=>false,
)); ?>

	
	
	<div class="row">
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
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'concepto'); ?>
		<?php echo $form->textField($model,'concepto',array('maxlength'=>512,'size'=>45)); ?>
		<?php echo $form->error($model,'concepto'); ?>
		<p class='hint'>Ejemplos: "Comision por buen desempeño", "Retorno de gastos", "factura de servicio abc"</p>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha',array('maxlength'=>10)); ?>
		<?php echo $form->error($model,'fecha'); ?>
		<p class='hint'>Es la fecha para la cual aplica este cargo</p>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto',array('maxlength'=>7)); ?>
		<?php echo $form->error($model,'monto'); ?>
		<p class='hint'>El valor monetario del cargo. Escriba un valor monetario.</p>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itemno'); ?>
		<?php echo $form->textField($model,'itemno',array('maxlength'=>40)); ?>
		<?php echo $form->error($model,'itemno'); ?>
		<p class='hint'>Puede usar este campo para asociar un numero de recibo o factura a este cargo.</p>
	</div>

	<div class="row buttons">
		<?php 
			$this->widget('bootstrap.widgets.BootButton'
				, array(
					'buttonType'=>'submit', 
					'type'=>'primary', 
					'icon'=>'ok white', 
					'label'=>'Crear Cargo',
					'size'=>'small',
				)
			);
		?>
	</div>
	
	<?php echo $form->errorSummary($model); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->