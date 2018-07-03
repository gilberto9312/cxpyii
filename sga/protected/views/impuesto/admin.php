<?php
/* @var $this ImpuestoController */
/* @var $model Impuesto */

$this->breadcrumbs=array(
	'Impuestos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Impuesto', 'url'=>array('index')),
	array('label'=>'Create Impuesto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#impuesto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Impuestos</h1>



<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'impuesto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idimpuesto',
		'cod_impuesto',
		'nombre_impuesto',
		'impuesto',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
