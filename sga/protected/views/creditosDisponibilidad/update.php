<?php
/* @var $this CreditosDisponibilidadController */
/* @var $model CreditosDisponibilidad */

$this->breadcrumbs=array(
	'Creditos Disponibilidads'=>array('index'),
	$model->idcredito=>array('view','id'=>$model->idcredito),
	'Update',
);

$this->menu=array(
	array('label'=>'List CreditosDisponibilidad', 'url'=>array('index')),
	array('label'=>'Create CreditosDisponibilidad', 'url'=>array('create')),
	array('label'=>'View CreditosDisponibilidad', 'url'=>array('view', 'id'=>$model->idcredito)),
	array('label'=>'Manage CreditosDisponibilidad', 'url'=>array('admin')),
);
?>

<h1>Update CreditosDisponibilidad <?php echo $model->idcredito; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>