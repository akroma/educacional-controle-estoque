<?php
/* @var $this FuncionarioController */
/* @var $model Funcionario */

$this->breadcrumbs=array(
	'Funcionarios'=>array('index'),
	$model->nif,
);

$this->menu=array(
	array('label'=>'List Funcionario', 'url'=>array('index')),
	array('label'=>'Create Funcionario', 'url'=>array('create')),
	array('label'=>'Update Funcionario', 'url'=>array('update', 'id'=>$model->nif)),
	array('label'=>'Delete Funcionario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nif),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Funcionario', 'url'=>array('admin')),
);
?>

<h1>View Funcionario #<?php echo $model->nif; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nif',
		'nome',
	),
)); ?>
