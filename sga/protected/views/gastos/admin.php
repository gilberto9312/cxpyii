<?php
/* @var $this GastosController */
/* @var $model Gastos */

$this->breadcrumbs=array(
	'Gastos'=>array('admin'),
	
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gastos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gastos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'htmlOptions'=>array('style'=>'width:740px'),
    'pager'=>array(
        'maxButtonCount'=>'7',
    ),
	'columns'=>array(
		//'idingreso',
		
		array(
			'name'=>'idtrabajador',
			'value'=>'$data->idtrabajador0->responsable',
			),
		array(
			'name'=>'idproveedor',
			'value'=>'$data->idproveedor0->razon_social',
			),
		array(
			'name'=>'idproveedor',
			'value'=>'$data->idproveedor0->documento',
			),
		'fecha',
		array(
			'name'=>'factura',
			'value'=>'$data->factura',
			),
		/*'igv',*/
		'estado',
		'base_imponible',
		'total',
		
		array(
            'class'=>'CButtonColumn',
                        'deleteButtonUrl'=>'$this->grid->controller->createReturnableUrl("delete",array("idingreso"=>$data->idingreso))',
            'deleteConfirmation'=>Yii::t('ui','Are you sure to delete this item?'),
        ),

	),
)); ?>

