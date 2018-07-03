<?php
/* @var $this RecoleccionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Recoleccions',
);

$this->menu=array(
	array('label'=>'Create Recoleccion', 'url'=>array('create')),
	array('label'=>'Manage Recoleccion', 'url'=>array('admin')),
);
?>

<h1>Recoleccions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
