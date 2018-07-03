<?php
/* @var $this DetalleIngresoController */
/* @var $data DetalleIngreso */
?>

<div class="item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('iddetalle_ingreso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->iddetalle_ingreso), array('view', 'id'=>$data->iddetalle_ingreso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idingreso')); ?>:</b>
	<?php echo CHtml::encode($data->idingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idarticulo')); ?>:</b>
	<?php echo CHtml::encode($data->idarticulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_compra')); ?>:</b>
	<?php echo CHtml::encode($data->precio_compra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_venta')); ?>:</b>
	<?php echo CHtml::encode($data->precio_venta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stock_actual')); ?>:</b>
	<?php echo CHtml::encode($data->stock_actual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_produccion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_produccion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_vencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_vencimiento); ?>
	<br />

	*/ ?>

</div>