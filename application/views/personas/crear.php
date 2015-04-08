
	<div class="ui page grid">
		<div class="one column row">
			<div class="column">
				
				<?php $atributos = ['class' => 'ui form segment'] ?>
				<?php echo form_open_multipart('personas/store', $atributos) ?>
					 
					<div class="ui error message"></div>

					<div class="three fields">
						<div class="field"></div>
						<div class="field">
					    	<?php echo form_label('Preferencia Partidista'); ?>
					    	<?php echo form_dropdown('id_partido', $partidos, set_value('id_partido'), 'class="ui dropdown"') ?>
					    </div>
					 	<div class="field"></div>
					</div>

					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<?php echo form_label('Nombres'); ?>
					    	<?php echo form_input(['name' => 'nombres', 'placeholder' => 'Nombres', 'value' => set_value('nombres') ]);?>
					 	</div>
					 	<div class="field"></div>
					</div>

					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<?php echo form_label('Apellido Paterno'); ?>
					    	<?php echo form_input(['name' => 'apellido_paterno', 'placeholder' => 'Apellido Paterno', 'value' => set_value('apellido_paterno') ]);?>
					 	</div>
					 	<div class="field"></div>
					</div>

					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<?php echo form_label('Apellido Materno'); ?>
					    	<?php echo form_input(['name' => 'apellido_materno', 'placeholder' => 'Apellido Paterno', 'value' => set_value('apellido_materno') ]);?>
					 	</div>
					 	<div class="field"></div>
					</div>

					<div class="three fields">
						<div class="field"></div>
						<div class="field">
							<?php echo form_label('Dirección'); ?>
							<?php echo form_textarea(['name' => 'direccion']);?>
						</div>
						<div class="field"></div>
					</div>

					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<?php echo form_label('Teléfono'); ?>
					    	<?php echo form_input(['name' => 'telefono', 'placeholder' => 'Apellido Paterno', 'value' => set_value('telefono') ]);?>
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
	<script src="<?php echo base_url('js/validacion_personas.js'); ?>"></script>
</body>