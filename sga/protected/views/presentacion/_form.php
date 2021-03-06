<?php
/* @var $this PresentacionController */
/* @var $model Presentacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'presentacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos Con <span class="required">*</span> Son Requerido</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="simple">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>50, 'maxlength'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
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
        ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->