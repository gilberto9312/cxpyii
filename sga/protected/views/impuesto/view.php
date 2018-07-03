<?php
/* @var $this ImpuestoController */
/* @var $model Impuesto */

$this->breadcrumbs=array(
	'Impuestos'=>array('index'),
	$model->idimpuesto,
);


?>

<h1>Ver Impuesto</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idimpuesto',
		'cod_impuesto',
		'nombre_impuesto',
		'impuesto',
	),
)); ?>
