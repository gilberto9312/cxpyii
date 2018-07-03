<?php
/* @var $this HistoriaController */
/* @var $model Historia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idhistoria'); ?>
		<?php echo $form->textField($model,'idhistoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idproveedor'); ?>
		<?php echo $form->textField($model,'idproveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcuenta'); ?>
		<?php echo $form->textField($model,'idcuenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'concepto'); ?>
		<?php echo $form->textField($model,'concepto',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->