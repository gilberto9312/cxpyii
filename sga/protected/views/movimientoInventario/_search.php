<?php
/* @var $this MovimientoInventarioController */
/* @var $model MovimientoInventario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idmovimiento_inventario'); ?>
		<?php echo $form->textField($model,'idmovimiento_inventario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idtipomovimiento'); ?>
		<?php echo $form->textField($model,'idtipomovimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idarticulo'); ?>
		<?php echo $form->textField($model,'idarticulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->