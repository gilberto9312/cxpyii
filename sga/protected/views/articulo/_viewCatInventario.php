<?php
/* @var $this ArticuloController */
/* @var $data Articulo */
?>
<script language="javascript">
function cerrar(idarticulo) {
window.opener.document.getElementById('idarticulo').value = <?php echo ($data->idarticulo) ; //the new id ?> 
window.close();
}
</script>
<div class="item">

    <b>
    
    <button id="idarticulo[idarticulo]" type="Button"=cerrar onclick="cerrar()" >aceptar</button>
    
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('idarticulo')); ?>:</b>
    
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