<?php class CyaApi extends CApplicationComponent {
	
	public function init(){
		
		// comprueba algunas cosas necesarias
		
	
	
		parent::init();
	}
	
	public function getConfig($key){
		$configuraciones = Yii::app()->getModule('cargoyabono')->config;
		return $configuraciones[$key];
	}
	
	/** devuelve cual es el valor que representa un CARGO en el modelo de cuenta seleccionado.
		
	*/
	public function getParamCargo($key){
		$c = $this->getConfig($key);
		return ($c['cargo'])*1;
	}
	/** devuelve cual es el valor que representa un ABONO en el modelo de cuenta seleccionado.
		
	*/
	public function getParamAbono($key){
		$c = $this->getConfig($key);
		return ($c['abono'])*1;
	}
	
	/** retorna los tipos de documento de pago
	
	*/
	public function getTiposDeDoc(){
		return array(
			'EFE'=>'EFECTIVO',
			'CHK'=>'CHEQUE',
			'DEP'=>'DEPOSITO',
			'TRF'=>'TRANSFERENCIA'
		);
	}
	public function getTipoDoc($tipodoc){
		$ar = $this->getTiposDeDoc();
		if(array_key_exists($tipodoc,$ar))
			return $ar[$tipodoc];
		return $tipodoc."?";
	}


	/** busca una persona especifica

		este metodo requiere en la clase host a la interfaz IcyaPersona 
		(metodos: cya_buscarPersona y cya_getobject)
	
		key:
		es la llave de configuracion a usar existente en config/main.php		

		idpersona:
		es el identificador primario de la persona
		
		returns:
			un item en forma de arrayc con:
				array('id'=>1,'label'=>'asc informatix c.a.','extra'=>'rif empresa o lo que sea')
			o null si no encuentra coincidencias.
	*/
	public function buscarPersona($key,$idpersona){
		$c = self::getConfig($key);
		$personaClassName = $c['persona'];
		$inst = new $personaClassName();
		$p = $inst->cya_buscarPersona($idpersona);
		if($p == null)
			return null;
		return $inst->cya_getobject($p);
	}
	
	/** entrega una lista de personas segun criterio de busqueda.

		este metodo requiere en la clase host a la interfaz IcyaPersona 
		(metodos: cya_buscarPersonas y cya_getobject)
	
		key:
		es la llave de configuracion a usar existente en config/main.php		

		texto:
		palabras de busqueda

		ver la documentacion de la interfaz para conocer que espera cada metodo al retorno.
		
		
		returns:
			array con entradas generadas por cya_getobject
			
		ejemplo:
		
		$lista = Yii::app()->cyaApi->buscarPersonas('cuenta',"asc");
		
		// devolvera un array con personas que contengan "asc" en parte de su nombre segun
		// como haya sido implementada la busqueda, en el nombre, en donde se quiera.
		
		cada item de $lista es un array que contiene: 
			array('id'=>1,'label'=>'asc informatix c.a.','extra'=>'rif empresa o lo que sea')
		
	*/
	public function buscarPersonas($key,$texto){
		$c = self::getConfig($key);
		$personaClassName = $c['persona'];
		$inst = new $personaClassName();
		$lista = $inst->cya_buscarPersonas($texto);
		$result = array();
		foreach($lista as $obj){
			Yii::log("*.".CJSON::encode($obj),"info");
			$result[] = $inst->cya_getobject($obj);
		}
		return $result;
	}
	
	/**	crea un cargo en el sistema host usando la interfaz IcyaCuenta::cya_crearcargo
		
		key:
			es la llave de configuracion a usar existente en config/main.php		
		attributes: 
			es un array key=>value con los siguientes items:
			[idpersona,1][concepto,hola][fecha,01-08-2012][monto,2000][itemno,4555][key,cuenta]	


		ejemplo:
		
			Yii::app()->cyaApi->crearCargo('cuenta',
					array(	
						'idpersona'=>'1',
						'concepto'=>'hola',
						'fecha'=>'01-08-2012',
						'monto'=>'2000',
						'itemno'=>'4555',
						'key'=>'cuenta'
					)
				);
				
		returns:
			el identificador primario del registro creado.
	*/
	public function crearCargo($key,$attributes){
		$c = self::getConfig($key);
		$cuentaClassName = $c['cuenta'];
		$inst = new $cuentaClassName();
		return $inst->cya_crearcargo($attributes);
	}
	
	/**	crea un abono en el sistema host usando la interfaz IcyaCuenta::cya_crearabono
		
		key:
			es la llave de configuracion a usar existente en config/main.php		
		attributes: 
			es un array key=>value con los siguientes items:
			[idpersona,1][concepto,hola][fecha,01-08-2012][monto,2000][itemno,4555][key,cuenta]		
			
		ejemplo:
		
			ver ejemplo en crearCargo
			
		returns:
			el identificador primario del registro creado.
	*/
	public function crearAbono($key,$attributes){
		$c = self::getConfig($key);
		$cuentaClassName = $c['cuenta'];
		$inst = new $cuentaClassName();
		return $inst->cya_crearabono($attributes);
	}
	
	/** consulta de cuenta de la persona seleccionada usando la interfaz IcyaCuenta.
	
		key:
			es la llave de configuracion a usar existente en config/main.php		
		idpersona:
			el identificador primario de la persona.
		params:
			@see ICyaCuenta::cya_listarcuentas para detalles
	
		returns: devuelve un array ordenado con items
				 ver IcyaCuenta::cya_getobject
			
		ejemplo:
		
		$lista = Yii::app()->cyaApi->consultaCuenta('cuenta',1);
		foreach($lista as $item)
			echo "hacer algo con el item: ".$item['fecha'];
			
	*/
	public function consultaCuenta($key,$idpersona,$params=array()){
		$c = self::getConfig($key);
		$cuentaClassName = $c['cuenta'];
		$inst = new $cuentaClassName();
		$lista = $inst->cya_listarcuentas($idpersona,$params);
		$ret = array();
		if(count($lista) > 0)
			foreach($lista as $obj)
				$ret[] = $inst->cya_getobject($obj);
		return $ret;
	}
	
	/** obtiene una lista de cuentas que no han sido pagadas.
		
		funciona igual que consultaCuenta pero en este caso pidiendole a la clase host
		que filtre cuales cuentas no estan pagadas.
	
		returns:
			@see consultaCuenta
	*/
	public function listarCuentasPagadas($key, $idpersona){
		return self::consultaCuenta($key,$idpersona,array('pagadas'=>true));
	}
	public function listarCuentasNoPagadas($key, $idpersona){
		return self::consultaCuenta($key,$idpersona,array('pagadas'=>false));
	}
	public function listarCuentasTipoAbono($key, $idpersona){
		return self::consultaCuenta($key,$idpersona,array('tipocuenta'=>$this->getParamAbono($key)));
	}
	public function listarCuentasTipoCargo($key, $idpersona){
		return self::consultaCuenta($key,$idpersona,array('tipocuenta'=>$this->getParamCargo($key)));
	}
	/** lista los ABONOS que se hicieron para este CARGO (id)
	
		requiere interfaz: icya_historia
	
		returns:
			array. lista de historia con campos definidos en icya_historia.cya_getobject();
	*/
	public function listarHistoriaCargo($key, $id){
		$c = self::getConfig($key);
		$cuentaClassName = $c['historia'];
		$inst = new $cuentaClassName();
		$lista = $inst->cya_listarhistoriacargo($id);
		$ret = array();
		if(count($lista) > 0)
			foreach($lista as $obj)
				$ret[] = $inst->cya_getobject($obj);
		return $ret;
	}
	
	
	/** lista los CARGOS que se abonaron con el ABONO indicado (id)
	
		requiere interfaz: icya_historia
	
		returns:
			array. lista de historia con campos definidos en icya_historia.cya_getobject();
	*/
	public function listarHistoriaAbono($key, $id){
		$c = self::getConfig($key);
		$cuentaClassName = $c['historia'];
		$inst = new $cuentaClassName();
		$lista = $inst->cya_listarhistoriaabono($id);
		$ret = array();
		if(count($lista) > 0)
			foreach($lista as $obj)
				$ret[] = $inst->cya_getobject($obj);
		return $ret;
	}

	/** calcula el saldo de una cuenta e informa acerca de totales de cargo y abonos realizados.
	
		key:
			es la llave de configuracion a usar existente en config/main.php		
		idpersona:
			el identificador primario de la persona.
		
		returns:
			array
				[0]: saldo 			(valor numerico float)
				[1]: total cargos	(valor numerico float)
				[2]: total abonos	(valor numerico float)
				
		ejemplo:
		
		$valores = Yii::app()->cyaApi->calculaSaldo($key,1);
		echo "saldo es: ".$valores[0];
	*/
	public function calculaSaldo($key,$idpersona){
		$c = self::getConfig($key);
		$cuentaClassName = $c['cuenta'];
		$valorTipoCargo = $this->getParamCargo($key);
		$valorTipoAbono = $this->getParamAbono($key);
		
		$inst = new $cuentaClassName();
		$lista = $inst->cya_listarcuentas($idpersona);
		$saldo = 0;
		$totalCargos = 0;
		$totalAbonos = 0;
		
		if(count($lista) > 0)
			foreach($lista as $obj){
				$k = $inst->cya_getobject($obj);
				if($k['tipo']==$valorTipoCargo)
					$totalCargos += (1*($k['monto']));
				if($k['tipo']==$valorTipoAbono)
					$totalAbonos += (1*($k['monto']));
			}
			
		$saldo = $totalCargos - $totalAbonos;
		return array($saldo,$totalCargos,$totalAbonos);
	}

	/**	registra una historia de abono a un cargo por un valor especifico. 
		
		sirve para registrar que abonos se le hicieron a cual cargo y viceversa.
		
		key:
			identificador de la configuracion de cuenta
		
		idAbono:	
			el identificador primario del abono obtenido con cyaApi.crearAbono
			
		idCargo:
			el identificador primario del cargo a ser abonado.
			
		montoAbonado:	
			el valor que se le quiere abonar al cargo
		
		returns:
			nada
	*/
	public function crearhistoriaabono($key,$idAbono,$idCargo,$montoAbonado){
		$monto = (1.0)*($montoAbonado);
		if($monto > 0){
			$c = self::getConfig($key);
			$cuentaClassName = $c['cuenta'];
			$inst = new $cuentaClassName();
			$inst->cya_crearhistoriaabono($idAbono,$idCargo,$monto);
		}
	}
	
	/** suma el monto al cargo indicado, para ser acumulado en cargo.montoabonado.
		
		deberia ser usada en conjunto con crearHistoriaAbono, para que quede historia
		de los abonos realizados a un cargo.
		
		key:
			identificador de la configuracion de cuenta
		idcargo:
			el identificador primario del cargo a ser abonado.
		monto:
			el valor que se quiere sumar a cargo.montoabonado
		
		returns:
			nada.
	*/
	public function actualizarcargo($key,$idcargo,$monto){
		$c = self::getConfig($key);
		$cuentaClassName = $c['cuenta'];
		$inst = new $cuentaClassName();
		$inst->cya_actualizarcargo($idcargo,(1.0)*$monto);
	}
}