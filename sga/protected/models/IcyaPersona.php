<?php interface IcyaPersona {

	// lista los modelos que coinciden con el patron de busqueda
	//
	public function cya_buscarPersonas($texto);
	
	// busca una persona especifica
	//
	public function cya_buscarPersona($id);
	
	// recibe un modelo (obtenido en la busqueda) y devuelve un array con tres entradas: 
	//
	//	array('id'=>$obj->getPrimaryKey(),'label'=>$obj->xxxx,'extra'=>$obj->zzzz)
	//
	public function cya_getobject($obj);
	
	
}