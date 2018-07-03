<?php

class HistoriaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/leftbar';


	function init()
	{
		parent::init();
		$this->leftPortlets['ptl.GastosMenu']=array();
	}

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
		//conneccion a la bd
		$connection=YII::app()->db;
		//variable de acceso
		$sql= "SELECT usuario, acceso FROM trabajador";

		//var ejecutar comando
		$datareader=$connection->createCommand($sql)->query();

		//seleccionar la columna
		$datareader->bindColumn(1, $usuario );

		$datareader->bindcolumn(2, $acceso);

		//ciclo
		while ($datareader->read()!==false)
			{
				//arreglos segun roll o acceso
				if ($acceso == 'admin')
					$administradores[]=$usuario;
				if ($acceso == 'noadmin')
					$noadministradores[]=$usuario;
				
			}


		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','catInventario','view','alpha','batch','updateYears','suggestTrabajador'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','admin'),
				'users'=>$administradores,
			),

			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id, $idP)
	{
		$model=new Historia;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Historia']))
		{
			$model->idcuenta=$id;
			$model->idproveedor=$idP;
			$model->attributes=$_POST['Historia'];
			if($model->save());
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Historia']))
		{
			$model->attributes=$_POST['Historia'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idhistoria));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Historia');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Historia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Historia']))
			$model->attributes=$_GET['Historia'];

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Historia the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Historia::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Historia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='historia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
