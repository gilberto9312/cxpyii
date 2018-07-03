
<?php

/**
 * This is the model class for table "gastos".
 *
 * The followings are the available columns in table 'gastos':
 * @property integer $idingreso
 * @property integer $idcosecha
 * @property integer $idtrabajador
 * @property integer $idproveedor
 * @property string $fecha
 * @property string $tipo_comprobante
 * @property string $serie
 * @property string $correlativo
 * @property string $igv
 * @property string $estado
 * @property double $base_imponible
 * @property double $total
 *
 * The followings are the available model relations:
 * @property DetalleIngreso[] $detalleIngresos
 * @property Cosecha $idcosecha0
 * @property Proveedor $idproveedor0
 * @property Trabajador $idtrabajador0
 */
class Gastos extends CActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'gastos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    			public function canTotal($attribute)
	{
		if($this->total <= '0')
			{
				$this->addError($attribute,"Total no debe estar en 0");

			}

	}
		public function canBase($attribute)
	{
		if($this->base_imponible <= '0')
			{
				$this->addError($attribute," Base Imponible no debe estar en 0");

			}

	}
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idcosecha, idtrabajador, idproveedor, fecha, tipo_comprobante, serie, correlativo, estado', 'required'),
            array('idcosecha, idtrabajador,idbanco, idproveedor', 'numerical', 'integerOnly'=>true),
            array('base_imponible, total', 'numerical'),
            array('tipo_comprobante', 'length', 'max'=>20),
            array('serie, igv', 'length', 'max'=>4),
            array('correlativo, estado', 'length', 'max'=>7),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idingreso, idcosecha, idtrabajador, idproveedor,idbanco, fecha, tipo_comprobante, serie, correlativo, igv, estado, base_imponible, total', 'safe', 'on'=>'search'),
            			array('total','canTotal'),
			array('total','canBase'),
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
			'idcosecha0' => array(self::BELONGS_TO, 'Cosecha', 'idcosecha'),
			'detalleIngresos' => array(self::HAS_MANY, 'DetalleIngreso', 'idingreso'),
			'idproveedor0' => array(self::BELONGS_TO, 'Proveedor', 'idproveedor'),
			'idtrabajador0' => array(self::BELONGS_TO, 'Trabajador', 'idtrabajador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idingreso' => 'Control Interno',
			'idcosecha' => 'Cosecha',
			'idtrabajador' => 'Responsable compra',
			'idproveedor' => 'Proveedor',
			'idbanco' => 'banco',
			'fecha' => 'Fecha de Emicion',
			'tipo_comprobante' => 'Tipo',
			'serie' => 'Serie',
			'correlativo' => 'Correlativo',
			'igv' => 'Igv',
			'estado' => 'Estado',
			'base_imponible' => 'Base Imponible',
			'total' => 'Total',
			
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
		$criteria->compare('idingreso',$this->idingreso);
		$criteria->compare('idcosecha',$this->idcosecha);
		$criteria->compare('idtrabajador',$this->idtrabajador);
		$criteria->compare('idproveedor',$this->idproveedor);
		$criteria->compare('idbanco',$this->idbanco);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('tipo_comprobante',$this->tipo_comprobante,true);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('correlativo',$this->correlativo,true);
		$criteria->compare('igv',$this->igv,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('base_imponible',$this->base_imponible);
		$criteria->compare('total',$this->total);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Gastos the static model class
	 */

		public function getFactura()
	{
		return $this->serie.' '.$this->correlativo;
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
			public function suggest($keyword,$limit=20)
	{
		$models=$this->findAll(array(
			'condition'=>'razon_social LIKE :keyword',
			'order'=>'razon_social',
			'limit'=>$limit,
			'params'=>array(':keyword'=>"%$keyword%")
		));
		$suggest=array();
		foreach($models as $model) {
			$suggest[] = array(
				'label'=>$model->razon_social.' - '.$model->idproveedor.' - '.$model->num_documento,  // label for dropdown list
				'value'=>$model->idproveedor,  // value for input field
				'razon_social'=>$model->razon_social,       // return values from autocomplete
				'num_documento'=>$model->num_documento,

			);
		}
		return $suggest;
	}

	/*public function graFechas()
	$models=$this->findAll(array(
		'condition'=>'SUM(total),GROUP BY fecha',
		'limit'=>$limit
		));
		$graFechas=array();
		foreach ($models as $models ) {
			$graFechas[]=array(
				'label')
		}*/


}
