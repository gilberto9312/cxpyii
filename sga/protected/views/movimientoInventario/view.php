<?php
/* @var $this MovimientoInventarioController */
/* @var $model MovimientoInventario */

$this->breadcrumbs=array(
	'Movimiento Inventarios'=>array('index'),
	$model->idmovimiento_inventario,
);

$this->menu=array(
	array('label'=>'List MovimientoInventario', 'url'=>array('index')),
	array('label'=>'Create MovimientoInventario', 'url'=>array('create')),
	array('label'=>'Update MovimientoInventario', 'url'=>array('update', 'id'=>$model->idmovimiento_inventario)),
	array('label'=>'Delete MovimientoInventario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idmovimiento_inventario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MovimientoInventario', 'url'=>array('admin')),
);
?>

<h1>View MovimientoInventario #<?php echo $model->idmovimiento_inventario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idmovimiento_inventario',
		'idtipomovimiento',
		'idarticulo',
		'cantidad',
		'descripcion',
	),
)); ?>
