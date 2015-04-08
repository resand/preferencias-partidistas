
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
					
					<a href="<?php echo site_url('partidos/crear'); ?>">
						<div class="ui basic button">
						  	<i class="icon user"></i>
						  		Crear Partido
						</div>
					</a>

					<table id="data-table" class="ui celled striped table display">
						<thead>
					    	<tr>
					    		<th>Nombre del Partido</th>
					    		<th>Imagen del Partido</th>
					    		<th class="center aligned th-opciones">Opciones</th>
					  		</tr>
					 	</thead>
						<tbody>
						<?php foreach ($partidos as $registro): ?>
					    	<tr>
					      		<td><?php echo $registro['nombre_partido']?></td>
					      		<td class="center aligned">
									<img class="ui small left floated" src="<?php echo base_url('images/logos_partidos/'.$registro['imagen_partido']) ?>" width=45 height=45>
					      		</td>
					      		<td class="center aligned">
						      		<a href="<?php echo site_url('partidos/modificar/'.$registro['id_partido']); ?>">
							      		<div class="ui orange basic vertical animated fade button">
											<div class="hidden content">Editar</div>
										  	<div class="visible content">
										    	<i class="edit icon"></i>
										  	</div>
										</div>
									</a>
									
									<a href="<?php echo site_url('partidos/eliminar/'.$registro['id_partido']); ?>">
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