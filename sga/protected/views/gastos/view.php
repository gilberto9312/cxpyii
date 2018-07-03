
<?php



$this->breadcrumbs=array(
	Yii::t('ui','gastos')=>$this->getReturnUrl() ? $this->getReturnUrl() : array('index'),
	$model->serie.' '.$model->correlativo,
);
/* @var $this GastosController */
/* @var $model Gastos */

/*$this->breadcrumbs=array(
	'Gastos'=>array('index'),
	$model->idingreso,
);*/


?>

<h1>Detalle</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'idingreso', // only admin user can see person id
			'visible'=>Yii::app()->user->name=='admin'? true : false,
		),
		'idtrabajador',
		'idproveedor',
		'fecha',
		'tipo_comprobante',
		'serie',
		'correlativo',
			array(
			'name'=>'Codigo producto/Servicio',
			'value'=>$model->detalleIngresos[0]->idarticulo,
		),
		'estado',
		'base_imponible',
		'total',
	),
)); ?>
<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	'id'=>'prueba',
	'options'=>array(
		'title'=>'miprueba',
		'width'=>400,
		'height'=>400,
		'resizable'=>false,
		'autoOpen'=>false,
		'modal'=>'true',
		'overlay'=>array(
			'backgroundColor'=>'#000',
			'opacity'=>'0.5'
			),
		),

	));


echo $this->renderPartial('//detalleIngreso/_form',array('model'=>$model_detalleIngreso,));
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php 
echo Chtml::link('añadir detalle','',array('onclick'=>'$("#prueba").dialog("open"); return false; ')); 
?>