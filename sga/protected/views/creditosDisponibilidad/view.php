<?php
/* @var $this CreditosDisponibilidadController */
/* @var $model CreditosDisponibilidad */

$this->breadcrumbs=array(
	'Creditos Disponibilidads'=>array('index'),
	$model->idcredito,
);

$this->menu=array(
	array('label'=>'List CreditosDisponibilidad', 'url'=>array('index')),
	array('label'=>'Create CreditosDisponibilidad', 'url'=>array('create')),
	array('label'=>'Update CreditosDisponibilidad', 'url'=>array('update', 'id'=>$model->idcredito)),
	array('label'=>'Delete CreditosDisponibilidad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcredito),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CreditosDisponibilidad', 'url'=>array('admin')),
);
?>

<h1>View CreditosDisponibilidad #<?php echo $model->idcredito; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idcredito',
		'tipo',
		'credito',
		'num_deposito',
		'tipo_transanccion',
	),
)); ?>
