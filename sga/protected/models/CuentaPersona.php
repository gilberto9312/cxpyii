<?php 
class CuentaPersona extends CActiveRecord implements IcyaCuenta
{
    const CUENTA_CARGO = 1;
    const CUENTA_ABONO = 2;

    const ESTATUSCUENTA_PENDIENTE = 0;
    const ESTATUSCUENTA_PARCIAL = 1;
    const ESTATUSCUENTA_TOTAL = 2;
    const ESTATUSCUENTA_NOAPLICA = 3;

    // recibe un array con atributos para crear una cuenta nueva de tipo cargo
    //  ejemplo:
    //      [idpersona,1][concepto,hola][fecha,01-08-2012][monto,2000][itemno,4555][key,cuenta]
    public function cya_crearcargo($campos){

        $cargo = new CuentaPersona();
        $cargo->tipocuenta = self::CUENTA_CARGO;
        $cargo->fechahora = time();
        $cargo->fecha = time($campos['fecha']);
        $cargo->monto = 1*($campos['monto']);
        $cargo->concepto = $campos['concepto'];
        $cargo->itemno = $campos['itemno'];
        $cargo->idpersona = $campos['idpersona'];
        $cargo->estatuscuenta = self::ESTATUSCUENTA_PENDIENTE;
        if($cargo->insert()){
            return $cargo->getPrimaryKey();
        }else{
            return null;
        }
    }
    // recibe un array con atributos para crear una cuenta nueva de tipo cargo
    //  ejemplo:
    //      [idpersona,1][concepto,hola][fecha,01-08-2012][monto,2000][itemno,4555][key,cuenta]
    //  por ser un abono, recibe tres campos mas: (a diferencia de crearcargo)
    //      [docnum,1298918291][doctipo,CHECK][docentidad,banco mercantil]
    public function cya_crearabono($campos){

        $cargo = new CuentaPersona();
        $cargo->tipocuenta = self::CUENTA_ABONO;
        $cargo->fechahora = time();
        $cargo->fecha = time($campos['fecha']);
        $cargo->monto = 1*($campos['monto']);
        $cargo->concepto = $campos['concepto'];
        $cargo->itemno = $campos['itemno'];
        $cargo->idpersona = $campos['idpersona'];
        $cargo->estatuscuenta = self::ESTATUSCUENTA_NOAPLICA;

        $cargo->docnum = $campos['docnum'];
        $cargo->doctipo = $campos['doctipo'];
        $cargo->docentidad = $campos['docentidad'];

        if($cargo->insert()){
            return $cargo->getPrimaryKey();
        }else{
            return null;
        }
    }
    /** Lista las cuenta de la persona seleccionada.

        $params:
            es un array de parametros que el API envia a la clase host.
            se cuenta con:
                'pagadas'=>true o false,  
                    para indicar que entrege solo las cuentas pagadas o no.

        se espera que retorne:

            return  self::model()->findAllByAttributes(array('idpersona'=>$idpersona));
    */
    public function cya_listarcuentas($idpersona,$params=array()){
        if(isset($params['pagadas'])){

            if($params['pagadas'] == true){
                $criteria=new CDbCriteria();
                $criteria->compare('idpersona',$idpersona);
                $criteria->compare('tipocuenta',self::CUENTA_CARGO);
                $criteria->compare('estatuscuenta',self::ESTATUSCUENTA_TOTAL,false);
                return self::model()->findAll($criteria);
            }else{
                return self::model()->findAll(
                         'idpersona = '.$idpersona.' and tipocuenta = '.self::CUENTA_CARGO.' and '
                        .'(estatuscuenta = '.self::ESTATUSCUENTA_PENDIENTE.') or '
                        .'(estatuscuenta = '.self::ESTATUSCUENTA_PARCIAL.')'
                    );
            }
        }else{
            return self::model()->findAllByAttributes(array('idpersona'=>$idpersona));
        }
    }
    /** pide al modelo host que devuelva un array con los campos solicitados.

        array('id'=>'x','fecha'=>'x','tipo'=>'x','concepto'=>'x','monto'=>1000,'idpersona'=>1
            ,'tipocuenta'=>'1','tipocuentatxt'=>'CARGO','estatus'=>1,'estatustxt'=>'pendiente'
            ,'montoabonado'=>900,'montopendiente'=>100,'refno'=>'12287',
            ,'docnum'=>'19289812', 'doctipo'=>'check', 'docentidad'=>'banco mercantil')     
    */
    public function cya_getobject($obj){
        return array(
            'id'=>$obj->getPrimaryKey(),
            'fecha'=>$obj->fecha,
            'tipo'=>$obj->tipocuenta,
            'concepto'=>$obj->concepto,
            'monto'=>$obj->monto,
            'refno'=>$obj->itemno,
            'idpersona'=>$obj->idpersona,
            'tipocuenta'=>$obj->tipocuenta,
            'tipocuentatxt'=>$obj->tipocuenta==self::CUENTA_CARGO ? "CARGO" : "ABONO",
            'estatus'=>$obj->estatuscuenta,
            'estatustxt'=>self::etiquetarEstatus($obj->estatuscuenta),
            'montoabonado'=>$obj->montoabonado,
            'montopendiente'=>$obj->monto-$obj->montoabonado,
            'docnum'=>$obj->docnum,
            'doctipo'=>$obj->doctipo,
            'docentidad'=>$obj->docentidad,
        );
    }

    /** registra una historia de abono a un cargo por un valor especifico.

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
    public function cya_crearhistoriaabono($idAbono,$idCargo,$montoAbonado){
        Yii::app()->db->createCommand()
            ->insert("zlm_historiaabono", array(
                'idabono'=>$idAbono,
                'idcargo'=>$idCargo,
                'fechahora'=>time(),
                'monto'=>$montoAbonado
            ));
    }

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
    public function cya_actualizarcargo($idcargo,$monto){
        $cargoInst = self::model()->findByPk($idcargo);
        $cargoInst->montoabonado = $cargoInst->montoabonado + $monto;
        $cargoInst->estatuscuenta = self::ESTATUSCUENTA_PARCIAL;
        if($cargoInst->montoabonado >= $cargoInst->monto)
            $cargoInst->estatuscuenta = self::ESTATUSCUENTA_TOTAL;
        $cargoInst->update();
    }

    public function etiquetarEstatus($valor){
        if($valor == self::ESTATUSCUENTA_PENDIENTE)
            return "pendiente";
        if($valor == self::ESTATUSCUENTA_PARCIAL)
            return "parcial";
        if($valor == self::ESTATUSCUENTA_TOTAL)
            return "total";
        if($valor == self::ESTATUSCUENTA_NOAPLICA)
            return "...";

        return "estatus desconocido";
    }

    ...
    ...
}