<?php
/* @var $this MovimientoInventarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Movimiento Inventarios',
);

$this->menu=array(
	array('label'=>'Create MovimientoInventario', 'url'=>array('create')),
	array('label'=>'Manage MovimientoInventario', 'url'=>array('admin')),
);
?>

<h1>Movimiento Inventarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
