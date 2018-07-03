<?php
/* @var $this HistoriaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Historias',
);

$this->menu=array(
	array('label'=>'Create Historia', 'url'=>array('create')),
	array('label'=>'Manage Historia', 'url'=>array('admin')),
);
?>

<h1>Historias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
