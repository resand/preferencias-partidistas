<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TiposCartas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->_cargar_header(['activeTiposCartas' => 'active']);
		$this->load->model('TiposCartas_Model', 'modelo', TRUE);
	}

	public function index()
	{
		$tipos_cartas = $this->modelo->listar();
		$datos = ['tipos_cartas' => $tipos_cartas];

		$this->load->view('tipos_cartas/listado', $datos);
	}

	public function crear()
	{
		$this->load->view('tipos_cartas/crear');
	}

	public function store()
	{
		$registro = [
			'nombre_tipo' => $this->input->post('nombre_tipo')
		];

		$agregado = $this->modelo->crear($registro);

		if ($agregado > 0){
			$this->session->set_flashdata('sucess', 'Tipo de carta creada correctamente.');
			redirect('tiposcartas');
		}
		else
		{
			$this->session->set_flashdata('fail', 'Ocurrio un error al crear el tipo de carta.');
			redirect('tiposcartas');
		}
	}

	public function modificar($id = null)
	{
		if ($id == null || !is_numeric($id)) {
			redirect('tiposcartas');
		}else
		{
    		$tipo_carta = $this->modelo->obtener($id);
    		if (!empty($tipo_carta)) {
    			$this->_cargar_vista($tipo_carta);
    		}
    		else
    		{
				redirect('listados/listado_monedas');        	
    		}
		}
	}

	public function update()
	{
		$registro = [
			'nombre_tipo' => $this->input->post('nombre_tipo')
		];

		$id_tipo = $this->input->post('id_tipo');
		
		$modificado = $this->modelo->modificar($registro, $id_tipo);

		if ($modificado > 0){
			$this->session->set_flashdata('sucess', 'Tipo de carta modificada correctamente.');
			redirect('tiposcartas');
		}
		else
		{
			$this->session->set_flashdata('fail', 'Ocurrio un error al modificar el tipo de carta.');
			redirect('tiposcartas');
		}
	}

	public function eliminar($id = null)
	{
		if ($id == null || !is_numeric($id)) {
			redirect('tiposcartas');
		}
		else
		{
    		$eliminado = $this->modelo->eliminar($id);

			if ($eliminado > 0){
				$this->session->set_flashdata('sucess', 'Tipo de carta eliminada correctamente.');
				redirect('tiposcartas');
			}
			else
			{
				$this->session->set_flashdata('fail', 'Ocurrio un error al eliminar el tipo de carta.');
				redirect('tiposcartas');
			}
		}
	}

	private function _cargar_vista($tipo_carta)
	{
		$datos = ['tipo_carta' => $tipo_carta];
	    $this->load->view('tipos_cartas/modificar', $datos);
	}

	private function _cargar_header($datos)
	{
		$this->load->view('header', $datos);
	}

}

/* End of file TiposCartas.php */
/* Location: ./application/controllers/TiposCartas.php */