<?php
/* @var $this TblAuditTrailController */
/* @var $model TblAuditTrail */

$this->breadcrumbs=array(
	'Tbl Audit Trails'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblAuditTrail', 'url'=>array('index')),
	array('label'=>'Create TblAuditTrail', 'url'=>array('create')),
	array('label'=>'Update TblAuditTrail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblAuditTrail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblAuditTrail', 'url'=>array('admin')),
);
?>

<h1>View TblAuditTrail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'old_value',
		'new_value',
		'action',
		'model',
		'field',
		'stamp',
		'user_id',
		'model_id',
	),
)); ?>
