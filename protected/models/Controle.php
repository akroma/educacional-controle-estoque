<?php

/**
 * This is the model class for table "Controle".
 *
 * The followings are the available columns in table 'Controle':
 * @property integer $id
 * @property integer $usuario_id
 * @property integer $funcionario_nif
 * @property string $data
 *
 * The followings are the available model relations:
 * @property Usuario $usuario
 * @property Funcionario $funcionarioNif
 * @property ProdutoControle[] $produtoControles
 */
class Controle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Controle the static model class
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
		return 'Controle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_id, funcionario_nif, data', 'required'),
			array('usuario_id, funcionario_nif', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, usuario_id, funcionario_nif, data', 'safe', 'on'=>'search'),
		);
	}


	public function beforeValidate(){
		$this->usuario_id = Yii::app()->user->id;
		$this->data = date("Y-m-d H:i:s");
		return parent::beforeSave();
	}

	public function afterFind(){
		$this->data = date("d/m/Y H:i s\s",strtotime($this->data));
		return parent::afterFind();
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
			'funcionario' => array(self::BELONGS_TO, 'Funcionario', 'funcionario_nif'),
			'produtoControles' => array(self::HAS_MANY, 'ProdutoControle', 'controle_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usuario_id' => 'Usuario',
			'funcionario_nif' => 'Funcionario Nif',
			'data' => 'Data',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('funcionario_nif',$this->funcionario_nif);
		$criteria->compare('data',$this->data,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}