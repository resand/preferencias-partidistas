<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cartas_Model extends CI_Model {

	private $tabla_partidos = 'Partidos';
	private $tabla_texto_personas = 'Personas';
	private $tabla_tipos_cartas = 'Tipos_Cartas';
	private $tabla_texto_cartas = 'Textos_Cartas';

	function __construct()
	{
		parent::__construct();
	}

	public function obtener_partidos()
	{
		try {
			$this->db->select('id_partido, nombre_partido');
			$query = $this->db->get($this->tabla_partidos);

			$datos = ['' => 'Seleccione...'];
			foreach ($query->result() as $item) {
				$datos[$item->id_partido] = $item->nombre_partido;
			}
			return $datos;
		} catch (Exception $e) {
			return $e;
		}
	}

	public function obtener_tipos_cartas()
	{
		try {
			$this->db->select('id_tipo, nombre_tipo');
			$query = $this->db->get($this->tabla_tipos_cartas);

			$datos = ['' => 'Seleccione...'];
			foreach ($query->result() as $item) {
				$datos[$item->id_tipo] = $item->nombre_tipo;
			}
			return $datos;
		} catch (Exception $e) {
			return $e;
		}
	}

	public function obtener_personas($id_partido, $id_tipo_carta)
	{
		try{
			$this->db->select('nombre_completo, direccion, nombre_tipo, texto_carta');
			$this->db->where('id_partido', $id_partido);
			$this->db->from($this->tabla_texto_personas);
			$this->db->join($this->tabla_tipos_cartas, $this->tabla_tipos_cartas.'.id_tipo='.$id_tipo_carta);
			$this->db->join($this->tabla_texto_cartas, $this->tabla_texto_cartas.'.id_tipo_carta=id_tipo');
			$this->db->order_by('nombre_completo', 'ASC');
			$query = $this->db->get();
			
			$datos = array();
			foreach ($query->result_array() as $item) {
				$datos[] = $item;
			}
			return $datos;
		}catch (Exception $e){
			return $e->getMessage();
		}
	}

	public function obtener_tipo_carta($id)
	{
		try{
			$this->db->select('nombre_tipo');
			$this->db->where('id_tipo', $id);
	        $query = $this->db->get($this->tabla_tipos_cartas);

			foreach ($query->result_array() as $item) {
				$datos = $item;
			}
			return $datos;
		}catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function obtener_nombre_partido($id)
	{
		try{
			$this->db->select('nombre_partido');
			$this->db->where('id_partido', $id);
	        $query = $this->db->get($this->tabla_partidos);

			foreach ($query->result_array() as $item) {
				$datos = $item;
			}
			return $datos;
		}catch(Exception $e){
			return $e->getMessage();
		}
	}

	

}

/* End of file Cartas_Model.php */
/* Location: ./application/models/Cartas_Model.php */