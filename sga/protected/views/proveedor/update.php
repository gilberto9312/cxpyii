<?php
/* @var $this ProveedorController */
/* @var $model Proveedor */

$this->breadcrumbs=array(
	'Proveedor'=>array('admin'),
	
);


?>

<h1> Actualizar Proveedor <?php echo $model->documento; ?></h1>

<?php $this->renderPartial('_formUpdate', array('model'=>$model)); ?>