<?php

/**
 * This is the model class for table "historia".
 *
 * The followings are the available columns in table 'historia':
 * @property integer $idhistoria
 * @property integer $idproveedor
 * @property integer $idcuenta
 * @property string $concepto
 * @property double $total
 *
 * The followings are the available model relations:
 * @property Cuenta $idcuenta0
 * @property Proveedor $idproveedor0
 */
class Historia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Historia the static model class
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
		return 'historia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idproveedor, idcuenta', 'numerical', 'integerOnly'=>true),
			array('total', 'numerical'),
			array('concepto', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhistoria, idproveedor, idcuenta, concepto, total', 'safe', 'on'=>'search'),
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
			'idcuenta0' => array(self::BELONGS_TO, 'Cuenta', 'idcuenta'),
			'idproveedor0' => array(self::BELONGS_TO, 'Proveedor', 'idproveedor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhistoria' => 'Idhistoria',
			'idproveedor' => 'Idproveedor',
			'idcuenta' => 'Idcuenta',
			'concepto' => 'Concepto',
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
         $criteria->condition = "idcuenta like :idcuenta" ;// . $this->getAttribute('idingreso') ; //$this->idingreso;
        $criteria->params = array(':idcuenta'=>$_GET['id']);
        $sort= new CSort();
        $sort-> defaultOrder = 'idhistoria DESC';

		$criteria->compare('idhistoria',$this->idhistoria);
		$criteria->compare('idproveedor',$this->idproveedor);
		$criteria->compare('idcuenta',$this->idcuenta);
		$criteria->compare('concepto',$this->concepto,true);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}