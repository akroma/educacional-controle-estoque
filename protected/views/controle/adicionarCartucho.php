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
<div class="header">
	<h2>Adicionar Cartuchos</h2>
</div>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php echo $this->renderPartial('_formAdicionarCartucho', array('model'=>$model)); ?>