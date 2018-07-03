<?php
/* @var $this TipoContribuyenteController */
/* @var $model TipoContribuyente */

$this->breadcrumbs=array(
	'Tipo Contribuyentes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoContribuyente', 'url'=>array('index')),
	array('label'=>'Manage TipoContribuyente', 'url'=>array('admin')),
);
?>

<h1>Create TipoContribuyente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>