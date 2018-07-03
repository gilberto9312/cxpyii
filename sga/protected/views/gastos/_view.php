<?php
/* @var $this GastosController */
/* @var $data Gastos */
?>

<div class="item">

	<h3>
	<b><?php echo CHtml::encode($data->getAttributeLabel('Numero de factura')); ?>:</b>
	<?php echo CHtml::link($data->factura,$this->createReturnableUrl('view',array('id'=>$data->idingreso)));?></h3>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Ingresado Por')); ?>:</b>
	<?php echo CHtml::encode($data->idtrabajador0->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rif Proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idproveedor0->tipo_documento.$data->idproveedor0->num_documento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_comprobante')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_comprobante); ?></b>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('base_imponible')); ?>:</b>
	<?php echo CHtml::encode($data->base_imponible); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />
<br />
	

</div>