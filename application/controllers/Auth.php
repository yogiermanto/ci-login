<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$data['title'] = 'Login Page';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[re-password]',[
			'matches' => 'Password dont match!',
			'min_length' => 'Password min 6 charachter!'
		]);
		$this->form_validation->set_rules('re-password', 'Password', 'required|trim|matches[password]');

		if ($this->form_validation->run() == false) 
		{
            $data['title'] = 'CI-Login Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        }
		else
		{
			// $this->Mahasiswa_model->tambahDataMahasiswa();
			$this->Auth_model->registration();
			$this->session->set_flashdata('message');
			redirect('auth');
		}
	}
}
