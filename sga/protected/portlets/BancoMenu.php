<?php
class BancoMenu extends XPortlet
{
	public $title='Fichas';

	public function getMenuData()
	{
		return array(
			array('label'=>Yii::t('ui','Bancos'), 'items'=>array(
				array('label'=>Yii::t('ui','crear'), 'url'=>array('/banco/create')),
				array('label'=>Yii::t('ui','Administrar'), 'url'=>array('/banco/admin')),
				array('label'=>Yii::t('ui','Agregar Deposito'), 'url'=>array('/creditosDisponibilidad/create')),
				
			)),
			/*
			array('label'=>Yii::t('ui','Categoria'), 'items'=>array(
				array('label'=>Yii::t('ui','Autocomplete new'), 'url'=>array('/site/widget', 'view'=>'autocomplete')),
				array('label'=>Yii::t('ui','Autocomplete old'), 'url'=>array('/site/widget', 'view'=>'autocomplete_legacy')),
				array('label'=>Yii::t('ui','Masked textfield'), 'url'=>array('/site/widget', 'view'=>'maskedtextfield')),
				array('label'=>Yii::t('ui','Multiple file upload'), 'url'=>array('/site/widget', 'view'=>'multifileupload')),
				array('label'=>Yii::t('ui','Datepicker'), 'url'=>array('/site/widget', 'view'=>'datepicker')),
				array('label'=>Yii::t('ui','Star rating'), 'url'=>array('/site/widget', 'view'=>'starrating')),
			)),
			array('label'=>Yii::t('ui','UI Widgets'), 'items'=>array(
				array('label'=>Yii::t('ui','Tabs simple'), 'url'=>array('/site/widget', 'view'=>'tabs_simple')),
				array('label'=>Yii::t('ui','Tabs advanced'), 'url'=>array('/site/widget', 'view'=>'tabs')),
				array('label'=>Yii::t('ui','Accordion'), 'url'=>array('/site/widget', 'view'=>'accordion')),
				array('label'=>Yii::t('ui','Dialog'), 'url'=>array('/site/widget', 'view'=>'dialog')),
				array('label'=>Yii::t('ui','Slider & SliderInput'), 'url'=>array('/site/widget', 'view'=>'slider')),
				array('label'=>Yii::t('ui','Progressbar'), 'url'=>array('/site/widget', 'view'=>'progressbar')),
				array('label'=>Yii::t('ui','Button'), 'url'=>array('/site/widget', 'view'=>'button')),
			)),
			array('label'=>Yii::t('ui','UI Interactions'), 'items'=>array(
				array('label'=>Yii::t('ui','Draggable'), 'url'=>array('/site/widget', 'view'=>'draggable')),
				array('label'=>Yii::t('ui','Droppable'), 'url'=>array('/site/widget', 'view'=>'droppable')),
				array('label'=>Yii::t('ui','Resizable'), 'url'=>array('/site/widget', 'view'=>'resizable')),
				array('label'=>Yii::t('ui','Selectable'), 'url'=>array('/site/widget', 'view'=>'selectable')),
				array('label'=>Yii::t('ui','Sortable'), 'url'=>array('/site/widget', 'view'=>'sortable')),
			)),*/
		);
	}

	protected function renderContent()
	{
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->getMenuData(),
		));
	}
}