<?php
/* @var $this RecoleccionController */
/* @var $model Recoleccion */



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#recoleccion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Recolecciones</h1>
<p>

</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'recoleccion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'idcosecha',
				array(
			'name'=>'idcosecha',
			'value'=>'$data->idcosecha0->nombre_cosecha',
			),
		//'idarticulo',
								array(
			'name'=>'idarticulo',
			'value'=>'$data->idarticulo0->nombre',
			),
		'fecha_recolecta',
		'fecha_vencimiento',
		'comentario',
		/*
		'idtipomovimiento',
		'cantidad_recogida',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
