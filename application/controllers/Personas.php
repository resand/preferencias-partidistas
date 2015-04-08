<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->_cargar_header(['activePersonas' => 'active']);
		$this->load->model('Personas_Model', 'modelo', TRUE);
	}

	public function index()
	{
		$personas = $this->modelo->listar();
		$datos = ['personas' => $personas];

		$this->load->view('personas/listado', $datos);
	}

	public function crear()
	{
		$partidos = $this->modelo->obtener_partidos();

		$datos = ['partidos' => $partidos];

		$this->load->view('personas/crear', $datos);
	}

	public function store()
	{
		$nombre_completo = $this->input->post('nombres').' '.$this->input->post('apellido_paterno').' '.$this->input->post('apellido_materno');
		$registro = [
			'id_partido' => $this->input->post('id_partido'),
			'nombres' => $this->input->post('nombres'),
			'nombre_completo' => $nombre_completo,
			'apellido_paterno' => $this->input->post('apellido_paterno'),
			'apellido_materno' => $this->input->post('apellido_materno'),
			'direccion' => $this->input->post('direccion'),
			'telefono' => $this->input->post('telefono')
		];

		$agregado = $this->modelo->crear($registro);

		if ($agregado > 0){
			$this->session->set_flashdata('sucess', 'Persona creada correctamente.');
			redirect('personas');
		}
		else
		{
			$this->session->set_flashdata('fail', 'Ocurrio un error al crear la personas.');
			redirect('personas');
		}
	}

	public function modificar($id = null)
	{
		if ($id == null || !is_numeric($id)) {
			redirect('tiposcartas');
		}else
		{
    		$persona = $this->modelo->obtener($id);
    		if (!empty($persona)) {
    			$this->_cargar_vista($persona);
    		}
    		else
    		{
				redirect('personas');        	
    		}
		}
	}

	public function update()
	{
		$nombre_completo = $this->input->post('nombres').' '.$this->input->post('apellido_paterno').' '.$this->input->post('apellido_materno');
		$registro = [
			'id_partido' => $this->input->post('id_partido'),
			'nombres' => $this->input->post('nombres'),
			'nombre_completo' => $nombre_completo,
			'apellido_paterno' => $this->input->post('apellido_paterno'),
			'apellido_materno' => $this->input->post('apellido_materno'),
			'direccion' => $this->input->post('direccion'),
			'telefono' => $this->input->post('telefono')
		];

		$id_persona = $this->input->post('id_persona');
		
		$modificado = $this->modelo->modificar($registro, $id_persona);

		if ($modificado > 0){
			$this->session->set_flashdata('sucess', 'Persona modificada correctamente.');
			redirect('personas');
		}
		else
		{
			$this->session->set_flashdata('fail', 'Ocurrio un error al modificar la persona.');
			redirect('personas');
		}
	}

	public function eliminar($id = null)
	{
		if ($id == null || !is_numeric($id)) {
			redirect('personas');
		}
		else
		{
    		$eliminado = $this->modelo->eliminar($id);

			if ($eliminado > 0){
				$this->session->set_flashdata('sucess', 'Persona eliminada correctamente.');
				redirect('personas');
			}
			else
			{
				$this->session->set_flashdata('fail', 'Ocurrio un error al eliminar la persona.');
				redirect('personas');
			}
		}
	}

	private function _cargar_vista($persona)
	{
		$partidos = $this->modelo->obtener_partidos();

		$datos = ['partidos' => $partidos];

		$datos = [
			'partidos' => $partidos,
			'persona' => $persona
		];

	    $this->load->view('personas/modificar', $datos);
	}


	private function _cargar_header($datos)
	{
		$this->load->view('header', $datos);
	}

}

/* End of file Personas.php */
/* Location: ./application/controllers/Personas.php */