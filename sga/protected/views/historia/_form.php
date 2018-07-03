<?php
/* @var $this HistoriaController */
/* @var $model Historia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'historia-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="simple">
		<?php echo $form->labelEx($model,'concepto'); ?>
		<?php echo $form->textField($model,'concepto',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'concepto'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row buttons">
		                <?php 

        $this->widget('zii.widgets.jui.CJuiButton', array(
        'buttonType'=>'submit',
        'name'=>'bntGuardar',
        'value'=>'1',
        'caption'=>'Guardar',
        'htmlOptions'=>array('class'=>'ui-button-primary')
    ));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->