
<?php
/* @var $this GastosController */
/* @var $model Gastos */

$this->breadcrumbs=array(
	'Gastos'=>array('index'),
	'crear',
);


?>

 <script >
 function buscarArticulo(idcosecha) {
 window.open("../cosecha/catCosecha", "popupId", "location=no,menubar=no,titlebar=no,resizable=no,toolbar=no, menubar=no,width=900,height=500"); 
 }
 </script>

<h4>Crear Gastos</h4>

<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'Proveedor1',
    'options'=>array(
        'title'=>'Añadir Proveedor',
        'width'=>600,
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


echo $this->renderPartial('//proveedor/_form',array('model'=>$model_proveedor));

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>