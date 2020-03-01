<?php

class User_model extends CI_Model {
    
    public function getProfileUser()
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

    public function edit_profile()
    {
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);

        return $this->db->set('name', $name)
                        ->where('email', $email)
                        ->update('user');
    }

}