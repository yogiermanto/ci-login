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

	public function go_default_page()
	{
		$admin_uuid = admin_uuid();
		if ($this->session->userdata('role_id') == $admin_uuid )
		{
			redirect('admin');
		}
		
		$member_uuid = member_uuid();
		if ($this->session->userdata('role_id') == $member_uuid )
		{
			redirect('user');
		}
	}

	public function index()
	{
		// $this->go_default_page();

		if ($this->session->userdata('email'))
		{
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}
		else
		{
			$user = $this->Auth_model->login();
			if($user > 0)
			{
				if ($user['is_active'] == 1){
					
					if($this->Auth_model->check_password($user['password']))
					{
						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id']
						];
						$this->session->set_userdata($data);
						if($user['role'] == 'Administrator')
						{
							redirect('admin');
						}
						else
						{
							redirect('user');
						}
					}
					else
					{
						$this->session->set_flashdata('error', '<strong>Failed!</strong> Wrong password!');
						redirect('auth');
					}
				}
				else
				{
					$this->session->set_flashdata('error', '<strong>Failed!</strong> This Email is not been activated!');
					redirect('auth');
				}
			}
			else 
			{
				$this->session->set_flashdata('error', '<strong>Failed!</strong> This Email is not registered!');
				redirect('auth');
			}
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email'))
		{
			redirect('user');
		}
		
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
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }
		else
		{
			// $this->Mahasiswa_model->tambahDataMahasiswa();
			$this->Auth_model->registration();
			$this->session->set_flashdata('success', '<strong>Congratulation!</strong> Your account has been created. Please login!');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('success', '<strong>Congratulation!</strong> You have been logged out!');
        redirect('auth');
	}

	public function blocked()
	{
		$data['title'] = 'Access Forbidden';

		$this->load->view('templates/header', $data);
		$this->load->view('auth/blocked');
		$this->load->view('templates/footer');
	}
}
