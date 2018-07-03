<?php
/* @var $this TrabajadorController */
/* @var $model Trabajador */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trabajador-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos Con <span class="required">*</span> Son Requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="simple">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'apellidos'); ?>
		<?php echo $form->textField($model,'apellidos',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'apellidos'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'sexo'); ?>
		<?php echo $form->dropDownList($model, 'sexo', array('M'=>'Masculino', 'F'=>'Femenino')); ?>
		<?php echo $form->error($model,'sexo'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'fecha_nac'); ?>
		
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
   'model'=>$model,
   'attribute'=>'fecha_nac',
   'value'=>$model->fecha_nac,
   'language' => 'es',
   'htmlOptions' => array('readonly'=>"readonly"),
   'options'=>array(
    'autoSize'=>true,
    'defaultDate'=>$model->fecha_nac,
    'dateFormat'=>'yy-mm-dd',
    
    'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
    'showOn'=>'button', // 'focus', 'button', 'both'
    'buttonText'=>Yii::t('ui','Fecha de la Factura'),
    'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
    'buttonImageOnly'=>true,
    'selectOtherMonths'=>true,
    
    'showButtonPanel'=>true,
    'showOn'=>'button',
    'showOtherMonths'=>true, 
    'changeMonth' => 'true', 
    'changeYear' => 'true', 
    'maxDate'=> "+20Y",
    ),
  )); 
 ?>


		<?php echo $form->error($model,'fecha_nac'); ?>
	</div>

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

</div><!-- form -->