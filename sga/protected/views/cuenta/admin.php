<?php
/* @var $this CuentaController */
/* @var $model Cuenta */



?>

<h1>Gestionar Cuentas</h1>

<div id="Layer1" style="width:600px; height:400px; overflow:auto;">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cuenta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idcuenta',
		'idcosecha',
		'idtrabajador',
		'idproveedor',
		'fecha',
		'tipo_comprobante',
		'serie',
		'correlativo',
		'estado',
		'base_imponible',
		'total',
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{Abonar}',
		    'buttons'=>array
		    (
		        'Abonar' => array
		        (
		            'label'=>'Abonar a Cuenta',
		            'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
		            'url'=>'Yii::app()->createUrl("/historia/create", array("id"=>$data->idcuenta, "idP"=>$data->idproveedor))',
		        ),

		    ),
		
	),
))); ?>
</div>
