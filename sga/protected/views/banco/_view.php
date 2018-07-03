<?php
/* @var $this BancoController */
/* @var $data Banco */
?>

<div class="item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_banco')); ?>:</b>
	<?php echo CHtml::link($data->num_banco,$this->createReturnableUrl('view',array('id'=>$data->idbanco)));?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banco')); ?>:</b>
	<?php echo CHtml::encode($data->banco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_cheque')); ?>:</b>
	<?php echo CHtml::encode($data->num_cheque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saldo')); ?>:</b>
	<?php echo CHtml::encode($data->saldo); ?>
	<br />


</div>