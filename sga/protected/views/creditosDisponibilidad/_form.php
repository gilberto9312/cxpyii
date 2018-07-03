<?php
/* @var $this CreditosDisponibilidadController */
/* @var $model CreditosDisponibilidad */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'creditos-disponibilidad-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Todos los datos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credito'); ?>
		<?php echo $form->textField($model,'credito'); ?>
		<?php echo $form->error($model,'credito'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'num_deposito'); ?>
		<?php echo $form->textField($model,'num_deposito',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'num_deposito'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_transanccion'); ?>
    <?php echo $form->dropDownList($model, 'tipo_transanccion', array('Transferencia'=>'Transferencia', 'Deposito'=>'Deposito')); ?>
		<?php echo $form->error($model,'tipo_transanccion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->