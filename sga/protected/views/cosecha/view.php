<?php
/* @var $this CosechaController */
/* @var $model Cosecha */

$this->breadcrumbs=array(
	'Cosechas'=>array('index'),
	$model->idcosecha,
);

$this->menu=array(
	array('label'=>'List Cosecha', 'url'=>array('index')),
	array('label'=>'Create Cosecha', 'url'=>array('create')),
	array('label'=>'Update Cosecha', 'url'=>array('update', 'id'=>$model->idcosecha)),
	array('label'=>'Delete Cosecha', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcosecha),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cosecha', 'url'=>array('admin')),
);
?>

<h1>Ver Cosecha</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idcosecha',
		'fecha_inicio',
		'fecha_fin',
		'temporada',
	),
)); ?>
