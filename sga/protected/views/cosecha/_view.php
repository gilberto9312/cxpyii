<?php
/* @var $this CosechaController */
/* @var $data Cosecha */
?>

<div class="item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcosecha')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcosecha), array('view', 'id'=>$data->idcosecha)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temporada')); ?>:</b>
	<?php echo CHtml::encode($data->temporada); ?>
	<br />


</div>