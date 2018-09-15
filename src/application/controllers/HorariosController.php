<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HorariosController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('AgendasModel','agendas');
		$this->load->model('PacientesModel','pacientes');
		$this->load->model('HorariosModel', 'horarios');
	}

	public function create()
	{
		$reg 	= $this->input->post();
		$this->agendas->add($reg);

		$mes 	= $reg['mes'];
		$ano    = $reg['ano'];
		$q 		= "SELECT * FROM agenda as a WHERE a.mes = $mes AND a.ano = $ano";
		$r      = $this->db->query($q)->row_array();
		$d		= array(
			'agenda'	=> $r['id']
		);
		
		$this->load->view('Home/menu');
		$this->load->view('Horarios/create', $d);

	}

	public function add()
	{
		$reg = $this->input->post();

		$length = sizeof($reg['hinicial']);
		
		for($count = 0; $count < $length; $count++)
		{	
			$data = array(
				'hinicial' 		=> $reg['hinicial'][$count],
				'hfinal'		=> $reg['hfinal'][$count],
				'dia'			=> $reg['dia'][$count],
				'paciente_id' 	=> null,
				'agenda_id'		=> $reg['agenda_id']
			);
			
			$this->horarios->add($data);
		}
		redirect('view-agenda');
	}
}