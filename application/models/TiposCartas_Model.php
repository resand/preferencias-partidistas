<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TiposCartas_Model extends CI_Model {

	private $tabla = 'Tipos_Cartas';

	function __construct()
	{
		parent::__construct();
	}

	public function listar()
	{
		try{
			$this->db->select('id_tipo, nombre_tipo');
			$this->db->order_by('id_tipo', 'ASC');
			$query = $this->db->get($this->tabla);
			
			$datos = array();
			foreach ($query->result_array() as $item) {
				$datos[] = $item;
			}
			return $datos;
		}catch (Exception $e){
			return $e->getMessage();
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
			$this->db->select('id_tipo, nombre_tipo');
			$this->db->where('id_tipo', $id);
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
			$this->db->where('id_tipo', $id);
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
			$this->db->where('id_tipo', $id);
			$this->db->delete($this->tabla);
			return $this->db->affected_rows();
		}catch (Exception $e) {
			return $e->getMessage;
		}
	}

}

/* End of file TiposCartas_Model.php */
/* Location: ./application/models/TiposCartas_Model.php */