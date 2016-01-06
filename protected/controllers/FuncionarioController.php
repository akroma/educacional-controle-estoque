<?php

class FuncionarioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','requestJson','relatoriomes','relatoriofuncionario'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionRequestJson()
	{
		$json = array();
		$criteria = new CDbCriteria;
		$criteria->addCondition("nif LIKE '%".$_GET['q']."%' OR nome LIKE '%".$_GET['q']."%' ");
		$funcionarios = Funcionario::model()->findAll($criteria);
		$i = 0;
		foreach ($funcionarios as $key => $f){
			$json[$i]['nome'] = $f->nome;
			$json[$i]['nif'] = $f->nif;
			$i++;
		}
		echo json_encode($json);
	}



	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Funcionario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Funcionario']))
		{
			$model->attributes=$_POST['Funcionario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->nif));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Funcionario']))
		{
			$model->attributes=$_POST['Funcionario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->nif));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Funcionario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionRelatoriomes()
	{
		$funcionarios = array();
		if (isset($_POST['gerar'])){
			$mes = $_POST['mes'];
			$ano = $_POST['ano'];
			$criteria = new CDbCriteria;
			$criteria->join = "INNER JOIN controle ON t.nif = controle.funcionario_nif";
			$criteria->group = "t.nif";
			$criteria->addCondition(" YEAR(controle.data) = '$ano' AND  MONTH(controle.data) = '$mes'");
			$funcionarios = Funcionario::model()->findAll($criteria);
		}

		$this->render('relatoriomes',array(
			"funcionarios"=>$funcionarios
		));

	}

	public function actionRelatoriofuncionario()
	{
		$funcionarios= Funcionario::model()->findAll();
		$this->render('relatoriofuncionario',array(
			'funcionarios'=>$funcionarios,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Funcionario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Funcionario']))
			$model->attributes=$_GET['Funcionario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Funcionario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Funcionario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Funcionario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='funcionario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
