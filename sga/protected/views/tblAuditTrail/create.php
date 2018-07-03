<?php
/* @var $this TblAuditTrailController */
/* @var $model TblAuditTrail */

$this->breadcrumbs=array(
	'Tbl Audit Trails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblAuditTrail', 'url'=>array('index')),
	array('label'=>'Manage TblAuditTrail', 'url'=>array('admin')),
);
?>

<h1>Create TblAuditTrail</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>