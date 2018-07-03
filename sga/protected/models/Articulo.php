<?php

/**
 * This is the model class for table "articulo".
 *
 * The followings are the available columns in table 'articulo':
 * @property integer $idarticulo
 * @property string $codigo
 * @property string $nombre
 * @property string $descripcion
 * @property string $imagen
 * @property string $uso_interno
 * @property string $usa_existencia
 * @property string $es_siembra
 * @property integer $idcategoria
 * @property integer $idpresentacion
 * @property string $cod_impuesto
 * @property double $cantidad_anterior
 * @property double $cantidad_act
 *
 * The followings are the available model relations:
 * @property Impuesto $codImpuesto
 * @property Categoria $idcategoria0
 * @property Presentacion $idpresentacion0
 * @property DetalleIngreso[] $detalleIngresos
  * @property DetalleMovimientoInventario[] $detalleMovimientoInventarios
 * @property MovimientoInventario[] $movimientoInventarios
 * @property Recoleccion[] $recoleccions
 */
class Articulo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'articulo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo, nombre', 'required'),
			array('idcategoria, idpresentacion', 'numerical', 'integerOnly'=>true),
			array('cantidad_anterior, cantidad_act, costo_anterior, costo_actual, precio_anterior, precio_actual', 'numerical'),
			array('cantidad', 'length', 'max'=>11),
			array('codigo, nombre', 'length', 'max'=>50),
			array('imagen', 'length', 'max'=>100),
			array('uso_interno, usa_existencia, es_siembra', 'length', 'max'=>1),
			array('cod_impuesto', 'length', 'max'=>3),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idarticulo, cantidad, codigo, nombre, descripcion, imagen, uso_interno, usa_existencia, es_siembra, idcategoria, idpresentacion, cod_impuesto, cantidad_anterior, cantidad_act, costo_anterior, costo_actual, precio_anterior, precio_actual', 'safe', 'on'=>'search'),
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
			'codImpuesto' => array(self::BELONGS_TO, 'Impuesto', 'cod_impuesto'),
			'idcategoria0' => array(self::BELONGS_TO, 'Categoria', 'idcategoria'),
			'idpresentacion0' => array(self::BELONGS_TO, 'Presentacion', 'idpresentacion'),
			'cantidadAlmacens' => array(self::HAS_MANY, 'CantidadAlmacen', 'idarticulo'),
			'detalleAlmacens' => array(self::HAS_MANY, 'DetalleAlmacen', 'idarticulo'),
			'detalleIngresos' => array(self::HAS_MANY, 'DetalleIngreso', 'idarticulo'),
			'detalleMovimientoInventarios' => array(self::HAS_MANY, 'DetalleMovimientoInventario', 'idarticulo'),
			'movimientoInventarios' => array(self::HAS_MANY, 'MovimientoInventario', 'idarticulo'),
			'recoleccions' => array(self::HAS_MANY, 'Recoleccion', 'idarticulo'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idarticulo' => 'Codigo Interno',
			'cantidad' => 'Cantidad',
			'codigo' => 'Codigo',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'imagen' => 'Imagen',
			'uso_interno' => 'Uso Interno',
			'usa_existencia' => 'Usa Existencia',
			'es_siembra' => 'Es Siembra',
			'idcategoria' => 'Idcategoria',
			'idpresentacion' => 'Idpresentacion',
			'cod_impuesto' => 'Cod Impuesto',
			'cantidad_anterior' => 'Cantidad Anterior',
			'cantidad_act' => 'Cantidad Actual',
			'costo_anterior' => 'Costo Anterior',
			'costo_actual' => 'Costo Actual',
			'precio_anterior' => 'Precio Anterior',
			'precio_actual' => 'Precio Actual'
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

		$criteria->compare('idarticulo',$this->idarticulo);
		$criteria->compare('cantidad',$this->cantidad,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('uso_interno',$this->uso_interno,true);
		$criteria->compare('usa_existencia',$this->usa_existencia,true);
		$criteria->compare('es_siembra',$this->es_siembra,true);
		$criteria->compare('idcategoria',$this->idcategoria);
		$criteria->compare('idpresentacion',$this->idpresentacion);
		$criteria->compare('cod_impuesto',$this->cod_impuesto,true);
		$criteria->compare('cantidad_anterior',$this->cantidad_anterior);
		$criteria->compare('cantidad_act',$this->cantidad_act);
		$criteria->compare('costo_anterior',$this->costo_anterior);
		$criteria->compare('costo_actual',$this->costo_actual);
		$criteria->compare('precio_anterior',$this->precio_anterior);
		$criteria->compare('precio_actual',$this->precio_actual);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Articulo the static model class
	 */
	
	public function suggest($keyword,$limit=20)
	{
		$models=$this->findAll(array(
			'condition'=>'nombre LIKE :keyword ',
			//'condition'=>'codigo LIKE :keyword',pendiente
			'order'=>'nombre',
			'limit'=>$limit,
			'params'=>array(':keyword'=>"%$keyword%")
		));
		$suggest=array();
		foreach($models as $model) {
			$suggest[] = array(
				'label'=>$model->nombre.' - '.$model->descripcion,  // label for dropdown list
				'value'=>$model->idarticulo,  // value for input field
				'nombre'=>$model->nombre,       // return values from autocomplete
				'descripcion'=>$model->descripcion,
				);
		}
		return $suggest;
	}


	public function cosecha($keyword,$limit=20)
	{
		$models=$this->findAll(array(
			'condition'=>'nombre LIKE :keyword AND es_siembra = 1 ',
			//'condition'=>'codigo LIKE :keyword',pendiente
			'order'=>'nombre',
			'limit'=>$limit,
			'params'=>array(':keyword'=>"%$keyword%")
		));
		$cosecha=array();
		foreach($models as $model) {
			$cosecha[] = array(
				'label'=>$model->nombre.' - '.$model->descripcion,  // label for dropdown list
				'value'=>$model->idarticulo,  // value for input field
				'nombre'=>$model->nombre,       // return values from autocomplete
				'descripcion'=>$model->descripcion,
				);
		}
		return $cosecha;
	}

	public function movimiento($keyword,$limit=20)
	{
		$models=$this->findAll(array(
			'condition'=>'nombre LIKE :keyword AND usa_existencia = 1 ',
			//'condition'=>'codigo LIKE :keyword',pendiente
			'order'=>'nombre',
			'limit'=>$limit,
			'params'=>array(':keyword'=>"%$keyword%")
		));
		$movimiento=array();
		foreach($models as $model) {
			$movimiento[] = array(
				'label'=>$model->nombre.' - '.$model->descripcion,  // label for dropdown list
				'value'=>$model->idarticulo,  // value for input field
				'nombre'=>$model->nombre,       // return values from autocomplete
				'descripcion'=>$model->descripcion,
				);
		}
		return $movimiento;
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
