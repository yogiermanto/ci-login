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

        // $data['subMenu'] = array();

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
            if($this->User_model->edit_profile() > 0)
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
}