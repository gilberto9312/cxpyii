<?php
$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('ui', 'Inicio');
$this->layout='leftbar';
$this->leftPortlets['ptl.GastosMenu']=array();
?>

<h2><?php echo Help::item('annotation','title',!Yii::app()->user->isGuest); ?></h2>
<div class="large-text"><?php echo Help::item('annotation','content'); ?></div>

<?php

/*$this->widget('ext.widgets.google.XGoogleChart',array(
	'type'=>'pie',
	'title'=>'Browser market 2008',
	'value'=>'$data->gastos->fecha',
	'data'=>'Gastos::models()->fecha',
	'size'=>array(400,300), // width and height of the chart image
	'color'=>array('6f8a09', '3285ce','dddddd'), // if there are fewer color than slices, then colors are interpolated.
));
*/
//very useful google chart
                $this->widget('ext.Hzl.google.HzlVisualizationChart', array('visualization' => 'LineChart',
            'data' => CController::createUrl('gastos/fecha'),
            'options' => array('title' => 'My Daily Activity')));

?>

