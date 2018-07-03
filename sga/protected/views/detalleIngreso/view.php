<?php
/* @var $this DetalleIngresoController */
/* @var $model DetalleIngreso */

$this->breadcrumbs=array(
	'Insertar otro Detalle' =>array('create','id'=>$model->idingreso),
	'Vista de detalle'
);


?>
<h1>Lista Detalle Gastos #<?php echo $model->iddetalle_ingreso; ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'iddetalle_ingreso',
		'idingreso',
		'idarticulo',
		'precio_compra',
		'precio_venta',
		'stock_actual',
		'fecha_produccion',
		'fecha_vencimiento',
	),
)); ?>
