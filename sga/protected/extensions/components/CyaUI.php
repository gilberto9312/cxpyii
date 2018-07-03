<?php class CyaUI extends CApplicationComponent {

	public function init(){
		parent::init();
	}
	
	private function action($name){
		return "/cargoyabono/default/".$name;
	}
	
	public function getCrearCargoUrl($key,$layout=""){
		return array(self::action('crearcargo'),'key'=>$key,'layout'=>$layout);
	}
	
	public function getCrearAbonoUrl($key,$layout=""){
		return array(self::action('crearabono'),'key'=>$key,'layout'=>$layout);
	}
	
	public function getConsultarUrl($key,$layout=""){
		return array(self::action('consultarcuenta'),'key'=>$key,'layout'=>$layout);
	}
	
	public function getActionAjaxbuscarpersonas($key){
		return Yii::app()->createUrl(self::action('ajaxbuscarpersonas'),array('key'=>$key));
	}
	
	public function getLinkConsultarCuenta($idpersona, $key,$layout="",$titulo="Consultar Cuenta"){
		return CHtml::link($titulo,array(self::action('consultarcuentadepersona'),'key'=>$key,'idpersona'=>$idpersona,'layout'=>$layout));
	}
	
	public function getLinkCrearOtroCargo($idpersona, $key,$layout="",$titulo="Crear un Cargo"){
		return CHtml::link($titulo,array(self::action('crearcargoapersona'),'key'=>$key,'idpersona'=>$idpersona,'layout'=>$layout));
	}
	
	public function getLinkCrearOtroAbono($idpersona, $key,$layout="",$titulo="Crear un Abono"){
		return CHtml::link($titulo,array(self::action('seleccionacargosparaabonar')
			,'key'=>$key,'idpersona'=>$idpersona,'layout'=>$layout));
	}
}