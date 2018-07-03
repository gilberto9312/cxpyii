<?php
/* @var $this MovimientoInventarioController */
/* @var $model MovimientoInventario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'movimiento-inventario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos Con <span class="required">*</span> Son Requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="simple">
		
		<?php echo $form->hiddenField($model,'idtipomovimiento',array('value'=>'1', 'readonly' => 'true')); ?>
		<?php echo $form->error($model,'idtipomovimiento'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'idarticulo'); ?>
		    <?php $this->widget('ext.widgets.autocomplete.XJuiAutoComplete', array(
        'model'=>$model,
        'attribute'=>"idarticulo",
        'source'=>$this->createUrl('request/suggestMovimiento'),
            'htmlOptions'=>array(
        'size'=>'10'
    ),

    )); ?>
		<?php echo $form->error($model,'idarticulo'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
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