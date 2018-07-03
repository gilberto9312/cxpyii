<?php

class DetalleIngresoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model_detalle.
	 * @param integer $id the ID of the model_detalle to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model_detalle'=>$this->loadmodel_detalle_detalle($id),
		));
	}

	/**
	 * Creates a new model_detalle.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model_detalle_detalle=new DetalleIngreso;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model_detalle_detalle);

		if(isset($_POST['DetalleIngreso']))
		{

			$model_detalle_detalle->attributes=$_POST['DetalleIngreso'];
			Yii::app()->getSession()->get('idgasto');
			if($model_detalle_detalle->save())
				$this->redirect(array('view','id'=>$model_detalle_detalle->iddetalle_ingreso));
		}

		$this->render('create',array(
			'model_detalle_detalle'=>$model_detalle_detalle,
		));
	}

	/**
	 * Updates a particular model_detalle.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model_detalle to be updated
	 */
	public function actionUpdate($id)
	{
		$model_detalle=$this->loadmodel_detalle($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model_detalle);

		if(isset($_POST['DetalleIngreso']))
		{
			$model_detalle->attributes=$_POST['DetalleIngreso'];
			if($model_detalle->save())
				$this->redirect(array('view','id'=>$model_detalle->iddetalle_ingreso));
		}

		$this->render('update',array(
			'model_detalle'=>$model_detalle,
		));
	}

	/**
	 * Deletes a particular model_detalle.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model_detalle to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadmodel_detalle($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all model_detalles.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('DetalleIngreso');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all model_detalles.
	 */
	public function actionAdmin()
	{
		$model_detalle=new DetalleIngreso('search');
		$model_detalle->unsetAttributes();  // clear any default values
		if(isset($_GET['DetalleIngreso']))
			$model_detalle->attributes=$_GET['DetalleIngreso'];

		$this->render('admin',array(
			'model_detalle'=>$model_detalle,
		));
	}

	/**
	 * Returns the data model_detalle based on the primary key given in the GET variable.
	 * If the data model_detalle is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model_detalle to be loaded
	 * @return DetalleIngreso the loaded model_detalle
	 * @throws CHttpException
	 */
	public function loadmodel_detalle($id)
	{
		$model_detalle=DetalleIngreso::model_detalle()->findByPk($id);
		if($model_detalle===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model_detalle;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DetalleIngreso $model_detalle the model_detalle to be validated
	 */
	protected function performAjaxValidation($model_detalle)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='detalle-ingreso-form')
		{
			echo CActiveForm::validate($model_detalle);
			Yii::app()->end();
		}
	}
}
