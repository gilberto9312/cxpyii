<?php
class cyaCrearCargo extends CFormModel {

	public $idpersona;
	public $persona; // objeto para mostrar a la persona, es un array ver: cya_getobject 

	public $concepto;
	public $fecha;
	public $monto;
	public $itemno;
	
	public $key;

	public function rules(){
		return array(
			array('idpersona, concepto, fecha, monto','required'),
			array('monto,','numerical','integerOnly'=>false,'min'=>0,'max'=>9999999),
			
			array('itemno,buscapersona', 'safe'),
			array('idpersona','debeexistir'),
			array('fecha','match','pattern'=>'/^([0-9]{1,2})[-]([0-9]{1,2})[-]([0-9]{4})$/'
				,'message'=>'Escriba una fecha dia-mes-año, ejemplo: 31-12-2012',
			),
		);
	}

	public function debeexistir($attr, $param){
		if(Yii::app()->cyaApi->buscarPersona($this->key,$this->idpersona) == null)
			$this->addError($attr,"persona inexistente");
	}

	public function attributeLabels(){
		return array(
			'concepto' => 'Concepto del Cargo',
			'fecha' => 'Fecha del Cargo',
			'monto' => 'Monto',
			'itemno' => 'Item/factura/recibo/#',
			'buscapersona' => 'Buscar persona, tipee parte del nombre aqui:',
		);
	}
}