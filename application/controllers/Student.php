<?php
class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Student_model');
    }

    public function add() {
        $name = $this->input->post('name');
        $subject = $this->input->post('subject');
        $marks = $this->input->post('marks');

        $existing_student = $this->Student_model->student_exists($name, $subject);

        if ($existing_student) {
            $new_marks = $existing_student['marks'] + $marks;
            $this->Student_model->update_student($existing_student['id'], ['marks' => $new_marks]);
        } else {
            $this->Student_model->add_student(['name' => $name, 'subject' => $subject, 'marks' => $marks]);
        }
    }

    public function update($id) {
        $name = $this->input->post('name');
        $subject = $this->input->post('subject');
        $marks = $this->input->post('marks');

        $this->Student_model->update_student($id, ['name' => $name, 'subject' => $subject, 'marks' => $marks]);
    }

    public function delete($id) {
        $this->Student_model->delete_student($id);
        redirect('teacher/dashboard');
    }
}
