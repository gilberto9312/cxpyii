<?php 
	interface IcyaHistoria {
	
		/** lista los ABONOS que se hicieron para este CARGO (id)
		
			ejemplo:
				valor que retorna model()->findAllByAttributes()
				
			returns:
				array de instancias de clase del modelo de datos
		*/
		public function cya_listarhistoriacargo($id);
		
		/** lista los CARGOS que se abonaron con el ABONO indicado (id)
		
			ejemplo:
				valor que retorna model()->findAllByAttributes()
		
			returns:
				array de instancias de clase del modelo de datos
		*/
		public function cya_listarhistoriaabono($id);
		
		/** obtiene los valores del objeto en forma de array.
			
			obj:
				instancia del modelo de datos recibida por funciones cya_listarhistoriaXXXX()
			
			returns:
				array con lista de campos:
			
				id:			identificador primario del registro de historia
				idcargo: 	identificador primario de la cuenta cargo
				idabono: 	identificador primario de la cuenta abono
				fechahora:	valor numerico del timestamp de fechahora
				monto:		valor float del monto abonado
				adata:		data (string) serializada del registro abono referenciado
				cdata:		data (string) serializada del registro cargo referenciado
		*/
		public function cya_getobject($obj);
	}
?>