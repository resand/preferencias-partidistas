<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cartas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->_cargar_header(['activeCartas' => 'active']);
		$this->load->model('Cartas_Model', 'modelo', TRUE);
		$this->load->library('pdf');
        $this->pdf->fontpath = 'font/';
	}

	public function index()
	{
		$partidos = $this->modelo->obtener_partidos();
		$tipos_cartas = $this->modelo->obtener_tipos_cartas();

		$datos = [
			'partidos' => $partidos,
			'tipos_cartas' => $tipos_cartas,
		];

		$this->load->view('cartas/imprimir', $datos);
	}

	public function imprimir_cartas()
	{
		$id_partido = $this->input->post('id_partido');
		$id_tipo_carta = $this->input->post('tipo_carta'); 

		$personas = $this->modelo->obtener_personas($id_partido, $id_tipo_carta);

		if (empty($personas))
		{
			$this->session->set_flashdata('fail', 'No existen cartas para los datos seleccionados.');
			redirect('cartas');
		}

		$nombre_tipo_carta = $this->modelo->obtener_tipo_carta($id_tipo_carta);
		$nombre_partido = $this->modelo->obtener_nombre_partido($id_partido);


		$this->pdf = new PDF('P','mm','Letter');

        $this->pdf->SetTitle("Carta de ".$nombre_tipo_carta['nombre_tipo']);

        foreach ($personas as $p)
        {
        	$this->pdf->Open();
        	$this->pdf->AddPage();
        	$this->pdf->SetMargins(20,20,20);

        	//HEADER
        	$this->pdf->Header_Vertical();

        	$this->pdf->Ln(40);

        	//ASUNTO 
		    $this->pdf->SetFont('Arial', 'B', 12);
		    $this->pdf->Cell(0,12, 'ASUNTO:', 0, 1,'R');
		    $this->pdf->SetFont('Arial', 'B', 11);
		    $this->pdf->MultiCell(0,1,strtoupper(utf8_decode($p['nombre_tipo'])), 0, 'R'); 
		    $this->pdf->Ln(4);

        	//QUIEN 
    		$this->pdf->SetFont('Arial', 'B', 12);
    		$this->pdf->Cell(0,6, 'LIC. DANTE IMPERIALE.',0, 1,'L');
    		$this->pdf->SetFont('Arial', '', 12);
    		$this->pdf->Cell(0,6, 'CANDIDATO A GOBERNADOR POR EL PRD.',0, 1,'L');
    		$this->pdf->SetFont('Arial', '', 12);
    		$this->pdf->Cell(0,6, 'PRESENTE.',0, 1,'L');
    		$this->pdf->Ln(10);

    		//Persona 
    		$this->pdf->SetFont('Arial', 'B', 12);
    		$this->pdf->Cell(0,6, 'Hola '.ucwords(utf8_decode($p['nombre_completo'])).'!',0,1,'L');
    		$this->pdf->Ln(10);

    		//Persona 
    		$this->pdf->SetFont('Arial', '', 12);
    		$this->pdf->Cell(0,6, ucfirst(utf8_decode($p['texto_carta'])),0,1,'L');
    		$this->pdf->Ln(4);

	    }

        $this->pdf->Output("Cartas_".$nombre_tipo_carta['nombre_tipo'].'_'.date('Y-m-d').".pdf", 'I');
	}

	private function _cargar_header($datos)
	{
		$this->load->view('header', $datos);
	}

}

/* End of file Cartas.php */
/* Location: ./application/controllers/Cartas.php */