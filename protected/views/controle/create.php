<?php
/* @var $this ControleController */
/* @var $model Controle */

$this->breadcrumbs=array(
	'Controles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Controle', 'url'=>array('index')),
	array('label'=>'Manage Controle', 'url'=>array('admin')),
);
?>

<h1>Create Controle</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>