<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');

        is_logged_in(); 

    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->Admin_model->getProfileAdmin();
        $data['menu'] = $this->Admin_model->getMenu();
        $data['subMenu'] = $this->Admin_model->getSubMenu($data);        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');       

    }

    public function role()
    {
        $data['title'] = 'Role Management';
        $data['user'] = $this->Admin_model->getProfileAdmin();
        $data['menu'] = $this->Admin_model->getMenu();
        $data['subMenu'] = $this->Admin_model->getSubMenu($data);
        $data['role'] = $this->Admin_model->get_role();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/role');
        $this->load->view('templates/footer');       

    }

    public function role_access($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->Admin_model->getProfileAdmin();
        $data['menu'] = $this->Admin_model->getMenu();
        $data['subMenu'] = $this->Admin_model->getSubMenu($data);
        $data['role'] = $this->Admin_model->get_role($role_id);
        $data['list_menu'] = $this->Admin_model->get_list_menu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/role_access');
        $this->load->view('templates/footer');       

    }

    public function change_access()
    {
        $this->Admin_model->change_access();
    }
}