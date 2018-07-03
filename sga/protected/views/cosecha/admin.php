<?php
/* @var $this CosechaController */
/* @var $model Cosecha */

$this->breadcrumbs=array(
	'Cosechas'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'List Cosecha', 'url'=>array('index')),
	array('label'=>'Create Cosecha', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cosecha-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Cosechas</h1>


<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cosecha-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre_cosecha',
		'fecha_inicio',
		'fecha_fin',
		'temporada',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
