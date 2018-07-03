<?php
/* @var $this ImpuestoController */
/* @var $model Impuesto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'impuesto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_impuesto'); ?>
		<?php echo $form->textField($model,'cod_impuesto',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'cod_impuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_impuesto'); ?>
		<?php echo $form->textField($model,'nombre_impuesto',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'nombre_impuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impuesto'); ?>
		<?php echo $form->textField($model,'impuesto'); ?>
		<?php echo $form->error($model,'impuesto'); ?>
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

</div><!-- form -->