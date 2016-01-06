<?php /* @var $this Controller */ 

	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.js', CClientScript::POS_HEAD);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.dataTables.js', CClientScript::POS_HEAD);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/selectize.js', CClientScript::POS_HEAD);


	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/jquery.dataTables.css', CClientScript::POS_HEAD);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.dataTables.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/selectize.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/selectize.default.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print"/>

	<!-- SCRIPTS -->


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div id="header">
		<div class="container">
			<h1 id="logo"><?php echo CHtml::link(Yii::app()->name,"#"); ?></h1>

			<div id="menu_header">
				<div class="usuario">
					<small>Seja bem vindo</small>
					<span><?php echo Yii::app()->user->name; ?></span>
				</div>
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Sair', 'url'=>array("/Site/logout")),
					),
				)); ?>
			</div>
		</div>
	</div><!-- header -->


	<div id="content">
		<div class="container">
			<?php if(isset($this->breadcrumbs)):?>
				<!-- <div id="breadcrumbs">
					<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
					)); ?>
				</div> -->
			<?php endif?>
			<?php echo $content; ?>
		</div>
	</div>	

	<!-- <div id="footer">
		<div class="container">
			Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
			All Rights Reserved.<br/>
			<?php echo Yii::powered(); ?>
		</div>
	</div> -->

	

</body>
</html>
