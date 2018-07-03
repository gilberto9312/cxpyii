<?php
/* @var $this ClienteController */
/* @var $model Cliente */



?>

<h1>Cliente <?php echo $model->razonSocial; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'razonSocial',
				array(
			'name'=>'Tipo Contribuyente',
			'value'=>$model->idtipocontribuyente0->nombre,
		),
		'razon_social',
		'direccion',
		'telefono',
		'email',
		'tipo_contribuyente',
	),
)); ?>
