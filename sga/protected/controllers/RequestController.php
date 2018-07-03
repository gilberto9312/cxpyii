<?php
class RequestController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
			'ajaxOnly -uploadFile'
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array(
					'suggestIva','legacySuggestCountryP2','suggestCountryP2','suggestCountryt','suggestCountry2','suggestCosecha','suggestMovimiento','suggestCountry','legacySuggestCountry','fillTree','treePath','loadContent','suggestAuPlaces',
					'suggestAuHierarchy','suggestLastname','fillAuTree','viewUnitPath','viewUnitLabel','initPerson',
					'suggestPerson','suggestPersonGroupCountry','listPersonsWithSameFirstname',
					'addTabularInputs','addTabularInputsAsTable','uploadFile'
				),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * @return array actions
	 */
	public function actions()
	{
		return array(
			'suggestCountryt'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'Trabajador',
				'methodName'=>'suggest',
			),
				'suggestIva'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'Impuesto',
				'methodName'=>'suggest',
			),
			'suggestCountry'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'Proveedor',
				'methodName'=>'suggest',
			),
				'suggestCountryP2'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'Proveedor',
				'methodName'=>'suggestD',
			),
				'suggestCountry2'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'Articulo',
				'methodName'=>'suggest',
			),
				'suggestCosecha'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'Articulo',
				'methodName'=>'cosecha',
			),				
				
				'suggestMovimiento'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'Articulo',
				'methodName'=>'movimiento',
			),					
				'legacySuggestCountryP2'=>array(
				'class'=>'ext.actions.XLegacySuggestAction',
				'modelName'=>'Proveedor',
				'methodName'=>'legacySuggest',
			),
			'legacySuggestCountry'=>array(
				'class'=>'ext.actions.XLegacySuggestAction',
				'modelName'=>'Proveedor',
				'methodName'=>'legacySuggest',
			),
			'fillTree'=>array(
				'class'=>'ext.actions.XFillTreeAction',
				'modelName'=>'Menu',
				'showRoot'=>false
			),
			'treePath'=>array(
				'class'=>'ext.actions.XAjaxEchoAction',
				'modelName'=>'Menu',
				'attributeName'=>'pathText',
			),
			'uploadFile'=>array(
				'class'=>'ext.actions.XHEditorUpload',
			),
			'suggestAuPlaces'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'AdminUnit',
				'methodName'=>'suggestPlaces',
				'limit'=>30
			),
			'suggestAuHierarchy'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'AdminUnit',
				'methodName'=>'suggestHierarchy',
				'limit'=>30
			),
			'suggestLastname'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'Person',
				'methodName'=>'suggestLastname',
				'limit'=>30
			),
			'fillAuTree'=>array(
				'class'=>'ext.actions.XFillTreeAction',
				'modelName'=>'AdminUnit',
				'showRoot'=>false,
			),
			'viewUnitPath'=>array(
				'class'=>'ext.actions.XAjaxEchoAction',
				'modelName'=>'AdminUnit',
				'attributeName'=>'rootlessPath',
			),
			'viewUnitLabel'=>array(
				'class'=>'ext.actions.XAjaxEchoAction',
				'modelName'=>'AdminUnit',
				'attributeName'=>'label',
			),
			'initPerson'=>array(
				'class'=>'ext.actions.XSelect2InitAction',
				'modelName'=>'Person',
				'textField'=>'fullname',
			),
			'suggestPerson'=>array(
				'class'=>'ext.actions.XSelect2SuggestAction',
				'modelName'=>'Person',
				'methodName'=>'suggestPerson',
				'limit'=>30
			),
			'suggestPersonGroupCountry'=>array(
				'class'=>'ext.actions.XSelect2SuggestAction',
				'modelName'=>'Person',
				'methodName'=>'suggestPersonGroupCountry',
				'limit'=>30
			),
			'addTabularInputs'=>array(
				'class'=>'ext.actions.XTabularInputAction',
				'modelName'=>'DetalleIngreso',
				'viewName'=>'/detalleIngreso/_form',
			),
			'addTabularInputsAsTable'=>array(
				'class'=>'ext.actions.XTabularInputAction',
				'modelName'=>'detalleIngreso',
				'viewName'=>'/site/extensions/_tabularInputAsTable',
			),
		);
	}

	/**
	 * Displays list on persons that have same firstname as person with given id
	 */
	public function actionListPersonsWithSameFirstname()
	{
		if(isset($_GET['id']))
			$model=Person::model()->findbyPk($_GET['id']);
		if($model!==null)
		{
			$models=Person::model()->findAll("firstname='{$model->firstname}'");
			$data=array();
			foreach($models as $model)
		    	$data[] = $model->fullname;
			echo Yii::t('ui','Persons with same firstname: ').implode(', ', $data);
		}

	}
}