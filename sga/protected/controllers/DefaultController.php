<?php

class DefaultController extends CController
{
	public $breadcrumbs = array();
	public $menu = array();
	public $basePath;
	
	public function init(){
		$this->registerScripts();
		parent::init();
		
		// verifica si la URL trae un parametro layout para forzar el uso de este layout 
		// especifico indicado
		if(isset($_GET['layout'])){
			$tmp = trim($_GET['layout']);
			if($tmp != '')
				$this->layout = $tmp;
		}
	}

	public function registerScripts(){
			
		$debug = Yii::app()->getModule('cargoyabono')->debug;	
			
		$dir = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."resources".DIRECTORY_SEPARATOR;
		if($debug == true)
			$dir = 'protected/modules/cargoyabono/resources/';
	
		$this->basePath = Yii::app()->getAssetManager()->publish($dir).DIRECTORY_SEPARATOR;
		if($debug == true)
			$this->basePath = $dir;
		
		$cs = Yii::app()->getClientScript();
		
		$cs->registerCoreScript('jquery');
		
		$cs->registerCssFile($this->basePath."cya.css");
		
		$cs->registerScriptFile($this->basePath."cya.js");
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionCrearCargo($key){
	
		$busqueda = new cyaBuscarPersona();
		$busqueda->key = $key;
		
		if(isset($_POST['cyaBuscarPersona'])){
			$busqueda->attributes = $_POST['cyaBuscarPersona'];
			if($busqueda->validate()){
				$this->redirect(array('crearcargoapersona'
					,'idpersona'=>$busqueda->idpersona,'key'=>$key));
			}
		}
		$this->render('buscarpersona',array('model'=>$busqueda,'para'=>'Crear Cargo'));
	}

	public function actionCrearAbono($key){
	
		$busqueda = new cyaBuscarPersona();
		$busqueda->key = $key;
		
		if(isset($_POST['cyaBuscarPersona'])){
			$busqueda->attributes = $_POST['cyaBuscarPersona'];
			if($busqueda->validate()){
				$this->redirect(array('seleccionacargosparaabonar'
					,'idpersona'=>$busqueda->idpersona,'key'=>$key));
			}
		}
		$this->render('buscarpersona',array('model'=>$busqueda,'para'=>'Crear Abono'));
	}

	
	public function actionAjaxBuscarPersonas($texto,$key){
		$api = Yii::app()->cyaApi;
		$limpio = trim(CHtml::encode($texto));
		if(strlen($limpio) == 0){
			echo "escriba una parte del nombre de la persona o empresa";
			return;
		}
		$lista = $api->buscarPersonas($key,$limpio);
		echo CJSON::encode($lista);
	}
	
	public function actionCrearCargoAPersona($idpersona,$key){
		
		$api = Yii::app()->cyaApi;
		
		$persona = $api->buscarPersona($key,$idpersona);
		if($persona == null)
			throw new CHttpException(404,"persona inexistente");
			
		$model = new cyaCrearCargo();
		
		$model->key = $key;
		$model->idpersona = $idpersona;
		$model->persona = $persona;
		$model->fecha = Yii::app()->format->date(time());
		
		
		if(isset($_POST['cyaCrearCargo'])){
			$model->attributes = $_POST['cyaCrearCargo'];
			if($model->validate()){
				if($id = $api->crearcargo($key,$model->attributes)){
					$this->redirect(array('cargocreado','id'=>$id,'key'=>$key,'idpersona'=>$idpersona));
				}else{
					$model->addError('',"No se pudo crear el cargo");
				}
			}
		}
		
		$this->render('crearcargo',array('model'=>$model,'key'=>$key));
	}
	
	public function actionCargoCreado($id,$key,$idpersona){
		$this->render('cargocreado',array('id'=>$id,'key'=>$key,'idpersona'=>$idpersona));
	}

	
	public function actionSeleccionaCargosParaAbonar($idpersona,$key,$montos=""){
		$api = Yii::app()->cyaApi;
		$persona = $api->buscarPersona($key,$idpersona);
		if($persona == null)
			throw new CHttpException(404,"persona inexistente");

		$api = Yii::app()->cyaApi;
		$persona = $api->buscarPersona($key,$idpersona);
		if($persona == null)
			throw new CHttpException(404,"persona inexistente");

		$model = new CyaSeleccionaCargos;
		
		if($montos != ''){
			$model->monto = unserialize($montos);
		}
			
		if(isset($_POST['CyaSeleccionaCargos'])){
			$model->attributes = $_POST['CyaSeleccionaCargos'];

			if($model->validate()){
				
				/*
					caso especial:
					
					el CGridView contiene una columna editbox para indicar que monto
					quiero abonar al cargo seleccionado presente en la fila del cgridview
					
					para conocer esos valores existe: [$model->monto] el cual es un array
					y se accede asi:
					
					$id = 2;  <-- este es el ID de un item devuelto por: CyaApi::listarCuentasNoPagadas
					$montoAPagar = $model->monto[$id];
					
					esto quiere decir que $montoAPagar es el valor que el usuario quiere pagar
					para el cargo seleccionado.
				*/
				
				$montos = serialize($model->monto);
				
				$this->redirect(array('crearabonoapersona'
					,'idpersona'=>$idpersona,'key'=>$key,'montos'=>$montos));
				return;
				
			}
		}
			
		$dataProvider=new CArrayDataProvider($api->listarCuentasNoPagadas($key,$idpersona), 
		array(
			'id'=>'id',
			'keyField'=>'id',
			'sort'=>array(
				'attributes'=>array(
					 'id', 'fecha', 'tipo', 'monto','pendiente'
				),
				'defaultOrder'=>array('id'=>false),
			),
			'pagination'=>array(
				'pageSize'=>20,
			),
		));		
		
		
		$this->render('seleccionacargosparaabonar'
			,array('model'=>$model,'key'=>$key
				,'dataProvider'=>$dataProvider
				,'idpersona'=>$idpersona
				,'persona'=>$persona
				)
			);
	}
	
	public function actionCrearAbonoAPersona($idpersona,$key,$montos){
		
		
		if(isset($_POST['volver']))
		{
			$this->redirect(array('seleccionacargosparaabonar'
				,'idpersona'=>$idpersona,'key'=>$key,'montos'=>$montos));
			return;
		}
		
		$api = Yii::app()->cyaApi;
		
		$persona = $api->buscarPersona($key,$idpersona);
		if($persona == null)
			throw new CHttpException(404,"persona inexistente");
		
		$model = new cyaCrearAbono();
		$model->key = $key;
		$model->idpersona = $idpersona;
		$model->persona = $persona;
		$model->fecha = Yii::app()->format->date(time());
		$model->setMontos(unserialize($montos));
		
		if(isset($_POST['cyaCrearAbono'])){
			$model->attributes = $_POST['cyaCrearAbono'];
			if($model->validate()){
				if($idAbono = $api->crearabono($key,$model->attributes)){
					
					// ya el abono existe, ahora ajusta los items
					foreach($model->montos as $idcargo=>$montoAbonado) {
						// crea el registro de historia de abono al cargo
						$api->crearhistoriaabono($key,$idAbono,$idcargo,$montoAbonado);
						// actualiza el cargo
						$api->actualizarcargo($key,$idcargo,$montoAbonado);
					}
				
					$this->redirect(array('abonocreado','id'=>$idAbono,'key'=>$key,'idpersona'=>$idpersona));
				}else{
					$model->addError('',"No se pudo crear el abono");
				}
			}
		}
		
		$this->render('crearabono',array('model'=>$model,'key'=>$key));
	}
	
	public function actionAbonoCreado($id,$key,$idpersona){
		$this->render('abonocreado',array('id'=>$id,'key'=>$key,'idpersona'=>$idpersona));
	}
	
	
	
	public function actionConsultarCuenta($key){
		$busqueda = new cyaBuscarPersona();
		$busqueda->key = $key;
		
		if(isset($_POST['cyaBuscarPersona'])){
			$busqueda->attributes = $_POST['cyaBuscarPersona'];
			if($busqueda->validate()){
				$this->redirect(array('consultarcuentadepersona'
					,'idpersona'=>$busqueda->idpersona,'key'=>$key));
			}
		}
		$this->render('buscarpersona',array('model'=>$busqueda,'para'=>'Consulta de Cuenta'));
	}
	public function actionConsultarCuentaDePersona($idpersona,$key){
		
		$api = Yii::app()->cyaApi;
		
		$persona = $api->buscarPersona($key,$idpersona);
		if($persona == null)
			throw new CHttpException(404,"persona inexistente");
		
		// array('id','fecha','tipo','concepto','monto','saldo')
		$ar = $api->consultaCuenta($key,$idpersona);
		
		$dataProvider=new CArrayDataProvider($ar, array(
			'id'=>'id',
			'sort'=>array(
				'attributes'=>array(
					 'id', 'fecha', 'tipo', 'monto','pendiente'
				),
				'defaultOrder'=>array('id'=>false),
			),
			'pagination'=>array(
				'pageSize'=>20,
			),
		));		
		
		$this->render('consultarcuenta'
			,array('persona'=>$persona
				,'dataProvider'=>$dataProvider
				,'key'=>$key
				)
			);
	}

	/**
		este action es invocado desde consultarcuenta.php, en la columna del CGridView.
		
		el argumento data es una serializacion del elemento $data que el CGridView presenta.
		
		lo que $data representa es un objeto en forma de array que proviene de:
			API consultarCuenta
				que a su vez proviene de lo que el host entrega mediante:
					IcyaCuenta::cya_getobject
		
	*/
	public function actionAuditarCuenta($data,$key){
		
		$cuenta = unserialize($data);
		
		$this->render("auditarcuenta",array('cuenta'=>$cuenta,'key'=>$key));
	}
	
}