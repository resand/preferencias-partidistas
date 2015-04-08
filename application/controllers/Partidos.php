<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partidos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->_cargar_header(['activePartidos' => 'active']);
		$this->load->model('Partidos_Model', 'modelo', TRUE);
	}

	public function index()
	{
		$partidos = $this->modelo->listar();
		$datos = ['partidos' => $partidos];

		$this->load->view('partidos/listado', $datos);
	}

	public function crear()
	{
		$this->load->view('partidos/crear');
	}

	public function store()
	{
		$config['upload_path'] = realpath(APPPATH.'../images/logos_partidos');	

		$nombre = strftime('imagen_-_%Y_%m_%d_-_%H_%M_%S.jpg');
		$config['allowed_types'] = '*';
		$config['max_size'] = '12048';
		$config['file_name'] = $nombre;
		$config['overwrite'] = TRUE;
		$config['remove_space'] = TRUE;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('imagen_partido') ) {		
			print_r($this->upload->display_errors());						
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());			
			$imagen = $data['upload_data']['file_name'];

			$registro = [
				'nombre_partido' => $this->input->post('nombre_partido'),
				'imagen_partido' => $imagen
			];

			$agregado = $this->modelo->crear($registro);

			if ($agregado > 0){
				$this->session->set_flashdata('sucess', 'Partido creado correctamente.');
				redirect('partidos');
			}
			else
			{
				$this->session->set_flashdata('fail', 'Ocurrio un error al crear el partido.');
				redirect('partidos');
			}

		}		
	}

	public function modificar($id = null)
	{
		if ($id == null || !is_numeric($id)) {
			redirect('partidos');
		}else
		{
    		$partido = $this->modelo->obtener($id);
    		if (!empty($partido)) {
    			$this->_cargar_vista($partido);
    		}
    		else
    		{
				redirect('listados/listado_monedas');        	
    		}
		}
	}

	public function update()
	{
		if(is_uploaded_file($_FILES['imagen_partido']['tmp_name'])) 
		{  
		   $imagen = $this->_modificar_imagen();
		   $this->_modificar($imagen);
		}else{
			$this->_modificar();
		}
	}

	private function _modificar_imagen()
	{
		$imagen_partido_original = $this->input->post('imagen_partido_original');

		$config['upload_path'] = realpath(APPPATH.'../images/logos_partidos');	

		$nombre = strftime('imagen_-_%Y_%m_%d_-_%H_%M_%S.jpg');
		$config['allowed_types'] = '*';
		$config['max_size'] = '12048';
		$config['file_name'] = $nombre;
		$config['overwrite'] = TRUE;
		$config['remove_space'] = TRUE;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('imagen_partido') ) {		
			print_r($this->upload->display_errors());			
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());			
			$imagen = $data['upload_data']['file_name'];

			$path = realpath(APPPATH.'../images/logos_partidos/'.$imagen_partido_original);	
    		unlink($path);

    		return $imagen;
		}		
	}

	private function _modificar($imagen = null)
	{
		if (is_null($imagen))
		{
			$registro = [
				'nombre_partido' => $this->input->post('nombre_partido')
			];
		}
		else{
			$registro = [
				'nombre_partido' => $this->input->post('nombre_partido'),
				'imagen_partido' => $imagen
			];
		}

		$id_partido = $this->input->post('id_partido');
		
		$modificado = $this->modelo->modificar($registro, $id_partido);

		if ($modificado > 0)
		{
			$this->session->set_flashdata('sucess', 'Partido modificado correctamente.');
			redirect('partidos');
		}
		else
		{
			$this->session->set_flashdata('fail', 'Ocurrio un error al modificar el partido.');
			redirect('partidos');
		}

	}

	public function eliminar($id = null)
	{
		if ($id == null || !is_numeric($id))
		{
			redirect('partidos');
		}
		else
		{
    		$eliminado = $this->modelo->eliminar($id);

			if ($eliminado > 0)
			{
				$this->session->set_flashdata('sucess', 'Partido eliminado correctamente.');
				redirect('partidos');
			}
			else
			{
				$this->session->set_flashdata('fail', 'Ocurrio un error al eliminar el partido.');
				redirect('partidos');
			}
		}
	}

	private function _cargar_vista($partido)
	{
		$datos = ['partido' => $partido];
	    $this->load->view('partidos/modificar', $datos);
	}

	private function _cargar_header($datos)
	{
		$this->load->view('header', $datos);
	}

}

/* End of file Partidos.php */
/* Location: ./application/controllers/Partidos.php */