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




<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gastos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con<span class="required">*</span> Son Requeridos.</p>
<div class="form">

  <?php 
$this->widget('zii.widgets.jui.CJuiButton', array(
    'buttonType'=>'button',
    'name'=>'btnClick',
    'caption'=>'+ Proveedor',
    'onclick'=>'js:function(){ $("#Proveedor1").dialog("open"); return false;}',
));

?>

	<?php echo $form->errorSummary(array($model,)); ?>
  <div  class="row">


    <?php echo $form->labelEx($model,'idtrabajador'); ?>
    <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'idtrabajador',
    'id'=>'idtrabajador',
    'name'=>'idtrabajador',
    'source'=>$this->createUrl('request/suggestCountryt'),
    'htmlOptions'=>array(
        'size'=>'20'
    ),
)); ?>
    <?php echo $form->error($model,'idtrabajador'); ?>
  
    <?php echo $form->labelEx($model,'idcosecha'); ?>
    <?php 
 $catalogo = new CDbCriteria;
 // Preparamos los parámetros de búsqueda
 $catalogo->order = 'idcosecha ASC';
 // ordenamos alfabéticamente
 echo $form->dropDownList($model,'idcosecha',
 // id es el nombre del campo en el modelo
 CHtml::listData(Cosecha::model()->findAll($catalogo),
 // Cosecha es el modelo en el que se buscaran los datos
 'idcosecha','nombre_cosecha'));
 // id es el dato que se quiere guardar y
 // nombre lo que se quiere mostrar
     ?>



    <?php echo $form->error($model,'idcosecha'); ?>


 </div>
       
 

<div class="row">


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
<?php echo $form->dropDownList($model, 'tipo_comprobante', array('NtaEnt'=>'Nota de Entrega', 'FacVta'=>'Factura de Venta')); ?>
        <?php echo $form->error($model,'tipo_comprobante'); ?>

</div>
<div>
		

    <?php echo $form->labelEx($model,'serie'); ?>
    <?php echo $form->textField($model,'serie',array('size'=>4,'maxlength'=>4)); ?>
    <?php echo $form->error($model,'serie'); ?>
    <?php echo $form->labelEx($model,'correlativo'); ?>
    <?php echo $form->textField($model,'correlativo',array('size'=>7,'maxlength'=>7)); ?>
    <?php echo $form->error($model,'correlativo'); ?>
    </div>

    <p></p>

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

    <?php echo $form->labelEx($model,'estado'); ?>
 <?php echo $form->dropDownList($model, 'estado', array('CXP'=>'Credito', 'contado'=>'Contado')); ?>
    <?php echo $form->error($model,'estado'); ?>
  
    </div>
	

<p></p>




  <div class="row">
    <?php echo $form->labelEx($model,'base_imponible'); ?>
    <?php echo $form->textField($model,'base_imponible'); ?>
    <?php echo $form->error($model,'base_imponible'); ?>

    <?php echo $form->labelEx($model,'total'); ?>
    <?php echo $form->textField($model,'total'); ?>
    <?php echo $form->error($model,'total'); ?>
  
  </div>
  <div>
  <a>Forma De Pago</a>
  <br>
  <br>
<?php $form=$this->beginWidget('ext.widgets.form.XDynamicForm', array(
    'id'=>'dynamic-form-dropdown',
    'enableRadioToggle'=>false,
    'enableChecboxToggle'=>false
)); ?>
<div class="action">
        <div class="action">
        <?php echo $form->DynamicDropDownList($model, 'idbanco', array('1'=>'SI', '0'=>'NO'));?>
    </div>
    </div>

    
    <div class="complex">

        <div class="panel">

        </div>
    </div>
    

   


<?php $this->endWidget(); ?>
  </div>


<div class="buttons">
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
