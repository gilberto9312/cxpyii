<?php
/* @var $this PresentacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Presentacion',
);

?>

<h1>Presentacion</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
