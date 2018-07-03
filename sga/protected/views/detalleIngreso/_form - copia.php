<?php
/* @var $this DetalleIngresoController */
/* @var $model DetalleIngreso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detalle-ingreso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos Con <span class="required">*</span> Son Requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idingreso'); ?>
		<?php echo $form->textField($model,'idingreso'); ?>
		<?php echo $form->error($model,'idingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idarticulo'); ?>
		<?php echo $form->textField($model,'idarticulo'); ?>
		<?php echo $form->error($model,'idarticulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio_compra'); ?>
		<?php echo $form->textField($model,'precio_compra',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'precio_compra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio_venta'); ?>
		<?php echo $form->textField($model,'precio_venta',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'precio_venta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stock_actual'); ?>
		<?php echo $form->textField($model,'stock_actual'); ?>
		<?php echo $form->error($model,'stock_actual'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha de Produccion'); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
   'model'=>$model,
   'attribute'=>'fecha_produccion',
   'value'=>$model->fecha_produccion,
   'language' => 'es',
   'htmlOptions' => array('readonly'=>"readonly"),
   'options'=>array(
    'autoSize'=>true,
    'defaultDate'=>$model->fecha_produccion,
    'dateFormat'=>'yy-mm-dd',
    
    'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
    'showOn'=>'button', // 'focus', 'button', 'both'
    'buttonText'=>Yii::t('ui','Fecha de Produccion'),
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
	</div>

	<div class="row">
      <?php echo $form->labelEx($model,'fecha de vencimiento'); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
   'model'=>$model,
   'attribute'=>'fecha_vencimiento',
   'value'=>$model->fecha_vencimiento,
   'language' => 'es',
   'htmlOptions' => array('readonly'=>"readonly"),
   'options'=>array(
    'autoSize'=>true,
    'defaultDate'=>$model->fecha_vencimiento,
    'dateFormat'=>'yy-mm-dd',
    
    'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
    'showOn'=>'button', // 'focus', 'button', 'both'
    'buttonText'=>Yii::t('ui','Fecha de vencimiento'),
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
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->