<?php class cyaBuscarPersona extends CFormModel {

	public $idpersona;
	public $buscapersona;

	public $key;
	
	public function rules(){
		return array(
			array('buscapersona','required'),
			array('idpersona','required'),
			array('idpersona','numerical','integerOnly'=>true),
			array('idpersona','debeexistir'),
		);
	}
	
	public function debeexistir($attr, $param){
		if(Yii::app()->cyaApi->buscarPersona($this->key,$this->idpersona) == null)
			$this->addError($attr,"persona inexistente");
	}
	
	public function attributeLabels(){
		return array(
			'idpersona' => 'Persona Seleccionada',
			'buscapersona' => 'Tipee parte del nombre aqui:',
		);
	}
	
}