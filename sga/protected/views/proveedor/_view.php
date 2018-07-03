<?php
/* @var $this ProveedorController */
/* @var $data Proveedor */
?>

<div class="item">


	<h3>
	<b><?php echo CHtml::encode($data->getAttributeLabel('Documento')); ?>:</b>

	<?php echo CHtml::link($data->documento,$this->createReturnableUrl('view',array('id'=>$data->idproveedor)));?>
	</h3>

	<b><?php echo CHtml::encode($data->getAttributeLabel('razon_social')); ?>:</b>
	<?php echo CHtml::encode($data->razon_social); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sector_comercial')); ?>:</b>
	<?php echo CHtml::encode($data->sector_comercial); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	

</div>