<?php
/* @var $this CosechaController */
/* @var $model Cosecha */

$this->breadcrumbs=array(
	'Cosechas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cosecha', 'url'=>array('index')),
	array('label'=>'Manage Cosecha', 'url'=>array('admin')),
);
?>

<h1>Crear Cosecha</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>