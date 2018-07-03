<?php
/* @var $this DetalleIngresoController */
/* @var $model DetalleIngreso */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'iddetalle_ingreso'); ?>
		<?php echo $form->textField($model,'iddetalle_ingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idingreso'); ?>
		<?php echo $form->textField($model,'idingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idarticulo'); ?>
		<?php echo $form->textField($model,'idarticulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precio_compra'); ?>
		<?php echo $form->textField($model,'precio_compra',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precio_venta'); ?>
		<?php echo $form->textField($model,'precio_venta',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stock_actual'); ?>
		<?php echo $form->textField($model,'stock_actual'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_produccion'); ?>
		<?php echo $form->textField($model,'fecha_produccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_vencimiento'); ?>
		<?php echo $form->textField($model,'fecha_vencimiento'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->