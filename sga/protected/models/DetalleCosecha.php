<?php

/**
 * This is the model class for table "detalle_cosecha".
 *
 * The followings are the available columns in table 'detalle_cosecha':
 * @property integer $iddetalle_cosecha
 * @property string $nombre_siembra
 * @property double $cantidad_sembrada
 * @property double $cantidad_recogida
 * @property integer $idcosecha
 */
class DetalleCosecha extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalle_cosecha';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_siembra, cantidad_sembrada, cantidad_recogida', 'required'),
			array('idcosecha', 'numerical', 'integerOnly'=>true),
			array('cantidad_sembrada, cantidad_recogida', 'numerical'),
			array('nombre_siembra', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iddetalle_cosecha, nombre_siembra, cantidad_sembrada, cantidad_recogida, idcosecha', 'safe', 'on'=>'search'),
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
			'iddetalle_cosecha' => 'Iddetalle Cosecha',
			'nombre_siembra' => 'Nombre Siembra',
			'cantidad_sembrada' => 'Cantidad Sembrada',
			'cantidad_recogida' => 'Cantidad Recogida',
			'idcosecha' => 'Idcosecha',
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

		$criteria->compare('iddetalle_cosecha',$this->iddetalle_cosecha);
		$criteria->compare('nombre_siembra',$this->nombre_siembra,true);
		$criteria->compare('cantidad_sembrada',$this->cantidad_sembrada);
		$criteria->compare('cantidad_recogida',$this->cantidad_recogida);
		$criteria->compare('idcosecha',$this->idcosecha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleCosecha the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
