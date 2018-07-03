<?php
/* @var $this GastosController */
/* @var $model Gastos */
/* @var $form CActiveForm */

/*	<div class="row">
		<?php echo $form->labelEx($model_detalle,'idingreso'); ?>
		<?php echo $form->textField($model_detalle,'idingreso'); ?>
		<?php echo $form->error($model_detalle,'idingreso'); ?>
	</div>*/

?>

<div class="form">



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gastos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con<span class="required">*</span> Son Requeridos.</p>

  <?php 
echo Chtml::link('Añadir Proveedor si no existe','',array('onclick'=>'$("#prueba").dialog("open"); return false; ')); 
?>

	<?php echo $form->errorSummary(array($model, $model_detalle)); ?>
  <div  class="row">
	   <?php echo $form->labelEx($model,'idtrabajador'); ?>
    <?php echo $form->textField($model,'idtrabajador',array('size'=>10,'maxlength'=>20)); ?>
    <?php echo $form->error($model,'idtrabajador'); ?>
  
		
<?php echo $form->labelEx($model,'fecha'); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
   'model'=>$model,
   'attribute'=>'fecha',
   'value'=>$model->fecha,
   'language' => 'es',
   'htmlOptions' => array('readonly'=>"readonly"),
   'options'=>array(
    'autoSize'=>true,
    'defaultDate'=>$model->fecha,
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
 	
		<?php echo $form->labelEx($model,'tipo_comprobante'); ?>
		<?php echo $form->textField($model,'tipo_comprobante',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tipo_comprobante'); ?>
	
	</div>
	<div class="row">


		<?php echo $form->labelEx($model,'idproveedor'); ?>
<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'idproveedor',
    'id'=>'idproveedor',
    'name'=>'idproveedor',
    'source'=>$this->createUrl('request/suggestCountry'),
    'htmlOptions'=>array(
        'size'=>'20'
    ),
)); ?>
		<?php echo $form->error($model,'idproveedor'); ?>

    <?php echo $form->labelEx($model,'serie'); ?>
    <?php echo $form->textField($model,'serie',array('size'=>4,'maxlength'=>4)); ?>
    <?php echo $form->error($model,'serie'); ?>
    <?php echo $form->labelEx($model,'correlativo'); ?>
    <?php echo $form->textField($model,'correlativo',array('size'=>7,'maxlength'=>7)); ?>
    <?php echo $form->error($model,'correlativo'); ?>

    <?php echo $form->labelEx($model,'estado'); ?>
    <?php echo $form->textField($model,'estado',array('size'=>7,'maxlength'=>7)); ?>
    <?php echo $form->error($model,'estado'); ?>
  

	</div>

<div class="table">
	<table align="left", cellpadding="0", cellspacing="1", id="tabla">


<tr>

<th>
		<?php echo $form->labelEx($model_detalle,'idarticulo'); ?>
</th>
<th>
    <?php echo $form->labelEx($model_detalle,'precio_compra'); ?>
</th>
<th>
    <?php echo $form->labelEx($model_detalle,'precio_venta'); ?>


    <?php echo $form->error($model_detalle,'precio_venta'); ?>
  
</th>
  <th>
    <?php echo $form->labelEx($model_detalle,'stock_actual'); ?>
  

    <?php echo $form->error($model_detalle,'stock_actual'); ?>
  
</th>
  <th>
    <?php echo $form->labelEx($model_detalle,'Fecha de Produccion'); ?>
  
  
</th>
<th>
      <?php echo $form->labelEx($model_detalle,'fecha de vencimiento'); ?>


</th>
</tr>
<td>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model_detalle,
    'attribute'=>'idarticulo',
    'id'=>'idarticulo',
    'name'=>'idarticulo',
    'source'=>$this->createUrl('request/suggestCountry2'),
    'htmlOptions'=>array(
        'size'=>'20'
    ),
)); ?>
</td>
<td>
    <?php echo $form->textField($model_detalle,'precio_compra',array('size'=>18,'maxlength'=>18)); ?>
</td>
<td>
    <?php echo $form->textField($model_detalle,'precio_venta',array('size'=>18,'maxlength'=>18)); ?>
</td>
  <td>
    <?php echo $form->textField($model_detalle,'stock_actual'); ?>
  </td>
  <td>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
   'model'=>$model_detalle,
   'attribute'=>'fecha_produccion',
   'value'=>$model_detalle->fecha_produccion,
   'language' => 'es',
   'htmlOptions' => array('readonly'=>"readonly"),
   'options'=>array(
    'autoSize'=>true,
    'defaultDate'=>$model_detalle->fecha_produccion,
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
   'model'=>$model_detalle,
   'attribute'=>'fecha_vencimiento',
   'value'=>$model_detalle->fecha_vencimiento,
   'language' => 'es',
   'htmlOptions' => array('readonly'=>"readonly"),
   'options'=>array(
    'autoSize'=>true,
    'defaultDate'=>$model_detalle->fecha_vencimiento,
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


		<?php echo $form->error($model_detalle,'idarticulo'); ?>


<tr>


		<?php echo $form->error($model_detalle,'precio_compra'); ?>
</tr>


</table>
<div>
  <?php $this->widget('ext.widgets.tabularinput.XTabularInput',array(
    //'models'=>$model,
    'inputView'=>'detalleIngreso/_form',
    'inputUrl'=>$this->createUrl('request/addTabularInputs'),
    'removeTemplate'=>'{link}',
    'addTemplate'=>'{link}',
  )); ?>
</div>
</div>

  <div class="row">
    <?php echo $form->labelEx($model,'base_imponible'); ?>
    <?php echo $form->textField($model,'base_imponible'); ?>
    <?php echo $form->error($model,'base_imponible'); ?>

    <?php echo $form->labelEx($model,'total'); ?>
    <?php echo $form->textField($model,'total'); ?>
    <?php echo $form->error($model,'total'); ?>
  </div>



		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
