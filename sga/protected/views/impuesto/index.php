<?php
/* @var $this ImpuestoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Impuestos',
);


?>

<h1>Impuestos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
