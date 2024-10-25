<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Teacher_model');
        $this->load->library('form_validation');
    }

    // Display login form

    public function index() {
        $this->load->view('login');
    }

    public function login() {
        $this->load->view('login');
    }

    // Handle login logic
    public function login_user() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $teacher = $this->Teacher_model->login($username, $password);

            if ($teacher) {
                $this->session->set_userdata('teacher_id', $teacher['id']);
                redirect('teacher/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect('auth/login');
            }
        }
    }

    // Display signup form
    public function signup() {
        
        $this->load->view('signup');
    }

    // Handle signup logic
    public function register() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[teachers.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('signup');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];

            $this->Teacher_model->register($data);
            $this->session->set_flashdata('success', 'Account created successfully! You can log in now.');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('teacher_id');
        redirect('auth/login');
    }
}
