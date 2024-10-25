<?php
class Student_model extends CI_Model {

    public function get_all_students() {
        return $this->db->get('students')->result_array();
    }

    public function add_student($data) {
        $this->db->insert('students', $data);
    }

    public function update_student($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('students', $data);
    }

    public function delete_student($id) {
        $this->db->where('id', $id);
        $this->db->delete('students');
    }

    public function student_exists($name, $subject) {
        $this->db->where('name', $name);
        $this->db->where('subject', $subject);
        return $this->db->get('students')->row_array();
    }
}
