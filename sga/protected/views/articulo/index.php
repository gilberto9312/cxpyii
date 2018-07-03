<?php
$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('ui', 'Inicio');
$this->layout='leftbar';
$this->leftPortlets['ptl.GastosMenu']=array();
?>
<?php
/* @var $this ArticuloController */
/* @var $dataProvider CActiveDataProvider */


$this->breadcrumbs=array(
	'Articulos',
);


?>

<h1>Articulos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
