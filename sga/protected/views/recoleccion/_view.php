<?php
/* @var $this RecoleccionController */
/* @var $data Recoleccion */
?>

<div class="item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrecoleccion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrecoleccion), array('view', 'id'=>$data->idrecoleccion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcosecha')); ?>:</b>
	<?php echo CHtml::encode($data->idcosecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idarticulo')); ?>:</b>
	<?php echo CHtml::encode($data->idarticulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_recolecta')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_recolecta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_vencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_vencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipomovimiento')); ?>:</b>
	<?php echo CHtml::encode($data->idtipomovimiento); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_recogida')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_recogida); ?>
	<br />

	*/ ?>

</div>