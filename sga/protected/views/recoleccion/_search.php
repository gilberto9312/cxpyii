<?php
/* @var $this RecoleccionController */
/* @var $model Recoleccion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="simple">
		<?php echo $form->label($model,'idcosecha'); ?>
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
	</div>







	<div class="row buttons">
				<?php 

        $this->widget('zii.widgets.jui.CJuiButton', array(
        'buttonType'=>'submit',
        'name'=>'btnBuscar',
        'value'=>'1',
        'caption'=>'Buscar',
        'htmlOptions'=>array('class'=>'ui-button-primary')
    ));
        ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->