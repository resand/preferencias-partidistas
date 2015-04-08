<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->_cargar_header(['activeInicio' => 'active']);
	}

	public function index()
	{
		$this->load->view('inicio');
	}

	 private function _cargar_header($datos)
	 {
	 	$this->load->view('header', $datos);
	 }

}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */