<?php
/* @var $this BancoController */
/* @var $model Banco */

$this->breadcrumbs=array(
	'Bancos'=>array('admin'),
	);

$this->menu=array(
	array('label'=>'List Banco', 'url'=>array('index')),
	array('label'=>'Create Banco', 'url'=>array('create')),
	array('label'=>'View Banco', 'url'=>array('view', 'id'=>$model->idbanco)),
	array('label'=>'Manage Banco', 'url'=>array('admin')),
);
?>

<h1>Update Banco <?php echo $model->idbanco; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>