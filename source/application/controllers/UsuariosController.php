<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosController extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	public function index(){
		if ($this->session->userdata('psicologo') == NULL) {
			redirect('/');
		}
		$this->load->view('Home/menu');
		$this->load->model('UsuariosModel');
		$data = array(
			'datausuarios' => $this->UsuariosModel->view()
		);
		$this->load->view('Usuarios/index',$data);
	}
	public function get(){
		$dados = array(
			'idusuario' => $this->input->post('idusuario'),
			'username' => $this->input->post('username'),
			'senha' => $this->input->post('senha')
		);
		return $dados;
	}

	public function create(){
		$cadastro['erro_senha'] = $this->session->flashdata('erro_senha');
		$this->load->view('Usuarios/create',$cadastro);
	}

	public function add(){
		$this->load->model('UsuariosModel','usuarios');
		$dadosusuario = $this->get();
		$dadosusuario['senha'] = md5($dadosusuario['username'].$dadosusuario['senha']);

		if ($this->input->post('confirm_senha') != $this->input->post('senha')) {
			$erro_senha = "<div class='ls-sm-space ls-txt-center' style='font-size:20px; color:red;'>Parece que as senhas não são iguais</div>";
			$this->session->set_flashdata('erro_senha',$erro_senha);
			redirect("UsuariosController/create");
		}
		$this->usuarios->add($dadosusuario);

		$this->db->select('idusuario');
		$this->db->where('username',$dadosusuario['username']);
		$usuario = $this->db->get('usuario')->result();

		//Informa o nome do usuário para a query poder retornar o seu id
		//A variável $usuario é o retorno da query do id do usuario cadastrado, cria-se uma sessão para que ela seja mandada para a tela de cadastro do psicólogo
		$this->session->set_userdata('id_user',  $usuario);
		redirect("create-psycho");
	}

	public function delete($id=NULL){
		if ($id == NULL) {
			redirect("UsuariosController");
		}else{
			$this->load->model('UsuariosModel');
			$this->UsuariosModel->delete($id);
			redirect("UsuariosController");
		}
	}

	public function edit($id){
		$this->load->model('UsuariosModel');
		$dados['user'] = $this->UsuariosModel->view_id($id);
		$this->load->view('Home/menu');
		$this->load->view('Usuarios/update', $dados);
	}

	public function update(){
		$this->load->model('UsuariosModel');
		$dados = $this->get();
		$this->UsuariosModel->update($dados);
		redirect('UsuariosController');
	}
}
