<?php
/* @var $this ProveedorController */
/* @var $model Proveedor */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="simple">
		<?php echo $form->label($model,'idproveedor'); ?>
		<?php echo $form->textField($model,'idproveedor'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'razon_social'); ?>
		<?php echo $form->textField($model,'razon_social',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'sector_comercial'); ?>
		<?php echo $form->textField($model,'sector_comercial',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'tipo_documento'); ?>
		<?php echo $form->textField($model,'tipo_documento',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'num_documento'); ?>
		<?php echo $form->textField($model,'num_documento',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		     <?php   $this->widget('zii.widgets.jui.CJuiButton', array(
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