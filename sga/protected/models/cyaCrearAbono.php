<?php
class cyaCrearAbono extends CFormModel {

	public $idpersona;
	public $persona; // objeto para mostrar a la persona, es un array ver: cya_getobject 
	public $concepto;
	public $fecha;
	public $monto;
	public $itemno;
	public $key;
	public $montos; // array indexado con entradas id=>abono

	public $docnum='no aplica';
	public $doctipo='EFE';
	public $docentidad='no aplica';
	
	
	/** recibe un array indexado con entradas id=>abono
		
	*/
	public function setMontos($montos){
		$this->montos = $montos;
		$this->monto = 0;
		if(count($montos) > 0)
			foreach($montos as $id=>$abono)
				$this->monto += $abono;
	}
	
	public function rules(){
		return array(
			array('idpersona, concepto, fecha, monto','required'),
			array('monto,','numerical','integerOnly'=>false,'min'=>0,'max'=>9999999),
			
			array('docnum, doctipo, docentidad','required'),
			
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
			'concepto' => 'Concepto del Abono',
			'fecha' => 'Fecha del Abono',
			'monto' => 'Monto a Abonar',
			'itemno' => 'Item/factura/recibo/#',
			'buscapersona' => 'Buscar persona, tipee parte del nombre aqui:',
			
			'docnum' => 'Numero de Documento',
			'doctipo' => 'Tipo de Documento',
			'docentidad' => 'Entidad',
		);
	}
}