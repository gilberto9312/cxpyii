<td>

	<div class="simple">
<?php $this->widget('ext.widgets.autocomplete.XJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'[index]idarticulo',

    'source'=>$this->createUrl('/request/suggestCountry2'),
    'htmlOptions'=>array(
        'size'=>'18'
    ),
)); ?>
</td>
<td>
<?php echo CHtml::activeTextField ($model,'[index]precio_compra',array('size'=>18,'maxlength'=>18));
?>
</td>

<td>
<?php echo CHtml::activeTextField ($model,'[index]precio_venta',array('size'=>18,'maxlength'=>18)); ?>
</td>
<td>
<?php echo CHtml::activeTextField ($model,'[index]stock_actual',array('size'=>18,'maxlength'=>18)); ?>
</td>
<td>
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
  //  'showOn'=>'button', // 'focus', 'button', 'both'
  //  'buttonText'=>Yii::t('ui','Fecha de Produccion'),
   // 'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
  //  'buttonImageOnly'=>true,
    'selectOtherMonths'=>true,
    
    //'showButtonPanel'=>true,
  //  'showOn'=>'button',
    'showOtherMonths'=>true, 
    'changeMonth' => 'true', 
    'changeYear' => 'true', 
    'maxDate'=> "+20Y",
    ),
  )); 
 ?>
</td>

<td>
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
    'selectOtherMonths'=>true,
    
  
    //'showOn'=>'button',
    'showOtherMonths'=>true, 
    'changeMonth' => 'true', 
    'changeYear' => 'true', 
    'maxDate'=> "+20Y",
    ),
  )); 
 ?>
</td>