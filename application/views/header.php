<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" /> 
	<title>Call Center PRD - 2015</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- CSS  -->
	<?php echo link_tag('css/semantic.min.css'); ?>
	<?php echo link_tag('css/style.css'); ?>
	<?php echo link_tag('css/jquery.dataTables.min.css'); ?>
	
	<!-- JS -->
	<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('js/semantic.min.js'); ?>"></script>
	<script src="<?php echo base_url('js/jquery.dataTables.js'); ?>"></script>

</head>

<body>
	<div class="ui grid">
		<div class="three column row">
			<div class="column"></div>
			<div class="column">
				<div class="ui segment">
			  		<img class="ui small left floated image" src="<?php echo base_url('images/prd-logo.png'); ?>">
			  		<h1 class="ui center aligned header">Call Center PRD </h1>
				</div>
			</div>
			<div class="column"></div>
		</div>
	</div>
	
	<div class="ui orange menu">
		<a class="<?php echo @$activeInicio ?> item" href="<?php echo site_url('inicio'); ?>">
			<i class="home icon"></i> Inicio
		</a>
		<a class="<?php echo @$activePartidos ?> item" href="<?php echo site_url('partidos'); ?>">
			<i class="announcement icon"></i> Partidos
		</a>
		<a class="<?php echo @$activeTiposCartas ?> item" href="<?php echo site_url('tiposcartas'); ?>">
			<i class="browser icon"></i> Tipos Cartas
		</a>
		<a class="<?php echo @$activeTextosCartas ?> item" href="<?php echo site_url('textoscartas'); ?>">
			<i class="font icon"></i> Texto Cartas
		</a>
		<a class="<?php echo @$activePersonas ?> item" href="<?php echo site_url('personas'); ?>">
			<i class="user icon"></i> Personas
		</a>
		<a class="<?php echo @$activeCartas ?> item" href="<?php echo site_url('cartas'); ?>">
			<i class="file pdf outline icon"></i> Cartas
		</a>
		<a class="item">
			<i class="users icon"></i> Usuarios del sistema
		</a>
	</div>

