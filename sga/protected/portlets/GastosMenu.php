
<?php

class GastosMenu extends XPortlet
{
	public $title='MENU';

	public function getMenuData()
	{

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

	}


	protected function renderContent()
	{


$this->widget('CTreeView',array(
    'id'=>'unit-treeview',
    'url'=>array('request/fillTree'),
    'htmlOptions'=>array(
        'class'=>'treeview-red'
    )
));





	}
}