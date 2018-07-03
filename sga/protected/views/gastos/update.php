<?php
/* @var $this GastosController */
/* @var $model Gastos */

$this->breadcrumbs=array(
	'Gastoses'=>array('index'),
	$model->idingreso=>array('view','id'=>$model->idingreso),
	'Update',
);


?>

<h1>Update Gastos <?php echo $model->idingreso; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>