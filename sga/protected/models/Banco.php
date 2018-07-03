<?php

/**
 * This is the model class for table "banco".
 *
 * The followings are the available columns in table 'banco':
 * @property integer $idbanco
 * @property integer $iddisponibilidad
 * @property integer $num_banco
 * @property string $banco
 * @property integer $num_cheque
 * @property double $saldo
 *
 * The followings are the available model relations:
 * @property Disponibilidad $iddisponibilidad0
 */
class Banco extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'banco';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iddisponibilidad, num_banco, num_cheque', 'numerical', 'integerOnly'=>true),
			array('saldo', 'numerical'),
			array('banco', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idbanco, iddisponibilidad, num_banco, banco, num_cheque, saldo', 'safe', 'on'=>'search'),
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
			'iddisponibilidad0' => array(self::BELONGS_TO, 'Disponibilidad', 'iddisponibilidad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idbanco' => 'Idbanco',
			'iddisponibilidad' => 'Iddisponibilidad',
			'num_banco' => 'Num Banco',
			'banco' => 'Banco',
			'num_cheque' => 'Num Cheque',
			'saldo' => 'Saldo',
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

		$criteria->compare('idbanco',$this->idbanco);
		$criteria->compare('iddisponibilidad',$this->iddisponibilidad);
		$criteria->compare('num_banco',$this->num_banco);
		$criteria->compare('banco',$this->banco,true);
		$criteria->compare('num_cheque',$this->num_cheque);
		$criteria->compare('saldo',$this->saldo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Banco the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
