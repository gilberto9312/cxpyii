<?php
/* @var $this HistoriaController */
/* @var $data Historia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhistoria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idhistoria), array('view', 'id'=>$data->idhistoria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idproveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idproveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcuenta')); ?>:</b>
	<?php echo CHtml::encode($data->idcuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('concepto')); ?>:</b>
	<?php echo CHtml::encode($data->concepto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />


</div>