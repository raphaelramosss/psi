<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PacientesModel extends CI_Model 
{
	
	public $id;

	public function view($id,$limit = NULL, $offset = NULL)
	{
		if ($limit) 
		{
			//Número de registro a serem retornados ($limit) e a página de registro ($offset)
			$this->db->limit($limit, $offset);
		}

		$this->db->from($this->db->dbprefix('psicologo').",".$this->db->dbprefix('paciente'));
		$this->db->where($this->db->dbprefix('psicologo').'.id ='.$this->db->dbprefix('paciente').'.id_psicologo');
		$this->db->where('id_psicologo', $id);
		$this->db->order_by($this->db->dbprefix('paciente').".nome", "asc");
		$query = $this->db->get();
		return $query->result();
	}

	public function search($id,$nomepaciente,$limit = NULL, $offset = NULL)
	{
		//SELECT * FROM PACIENTE WHERE psicologo_crp = $crp AND LIKE '%Raphael%'
		if ($limit) 
		{
			//Número de registro a serem retornados ($limit) e a página de registro ($offset)
			$this->db->limit($limit, $offset);
		}
		$this->db->from($this->db->dbprefix('paciente'));
		$this->db->where('id_psicologo', $id);
		$this->db->like($this->db->dbprefix('paciente').'.nome', $nomepaciente);
		return $this->db->get()->result();
	}

	public function add($dados)
	{
		$this->db->insert($this->db->dbprefix('paciente'),$dados);
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->db->dbprefix('paciente'));
	}

	public function view_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get($this->db->dbprefix('paciente'));
		return $query->row();
	}
	
	public function update($dados)
	{
		$this->db->set($dados);
		$this->db->where('id',$this->id);
		$this->db->update($this->db->dbprefix('paciente'));
	}

	public function count_results($id_psicologo)
	{
		$this->db->select('id');
		$this->db->from($this->db->dbprefix('paciente'));
		$this->db->where('id_psicologo',$id_psicologo);
		$num_results = $this->db->count_all_results();
		return $num_results;
	}
}
