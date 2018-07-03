<?php
/* @var $this DetalleIngresoController */
/* @var $model DetalleIngreso */

$this->breadcrumbs=array(
	'Detalle Ingresos'=>array('index'),
	$model->iddetalle_ingreso=>array('view','id'=>$model->iddetalle_ingreso),
	'Update',
);

$this->menu=array(
	array('label'=>'List DetalleIngreso', 'url'=>array('index')),
	array('label'=>'Create DetalleIngreso', 'url'=>array('create')),
	array('label'=>'View DetalleIngreso', 'url'=>array('view', 'id'=>$model->iddetalle_ingreso)),
	array('label'=>'Manage DetalleIngreso', 'url'=>array('admin')),
);
?>

<h1>Update DetalleIngreso <?php echo $model->iddetalle_ingreso; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>