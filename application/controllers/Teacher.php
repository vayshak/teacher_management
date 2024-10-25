<?php
class Teacher extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Student_model');
        $this->check_login();
    }

    private function check_login() {
        if (!$this->session->userdata('teacher_id')) {
            redirect('auth/login');
        }
    }

    // Teacher dashboard
    public function dashboard() {
        $data['students'] = $this->Student_model->get_all_students();
        $this->load->view('teacher_dashboard', $data);
    }
}
