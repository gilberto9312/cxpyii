<?php
/* @var $this ArticuloController */
/* @var $data Articulo */
?>

<div class="item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Codigo')); ?>:</b>
	<?php echo CHtml::link($data->codigo,$this->createReturnableUrl('view',array( 'id'=>$data->idarticulo))); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen')); ?>:</b>
	<?php echo CHtml::encode($data->imagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uso_interno')); ?>:</b>
	<?php echo CHtml::encode($data->uso_interno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Categoria')); ?>:</b>
	<?php echo CHtml::encode($data->idcategoria0->nombre); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Presentacion')); ?>:</b>
	<?php echo CHtml::encode($data->idpresentacion0->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IVA')); ?>:</b>
	<?php echo CHtml::encode($data->codImpuesto->impuesto); ?>
	<br />

	

</div>