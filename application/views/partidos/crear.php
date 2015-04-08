
	<div class="ui page grid">
		<div class="one column row">
			<div class="column">
				
				<?php $atributos = ['class' => 'ui form segment'] ?>
				<?php echo form_open_multipart('partidos/store', $atributos) ?>
					 
					<div class="ui error message"></div>

					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<?php echo form_label('Nombre Partido'); ?>
					    	<?php echo form_input(['name' => 'nombre_partido', 'placeholder' => 'Nombre Partido', 'value' => set_value('nombre_partido') ]);?>
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
					    	<div class="ui blue submit button">Crear</div>
    						<div class="ui clear button">Limpiar</div>
    						<div class="ui reset button">Reinicar</div>
					 	</div>
					 	<div class="field"></div>
					 </div>
					

				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('js/validacion_partido.js'); ?>"></script>
</body>