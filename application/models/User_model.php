<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
 
    public function loginUser($data)
    {
        return $this->db->get_where('users', array('email' => $email, 'password' => $password))->result();
    }

    public function checkPassword($password)
    {
        $this->db->query("SELECT * FROM users WHERE password='$password'");
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            return false;

        }
    }

    
}
