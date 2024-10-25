<?php
class Teacher_model extends CI_Model {

    public function login($username, $password) {
        $this->db->where('username', $username);
        $teacher = $this->db->get('teachers')->row_array();

        if ($teacher && password_verify($password, $teacher['password'])) {
            return $teacher;
        }
        return false;
    }

    public function register($data) {
        $this->db->insert('teachers', $data);
    }
}
