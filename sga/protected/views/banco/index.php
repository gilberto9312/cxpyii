<?php
/* @var $this BancoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bancos',
);

?>

<h4>Bancos</h4>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
