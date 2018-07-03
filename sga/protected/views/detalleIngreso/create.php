<?php
/* @var $this DetalleIngresoController */
/* @var $model DetalleIngreso */

$this->breadcrumbs=array(
	'Detalle Ingresos'=>array('index'),
	'crear',
);

?>

<h1>Crear Detalle de Gastos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<script type="text/javascript"> 
function refreshList()
{
$.fn.yiiGridView.update("detalle-ingreso-grid");
}
var interval = setInterval("refreshList()", 6000);
</script>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-ingreso-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idingreso',
		'idarticulo',
		'precio_compra',
		'precio_venta',
		'stock_actual',
		/*
		'fecha_produccion',
		'fecha_vencimiento',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>