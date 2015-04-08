<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TextosCartas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->_cargar_header(['activeTextosCartas' => 'active']);
		$this->load->model('TextosCartas_Model', 'modelo', TRUE);
	}

	public function index()
	{
		$textos_cartas = $this->modelo->listar();
		$datos = ['textos_cartas' => $textos_cartas];

		$this->load->view('textos_cartas/listado', $datos);
	}

	public function crear()
	{
		$tipos_cartas = $this->modelo->obtener_tipos_cartas();

		$datos = ['tipos_cartas' => $tipos_cartas];

		$this->load->view('textos_cartas/crear', $datos);
	}

	public function store()
	{
		$registro = [
			'id_tipo_carta' => $this->input->post('id_tipo_carta'),
			'texto_carta' => $this->input->post('texto_carta')
		];

		$agregado = $this->modelo->crear($registro);

		if ($agregado > 0){
			$this->session->set_flashdata('sucess', 'Texto para carta creada correctamente.');
			redirect('textoscartas');
		}
		else
		{
			$this->session->set_flashdata('fail', 'Ocurrio un error al crear el texto para la carta.');
			redirect('textoscartas');
		}
	}

	public function modificar($id = null)
	{
		if ($id == null || !is_numeric($id)) {
			redirect('tiposcartas');
		}else
		{
    		$texto_carta = $this->modelo->obtener($id);
    		if (!empty($texto_carta)) {
    			$this->_cargar_vista($texto_carta);
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
			'id_tipo_carta' => $this->input->post('id_tipo_carta'),
			'texto_carta' => $this->input->post('texto_carta')
		];

		$id_texto = $this->input->post('id_texto');
		
		$modificado = $this->modelo->modificar($registro, $id_texto);

		if ($modificado > 0){
			$this->session->set_flashdata('sucess', 'Texto para carta modificado correctamente.');
			redirect('textoscartas');
		}
		else
		{
			$this->session->set_flashdata('fail', 'Ocurrio un error al modificar el texto para la carta.');
			redirect('textoscartas');
		}
	}

	public function eliminar($id = null)
	{
		if ($id == null || !is_numeric($id)) {
			redirect('textoscartas');
		}
		else
		{
    		$eliminado = $this->modelo->eliminar($id);

			if ($eliminado > 0){
				$this->session->set_flashdata('sucess', 'Texto para carta eliminado correctamente.');
				redirect('textoscartas');
			}
			else
			{
				$this->session->set_flashdata('fail', 'Ocurrio un error al eliminar el texto para la carta.');
				redirect('textoscartas');
			}
		}
	}

	private function _cargar_vista($texto_carta)
	{
		$tipos_cartas = $this->modelo->obtener_tipos_cartas();

		$datos = [
			'tipos_cartas' => $tipos_cartas,
			'texto_carta' => $texto_carta
		];

	    $this->load->view('textos_cartas/modificar', $datos);
	}

	private function _cargar_header($datos)
	{
		$this->load->view('header', $datos);
	}

}

/* End of file TextosCartas.php */
/* Location: ./application/controllers/TextosCartas.php */