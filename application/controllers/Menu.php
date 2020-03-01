<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');

        is_logged_in();

    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->Menu_model->getProfileAdmin();
        $data['menu'] = $this->Menu_model->getMenu();
        $data['subMenu'] = $this->Menu_model->getSubMenu($data);
        $data['list_menu'] = $this->Menu_model->get_list_menu();
        
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('menu/index');
            $this->load->view('templates/footer'); 
        }
        else
        {
            if ($this->Menu_model->insert_menu() > 0)
            {
                $this->session->set_flashdata('success', '<strong>Success!</strong> New menu added!');
                redirect('menu'); 
            }
            else
            {
                $this->session->set_flashdata('error', '<strong>Fail!</strong> Server Error!');
                redirect('menu'); 
            }
        }

    }

    
    public function sub_menu()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->Menu_model->getProfileAdmin();
        $data['menu'] = $this->Menu_model->getMenu();
        $data['subMenu'] = $this->Menu_model->getSubMenu($data);
        $data['list_sub_menu'] = $this->Menu_model->get_list_sub_menu();
        $data['select_menu'] = $this->Menu_model->get_list_menu();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        $this->form_validation->set_rules('sequence', 'Sequence', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('menu/sub_menu');
            $this->load->view('templates/footer');
        }
        else 
        {
            if ($this->Menu_model->insert_sub_menu() > 0)
            {
                $this->session->set_flashdata('success', '<strong>Success!</strong> New Submenu added!');
                redirect('menu/sub_menu'); 
            }
            else
            {
                $this->session->set_flashdata('error', '<strong>Fail!</strong> Server Error!');
                redirect('menu/sub_menu'); 
            }
        }
    }
}