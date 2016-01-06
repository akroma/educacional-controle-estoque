<?php
/* @var $this ControleController */
/* @var $model Controle */

$this->breadcrumbs=array(
	'Controles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Controle', 'url'=>array('index')),
	array('label'=>'Create Controle', 'url'=>array('create')),
	array('label'=>'Update Controle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Controle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Controle', 'url'=>array('admin')),
);
?>

<h1>View Controle #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'usuario_id',
		'funcionario_nif',
		'data',
	),
)); ?>
