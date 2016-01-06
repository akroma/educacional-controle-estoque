<?php
/* @var $this ControleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Controles',
);

$this->menu=array(
	array('label'=>'Create Controle', 'url'=>array('create')),
	array('label'=>'Manage Controle', 'url'=>array('admin')),
);
?>

<h1>Controles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
