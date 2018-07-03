<?php
/* @var $this RecoleccionController */
/* @var $model Recoleccion */

$this->breadcrumbs=array(
	'Recoleccions'=>array('index'),
	$model->idrecoleccion=>array('view','id'=>$model->idrecoleccion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Recoleccion', 'url'=>array('index')),
	array('label'=>'Create Recoleccion', 'url'=>array('create')),
	array('label'=>'View Recoleccion', 'url'=>array('view', 'id'=>$model->idrecoleccion)),
	array('label'=>'Manage Recoleccion', 'url'=>array('admin')),
);
?>

<h1>Update Recoleccion <?php echo $model->idrecoleccion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>