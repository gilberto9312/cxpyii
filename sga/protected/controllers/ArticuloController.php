<?php

class ArticuloController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
public $layout='//layouts/leftbar';




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

		public function actionSelec($id)
	{
		array(
			'model'=>$this->loadModel($id),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Articulo;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Articulo']))
		{
			$model->attributes=$_POST['Articulo'];
			if($model->save())
				$this->redirect(array('create'));
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

		if(isset($_POST['Articulo']))
		{
			$model->attributes=$_POST['Articulo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idarticulo));
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
		$dataProvider=new CActiveDataProvider('Articulo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

		public function actionCatInventario()
	{
		$model=new Articulo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Articulo']))
			$model->attributes=$_GET['Articulo'];

		$this->render('catInventario',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Articulo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Articulo']))
			$model->attributes=$_GET['Articulo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Articulo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Articulo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Articulo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='articulo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionUpload()
	{
		if(isset($_FILES['files']))
		{
			// delete old files


			//upload new files
			foreach($_FILES['files']['name'] as $key=>$filename)
				move_uploaded_file($_FILES['files']['tmp_name'][$key],Yii::app()->params['uploadDir'].$filename);
		}
		$this->redirect(array('site/widget','view'=>'multifileupload'));
	}
public function findFiles()
	{
		return array_diff(scandir(Yii::app()->params['uploadDir']), array('.', '..'));
	}
}
