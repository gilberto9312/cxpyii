<?php
/* @var $this CosechaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cosechas',
);

$this->menu=array(
	array('label'=>'Create Cosecha', 'url'=>array('create')),
	array('label'=>'Manage Cosecha', 'url'=>array('admin')),
);
?>

<h1>Cosechas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
