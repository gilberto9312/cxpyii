<?php
/* @var $this CosechaController */
/* @var $model Cosecha */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cosecha-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con <span class="required">*</span> Son Requeridos.</p>

	<?php echo $form->errorSummary($model); ?>


      <div class="simple">
        <?php echo $form->labelEx($model,'nombre_cosecha'); ?>
        <?php echo $form->textField($model,'nombre_cosecha'); ?>
        <?php echo $form->error($model,'nombre_cosecha'); ?>
    </div>

	<div class="simple">
		<?php echo $form->labelEx($model,'fecha_inicio'); ?>

		
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
   'model'=>$model,
   'attribute'=>'fecha_inicio',
   'value'=>$model->fecha_inicio,
   'language' => 'es',
   'htmlOptions' => array('readonly'=>"readonly"),
   'options'=>array(
    'autoSize'=>true,
    'defaultDate'=>$model->fecha_inicio,
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
		<?php echo $form->error($model,'fecha_inicio'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'fecha_fin'); ?>

<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
   'model'=>$model,
   'attribute'=>'fecha_fin',
   'value'=>$model->fecha_fin,
   'language' => 'es',
   'htmlOptions' => array('readonly'=>"readonly"),
   'options'=>array(
    'autoSize'=>true,
    'defaultDate'=>$model->fecha_fin,
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
		<?php echo $form->error($model,'fecha_fin'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'temporada'); ?>

    <?php echo $form->dropDownList($model, 'temporada', array('VERANO'=>'VERANO', 'INVIERNO'=>'INVIERNO')); ?>
		<?php echo $form->error($model,'temporada'); ?>
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