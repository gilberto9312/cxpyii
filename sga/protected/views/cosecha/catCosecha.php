<h1>Seleccionar Cosecha</h1>
 <script type="text/javascript">
 
 function cerrar(idcosecha) {
 var data =console.log($(this).parent().parent().children('td:first').text());
 
 window.opener.document.getElementById('idcosecha').innerHTML = data; 
 
 }
 
 </script>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cosecha-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idcosecha',
		'fecha_inicio',
		'fecha_fin',
		'temporada',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{elegir}',
			'buttons'=>array(
				'elegir'=>array(
					'Click'=> 'cerrar'
					),

				),

		),
	),
)); ?>