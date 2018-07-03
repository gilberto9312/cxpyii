

<?php
/* @var $this ProveedorController */
/* @var $model Proveedor */

$this->breadcrumbs=array(
	'Proveedor'=>array('admin')
);


?>

<h1> Proveedor <?php echo $model->razon_social; ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sector_comercial',
		'documento',
		'direccion',
		'telefono',
		'email',
		'url',
	),
)); ?>
