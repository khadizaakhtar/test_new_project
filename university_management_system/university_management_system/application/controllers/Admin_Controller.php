<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Controller extends CI_Controller {
    
     public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('form_validation');
        }
    
   public function index()
	{
	   $this->load->view('admin/admin_login');
	}  
        
     public function admin_login_check() {
        $data = array();
        $data['email_address'] = $this->input->post('email_address', true);
        $data['password'] = md5($this->input->post('password', true));
        $result = $this->admin_model->check_admin_login_info($data);
         }
         
    public function logout() {
        $this->session->sess_destroy();
        redirect('admin');
         }

    public function dashboard() {
       if ($this->session->userdata('admin_id') != '') {
            $data = array();
            $data['title'] = "dashboard";
            $this->load->view('admin/dashboard', $data);
        } else {
            redirect('admin');
        }
    }
    
   public function add_department() {
       if ($this->session->userdata('admin_id') == '') {
          redirect('admin');
          }
        $data = array();
        $data['title'] = "add_department";
        $this->load->view('admin/add_department', $data);
    }

    public function view_department() {
        if ($this->session->userdata('admin_id') == '') {
              redirect('admin');
          }
        $data = array();
        $data['title'] = "view_department";
        $data['all_department'] = $this->admin_model->select_all_department();
        $this->load->view('admin/view_department', $data);
    }

    public function save_department() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
          }
        $data = array();
        $data['title'] = "save_department";
        $this->form_validation->set_rules('department_name', 'Department Name', 'required|is_unique[tbl_department.dept_name]');
        $this->form_validation->set_rules('department_code', 'Department Code', 'required|is_unique[tbl_department.dept_code]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/add_department', $data);
        } else {
            $data = array();
            $data['dept_name'] = $this->input->post('department_name', true);
            $data['dept_code'] = $this->input->post('department_code', true);
            $data['dept_description'] = $this->input->post('department_description', true);
            $result = $this->admin_model->save_department_info($data);
            $this->session->set_flashdata('success', 'Successfully saved');
            redirect('add_department');
        }
    } 
    
     public function delete_department() {
       if ($this->session->userdata('admin_id') == '') {
          redirect('admin');
          }
        $department_id = $this->uri->segment(2);
        $this->admin_model->delete_department_by_id($department_id);
        redirect('view_department');
    }
    
    
      public function add_course() {
        if ($this->session->userdata('admin_id') == '') {
              redirect('admin');
          }
        $data = array();
        $data['title'] = "add_course";
        $data['all_department'] = $this->admin_model->select_all_department();
        $this->load->view('admin/add_course', $data);
    }
    
    public function save_course() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
          }
        $data = array();
        $data['title'] = "save_course";
        $this->form_validation->set_rules('course_name', 'Course Name', 'required|is_unique[tbl_course.course_name]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/add_course', $data);
        } else {
            $data = array();
            $data['course_name'] = $this->input->post('course_name', true);
            $data['course_code'] = $this->input->post('course_code', true);
            $data['course_credit'] = $this->input->post('course_credit', true);
            $data['dept_id'] = $this->input->post('department_id', true);
            $data['semister'] = $this->input->post('semister', true);
            $data['course_description'] = $this->input->post('course_description', true);
            $result = $this->admin_model->save_course_info($data);
            $this->session->set_flashdata('success', 'Successfully saved');
            redirect('add_course');
        }
    }
    
      public function view_course() {
        $data = array();
        $data['title'] = "view_course";
        $data['all_course'] = $this->admin_model->select_all_course();
        $this->load->view('admin/view_course', $data);
       }
       
          public function delete_course() {
       if ($this->session->userdata('admin_id') == '') {
          redirect('admin');
          }
        $course_id = $this->uri->segment(2);
        $this->admin_model->delete_course_by_id($course_id);
        redirect('view_course');
        }
        
         public function add_teacher() {
        if ($this->session->userdata('admin_id') == '') {
              redirect('admin');
          }
        $data = array();
        $data['title'] = "add_teacher";
        $data['all_department'] = $this->admin_model->select_all_department();
        $this->load->view('admin/add_teacher', $data);
        }
        
        
         public function save_teacher() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
          }
           $data = array();
           $data['title'] = "save_teacher";
           $this->form_validation->set_rules('teacher_name', 'Teacher Name', 'required|is_unique[tbl_teacher.teacher_name]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/add_teacher', $data);
            } else {
            $data = array();
            $data['teacher_name'] = $this->input->post('teacher_name', true);
            $data['email_address'] = $this->input->post('email_address', true);
            $data['contact_number'] = $this->input->post('contact_number', true);
            $data['teacher_designation'] = $this->input->post('teacher_designation', true);
            $data['department_id'] = $this->input->post('department_id', true);
            $data['address'] = $this->input->post('address', true);
            $data['credit_to_be_taken'] = $this->input->post('credit_to_be_taken', true);
            $this->db->insert('tbl_teacher', $data);
            $lastid = $this->db->insert_id();
            
              if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $teacher_image = $_FILES['image']['name']; 
                $config['upload_path'] = './upload_image/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '52428800';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                $fileinfo = $this->upload->do_upload("image");
                if (!$fileinfo) {
                   $data['error'] = $this->upload->display_errors(); 
                } else {
                    $update = $this->admin_model->update_teacher_image($lastid,$teacher_image);
                    if ($update == true) {
                        redirect('add_teacher');
                    }
                }
            }
            $this->session->set_flashdata('success', 'Successfully saved');
            redirect('add_teacher');
        }
    }
    
    public function view_teacher() {
        $data = array();
        $data['title'] = "view_teacher";
        $data['all_teacher'] = $this->admin_model->select_all_teacher();
        $this->load->view('admin/view_teacher', $data);
       }
       
    public function delete_teacher() {
       if ($this->session->userdata('admin_id') == '') {
          redirect('admin');
          }
        $teacher_id = $this->uri->segment(2);
        $this->admin_model->delete_teacher_by_id($teacher_id);
        redirect('view_teacher');
        }
        
        public function course_assign_to_teacher(){
           if ($this->session->userdata('admin_id') == '') {
              redirect('admin');
          }
        $data = array();
        $data['title'] = "course_assign_to_teacher";
        $data['all_department'] = $this->admin_model->select_all_department();
        $this->load->view('admin/course_assign_to_teacher', $data);  
        }
        
        public function select_department_by_id_in_ajax(){
            
             if ($this->session->userdata('admin_id') == '') {
              redirect('admin');
          }
        $data = array();
        $data['title'] = "select_department_by_id";
        $department_id = $this->input->post('department_id');
        $data['all_course_info'] = $this->admin_model->select_course_by_dept_id_in_ajax_info($department_id);
        $data['all_teacher_info'] = $this->admin_model->select_teacher_by_dept_id_in_ajax_info($department_id);
         if (!empty($data['all_teacher_info'])) {
           $json['success'] = 1;
           $json['teacher']= '<option value="">Select Teacher</option>';
           foreach ($data['all_teacher_info'] as $value) {
                $json['teacher'] .= '<option value="' . $value->teacher_id . '">' . $value->teacher_name . '</option>';
                }
           $json['course']= '<option value="">Select Course Code</option>';
           foreach ($data['all_course_info'] as $valu) {
                $json['course'] .= '<option value="' . $valu->course_id . '">' . $valu->course_code . '</option>';
                }    
        } else {
            $json['success'] = 0;
            $json['box']= '<div class="control-group">';
            $json['box'] .= '<label class="control-label" for="typeahead">Credit to be Taken</label>';
            $json['box'] .= '<div class="controls ">';
            $json['box'] .= '<input type="text" name="remaining_credit" value="No Credit to be taken Found!!" class="span6 typeahead" id="typeahead">';
            $json['box'] .= '</div>';
            $json['box'] .= '</div>';
        }
        echo json_encode($json);
        }

        public function select_teacher_by_id_in_ajax(){
          if ($this->session->userdata('admin_id') == '') {
              redirect('admin');
          }
        $data = array();
        $data['title'] = "select_teacher_by_id";
        $teacher_id = $this->input->post('teacher_id');
        $data['all_teacher'] = $this->admin_model->select_teacher_by_id_in_ajax_info($teacher_id);   
         if (!empty($data['all_teacher'])) {
           $json['success'] = 1;
           $json['box']= '<div class="control-group">';
           $json['box'] .= '<label class="control-label" for="typeahead">Credit to be Taken</label>';
           $json['box'] .= '<div class="controls ">';
           $json['box'] .= '<input type="text" name="remaining_credit" value="'.$data['all_teacher']->credit_to_be_taken.'" class="span6 typeahead" id="typeahead">';
           $json['box'] .= '</div>';
           $json['box'] .= '</div>';
            
           $json['box'].= '<div class="control-group">';
           $json['box'] .= '<label class="control-label" for="typeahead">Remaining Credit</label>';
           $json['box'] .= '<div class="controls ">';
           $json['box'] .= '<input type="text" name="remaining_credit" value="'.$data['all_teacher']->credit_to_be_taken.'" class="span6 typeahead" id="typeahead">';
           $json['box'] .= '</div>';
           $json['box'] .= '</div>';
            
        } else {
            $json['success'] = 0;
            $json['box']= '<div class="control-group">';
            $json['box'] .= '<label class="control-label" for="typeahead">Credit to be Taken</label>';
            $json['box'] .= '<div class="controls ">';
            $json['box'] .= '<input type="text" name="remaining_credit" value="No Credit to be taken Found!!" class="span6 typeahead" id="typeahead">';
            $json['box'] .= '</div>';
            $json['box'] .= '</div>';
        }
        echo json_encode($json);
        
        }
        
        public function select_course_by_id_in_ajax(){
            if ($this->session->userdata('admin_id') == '') {
              redirect('admin');
             }
           $data = array();
           $data['title'] = "select_course_by_id";
           $course_id = $this->input->post('course_id');
           $data['all_course'] = $this->admin_model->select_course_by_id_in_ajax_info($course_id);   
         if (!empty($data['all_course'])) {
           $json['success'] = 1;
           $json['box']= '<div class="control-group">';
           $json['box'] .= '<label class="control-label" for="typeahead">Course Name</label>';
           $json['box'] .= '<div class="controls ">';
           $json['box'] .= '<input type="text" name="remaining_credit" value="'.$data['all_course']->course_name.'" class="span6 typeahead" id="typeahead">';
           $json['box'] .= '</div>';
           $json['box'] .= '</div>';
            
           $json['box'].= '<div class="control-group">';
           $json['box'] .= '<label class="control-label" for="typeahead">Course Credit</label>';
           $json['box'] .= '<div class="controls ">';
           $json['box'] .= '<input type="text" name="remaining_credit" value="'.$data['all_course']->course_credit.'" class="span6 typeahead" id="typeahead">';
           $json['box'] .= '</div>';
           $json['box'] .= '</div>';
            
        } else {
            $json['success'] = 0;
            $json['box']= '<div class="control-group">';
            $json['box'] .= '<label class="control-label" for="typeahead">Credit to be Taken</label>';
            $json['box'] .= '<div class="controls ">';
            $json['box'] .= '<input type="text" name="remaining_credit" value="No Result Found!!" class="span6 typeahead" id="typeahead">';
            $json['box'] .= '</div>';
            $json['box'] .= '</div>';
        }
        echo json_encode($json); 
        }
        
        public function save_course_assign_to_teacher(){
         if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
          }
        $data = array();
        $data['title'] = "save_course_assign_to_teacher";
        $this->form_validation->set_rules('department_id', 'Department', 'required');
        $this->form_validation->set_rules('teacher_id', 'Teacher', 'required');
        $this->form_validation->set_rules('course_id', 'Course', 'required');
        if ($this->form_validation->run() == FALSE) {
             $data['all_department'] = $this->admin_model->select_all_department();
            $this->load->view('admin/course_assign_to_teacher', $data);
        } else {
            $data = array();
            $data['department_id'] = $this->input->post('department_id', true);
            $data['teacher_id'] = $this->input->post('teacher_id', true);
            $data['course_id'] = $this->input->post('course_id', true);       
            $result = $this->admin_model->save_course_assign_to_teacher_info($data);
            $this->session->set_flashdata('success', 'Successfully saved');
            redirect('course_assign_to_teacher');
        }
        
        }
        
        public function view_course_static(){
        $data = array();
        $data['title'] = "view_course_static";
        $data['all_course_static'] = $this->admin_model->select_all_course_static();
        $this->load->view('admin/view_course_static', $data);  
        }
        
        public function register_student(){
        $data = array();
        $data['title'] = "register_student";
        $data['all_department'] = $this->admin_model->select_all_department();
        $this->load->view('admin/register_student', $data);   
        }
        
        public function add_classroom(){
        $data = array();
        $data['title'] = "add_classroom";
        $data['all_department'] = $this->admin_model->select_all_department();
        $this->load->view('admin/add_classroom', $data); 
        }
        
        public function save_classroom(){
           if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
          }
        $data = array();
        $data['title'] = "save_class_room";
        $this->form_validation->set_rules('department_id', 'Department', 'required');
        $this->form_validation->set_rules('room_number', 'Room Number', 'required');
        if ($this->form_validation->run() == FALSE) {
             $data['all_department'] = $this->admin_model->select_all_department();
            $this->load->view('admin/add_classroom', $data);
        } else {
            $data = array();
            $data['department_id'] = $this->input->post('department_id', true);
            $data['room_number'] = $this->input->post('room_number', true);       
            $result = $this->admin_model->save_classroom_info($data);
            $this->session->set_flashdata('success', 'Successfully saved');
            redirect('add_classroom');
        }  
        }
        
        public function allocate_classroom(){
        $data = array();
        $data['title'] = "allocate_classroom";
        $data['all_department'] = $this->admin_model->select_all_department();
        $data['all_course'] = $this->admin_model->select_all_course();
        $data['all_classroom'] = $this->admin_model->select_all_classroom();
        $this->load->view('admin/allocate_classroom', $data);    
        }
 
    }
    
   

