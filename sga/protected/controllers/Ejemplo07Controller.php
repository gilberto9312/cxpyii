<?php
/**
 * Demos para usar la Extjs 4.2
 * 
 * Ejemplo07Controller 
 *
 * @author Edgar Gonzalez <egonzale@ucla.edu.ve>
 * @version $Id: 1
 * 
 * * Se ejecuta en el navegador:
 *  http://localhost/yii/extjs-avanzado-yii/index.php?r=ejemplo07
 */
require_once($_SERVER['DOCUMENT_ROOT'] .  "/yii/sga/protected/models/libreria.php");
require_once($_SERVER['DOCUMENT_ROOT'] .  "/yii/sga/protected/models/arbols.php");

require_once 'SiteController.php';
class Ejemplo07Controller extends SiteController
{
	/**
	 * @var string asigna por defecto 'index'
	 */

 public function init() {
 }
 /**
 * Accion index.
 */
 public function actionindex()
 {
 $this->render('index');
 }
	
function actiongenerarmenu() {
  $tipo=$_REQUEST['tipo'];
  $objarbol = new Arbols();
  $tirajson = $objarbol->BuscarTodosArbolJson($tipo);
  echo $tirajson;
 }

}

?>