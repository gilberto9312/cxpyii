<?php
/* @var $this ImpuestoController */
/* @var $data Impuesto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idimpuesto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idimpuesto), array('view', 'id'=>$data->idimpuesto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_impuesto')); ?>:</b>
	<?php echo CHtml::encode($data->cod_impuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_impuesto')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_impuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('impuesto')); ?>:</b>
	<?php echo CHtml::encode($data->impuesto); ?>
	<br />


</div>