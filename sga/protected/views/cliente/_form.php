<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cliente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con <span class="required">*</span> Son Requeridos.</p>

	<?php echo $form->errorSummary($model); ?>





	<div class="simple">
		<?php echo $form->labelEx($model,'tipo_documento'); ?>
		<?php echo $form->dropDownList($model, 'tipo_documento', array('V'=>'V', 'J'=>'J', 'G'=>'G', 'E'=>'E')); ?>
		<?php echo $form->error($model,'tipo_documento'); ?>

		<?php echo $form->textField($model,'num_documento',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'num_documento'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'razon_social'); ?>
		<?php echo $form->textField($model,'razon_social',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'razon_social'); ?>
	</div>
		<div class="simple">
		<?php echo $form->labelEx($model,'tipo_contribuyente'); ?>
		 <?php 
 $catImp = new CDbCriteria;
 // Preparamos los parámetros de búsqueda
 $catImp->order = 'idtipocontribuyente ASC';
 // ordenamos alfabéticamente
 echo $form->dropDownList($model,'idtipocontribuyente',
 // id es el nombre del campo en el modelo
 CHtml::listData(TipoContribuyente::model()->findAll($catImp),
 // Cosecha es el modelo en el que se buscaran los datos
 'idtipocontribuyente','nombre'));
 // id es el dato que se quiere guardar y
 // nombre lo que se quiere mostrar
     ?>

		<?php echo $form->error($model,'tipo_contribuyente'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textArea($model,'direccion',array('size'=>30,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
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