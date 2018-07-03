<?php
/* @var $this CreditosDisponibilidadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Creditos Disponibilidads',
);

$this->menu=array(
	array('label'=>'Create CreditosDisponibilidad', 'url'=>array('create')),
	array('label'=>'Manage CreditosDisponibilidad', 'url'=>array('admin')),
);
?>

<h1>Creditos Disponibilidads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
