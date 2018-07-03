<?php
/* @var $this CategoriaController */
/* @var $data Categoria */
?>

<div class="item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Codigo Categoria')); ?>:</b>
	<?php echo CHtml::link($data->idcategoria,$this->createReturnableUrl('view',array('id'=>$data->idcategoria)));?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>