<?php
/* @var $this ControleController */
/* @var $model Controle */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'controle-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<!-- searchCartucho -->
	<div id="searchCartucho">
		<table>
			<thead>
				<tr>
					<th>NOME</th>
					<th>ESTOQUE</th>
					<th>IMPRESSORAS</th>
					<th>QUANTIDADE</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				<?php 
					$criteria = new CDbCriteria;
					$criteria->together = true;
					$criteria->join = '			INNER JOIN categoria_produto ON t.id = categoria_produto.produto_id 
												INNER JOIN categoria ON categoria_produto.categoria_id = categoria.id';
					$criteria->addCondition("categoria.id = 2"); //id2 => Cartuchos
					$produtos = Produto::model()->findAll($criteria);
				?>
				<?php foreach ($produtos as $key => $p): ?>
					<tr>
						<td><?php echo $p->nome; ?></td>
						<td><?php echo $p->estoque(); ?></td>
						<td></td>
						<td><input type="text" name="quantidade" class="quantidade" value="1" /></td>
						<td>
							<a href="#" class="btn btn-adicionar btn-default">Adicionar</a>
							<input type="hidden" class="produto_id" value="<?php echo $p->id; ?>" />
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div><!-- END searchCartucho -->
	
	<hr>


	<!-- cartuchoFormTable -->
	<div id="cartuchoFormTable">
		<h3>CARTUCHOS A SEREM ADICIONADOS</h3>
		<table>
			<thead>
				<tr>
					<th>NOME</th>
					<th>QUANTIDADE</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div><!-- END cartuchoFormTable -->
	
	<?php echo $form->errorSummary($model); ?>

	<div class="group selectize_funcionario_nif">
		<?php echo $form->labelEx($model,'funcionario_nif'); ?>
		<select class="funcionario_nif" name="Controle[funcionario_nif]" id="Controle_funcionario_nif" >
			<option value="76551" selected>76551</option>
		</select>
		<?php echo $form->error($model,'funcionario_nif'); ?>
		<script type="text/javascript">
		 $('.funcionario_nif').selectize({
		        	valueField: 'nif',
					labelField: 'nif',
					options: [{nif:76551, nome: 'Parrado'}],
					searchField: ['nif','nome'],
					create: false,
					render: {
					    option: function(item, escape) {
					        return '<div>' +
					            '<span class="principal">' +
					                '<span class="name">' + escape(item.nif) + '</span>' +
					            '</span>' +
					            '<span class="nome">' + escape(item.nome) + '</span>' +
					        '</div>';
					    }
					},
					load: function(query, callback) {
					    if (!query.length) return callback();
					    $.ajax({
					        url: '<?php echo Yii::app()->request->baseUrl; ?>/index.php/funcionario/requestJson',
					        type: 'GET',
					        dataType: 'json',
					        data: {
					            q: query,
					        },
					        error: function() {
					            callback();
					        },
					        success: function(res) {
					            callback(res);
					        }
					    });
					}
		    });
		</script>
	</div>

	

	<hr>

	<div class="group buttons">
		<?php echo CHtml::submitButton('Adicionar Cartuchos',array('class'=>"btn btn-success")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<!-- SCRIPTS -->
<script type="text/javascript">
	$(function (){
		
		// APLICANDO DATATABLE
		var st = $("#searchCartucho table").DataTable({
    		"info":     false,
    		"order": [[ 0, "asc" ]],
    		"language": {
	            "lengthMenu": "_MENU_ Cartuchos por página",
	            "zeroRecords": "Não encontramos nenhum registro :(",
	            "info": "Página _PAGE_ de _PAGES_",
	            "infoEmpty": "Não foi encontrado nenhum cartucho",
	            "infoFiltered": "(Filtrado from _MAX_ total records)",
	            "sSearch": "PROCURAR:"
	        },
	        "columnDefs": [
	            {
	                "targets": [ 4 ],
	                "searchable": false,
	                "ordenable": false
	            }
	        ]
		});

		// APLICANDO DATATABLE
		var ft = $("#cartuchoFormTable table").DataTable({
    		"info":     false,
    		'paging': false,
			'ordering':  false,
    		"order": [[ 0, "asc" ]],
    		"language": {
	            "lengthMenu": "",
	            "zeroRecords": "Não foi adicionado nenhum cartucho",
	            "info": "Página _PAGE_ de _PAGES_",
	            "infoEmpty": "Não foi encontrado nenhum cartucho",
	            "infoFiltered": "(Filtrado from _MAX_ total records)",
	            "sSearch": "PROCURAR:"
	        },

		});


		// APLICANDO O EVENTO DE ADICIONAR CARTUCHOS
		var i = 0;
		$(document).on("click",".btn-adicionar",function (ev){
			var produto_id = $(this).parent().parent().find(".produto_id").val();
			if ($("#cartuchoFormTable .produto_"+produto_id).index() == "-1"){
				var nome = $(this).parent().parent().find("td:first-child").html();//NOME DO CARTUCHO
				var quantidade = $(this).parent().parent().find(".quantidade").val();
				ft.row.add([
		            nome,
					'<input type="text" class="quantidade" name="ProdutoControle['+i+'][quantidade]" value="'+quantidade+'">\
					<input type="hidden" class="produto_id produto_'+produto_id+'" name="ProdutoControle['+i+'][produto_id]" value="'+produto_id+'">',
					'<a href="#" class="btn btn-remover btn-danger">Remover</a>',
		        ]).draw();
		        i++;
			};
			return false;
		})

		// APLICANDO O EVENTO DE REMOVER CARTUCHOS
		$(document).on("click",".btn-remover",function (ev){
			var row = ft.row($(this).parent().parent());
			row.remove().draw();
			return false;
		})


	})
</script>