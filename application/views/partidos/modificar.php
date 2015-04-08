
	<div class="ui page grid">
		<div class="one column row">
			<div class="column">
				
				<?php $atributos = ['class' => 'ui form segment'] ?>
				<?php echo form_open_multipart('partidos/update', $atributos) ?>
					 
					<div class="ui error message"></div>

					<?php echo form_hidden('id_partido', $partido['id_partido']) ?>
					<?php echo form_hidden('imagen_partido_original', $partido['imagen_partido']) ?>

					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<?php echo form_label('Nombre Partido'); ?>
					    	<?php echo form_input(['name' => 'nombre_partido', 'value' => $partido['nombre_partido'] ]);?>
					 	</div>
					 	<div class="field"></div>
					 </div>

					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<?php echo form_label('Imagen Partido'); ?>
					    	<?php echo form_upload('imagen_partido') ?>
					 	</div>
					 	<div class="field"></div>
					</div>

					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<div class="ui blue submit button">Editar</div>
    						<div class="ui clear button">Limpiar</div>
    						<div class="ui reset button">Reinicar</div>
					 	</div>
					 	<div class="field"></div>
					</div>
					

				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('js/validacion_partido_modificar.js'); ?>"></script>
</body>