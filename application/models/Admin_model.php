<?php

class Admin_model extends CI_Model {
    
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

    public function get_role($role_id = "")
    {
        if ($role_id == "")
        {
            return $this->db->get('user_role')
                            ->result_array();
        }
        else 
        {
            return $this->db->get_where('user_role', ['id' => $role_id])
                            ->result_array();
        }
    }

    public function get_list_menu()
    {
        return $this->db->where('menu !=', 'admin')
                        ->order_by('sequence', 'ASC')
                        ->get('user_menu')                        
                        ->result_array();
    }

    public function change_access()
    {
        $menu_id = $this->input->post('menuId', true);
        $role_id = $this->input->post('roleId', true);

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) 
        {
            $this->db->set('id', 'UUID()', FALSE);
            $this->db->insert('user_access_menu', $data);
        }
        else
        {
            $this->db->delete('user_access_menu', $data);
        }

    }

}