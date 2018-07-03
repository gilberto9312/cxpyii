<?php

/**
 * This is the model class for table "creditos_disponibilidad".
 *
 * The followings are the available columns in table 'creditos_disponibilidad':
 * @property integer $idcredito
 * @property string $tipo
 * @property double $credito
 * @property integer $idingreso
 * @property string $num_deposito
 * @property string $tipo_transanccion
 */
class CreditosDisponibilidad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'creditos_disponibilidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('credito', 'required'),
			array('idingreso', 'numerical', 'integerOnly'=>true),
			array('credito', 'numerical'),
			array('tipo, num_deposito, tipo_transanccion', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idcredito, tipo, credito, idingreso, num_deposito, tipo_transanccion', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcredito' => 'Idcredito',
			'tipo' => 'Descripcion',
			'credito' => 'Monto a Creditar',
			'idingreso' => 'Idingreso',
			'num_deposito' => 'Numero de transaccion',
			'tipo_transanccion' => 'Tipo Transanccion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idcredito',$this->idcredito);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('credito',$this->credito);
		$criteria->compare('idingreso',$this->idingreso);
		$criteria->compare('num_deposito',$this->num_deposito,true);
		$criteria->compare('tipo_transanccion',$this->tipo_transanccion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CreditosDisponibilidad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
