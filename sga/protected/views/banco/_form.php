<?php
/* @var $this BancoController */
/* @var $model Banco */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banco-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'iddisponibilidad'); ?>
		<?php echo $form->textField($model,'iddisponibilidad'); ?>
		<?php echo $form->error($model,'iddisponibilidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_banco'); ?>
		<?php echo $form->textField($model,'num_banco'); ?>
		<?php echo $form->error($model,'num_banco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'banco'); ?>
		<?php echo $form->textField($model,'banco',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'banco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_cheque'); ?>
		<?php echo $form->textField($model,'num_cheque'); ?>
		<?php echo $form->error($model,'num_cheque'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saldo'); ?>
		<?php echo $form->textField($model,'saldo'); ?>
		<?php echo $form->error($model,'saldo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->