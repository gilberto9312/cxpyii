<?php
/* @var $this CuentaController */
/* @var $data Cuenta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcuenta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcuenta), array('view', 'id'=>$data->idcuenta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcosecha')); ?>:</b>
	<?php echo CHtml::encode($data->idcosecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtrabajador')); ?>:</b>
	<?php echo CHtml::encode($data->idtrabajador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idproveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idproveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_comprobante')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_comprobante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serie')); ?>:</b>
	<?php echo CHtml::encode($data->serie); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('correlativo')); ?>:</b>
	<?php echo CHtml::encode($data->correlativo); ?>
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

	*/ ?>

</div>