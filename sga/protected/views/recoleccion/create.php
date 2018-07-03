<?php
/* @var $this RecoleccionController */
/* @var $model Recoleccion */

$this->breadcrumbs=array(
	'Recoleccions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Recoleccion', 'url'=>array('index')),
	array('label'=>'Manage Recoleccion', 'url'=>array('admin')),
);
?>

<h1>Create Recoleccion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>