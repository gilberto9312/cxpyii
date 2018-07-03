
<td>


	<div class="simple">
    <?php $this->widget('ext.widgets.autocomplete.XJuiAutoComplete', array(
        'model'=>$model,
        'attribute'=>"[$index]idarticulo",
        'source'=>$this->createUrl('request/suggestCountry2'),
         'htmlOptions'=>array(
        'size'=>'10'
    ),

    )); ?>
</td>
<td>
<?php echo CHtml::activeTextField ($model,'[$index]precio_compra',array('size'=>10,'maxlength'=>18));
?>
</td>

<td>
<?php echo CHtml::activeTextField ($model,'[$index]precio_venta',array('size'=>10,'maxlength'=>18)); ?>
</td>
<td>
<?php echo CHtml::activeTextField ($model,'[$index]stock_actual',array('size'=>10,'maxlength'=>18)); ?>
</td>
