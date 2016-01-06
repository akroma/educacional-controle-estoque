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
	<small>GERAR RELATÓRIO DOS FUNCIONÁRIOS</small>
</div>

<!-- gerarRelatorio -->
<div id="gerarRelatorio">

	<table>
		<thead>
			<tr>
				<th>NIF</th>
				<th>NOME</th>
				<th></th>
			</tr>
		</thead>
		<tbody>

			<?php 
				$funcionarios = Funcionario::model()->findAll();
			?>
			<?php foreach ($funcionarios as $key => $f): ?>
				<tr>
					<td><?php echo $f->nif; ?></td>
					<td><?php echo $f->nome; ?></td>
					<td class="actions-three">
						<input type="hidden" class="funcionario_nif" value="<?php echo $f->nif; ?>" />
						<select name="mes" class="mes">
							<?php foreach ($meses as $key => $m): ?>
								<option <?php echo ($m['mes'] == $mesatual)? "selected":""; ?> value="<?php echo $m['mes'] ?>"><?php echo $m['mes']; ?></option>
							<?php endforeach ?>
						</select>
						<select name="ano" class="ano">
							<?php foreach ($anos as $key => $a): ?>
								<option <?php echo ($a['ano'] == $anoatual)? "selected":""; ?> value="<?php echo $a['ano'] ?>"><?php echo $a['ano']; ?></option>
							<?php endforeach ?>
						</select>
						<a href="#" class="btn btn-relatorio btn-default">Gerar Relatório</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div><!-- END gerarRelatorio -->

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


	})
</script>