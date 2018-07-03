<?php
/* @var $this TipoContribuyenteController */
/* @var $dataProvider CActiveDataProvider */




?>

<h1>Tipo Contribuyentes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
