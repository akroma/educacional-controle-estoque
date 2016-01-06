<?php
/* @var $this ControleController */
/* @var $model Controle */

$this->breadcrumbs=array(
	'Controles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Controle', 'url'=>array('index')),
	array('label'=>'Create Controle', 'url'=>array('create')),
	array('label'=>'View Controle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Controle', 'url'=>array('admin')),
);
?>

<h1>Update Controle <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>