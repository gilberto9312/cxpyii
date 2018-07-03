<?php
/* @var $this MovimientoInventarioController */
/* @var $model MovimientoInventario */

$this->breadcrumbs=array(
	'Movimiento Inventarios'=>array('index'),
	$model->idmovimiento_inventario=>array('view','id'=>$model->idmovimiento_inventario),
	'Update',
);

$this->menu=array(
	array('label'=>'List MovimientoInventario', 'url'=>array('index')),
	array('label'=>'Create MovimientoInventario', 'url'=>array('create')),
	array('label'=>'View MovimientoInventario', 'url'=>array('view', 'id'=>$model->idmovimiento_inventario)),
	array('label'=>'Manage MovimientoInventario', 'url'=>array('admin')),
);
?>

<h1>Update MovimientoInventario <?php echo $model->idmovimiento_inventario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>