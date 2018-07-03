<?php

/**
 * This is the model class for table "cuenta".
 *
 * The followings are the available columns in table 'cuenta':
 * @property integer $idcuenta
 * @property integer $idcosecha
 * @property integer $idtrabajador
 * @property integer $idproveedor
 * @property string $fecha
 * @property string $tipo_comprobante
 * @property string $serie
 * @property string $correlativo
 * @property string $estado
 * @property double $base_imponible
 * @property double $total
 *
 * The followings are the available model relations:
 * @property Cosecha $idcosecha0
 * @property Proveedor $idproveedor0
 * @property Historia[] $historias
 */
class Cuenta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cuenta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cuenta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcosecha, idtrabajador, idproveedor, fecha, tipo_comprobante, serie, correlativo, estado', 'required'),
			array('idcosecha, idtrabajador, idproveedor', 'numerical', 'integerOnly'=>true),
			array('base_imponible, total', 'numerical'),
			array('tipo_comprobante', 'length', 'max'=>20),
			array('serie', 'length', 'max'=>4),
			array('correlativo, estado', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcuenta, idcosecha, idtrabajador, idproveedor, fecha, tipo_comprobante, serie, correlativo, estado, base_imponible, total', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idcosecha0' => array(self::BELONGS_TO, 'Cosecha', 'idcosecha'),
			'idproveedor0' => array(self::BELONGS_TO, 'Proveedor', 'idproveedor'),
			'historias' => array(self::HAS_MANY, 'Historia', 'idcuenta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcuenta' => 'Cuenta',
			'idcosecha' => 'Cosecha',
			'idtrabajador' => 'Responsable',
			'idproveedor' => 'Proveedor',
			'fecha' => 'Fecha',
			'tipo_comprobante' => 'Tipo Comprobante',
			'serie' => 'Serie',
			'correlativo' => 'Correlativo',
			'estado' => 'Estado',
			'base_imponible' => 'Base Imponible',
			'total' => 'Total',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = "total>0";

		$criteria->compare('idcuenta',$this->idcuenta);
		$criteria->compare('idcosecha',$this->idcosecha);
		$criteria->compare('idtrabajador',$this->idtrabajador);
		$criteria->compare('idproveedor',$this->idproveedor);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('tipo_comprobante',$this->tipo_comprobante,true);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('correlativo',$this->correlativo,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('base_imponible',$this->base_imponible);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}