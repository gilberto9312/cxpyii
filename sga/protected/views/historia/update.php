<?php
/* @var $this HistoriaController */
/* @var $model Historia */

$this->breadcrumbs=array(
	'Historias'=>array('index'),
	$model->idhistoria=>array('view','id'=>$model->idhistoria),
	'Update',
);

$this->menu=array(
	array('label'=>'List Historia', 'url'=>array('index')),
	array('label'=>'Create Historia', 'url'=>array('create')),
	array('label'=>'View Historia', 'url'=>array('view', 'id'=>$model->idhistoria)),
	array('label'=>'Manage Historia', 'url'=>array('admin')),
);
?>

<h1>Update Historia <?php echo $model->idhistoria; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>