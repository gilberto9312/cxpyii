<?php
/* @var $this PresentacionController */
/* @var $model Presentacion */

$this->breadcrumbs=array(
	'Presentacion'=>array('admin'),
	
);

?>

<h1>Presentacion <?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'descripcion',
	),
)); ?>
