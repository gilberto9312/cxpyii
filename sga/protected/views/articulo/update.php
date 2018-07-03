<?php
$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('ui', 'Inicio');
$this->layout='leftbar';
$this->leftPortlets['ptl.GastosMenu']=array();
?>
<?php
/* @var $this ArticuloController */
/* @var $model Articulo */

$this->breadcrumbs=array(
	'Articulos'=>array('admin'),	
);


?>

<h1>Actializar  <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_formUpdate', array('model'=>$model)); ?>