<?php
class CyaSeleccionaCargos extends CFormModel {

	public $monto;	// es un array indexado de array(id=>montoAbono,...)

	public function rules(){
		return array(
			array('monto','safe'),
			array('monto','verifica_montos'),
		);
	}
	
	public function verifica_montos($attr,$param){
		if(count($this->monto) <= 0){
			$this->addError('monto','Necesita especificar los montos a abonar');
			return;
		}
		
		$todosCero=true;
		foreach($this->monto as $id=>$v){
			$vv = trim($v);
			if($vv != ''){
				if(is_float($vv) || is_int((int)($vv))){
					$vf = ($vv)*1.0;
					if(($vf > 0) && ($vf <= 9999999)){
					}else{
						$this->addError('monto','El monto ['.$v.'] debe estar comprendido entre >0 y 9999999');
					}
				}else{
					$this->addError('monto','Ha especificado un monto invalido: ['.$v.']');
				}
			}
		}
	} 
	
	public function attributeLabels(){
		return array(
		);
	}
}