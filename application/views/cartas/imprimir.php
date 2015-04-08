
	<div class="ui page grid">
		<div class="one column row">
			<div class="column">
				
				<?php $atributos = ['class' => 'ui form segment'] ?>
				<?php echo form_open_multipart('cartas/imprimir_cartas', $atributos) ?>

					<?php if($this->session->flashdata('fail')): ?>
						<div class="ui negative message">
							<i class="close icon"></i>
						  	<div class="header text-center">
						    	<?php echo $this->session->flashdata('fail') ?>
						  	</div>
						</div>
					<?php endif ?>
					 
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
					    	<?php echo form_label('Tipo Carta'); ?>
					    	<?php echo form_dropdown('tipo_carta', $tipos_cartas, set_value('tipo_carta'), 'class="ui dropdown"') ?>
					    </div>
					 	<div class="field"></div>
					</div>


					<div class="three fields">
						<div class="field"></div>
					 	<div class="field">
					    	<div class="ui blue submit button">Imprimir Cartas</div>
					 	</div>
					 	<div class="field"></div>
					 </div>
					

				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('js/validacion_cartas.js'); ?>"></script>
</body>