<?php

class Auth_model extends CI_Model {
    
    public function registration()
    {
        $data = [
            "name" => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'role_id' => '5d8dee09-2373-4152-aad1-679099b07be2',
            'is_active' => 1,
            'date_created' => time()
        ];

        $this->db->set('id', 'UUID()', FALSE);
        $this->db->insert('user', $data);
    }

    public function login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        
        $this->db->join('user_role', 'user_role.id = user.role_id');
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function check_password($passwordFromDb)
    {
        $password = $this->input->post('password', true);
        
        return password_verify($password, $passwordFromDb);
    }
}