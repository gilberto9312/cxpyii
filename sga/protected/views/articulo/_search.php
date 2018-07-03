<?php
/* @var $this ArticuloController */
/* @var $model Articulo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="simple">
		<?php echo $form->label($model,'idarticulo'); ?>
		<?php echo $form->textField($model,'idarticulo'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>3, 'cols'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'imagen'); ?>
		<?php echo $form->textField($model,'imagen',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'uso_interno'); ?>
		<?php echo $form->textField($model,'uso_interno',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'idcategoria'); ?>
		<?php echo $form->textField($model,'idcategoria'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'idpresentacion'); ?>
		<?php echo $form->textField($model,'idpresentacion'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'cod_impuesto'); ?>
		<?php echo $form->textField($model,'cod_impuesto',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row buttons">
		<?php 

        $this->widget('zii.widgets.jui.CJuiButton', array(
        'buttonType'=>'submit',
        'name'=>'btnBuscar',
        'value'=>'1',
        'caption'=>'Buscar',
        'htmlOptions'=>array('class'=>'ui-button-primary')
    ));
        ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->