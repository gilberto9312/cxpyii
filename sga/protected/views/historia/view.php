<?php
/* @var $this HistoriaController */
/* @var $model Historia */

$this->breadcrumbs=array(
	'Historias'=>array('index'),
	$model->idhistoria,
);

$this->menu=array(
	array('label'=>'List Historia', 'url'=>array('index')),
	array('label'=>'Create Historia', 'url'=>array('create')),
	array('label'=>'Update Historia', 'url'=>array('update', 'id'=>$model->idhistoria)),
	array('label'=>'Delete Historia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhistoria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Historia', 'url'=>array('admin')),
);
?>

<h1>View Historia #<?php echo $model->idhistoria; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idhistoria',
		'idproveedor',
		'idcuenta',
		'concepto',
		'total',
	),
)); ?>
