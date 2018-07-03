<?php
/* @var $this TrabajadorController */
/* @var $model Trabajador */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="simple">
		<?php echo $form->labelEx($model,'num_documento'); ?>
		<?php echo $form->textField($model,'num_documento',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'num_documento'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textArea($model, 'direccion', array('maxlength' => 60, 'rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'acceso'); ?>
		<?php echo $form->dropDownList($model, 'acceso', array('admin'=>'Especial', 'noadmin'=>'Normal')); ?>
		<?php echo $form->error($model,'acceso'); ?>
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

</div><!-- search-form -->