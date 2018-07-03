<?php
/* @var $this TblAuditTrailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Audit Trails',
);

$this->menu=array(
	array('label'=>'Create TblAuditTrail', 'url'=>array('create')),
	array('label'=>'Manage TblAuditTrail', 'url'=>array('admin')),
);
?>

<h1>Tbl Audit Trails</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
