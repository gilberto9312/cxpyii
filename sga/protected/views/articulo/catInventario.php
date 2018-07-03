
<h1>Articulos</h1>
<script language="javascript"> 
function cerrar(idarticulo) {
    window.opener.document.getElementById('idarticulo').value =($(this).parent().parent().children('td:first').text());
    window.close();
}</script>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'catInventario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idarticulo',
		'codigo',
		'nombre',
		'descripcion',
		'imagen',
		'uso_interno',
		/*
		'idcategoria',
		'idpresentacion',
		'cod_impuesto',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{elegir}',
			'buttons'=>array(
				'elegir'=>array(
					'click'=>'cerrar',
					),

				),

		),
	),
)); ?>
