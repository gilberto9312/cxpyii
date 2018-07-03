<?php

/**
 * This is the model class for table "cosecha".
 *
 * The followings are the available columns in table 'cosecha':
 * @property integer $idcosecha
 * @property string $nombre_cosecha
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $temporada
 *
 * The followings are the available model relations:
 * @property Gastos[] $gastoses
 */
class Cosecha extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cosecha the static model class
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
		return 'cosecha';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_cosecha, fecha_inicio, fecha_fin, temporada', 'required'),
			array('nombre_cosecha', 'length', 'max'=>50),
			array('temporada', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcosecha, nombre_cosecha, fecha_inicio, fecha_fin, temporada', 'safe', 'on'=>'search'),
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
			'gastoses' => array(self::HAS_MANY, 'Gastos', 'idcosecha'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcosecha' => 'Idcosecha',
			'nombre_cosecha' => 'Nombre Cosecha',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'temporada' => 'Temporada',
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

		$criteria->compare('idcosecha',$this->idcosecha);
		$criteria->compare('nombre_cosecha',$this->nombre_cosecha,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('temporada',$this->temporada,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}