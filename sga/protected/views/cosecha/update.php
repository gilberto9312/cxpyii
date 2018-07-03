<?php
/* @var $this CosechaController */
/* @var $model Cosecha */

$this->breadcrumbs=array(
	'Cosechas'=>array('index'),
	$model->idcosecha=>array('view','id'=>$model->idcosecha),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cosecha', 'url'=>array('index')),
	array('label'=>'Create Cosecha', 'url'=>array('create')),
	array('label'=>'View Cosecha', 'url'=>array('view', 'id'=>$model->idcosecha)),
	array('label'=>'Manage Cosecha', 'url'=>array('admin')),
);
?>

<h1>Update Cosecha <?php echo $model->idcosecha; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>