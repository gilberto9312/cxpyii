<?php
/* @var $this RecoleccionController */
/* @var $model Recoleccion */

$this->breadcrumbs=array(
	'Recoleccions'=>array('index'),
	$model->idrecoleccion,
);

$this->menu=array(
	array('label'=>'List Recoleccion', 'url'=>array('index')),
	array('label'=>'Create Recoleccion', 'url'=>array('create')),
	array('label'=>'Update Recoleccion', 'url'=>array('update', 'id'=>$model->idrecoleccion)),
	array('label'=>'Delete Recoleccion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrecoleccion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Recoleccion', 'url'=>array('admin')),
);
?>

<h1>View Recoleccion #<?php echo $model->idrecoleccion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idrecoleccion',
		'idcosecha',
		'idarticulo',
		'fecha_recolecta',
		'fecha_vencimiento',
		'comentario',
		'idtipomovimiento',
		'cantidad_recogida',
	),
)); ?>
