<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<!-- OPERACOES -->
<div id="operacoes">
	<?php 

	// $this->widget('zii.widgets.CMenu',array(
	// 	'items'=>array(
	// 		array('label'=>'Retirar do Estoque', 'url'=>"#", 'items'=>array(
	// 			array('label'=>'Retirar Cartuchos', 'url'=>array("/controle/retirarCartucho/")),
	// 		)),
	// 		array('label'=>'Cadastrar Produto', 'url'=>array('/Produto/create')),
	// 		array('label'=>'Adicionar no Estoque', 'url'=>"#", 'items'=>array(
	// 			array('label'=>'Adicionar Cartuchos', 'url'=>array("/controle/adicionarCartucho/")),
	// 		)),
	// 		array('label'=>'Gerar Relatório', 'url'=>"#",'items'=>array(
	// 			array('label'=>'Gerar Relatório por mês', 'url'=>array("/funcionario/relatoriomes/")),
	// 			array('label'=>'Gerar Relatório por funcionários', 'url'=>array("/funcionario/relatoriofuncionario/")),
	// 		)),
			
	// 	),
	// )); 

	$this->widget('zii.widgets.CMenu',array(
		'items'=>array(
			array('label'=>'Retirar Cartuchos', 'url'=>array("/controle/retirarCartucho/")),
			array('label'=>'Cadastrar Produto', 'url'=>array('/Produto/create')),
			array('label'=>'Adicionar Cartuchos', 'url'=>array("/controle/adicionarCartucho/")),
			array('label'=>'Gerar Relatório por mês', 'url'=>array("/funcionario/relatoriomes/")),
			// array('label'=>'Gerar Relatório por funcionários', 'url'=>array("/funcionario/relatoriofuncionario/")),
			
		),
	)); 

	?>
</div><!-- END OPERACOES -->

<div id="miolo">
	<?php echo $content; ?>
</div><!-- content -->

<?php $this->endContent(); ?>