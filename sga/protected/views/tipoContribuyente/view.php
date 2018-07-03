<?php
/* @var $this TipoContribuyenteController */
/* @var $model TipoContribuyente */

$this->breadcrumbs=array(
	'Tipo Contribuyentes'=>array('index'),
	$model->idtipocontribuyente,
);

$this->menu=array(
	array('label'=>'List TipoContribuyente', 'url'=>array('index')),
	array('label'=>'Create TipoContribuyente', 'url'=>array('create')),
	array('label'=>'Update TipoContribuyente', 'url'=>array('update', 'id'=>$model->idtipocontribuyente)),
	array('label'=>'Delete TipoContribuyente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtipocontribuyente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoContribuyente', 'url'=>array('admin')),
);
?>

<h1>View TipoContribuyente #<?php echo $model->idtipocontribuyente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idtipocontribuyente',
		'codigo',
		'nombre',
	),
)); ?>
