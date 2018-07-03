<?php

/**
 * This is the model class for table "trabajador".
 *
 * The followings are the available columns in table 'trabajador':
 * @property integer $idtrabajador
 * @property string $nombre
 * @property string $apellidos
 * @property string $sexo
 * @property string $fecha_nac
 * @property string $num_documento
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 * @property string $usuario
 * @property string $password
 * @property string $acceso
 *
 * The followings are the available model relations:
 * @property Gastos[] $gastoses
 * @property Venta $venta
 */
class Trabajador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trabajador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellidos, sexo, fecha_nac, num_documento, usuario, password, acceso', 'required'),
			array('nombre, usuario, password, acceso', 'length', 'max'=>20),
			array('apellidos', 'length', 'max'=>40),
			array('sexo', 'length', 'max'=>1),
			array('num_documento', 'length', 'max'=>8),
			array('direccion', 'length', 'max'=>100),
			array('telefono', 'length', 'max'=>10),
			array('email', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idtrabajador, nombre, apellidos, sexo, fecha_nac, num_documento, direccion, telefono, email, usuario, password, acceso', 'safe', 'on'=>'search'),
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
			'gastoses' => array(self::HAS_MANY, 'Gastos', 'idtrabajador'),
			'venta' => array(self::HAS_ONE, 'Venta', 'idventa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtrabajador' => 'Idtrabajador',
			'nombre' => 'Nombre',
			'apellidos' => 'Apellidos',
			'sexo' => 'Sexo',
			'fecha_nac' => 'Fecha Nac',
			'num_documento' => 'Num Documento',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'email' => 'Email',
			'usuario' => 'Usuario',
			'password' => 'Password',
			'acceso' => 'Acceso',
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

		$criteria->compare('idtrabajador',$this->idtrabajador);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('fecha_nac',$this->fecha_nac,true);
		$criteria->compare('num_documento',$this->num_documento,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('acceso',$this->acceso,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function suggest($keyword,$limit=20)
	{
		$models=$this->findAll(array(
			'condition'=>'nombre LIKE :keyword',
			'order'=>'idtrabajador',
			'limit'=>$limit,
			'params'=>array(':keyword'=>"%$keyword%")
		));
		$suggest=array();
		foreach($models as $model) {
			$suggest[] = array(
				'label'=>$model->nombre.' - '.$model->apellidos.' - '.$model->num_documento,  // label for dropdown list
				'value'=>$model->idtrabajador,  // value for input field
				'razon_social'=>$model->nombre,       // return values from autocomplete
				'num_documento'=>$model->apellidos,

			);
		}
		return $suggest;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Trabajador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

			public function getResponsable()
	{
		return $this->nombre.' '.$this->apellidos;
	}
}
