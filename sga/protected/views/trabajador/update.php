<?php
/* @var $this TrabajadorController */
/* @var $model Trabajador */

$this->breadcrumbs=array(
	'Trabajadors'=>array('index'),
	$model->idtrabajador=>array('view','id'=>$model->idtrabajador),
	'Update',
);

$this->menu=array(
	array('label'=>'List Trabajador', 'url'=>array('index')),
	array('label'=>'Create Trabajador', 'url'=>array('create')),
	array('label'=>'View Trabajador', 'url'=>array('view', 'id'=>$model->idtrabajador)),
	array('label'=>'Manage Trabajador', 'url'=>array('admin')),
);
?>

<h1>Update Trabajador <?php echo $model->idtrabajador; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>