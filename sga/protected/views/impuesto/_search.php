<?php
/* @var $this ImpuestoController */
/* @var $model Impuesto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="simple">
		<?php echo $form->label($model,'idimpuesto'); ?>
		<?php echo $form->textField($model,'idimpuesto'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'cod_impuesto'); ?>
		<?php echo $form->textField($model,'cod_impuesto',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'nombre_impuesto'); ?>
		<?php echo $form->textField($model,'nombre_impuesto',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'impuesto'); ?>
		<?php echo $form->textField($model,'impuesto'); ?>
	</div>

	<div class="row buttons">
						<?php 

        $this->widget('zii.widgets.jui.CJuiButton', array(
        'buttonType'=>'submit',
        'name'=>'bntGuardar',
        'value'=>'1',
        'caption'=>'Guardar',
        'htmlOptions'=>array('class'=>'ui-button-primary')
    ));
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->