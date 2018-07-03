<?php
/* @var $this CuentaController */
/* @var $model Cuenta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cuenta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idcosecha'); ?>
		<?php echo $form->textField($model,'idcosecha'); ?>
		<?php echo $form->error($model,'idcosecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idtrabajador'); ?>
		<?php echo $form->textField($model,'idtrabajador'); ?>
		<?php echo $form->error($model,'idtrabajador'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idproveedor'); ?>
		<?php echo $form->textField($model,'idproveedor'); ?>
		<?php echo $form->error($model,'idproveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_comprobante'); ?>
		<?php echo $form->textField($model,'tipo_comprobante',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tipo_comprobante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'serie'); ?>
		<?php echo $form->textField($model,'serie',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'serie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correlativo'); ?>
		<?php echo $form->textField($model,'correlativo',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'correlativo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'base_imponible'); ?>
		<?php echo $form->textField($model,'base_imponible'); ?>
		<?php echo $form->error($model,'base_imponible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->