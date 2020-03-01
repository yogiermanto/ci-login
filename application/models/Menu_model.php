<?php

class Menu_model extends CI_Model {
    
    public function getProfileAdmin()
    {
        $email = $this->session->userdata('email');

        return $this->db->get_where('user', ['email' => $email])->row_array();
    }
    
    public function getMenu()
    {
        $role_id = $this->session->userdata('role_id');

        $this->db->select('user_menu.id, user_menu.sequence, menu ');
        $this->db->join('user_access_menu', 'user_menu.id = user_access_menu.menu_id');
        $this->db->order_by('user_menu.sequence', 'ASC');
        return $this->db->get_where('user_menu', ['role_id' => $role_id])->result_array();
    }

    public function getSubMenu($data)
    {
        $result = array();
        foreach($data['menu'] as $m)
        {
            $menuId = $m['id'];
            
            $result[] = $this->db
                 ->select()
                 ->from('user_sub_menu')
                 ->where('user_sub_menu.menu_id', $menuId)
                 ->where('user_sub_menu.is_active', 1)
                 ->order_by('user_sub_menu.sequence', 'ASC')
                 ->get()
                 ->result_array();
        }

       return $result;
    }

    public function insert_menu()
    {

        $data = [
            'menu' => htmlspecialchars($this->input->post('menu', true)),
            'sequence' => htmlspecialchars($this->input->post('sequence', true))
        ];
        $this->db->set('id', 'UUID()', FALSE);

        return $this->db->insert('user_menu', $data);
    }

    public function insert_sub_menu()
    {

        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
            'url' => htmlspecialchars($this->input->post('url', true)),
            'icon' => htmlspecialchars($this->input->post('icon', true)),
            'sequence' => htmlspecialchars($this->input->post('sequence', true)),
            'is_active' => htmlspecialchars($this->input->post('is_active', true))
        ];
        $this->db->set('id', 'UUID()', FALSE);

        return $this->db->insert('user_sub_menu', $data);
    }

    public function get_list_menu()
    {
        return $this->db->order_by('sequence', 'ASC')
                         ->get('user_menu')
                        ->result_array();    
    }

    public function get_list_sub_menu()
    {
        return $this->db->select('user_sub_menu.*, user_menu.menu')
                        ->from('user_sub_menu')
                        ->join('user_menu', 'user_sub_menu.menu_id = user_menu.id')
                        ->order_by('user_sub_menu.menu_id', 'ASC')
                        ->order_by('user_sub_menu.sequence', 'ASC')
                        ->get()
                        ->result_array();
    }

}