<?php interface IcyaCuenta {
	
	// recibe un array con atributos para crear una cuenta nueva de tipo cargo
	//	ejemplo:
	//		[idpersona,1][concepto,hola][fecha,01-08-2012][monto,2000][itemno,4555][key,cuenta]
	public function cya_crearcargo($campos);
	
	// recibe un array con atributos para crear una cuenta nueva de tipo cargo
	//	ejemplo:
	//		[idpersona,1][concepto,hola][fecha,01-08-2012][monto,2000][itemno,4555][key,cuenta]
	//	por ser un abono, recibe tres campos mas: (a diferencia de crearcargo)
	//		[docnum,1298918291][doctipo,CHECK][docentidad,banco mercantil]
	public function cya_crearabono($campos);
	
	/** Lista las cuenta de la persona seleccionada.
	
		$params:
			es un array de parametros que el API envia a la clase host.
			se cuenta con:
				'pagadas'=>true o false,  
					para indicar que entrege solo las cuentas pagadas o no.
				'tipocuenta'=>(tipo de cuenta a filtrar, ejemplo: 1,cargo)
	
		se espera que retorne:
			
			return 	self::model()->findAllByAttributes(array('idpersona'=>$idpersona));
	*/
	public function cya_listarcuentas($idpersona,$params=array());
	
	/** pide al modelo host que devuelva un array con los campos solicitados.
		
		array('id'=>'x','fecha'=>'x','tipo'=>'x','concepto'=>'x','monto'=>1000,'idpersona'=>1
			,'tipocuenta'=>'1','tipocuentatxt'=>'CARGO','estatus'=>1,'estatustxt'=>'pendiente'
			,'montoabonado'=>900,'montopendiente'=>100,'refno'=>'12287',
			,'docnum'=>'19289812', 'doctipo'=>'check', 'docentidad'=>'banco mercantil')		
	*/
	public function cya_getobject($obj);
	
	
	/**	registra una historia de abono a un cargo por un valor especifico. 
		
		sirve para registrar que abonos se le hicieron a cual cargo y viceversa.
		
		idAbono:	
			el identificador primario del abono obtenido con cyaApi.crearAbono
			
		idCargo:
			el identificador primario del cargo a ser abonado.
			
		montoAbonado:	
			el valor que se le quiere abonar al cargo
		
		returns:
			nada
	*/
	public function cya_crearhistoriaabono($idAbono,$idCargo,$montoAbonado);
	
	
	
	/** suma el monto al cargo indicado, para ser acumulado en cargo.montoabonado.
		
		deberia ser usada en conjunto con crearHistoriaAbono, para que quede historia
		de los abonos realizados a un cargo.
		
		idcargo:
			el identificador primario del cargo a ser abonado.
		monto:
			el valor que se quiere sumar a cargo.montoabonado
		
		returns:
			nada.
	*/
	public function cya_actualizarcargo($idcargo,$monto);	
}