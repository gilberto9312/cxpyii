<?php

/**
 * This is the model class for table "proveedor".
 *
 * The followings are the available columns in table 'proveedor':
 * @property integer $idproveedor
 * @property string $razon_social
 * @property string $sector_comercial
 * @property string $tipo_documento
 * @property string $num_documento
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 * @property string $url
 *
 * The followings are the available model relations:
 * @property Gastos[] $gastoses
 */
class Proveedor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proveedor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('razon_social, sector_comercial, tipo_documento, num_documento', 'required'),
			array('razon_social', 'length', 'max'=>150),
			array('sector_comercial, email', 'length', 'max'=>50),
			array('tipo_documento', 'length', 'max'=>20),
			array('num_documento', 'length', 'max'=>11),
			array('direccion, url', 'length', 'max'=>100),
			array('telefono', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idproveedor, razon_social, sector_comercial, tipo_documento, num_documento, direccion, telefono, email, url', 'safe', 'on'=>'search'),
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
			'gastoses' => array(self::HAS_MANY, 'Gastos', 'idproveedor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idproveedor' => 'idproveedor',
			'razon_social' => 'Razon Social',
			'sector_comercial' => 'Sector Comercial',
			'tipo_documento' => 'Tipo Documento',
			'num_documento' => 'Rif/CI',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'email' => 'Email',
			'url' => 'Url',
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

		$criteria->compare('idproveedor',$this->idproveedor);
		$criteria->compare('razon_social',$this->razon_social,true);
		$criteria->compare('sector_comercial',$this->sector_comercial,true);
		$criteria->compare('tipo_documento',$this->tipo_documento,true);
		$criteria->compare('num_documento',$this->num_documento,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

			public function legacySuggest($keyword,$limit=20)
	{
		$models=$this->findAll(array(
			'condition'=>'razon_social LIKE :keyword',
			'order'=>'razon_social',
			'limit'=>$limit,
			'params'=>array(':keyword'=>"%$keyword%")
		));
		$suggest=array();
		foreach($models as $model)
			$suggest[]=$model->idproveedor.'|'.$model->idproveedor;
		return $suggest;
	}

		public function suggest($keyword,$limit=20)
	{
		$models=$this->findAll(array(
			'condition'=>'num_documento LIKE :keyword',
			'order'=>'num_documento',
			'limit'=>$limit,
			'params'=>array(':keyword'=>"%$keyword%")
		));
		$suggest=array();
		foreach($models as $model) {
			$suggest[] = array(
				'label'=>$model->num_documento.' - '.$model->idproveedor.' - '.$model->razon_social,  // label for dropdown list
				'value'=>$model->idproveedor,  // value for input field
				'num_documento'=>$model->num_documento,       // return values from autocomplete
				'razon_social'=>$model->razon_social,

			);
		}
		return $suggest;
	}

	public function suggestD($keyword,$limit=20)
	{
		$models=$this->findAll(array(
			'condition'=>'num_documento LIKE :keyword',
			'order'=>'num_documento',
			'limit'=>$limit,
			'params'=>array(':keyword'=>"%$keyword%")
		));
		$suggestD=array();
		foreach($models as $model) {
			$suggestD[] = array(
				'label'=>$model->num_documento.' - '.$model->razon_social.' - '.$model->sector_comercial,  // label for dropdown list
				'value'=>$model->num_documento,  // value for input field
				'razon_social'=>$model->razon_social,       // return values from autocomplete
				'num_documento'=>$model->sector_comercial,

			);
		}
		return $suggestD;
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proveedor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
			public function getDocumento()
	{
		return $this->tipo_documento.'-'.$this->num_documento;
	}
}
