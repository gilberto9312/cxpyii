<?php
/* @var $this ClienteController */
/* @var $data Cliente */
?>

<div class="item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Identificacion')); ?>:</b>
	<?php echo CHtml::link($data->razonSocial,$this->createReturnableUrl('view',array('id'=>$data->idcliente)));?>

	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipocontribuyente')); ?>:</b>
	<?php echo CHtml::encode($data->idtipocontribuyente0->nombre); ?>
	<br />



	<b><?php echo CHtml::encode($data->getAttributeLabel('razon_social')); ?>:</b>
	<?php echo CHtml::encode($data->razon_social); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_contribuyente')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_contribuyente); ?>
	<br />

	*/ ?>

</div>