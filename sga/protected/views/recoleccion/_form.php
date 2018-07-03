<?php
/* @var $this RecoleccionController */
/* @var $model Recoleccion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recoleccion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos Con <span class="required">*</span> Son Requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="simple">
		<?php echo $form->labelEx($model,'idcosecha'); ?>
				 <?php 
 $catCosecha = new CDbCriteria;
 // Preparamos los parámetros de búsqueda
 $catCosecha->order = 'idcosecha ASC';
 // ordenamos alfabéticamente
 echo $form->dropDownList($model,'idcosecha',
 // id es el nombre del campo en el modelo
 CHtml::listData(cosecha::model()->findAll($catCosecha),
 // Cosecha es el modelo en el que se buscaran los datos
 'idcosecha','nombre_cosecha'));
 // id es el dato que se quiere guardar y
 // nombre lo que se quiere mostrar
     ?>
		<?php echo $form->error($model,'idcosecha'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'idarticulo'); ?>
    <?php $this->widget('ext.widgets.autocomplete.XJuiAutoComplete', array(
        'model'=>$model,
        'attribute'=>"idarticulo",
        'source'=>$this->createUrl('request/suggestCosecha'),
            'htmlOptions'=>array(
        'size'=>'10'
    ),

    )); ?>

		<?php echo $form->error($model,'idarticulo'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'fecha_recolecta'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
   'model'=>$model,
   'attribute'=>'fecha_recolecta',
   'value'=>$model->fecha_recolecta,
   'language' => 'es',
   'htmlOptions' => array('readonly'=>"readonly"),
   'options'=>array(
    'autoSize'=>true,
    'defaultDate'=>$model->fecha_recolecta,
    'dateFormat'=>'yy-mm-dd',
    
    'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
    'showOn'=>'button', // 'focus', 'button', 'both'
    'buttonText'=>Yii::t('ui','Fecha que recogieron el fruto'),
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
		<?php echo $form->error($model,'fecha_recolecta'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'fecha_vencimiento'); ?>
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
    'buttonText'=>Yii::t('ui','Fecha tope para la distribucion'),
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
		<?php echo $form->error($model,'fecha_vencimiento'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	<div class="simple">

		<?php echo $form->hiddenField($model,'idtipomovimiento',array ('value'=>'2','readonly'=>'true')); ?>
		<?php echo $form->error($model,'idtipomovimiento'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'cantidad_recogida'); ?>
		<?php echo $form->textField($model,'cantidad_recogida'); ?>
		<?php echo $form->error($model,'cantidad_recogida'); ?>
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