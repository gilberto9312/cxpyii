<?php
/* @var $this ProveedorController */
/* @var $model Proveedor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proveedor-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos Con<span class="required">*</span> Son Requeridos</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="simple">
		<?php echo $form->labelEx($model,'tipo_documento'); ?>
<?php echo $form->dropDownList($model, 'tipo_documento', array('V'=>'V', 'J'=>'J', 'G'=>'G', 'E'=>'E')); ?>
		<?php echo $form->error($model,'tipo_documento'); ?>
	</div>

	<div class="simple">
<?php echo $form->labelEx($model,'num_documento'); ?>

    <?php $this->widget('ext.widgets.autocomplete.XJuiAutoComplete', array(
        'model'=>$model,
        'attribute'=>"num_documento",
        'source'=>$this->createUrl('request/suggestCountry'),
            'htmlOptions'=>array(
        'size'=>'40'
    ),

    )); ?>


		<?php echo $form->error($model,'num_documento'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'razon_social'); ?>
		<?php echo $form->textField($model,'razon_social',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'razon_social'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'sector_comercial'); ?>
		<?php echo $form->textField($model,'sector_comercial',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sector_comercial'); ?>
	</div>


	<div class="simple">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="simple buttons">
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