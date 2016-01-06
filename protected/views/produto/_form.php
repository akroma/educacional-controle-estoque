<?php
/* @var $this ProdutoController */
/* @var $model Produto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'produto-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="group">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>155,"required"=>true)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="group">
		<label for="Produto_Categoria" class="required">Categoria <span class="required">*</span> <span>Deve cadastrar como cartuchos para aparecer na lista de cartuchos</span></label>
		<input size="60" maxlength="155" name="CategoriaProduto" id="Produto_Categoria" type="text" class="selectize_categoria">
	</div>

	<div class="group">
		<label for="ProdutoControle_Quantidade" class="required">Quantidade Inicial <span class="required">*</span></label>
		<input size="60" maxlength="155" name="ProdutoControle[quantidade]" id="ProdutoControle_Quantidade" type="text" required>
	</div>

	<div class="group">
		<label for="Controle_funcionario_nif" class="required">NIF do RESPONSÁVEL<span class="required">*</span></label>
		<select size="60" maxlength="155" name="Controle[funcionario_nif]" id="Controle_funcionario_nif" class="funcionario_nif">
			<option value="76551" selected >76551</option>
		</select>
	</div>

	<div class="group buttons">
		<?php echo CHtml::submitButton('Cadastrar', array("class"=>"btn btn-success")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<hr>

<?php echo $this->renderPartial('/Produto/list'); ?>


<script type="text/javascript">
 	$('.selectize_categoria').selectize({
        	valueField: 'id',
			labelField: 'nome',
			searchField: 'nome',
			options: [{id: 2, nome:'Cartuchos' }],
			create: false,
			render: {
			    option: function(item, escape) {
			    	console.log('hue');
			        return '<div>' +
			            '<span class="principal">' +
			                '<span class="name">' + escape(item.nome) + '</span>' +
			            '</span>' +
			        '</div>';
			    }
			},
			load: function(query, callback) {
			    if (!query.length) return callback();
			    $.ajax({
			        url: '<?php echo Yii::app()->request->baseUrl; ?>/index.php/categoria/requestJson',
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

<script type="text/javascript">
	 $('.funcionario_nif').selectize({
	    	valueField: 'nif',
			labelField: 'nif',
			searchField: ['nif','nome'],
			options: [{nif:76551, nome: 'Parrado'}],
			create: false,
			render: {
			    option: function(item, escape) {
			    	console.log('hue');
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