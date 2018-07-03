<?php
/* @var $this HistoriaController */
/* @var $model Historia */

$this->breadcrumbs=array(
	'CXP'=>array('/cuenta/admin'),
	
);


?>
<script type="text/javascript">
function refreshList()
{
$.fn.yiiGridView.update("historia-grid");
}
var interval = setInterval("refreshList()", 3000);
</script>

<h1>Crear Historia De Abono</h1>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</br>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'historia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idhistoria',
		'idproveedor',
		'idcuenta',
		'concepto',
		'total',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>