<?php

/**
 * This is the model class for table "recoleccion".
 *
 * The followings are the available columns in table 'recoleccion':
 * @property integer $idrecoleccion
 * @property integer $idcosecha
 * @property integer $idarticulo
 * @property string $fecha_recolecta
 * @property string $fecha_vencimiento
 * @property string $comentario
 * @property integer $idtipomovimiento
 * @property double $cantidad_recogida
 *
 * The followings are the available model relations:
 * @property Articulo $idarticulo0
 * @property Cosecha $idcosecha0
 * @property TipoMovimiento $idtipomovimiento0
 */
class Recoleccion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recoleccion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcosecha, idarticulo, fecha_recolecta, fecha_vencimiento, cantidad_recogida', 'required'),
			array('idcosecha, idarticulo, idtipomovimiento', 'numerical', 'integerOnly'=>true),
			array('cantidad_recogida', 'numerical'),
			array('comentario', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idrecoleccion, idcosecha, idarticulo, fecha_recolecta, fecha_vencimiento, comentario, idtipomovimiento, cantidad_recogida', 'safe', 'on'=>'search'),
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
			'idarticulo0' => array(self::BELONGS_TO, 'Articulo', 'idarticulo'),
			'idcosecha0' => array(self::BELONGS_TO, 'Cosecha', 'idcosecha'),
			'idtipomovimiento0' => array(self::BELONGS_TO, 'TipoMovimiento', 'idtipomovimiento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrecoleccion' => 'Idrecoleccion',
			'idcosecha' => 'Cosecha',
			'idarticulo' => 'Articulo',
			'fecha_recolecta' => 'F/ Recolecta',
			'fecha_vencimiento' => 'F/ Vencimiento',
			'comentario' => 'Comentario',
			'idtipomovimiento' => 'Idtipomovimiento',
			'cantidad_recogida' => 'Cantidad Recogida',
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

		$criteria->compare('idrecoleccion',$this->idrecoleccion);
		$criteria->compare('idcosecha',$this->idcosecha);
		$criteria->compare('idarticulo',$this->idarticulo);
		$criteria->compare('fecha_recolecta',$this->fecha_recolecta,true);
		$criteria->compare('fecha_vencimiento',$this->fecha_vencimiento,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('idtipomovimiento',$this->idtipomovimiento);
		$criteria->compare('cantidad_recogida',$this->cantidad_recogida);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recoleccion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
