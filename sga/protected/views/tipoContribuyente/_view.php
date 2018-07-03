<?php
/* @var $this TipoContribuyenteController */
/* @var $data TipoContribuyente */
?>

<div class="item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codigo), array('view', 'id'=>$data->idtipocontribuyente)); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>