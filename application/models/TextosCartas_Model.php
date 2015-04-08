<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TextosCartas_Model extends CI_Model {

	private $tabla = 'Textos_Cartas';
	private $tabla_tipos = 'Tipos_Cartas';

	function __construct()
	{
		parent::__construct();
	}

	public function listar()
	{
		try{
			$this->db->select('id_texto, nombre_tipo, texto_carta');
			$this->db->from($this->tabla);
			$this->db->join($this->tabla_tipos, 'id_tipo_carta=id_tipo');
			$this->db->order_by('id_texto', 'ASC');
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

	public function obtener_tipos_cartas()
	{
		try {
			$this->db->select('id_tipo, nombre_tipo');
			$query = $this->db->get($this->tabla_tipos);

			$datos = ['' => 'Seleccione...'];
			foreach ($query->result() as $item) {
				$datos[$item->id_tipo] = $item->nombre_tipo;
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
			$this->db->select('id_texto, id_tipo_carta, texto_carta');
			$this->db->where('id_texto', $id);
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
			$this->db->where('id_texto', $id);
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
			$this->db->where('id_texto', $id);
			$this->db->delete($this->tabla);
			return $this->db->affected_rows();
		}catch (Exception $e) {
			return $e->getMessage;
		}
	}

}

/* End of file TextosCartas_Model.php */
/* Location: ./application/models/TextosCartas_Model.php */