<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->User_model->getProfileUser();
        $data['menu'] = $this->User_model->getMenu();

        $data['subMenu'] = $this->User_model->getSubMenu($data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->User_model->getProfileUser();
        $data['menu'] = $this->User_model->getMenu();

        $data['subMenu'] = $this->User_model->getSubMenu($data);

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/edit');
            $this->load->view('templates/footer');
        } 
        else 
        {
            if ($this->User_model->edit_profile($data) > 0) 
            {
                $this->session->set_flashdata('success', '<strong>Success!</strong> Profile changed!');
                redirect('user');
            } 
            else 
            {
                $this->session->set_flashdata('error', '<strong>Failed!</strong> Server Error!');
                redirect('user');
            }
        }
    }

    
    public function change_password()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->User_model->getProfileUser();
        $data['menu'] = $this->User_model->getMenu();

        $data['subMenu'] = $this->User_model->getSubMenu($data);

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'Password', 'required|trim|min_length[6]|matches[new_password2]',[
			'matches' => 'Password dont match!',
			'min_length' => 'Password min 6 charachter!'
		]);
		$this->form_validation->set_rules('new_password2', 'Password', 'required|trim|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/change_password');
            $this->load->view('templates/footer');
        }
        else
        {
            if ($this->User_model->check_current_password($data) == FALSE)
            {
                $this->session->set_flashdata('error', '<strong>Failed!</strong> Wrong current password!');
                redirect('user/change_password');
            }

            if ($this->User_model->check_password_same($data) == TRUE)
            {
                $this->session->set_flashdata('error', '<strong>Failed!</strong> New password cannot be the same as current password!');
                redirect('user/change_password');
            }
            
            if ($this->User_model->insert_new_password() < 0)
            {
                $this->session->set_flashdata('error', '<strong>Failed!</strong> Server Error!');
                redirect('user/change_password');
            }
            else
            {
                $this->session->set_flashdata('success', '<strong>Success!</strong> Password changed!');
                redirect('user/change_password');
            }

        }

    }
}
