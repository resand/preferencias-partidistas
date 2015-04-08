
	<div class="ui page grid">
		<div class="one column row">
			<div class="column">
				<div class="ui segment">

					<?php if($this->session->flashdata('sucess')): ?>
						<div class="ui positive message">
							<i class="close icon"></i>
						  	<div class="header text-center">
						    	<?php echo $this->session->flashdata('sucess') ?>
						  	</div>
						</div>
					<?php endif ?>

					<?php if($this->session->flashdata('fail')): ?>
						<div class="ui negative message">
							<i class="close icon"></i>
						  	<div class="header text-center">
						    	<?php echo $this->session->flashdata('fail') ?>
						  	</div>
						</div>
					<?php endif ?>
					
					<a href="<?php echo site_url('textoscartas/crear'); ?>">
						<div class="ui basic button">
						  	<i class="icon user"></i>
						  		Crear Texto de Carta
						</div>
					</a>

					<table id="data-table" class="ui celled striped table display">
						<thead>
					    	<tr>
					    		<th>Nombre del Tipo de Carta</th>
					    		<th>Texto de Carta</th>
					    		<th class="center aligned th-opciones">Opciones</th>
					  		</tr>
					 	</thead>
						<tbody>
						<?php foreach ($textos_cartas as $registro): ?>
					    	<tr>
					      		<td><?php echo $registro['nombre_tipo']?></td>
					      		<td><?php echo $registro['texto_carta']?></td>
					      		<td class="center aligned">
						      		<a href="<?php echo site_url('textoscartas/modificar/'.$registro['id_texto']); ?>">
							      		<div class="ui orange basic vertical animated fade button">
											<div class="hidden content">Editar</div>
										  	<div class="visible content">
										    	<i class="edit icon"></i>
										  	</div>
										</div>
									</a>
									
									<a href="<?php echo site_url('textoscartas/eliminar/'.$registro['id_texto']); ?>">
										<div class="ui red basic vertical animated fade button">
											<div class="hidden content">Eliminar</div>
										  	<div class="visible content">
										    	<i class="trash outline icon"></i>
										  	</div>
										</div>
									</a>
					      		</td>
					    	</tr>
					    <?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script>
	$(document).ready( function () {
    	$('#data-table').DataTable();

    	$('.message .close').on('click', function() {
    		$(this).closest('.message').fadeOut();
		});
	} );
	</script>

</body>