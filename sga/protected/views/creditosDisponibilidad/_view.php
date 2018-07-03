<?php
/* @var $this CreditosDisponibilidadController */
/* @var $data CreditosDisponibilidad */
?>

<div class="item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcredito')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcredito), array('view', 'id'=>$data->idcredito)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credito')); ?>:</b>
	<?php echo CHtml::encode($data->credito); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idingreso')); ?>:</b>
	<?php echo CHtml::encode($data->idingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_deposito')); ?>:</b>
	<?php echo CHtml::encode($data->num_deposito); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_transanccion')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_transanccion); ?>
	<br />


</div>