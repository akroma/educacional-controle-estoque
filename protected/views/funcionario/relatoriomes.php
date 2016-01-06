<?php
/* @var $this FuncionarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Funcionarios',
);

$anoatual = date("Y");
$mesatual = date("m");

$anos = Yii::app()->db->createCommand("SELECT DISTINCT YEAR( data ) AS ano FROM controle")->queryAll();
$meses = Yii::app()->db->createCommand("SELECT DISTINCT MONTH( data ) AS mes FROM controle")->queryAll();

$this->menu=array(
	array('label'=>'Create Funcionario', 'url'=>array('create')),
	array('label'=>'Manage Funcionario', 'url'=>array('admin')),
);
?>


<div class="header">
	<h2>Gerar Relatório</h2>
	<small>GERAR RELATÓRIO POR MÊS</small>
</div>

<!-- gerarRelatorio -->
<div id="gerarRelatorio">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'relatoriomes-form',
		'enableAjaxValidation'=>false,
	)); ?>
	
	<div class="group">
		<?php if (isset($_POST['gerar'])): ?>
			<a href="#" class="btn btn-imprimir btn-default">IMPRIMIR</a>
		<?php endif ?>
		<!-- SMALL GROUP -->
		<div class="small-group mes">
			<label for="mes">MES:</label>
			<select name="mes" class="mes" id="mes">
				<?php foreach ($meses as $key => $m): ?>
					<option <?php echo ($m['mes'] == $mesatual)? "selected":""; ?> value="<?php echo $m['mes'] ?>"><?php echo $m['mes']; ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<!-- SMALL GROUP -->
		<div class="small-group ano">
			<label for="ano">ANO:</label>
			<select name="ano" class="ano" id="ano">
				<?php foreach ($anos as $key => $a): ?>
					<option <?php echo ($a['ano'] == $anoatual)? "selected":""; ?> value="<?php echo $a['ano'] ?>"><?php echo $a['ano']; ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="small-group">
			<?php echo CHtml::submitButton('Gerar Relatório do Mês',array('class'=>"btn btn-success",'name'=>"gerar")); ?>
		</div>	
	</div>
	<hr>
	<?php $this->endWidget(); ?>
	
</div><!-- END gerarRelatorio -->

<?php if (isset($_POST['gerar'])): ?>
	<div id="relatorio">
		<?php foreach ($funcionarios as $key => $f): ?>
			<div class="relatorio page-breaker">
				<table>
					<thead>
						<tr>
							<th colspan=2>
								<small><?php echo $f->nif; ?></small>
								<span><?php echo $f->nome; ?></span>
							</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($f->controles as $key2 => $c): ?>
						<tr class='header1'>
							<th colspan=2>
								<small>DATA:</small>
								<span><?php echo $c->data; ?></span>
							</th>
						</tr>
						<?php foreach ($c->produtoControles as $key3 => $pc): ?>
							<tr class="<?php echo ($pc->quantidade < 0)?'minus':'plus'; ?>">
								<td><?php echo $pc->produto->nome; ?></td>
								<td><?php echo "<span class='label'>".$pc->quantidade."</span>"; ?></td>
							</tr>
						<?php endforeach ?>
					<?php endforeach ?>
					</tbody>
				</table>
				
				<div class="assinatura">
					<small>ASSINATURA</small>
				</div>
			</div>
		<?php endforeach ?>
	</div>
<?php endif ?>

<!-- SCRIPTS -->
<script type="text/javascript">
	$(function (){
		
		// APLICANDO DATATABLE
		var st = $("#gerarRelatorio table").DataTable({
    		"info":     false,
    		"order": [[ 0, "asc" ]],
    		"language": {
	            "lengthMenu": "_MENU_ Funcionários por página",
	            "zeroRecords": "Não encontramos nenhum registro :(",
	            "info": "Página _PAGE_ de _PAGES_",
	            "infoEmpty": "Não foi encontrado nenhum cartucho",
	            "infoFiltered": "(Filtrado from _MAX_ total records)",
	            "sSearch": "PROCURAR:"
	        },
		});

		// APLICANDO O EVENTO DE REMOVER CARTUCHOS
		$(document).on("click",".btn-remover",function (ev){
			var row = ft.row($(this).parent().parent());
			row.remove().draw();
			return false;
		})

		$(".btn-imprimir").click(function (){
			window.print();
			return false;
		})

	})
</script>