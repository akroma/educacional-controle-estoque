<!-- produtos -->
<div id="produtos">
	<table>
		<thead>
			<tr>
				<th>NOME</th>
				<th>ESTOQUE</th>
				<th>IMPRESSORAS</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$produtos = Produto::model()->findAll();
			?>
			<?php foreach ($produtos as $key => $p): ?>
				<tr>
					<td><?php echo $p->nome; ?></td>
					<td><?php echo $p->estoque(); ?></td>
					<td></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div><!-- END produtos -->
<script type="text/javascript">
	$(function (){
		// APLICANDO DATATABLE
		var pt = $("#produtos table").DataTable({
    		"info":     false,
    		"order": [[ 0, "asc" ]],
    		"language": {
	            "lengthMenu": "_MENU_ Cartuchos por página",
	            "zeroRecords": "Não encontramos nenhum registro :(",
	            "info": "Página _PAGE_ de _PAGES_",
	            "infoEmpty": "Não foi encontrado nenhum cartucho",
	            "infoFiltered": "(Filtrado from _MAX_ total records)",
	            "sSearch": "PROCURAR:"
	        }
		});
	})
</script>
<hr>