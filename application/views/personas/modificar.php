
	<div class="ui page grid">
		<div class="one column row">
			<div class="column">
				
				<?php $atributos = ['class' => 'ui form segment'] ?>
				<?php echo form_open_multipart('personas/update', $atributos) ?>
					 
					<div class="ui error message"></div>

					<?php echo form_hidden('id_persona', $persona['id_persona']) ?>

					<div class="three fields">
						<div class="field"></div>
						<div class="field">
					    	<?php echo form_label('Preferencia Partidista'); ?>
					    	<?php echo form_dropdown('id_partido', $partidos, $persona['id_partido'], 'class="ui dropdown"') ?>
					    </div>
					 	<div class="field"></div>
					</div>

					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<?php echo form_label('Nombres'); ?>
					    	<?php echo form_input(['name' => 'nombres', 'placeholder' => 'Nombres', 'value' => $persona['nombres'] ]);?>
					 	</div>
					 	<div class="field"></div>
					</div>

					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<?php echo form_label('Apellido Paterno'); ?>
					    	<?php echo form_input(['name' => 'apellido_paterno', 'placeholder' => 'Apellido Paterno', 'value' => $persona['apellido_paterno'] ]);?>
					 	</div>
					 	<div class="field"></div>
					</div>

					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<?php echo form_label('Apellido Materno'); ?>
					    	<?php echo form_input(['name' => 'apellido_materno', 'placeholder' => 'Apellido Paterno', 'value' => $persona['apellido_materno'] ]);?>
					 	</div>
					 	<div class="field"></div>
					</div>

					<div class="three fields">
						<div class="field"></div>
						<div class="field">
							<?php echo form_label('Dirección'); ?>
							<?php echo form_textarea(['name' => 'direccion', 'value' => $persona['direccion']]);?>
						</div>
						<div class="field"></div>
					</div>

					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<?php echo form_label('Teléfono'); ?>
					    	<?php echo form_input(['name' => 'telefono', 'placeholder' => 'Apellido Paterno', 'value' => $persona['telefono'] ]);?>
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
	<script src="<?php echo base_url('js/validacion_personas_modificar.js'); ?>"></script>
</body>