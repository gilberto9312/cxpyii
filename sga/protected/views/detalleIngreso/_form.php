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
	'enableAjaxValidation'=>true,
)); ?>

    <table align="left", cellpadding="0", cellspacing="1", id="tabla" class="table">


<tr>

<th>
        <?php echo $form->labelEx($model,'idarticulo'); ?>
</th>
<th>
    <?php echo $form->labelEx($model,'precio_compra'); ?>
</th>
<th>
    <?php echo $form->labelEx($model,'precio_venta'); ?>


    <?php echo $form->error($model,'precio_venta'); ?>
  
</th>
  <th>
    <?php echo $form->labelEx($model,'stock_actual'); ?>
  

    <?php echo $form->error($model,'stock_actual'); ?>
  
</th>

</tr>


<td>

    <?php $this->widget('ext.widgets.autocomplete.XJuiAutoComplete', array(
        'model'=>$model,
        'attribute'=>"idarticulo",
        'source'=>$this->createUrl('request/suggestCountry2'),
            'htmlOptions'=>array(
        'size'=>'10'
    ),

    )); ?>

</td>
<td>
    <?php echo $form->textField($model,'precio_compra',array('size'=>10,'maxlength'=>18)); ?>
</td>
<td>
    <?php echo $form->textField($model,'precio_venta',array('size'=>10,'maxlength'=>10)); ?>
</td>
  <td>
    <?php echo $form->textField($model,'stock_actual', array('size'=>10)); ?>
  </td>



</table>



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