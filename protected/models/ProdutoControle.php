<?php

/**
 * This is the model class for table "produto_controle".
 *
 * The followings are the available columns in table 'produto_controle':
 * @property integer $produto_id
 * @property integer $controle_id
 * @property integer $quantidade
 *
 * The followings are the available model relations:
 * @property Produto $produto
 * @property Controle $controle
 */
class ProdutoControle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProdutoControle the static model class
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
		return 'produto_controle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('produto_id, controle_id, quantidade', 'required'),
			array('produto_id, controle_id, quantidade', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('produto_id, controle_id, quantidade', 'safe', 'on'=>'search'),
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
			'produto' => array(self::BELONGS_TO, 'Produto', 'produto_id'),
			'controle' => array(self::BELONGS_TO, 'Controle', 'controle_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'produto_id' => 'Produto',
			'controle_id' => 'Controle',
			'quantidade' => 'Quantidade',
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

		$criteria->compare('produto_id',$this->produto_id);
		$criteria->compare('controle_id',$this->controle_id);
		$criteria->compare('quantidade',$this->quantidade);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}