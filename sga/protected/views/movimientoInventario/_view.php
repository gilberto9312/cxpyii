<?php
/* @var $this MovimientoInventarioController */
/* @var $data MovimientoInventario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmovimiento_inventario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idmovimiento_inventario), array('view', 'id'=>$data->idmovimiento_inventario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipomovimiento')); ?>:</b>
	<?php echo CHtml::encode($data->idtipomovimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idarticulo')); ?>:</b>
	<?php echo CHtml::encode($data->idarticulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>