<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personas_Model extends CI_Model {

	private $tabla = 'Personas';
	private $tabla_partidos = 'Partidos';

	function __construct()
	{
		parent::__construct();
	}

	public function listar()
	{
		try{
			$this->db->select('id_persona, nombres, apellido_paterno, apellido_materno, direccion, telefono, imagen_partido');
			$this->db->from($this->tabla);
			$this->db->join($this->tabla_partidos, $this->tabla.'.id_partido='.$this->tabla_partidos.'.id_partido');
			$this->db->order_by('id_persona', 'ASC');
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

	public function crear($datos)
	{
		try{
			$this->db->insert($this->tabla, $datos);
			return $this->db->affected_rows();
		}catch (Exception $e){
			return $e->getMessage();
		}
	}

	public function obtener($id)
	{
		try{
			$this->db->select('id_persona, nombres, apellido_paterno, apellido_materno, direccion, telefono, id_partido');
			$this->db->where('id_persona', $id);
	        $query = $this->db->get($this->tabla);

			foreach ($query->result_array() as $item) {
				$datos = $item;
			}
			return $datos;
		}catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function modificar($datos, $id)
	{
		try{
			$this->db->where('id_persona', $id);
			$this->db->update($this->tabla, $datos);
			return $this->db->affected_rows();
		}catch (Exception $e) {
			return $e->getMessage;
		}
		return $afectadas;
	}

	public function eliminar($id)
	{
		try{
			$this->db->where('id_persona', $id);
			$this->db->delete($this->tabla);
			return $this->db->affected_rows();
		}catch (Exception $e) {
			return $e->getMessage;
		}
	}

	

}

/* End of file Personas_Model.php */
/* Location: ./application/models/Personas_Model.php */