<?php
/* @var $this CreditosDisponibilidadController */
/* @var $model CreditosDisponibilidad */

$this->breadcrumbs=array(
	'Creditos Disponibilidads'=>array('index'),
	'Create',
);

?>

<h1>Agregar depositos o transferencias</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>