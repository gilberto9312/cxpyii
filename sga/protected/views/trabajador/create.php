<?php
/* @var $this TrabajadorController */
/* @var $model Trabajador */

$this->breadcrumbs=array(
	'Trabajadors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Trabajador', 'url'=>array('index')),
	array('label'=>'Manage Trabajador', 'url'=>array('admin')),
);
?>

<h1>Create Trabajador</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>