<?php
/* @var $this ImpuestoController */
/* @var $model Impuesto */

$this->breadcrumbs=array(
	'Impuestos'=>array('index'),
	$model->idimpuesto=>array('view','id'=>$model->idimpuesto),
	'Update',
);


?>

<h1>Actualizar Impuesto <?php echo $model->idimpuesto; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>