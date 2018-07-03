<?php
/* @var $this ImpuestoController */
/* @var $model Impuesto */

$this->breadcrumbs=array(
	'Impuestos'=>array('index'),
	'Crear',
);

?>

<h1>Crear Impuesto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>