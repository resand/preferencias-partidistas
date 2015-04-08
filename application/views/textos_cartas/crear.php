
	<div class="ui page grid">
		<div class="one column row">
			<div class="column">
				
				<?php $atributos = ['class' => 'ui form segment'] ?>
				<?php echo form_open_multipart('textoscartas/store', $atributos) ?>
					 
					<div class="ui error message"></div>

					<div class="three fields">
						<div class="field"></div>
						<div class="field">
					    	<?php echo form_label('Nombre del Tipo de Carta'); ?>
					    	<?php echo form_dropdown('id_tipo_carta', $tipos_cartas, set_value('id_tipo_carta'), 'class="ui dropdown"') ?>
					    </div>
					 	<div class="field"></div>
					</div>

					<div class="three fields">
						<div class="field"></div>
						<div class="field">
							<?php echo form_label('Texto Carta'); ?>
							<?php echo form_textarea(['name' => 'texto_carta']);?>
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
	<script src="<?php echo base_url('js/validacion_textos_cartas.js'); ?>"></script>
</body>