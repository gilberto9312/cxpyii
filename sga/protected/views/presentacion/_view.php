<?php
/* @var $this PresentacionController */
/* @var $data Presentacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpresentacion')); ?>:</b>
	<?php echo CHtml::link($data->idpresentacion,$this->createReturnableUrl('view',array('id'=>$data->idpresentacion)));?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>