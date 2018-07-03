<?php
/* @var $this GastosController */
/* @var $model Gastos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="simple">
		<?php echo $form->label($model,'idtrabajador'); ?>
		<?php echo $form->textField($model,'idtrabajador'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'idproveedor'); ?>
		<?php echo $form->textField($model,'idproveedor'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'tipo_comprobante'); ?>
		<?php echo $form->textField($model,'tipo_comprobante',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'serie'); ?>
		<?php echo $form->textField($model,'serie',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'correlativo'); ?>
		<?php echo $form->textField($model,'correlativo',array('size'=>7,'maxlength'=>7)); ?>
	</div>


	<div class="simple">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'base_imponible'); ?>
		<?php echo $form->textField($model,'base_imponible'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
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