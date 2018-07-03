
<?php
/* @var $this GastosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gastos',
);
?>

<h1>Gastos</h1>


<?php 


$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'ajaxUpdate'=>false,
    'template'=>'{pager}{sorter}{summary}{items}{pager}',
    'itemView'=>'_view',
    'pager'=>array(
        'header'=>false,
        'maxButtonCount'=>'9',
    ),

)); ?>
