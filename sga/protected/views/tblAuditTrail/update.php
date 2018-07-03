<?php
/* @var $this TblAuditTrailController */
/* @var $model TblAuditTrail */

$this->breadcrumbs=array(
	'Tbl Audit Trails'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblAuditTrail', 'url'=>array('index')),
	array('label'=>'Create TblAuditTrail', 'url'=>array('create')),
	array('label'=>'View TblAuditTrail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblAuditTrail', 'url'=>array('admin')),
);
?>

<h1>Update TblAuditTrail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>