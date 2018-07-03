<?php
/* @var $this ArticuloController */
/* @var $data Articulo */
?>
<script>
	function aceptar2(idarticulo,li_linea,ls_coddestino,ls_dendestino)
	{  
		obj=eval("opener.document.form."+ls_coddestino+li_linea+"");
		obj.value=idarticulo;
		close();
	}
</script>
<div class="item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Codigo')); ?>:</b>
<a href="javascript:aceptar2('idarticulo','txtdentipart');">aceptar</a>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idarticulo')); ?>:</b>
	<?php echo CHtml::encode($data->idarticulo); ?>
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