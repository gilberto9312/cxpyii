<?php
require_once($_SERVER['DOCUMENT_ROOT'] .  "/yii/sga/protected/models/libreria.php");
class Arbols extends CActiveRecord
{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
   /**
   * @return string the associated database table name
   */
   public function tableName()
   {
    return 'arbols';
   }
   
  function ContarHijos($tipo,$padreid) {
   $sql = "Select count(*)  From arbols where tipo=".$tipo." and padre_id=".$padreid." order by tipo,padre_id desc";
   $TotaldeRegistros = Arbols::model()->countBySql($sql);
  return $TotaldeRegistros;
 }
 
 function ObtenerHijos($tipo,$padreid,$tira) {
  $TotaldeRegistros = $this->ContarHijos($tipo,$padreid);
  if ($TotaldeRegistros>0) 
  {
   $auxtira = $tira->getV(0) . "  children: [ ";
   $tira->setV(0,$auxtira);
   $Registros = Yii::app()->db->createCommand("Select * From arbols where tipo=".$tipo." and padre_id=".$padreid)->query();
   $J=0;
   foreach($Registros as $fila)  
   {
    $auxtira = $tira->getV(0) . " { text: '" . $fila['text'] . "', id: '" . $fila['id']  . "', href: '". $fila['vinculo']."',  ";
    $tira->setV(0,$auxtira);
    $this->ObtenerHijos($tipo,$fila['id'],$tira);
    $J++;
    if ($J<$TotaldeRegistros) {
     $auxtira = $tira->getV(0) . " }, ";
    }
    else {
     $auxtira = $tira->getV(0) . " } ] "; 
    }
    $tira->setV(0,$auxtira);
   }
  }
  else
  {
   $auxtira = $tira->getV(0) . "  leaf: true  ";
   $tira->setV(0,$auxtira);
  }
 }
 
 function BuscarTodosArbolJson($tipo)
 {
  $tira = new Vector();
  $TotaldeRegistros = $this->ContarHijos($tipo,0);
  if ($TotaldeRegistros>0) 
  {
   $tira->setV(0,"[ ");
   $Registros = Yii::app()->db->createCommand("Select * From arbols where tipo=".$tipo." and padre_id=0")->query();
   $J=0;
   foreach($Registros as $fila)   
   {
    $auxtira = $tira->getV(0) . " { text: '" . $fila['text'] . "',expanded: true, id: '" . $fila['id']  . "', href: '', ";
    $tira->setV(0,$auxtira);
    $this->ObtenerHijos($tipo,$fila['id'],$tira);
    $J++;
    if ($J<$TotaldeRegistros) {
     $auxtira = $tira->getV(0) . " }, ";
    }
    else {
     $auxtira = $tira->getV(0) . " } ] "; 
    }
    $tira->setV(0,$auxtira);  
   }
   $Valor = $tira->getV(0);
  }
  else
  {
   $auxtira = $tira->getV(0) . "[ { { text: 'No hay datos', id: '0', href: '', leaf: true } } ]";
   $tira->setV(0,$auxtira);
   $Valor = $tira->getV(0);
  }
  return $Valor;
 } 
   
}