<?php
/* @var $this PresentacionController */
/* @var $model Presentacion */

$this->breadcrumbs=array(
	'Presentacions'=>array('admin'),

);

?>

<h1>Actualizar Presentacion <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>