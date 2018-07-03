<?php
class Persona extends CActiveRecord implements IcyaPersona
{
    public function cya_buscarPersonas($texto){
        return 
        Yii::app()->db->createCommand()
            ->select()
            ->from($this->tableName())
            ->where("nombre like :patron", array(
                ':patron'=>"%".$texto."%",
            ))
            ->queryAll();
        ;
    }
    public function cya_getobject($obj){
        return array('id'=>$obj['idpersona'],'label'=>$obj['nombre'],'extra'=>$obj['rifced']);
    }
    public function cya_buscarPersona($id){
        return self::model()->findByPk($id);
    }

    ..
    ..
}