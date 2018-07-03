 
<script type="text/javascript">
$(function(){
$("#datepicker").datepicker();
});
</script>

<div class="simple">
<?php $this->widget('ext.widgets.autocomplete.XJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'[index]idarticulo',

    'source'=>$this->createUrl('/request/suggestCountry2'),
    'htmlOptions'=>array(
        'size'=>'18'
    ),
)); ?>
<?php echo CHtml::activeTextField ($model,'[index]precio_compra',array('size'=>18,'maxlength'=>18));
?>

<?php echo CHtml::activeTextField ($model,'[index]precio_venta',array('size'=>18,'maxlength'=>18)); ?>
  
<?php echo CHtml::activeTextField($model,'[index]stock_actual'); ?>

<tr> <input type="text" id="datepicker"  width="5"> </tr>



  
</div>

