<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>
	<body class="<?php echo Yii::app()->controller->action->id; ?>">

		<div id="content">
				<?php echo $content; ?>
		</div>

	</body>
</html>
