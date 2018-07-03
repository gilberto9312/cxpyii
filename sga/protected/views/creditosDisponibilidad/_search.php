<?php
/* @var $this CreditosDisponibilidadController */
/* @var $model CreditosDisponibilidad */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idcredito'); ?>
		<?php echo $form->textField($model,'idcredito'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credito'); ?>
		<?php echo $form->textField($model,'credito'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idingreso'); ?>
		<?php echo $form->textField($model,'idingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_deposito'); ?>
		<?php echo $form->textField($model,'num_deposito',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_transanccion'); ?>
		<?php echo $form->textField($model,'tipo_transanccion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->