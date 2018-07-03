<?php

/**
 * This is the model class for table "detalle_ingreso".
 *
 * The followings are the available columns in table 'detalle_ingreso':
 * @property integer $iddetalle_ingreso
 * @property integer $idingreso
 * @property integer $idarticulo
 * @property string $precio_compra
 * @property string $precio_venta
 * @property integer $stock_actual
 * @property string $fecha_produccion
 * @property string $fecha_vencimiento
 *
 * The followings are the available model relations:
 * @property Articulo $idarticulo0
 * @property Gastos $idingreso0
 * @property DetalleVenta[] $detalleVentas
 */
class DetalleIngreso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalle_ingreso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
			public function cantidades($attribute)
	{
		if($this->stock_actual <= '0')
			{
				$this->addError($attribute," Cantidad no debe estar en 0");

			}

	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('idingreso, idarticulo, stock_actual', 'numerical', 'integerOnly'=>true),
			array('precio_compra, precio_venta', 'length', 'max'=>18),
			array('fecha_produccion, fecha_vencimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iddetalle_ingreso, idingreso, idarticulo, precio_compra, precio_venta, stock_actual, fecha_produccion, fecha_vencimiento', 'safe', 'on'=>'search'),
			array('stock_actual','cantidades'),
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
			'idingreso0' => array(self::BELONGS_TO, 'Gastos', 'idingreso'),
			'detalleVentas' => array(self::HAS_MANY, 'DetalleVenta', 'iddetalle_ingreso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iddetalle_ingreso' => 'iddetalle_ingreso',
			'idingreso' => 'Control Interno',
			'idarticulo' => 'Codigo Producto',
			'precio_compra' => 'Precio Compra',
			'precio_venta' => 'Precio Venta',
			'stock_actual' => 'Cantidad Comprada',
			'fecha_produccion' => 'Fecha Produccion',
			'fecha_vencimiento' => 'Fecha Vencimiento',
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
		$criteria->condition = "idingreso like :idingreso" ;// . $this->getAttribute('idingreso') ; //$this->idingreso;
        $criteria->params = array(':idingreso'=>$_GET['id']);
        $sort= new CSort();
        $sort-> defaultOrder = 'iddetalle_ingreso DESC';

		$criteria->compare('iddetalle_ingreso',$this->iddetalle_ingreso);
		$criteria->compare('idingreso',$this->idingreso);
		$criteria->compare('idarticulo',$this->idarticulo);
		$criteria->compare('precio_compra',$this->precio_compra,true);
		$criteria->compare('precio_venta',$this->precio_venta,true);
		$criteria->compare('stock_actual',$this->stock_actual);
		$criteria->compare('fecha_produccion',$this->fecha_produccion,true);
		$criteria->compare('fecha_vencimiento',$this->fecha_vencimiento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleIngreso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
