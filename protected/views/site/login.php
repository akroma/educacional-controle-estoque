<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<h1>Controle de Estoque</h1>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="group">
		<?php echo $form->textField($model,'username',array("placeholder"=>"USUÁRIO")); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="group">
		<?php echo $form->passwordField($model,'password',array("placeholder"=>"SENHA")); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="group buttons">
		<?php echo CHtml::submitButton('ENTRAR', array("class"=>"btn btn-success",'id'=>"entrar")); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
