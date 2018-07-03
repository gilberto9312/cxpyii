<?php
$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('ui', 'Inicio');
$this->layout='leftbar';
$this->leftPortlets['ptl.GastosMenu']=array();
?>
<?php
/* @var $this ArticuloController */
/* @var $model Articulo */

$this->breadcrumbs=array(
	'Articulos'=>array('admin'),
	
);


?>

<h1>Articulo <?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigo',
		'nombre',
		'descripcion',
		'imagen',
		'uso_interno',
		array(
			'name'=>'Categoria',
			'value'=>$model->idcategoria0->nombre,
		),
		array(
			'name'=>'Presentacion',
			'value'=>$model->idpresentacion0->nombre,
		),		
		array(
			'name'=>'IVA',
			'value'=>$model->codImpuesto->impuesto,
		),
	),
)); ?>
