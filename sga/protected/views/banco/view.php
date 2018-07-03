<?php
/* @var $this BancoController */
/* @var $model Banco */

$this->breadcrumbs=array(
	'Bancos'=>array('admin'),

);


?>

<h4> Banco #<?php echo $model->num_banco; ?></h4>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'num_banco',
		'banco',
		'num_cheque',
		'saldo',
	),
)); ?>
