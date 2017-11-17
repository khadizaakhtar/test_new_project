<?php
class Admin_Model extends CI_Model {
     public function check_admin_login_info($data) {
        $query = $this->db->get_where('tbl_admin', array('email_address' => $data['email_address'], 'password' => $data['password'], 'access_level' =>1));    
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
				$this->session->set_userdata('admin_id',$row->admin_id);
				$this->session->set_userdata('admin_name',$row->admin_name);
            }		
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('loginerr', ' Wrong Email and Password, Try Again');
            redirect('admin');
        }
    }
    
     public function save_department_info($data){
        $this->db->insert('tbl_department',$data);
        return true;
      }
      
     public function select_all_department() {
        $this->db->select('*');
        $this->db->from('tbl_department');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
      }
      
       public function delete_department_by_id($department_id){
        $this->db->where('dept_id', $department_id);
        $this->db->delete('tbl_department');
       }
       
        public function save_course_info($data){
        $this->db->insert('tbl_course',$data);
        return true;
      }
      
       public function select_all_course(){
       $this->db->select('tbl_course.*,tbl_department.dept_id,tbl_department.dept_name');
       $this->db->from('tbl_course');
       $this->db->join('tbl_department','tbl_course.dept_id=tbl_department.dept_id');
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result; 
     }
     
      public function delete_course_by_id($course_id){
        $this->db->where('course_id', $course_id);
        $this->db->delete('tbl_course');
       }
       
       public function update_teacher_image($lastid,$teacher_image) {
        $this->db->where('teacher_id',$lastid);
        $this->db->set('teacher_image',$teacher_image);
        $this->db->update('tbl_teacher');
        return true;
       }
       public function select_all_teacher(){
       $this->db->select('tbl_teacher.*,tbl_department.dept_id,tbl_department.dept_name');
       $this->db->from('tbl_teacher');
       $this->db->join('tbl_department','tbl_teacher.department_id=tbl_department.dept_id');
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result;  
       }
       public function delete_teacher_by_id($teacher_id){
          $this->db->where('teacher_id', $teacher_id);
          $this->db->delete('tbl_teacher');  
       }
       
       public function select_teacher_by_id_in_ajax_info($teacher_id){
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        $this->db->where('teacher_id',$teacher_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
       }
       
       public function select_course_by_id_in_ajax_info($course_id){
        $this->db->select('*');
        $this->db->from('tbl_course');
        $this->db->where('course_id',$course_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;  
       }
       
       public function select_course_by_dept_id_in_ajax_info($department_id){
       $this->db->select('tbl_department.*,tbl_course.*');
       $this->db->from('tbl_department');
       $this->db->join('tbl_course','tbl_department.dept_id=tbl_course.dept_id');
       $this->db->where('tbl_department.dept_id',$department_id);
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result; 
       }
       
       public function select_teacher_by_dept_id_in_ajax_info($department_id){
       $this->db->select('tbl_department.*,tbl_teacher.*');
       $this->db->from('tbl_department');
       $this->db->join('tbl_teacher','tbl_department.dept_id=tbl_teacher.department_id');
       $this->db->where('tbl_department.dept_id',$department_id);
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result;  
       }
       
       public function save_course_assign_to_teacher_info($data){
        $this->db->insert('tbl_course_assign',$data);
        return true;   
       }
       
       public function select_all_course_static(){
        $this->db->select('tbl_department.*,tbl_course.*,tbl_course_assign.*,tbl_teacher.*');
        $this->db->from('tbl_department'); 
        $this->db->join('tbl_course', 'tbl_department.dept_id=tbl_course.dept_id', 'LEFT');
        $this->db->join('tbl_course_assign', 'tbl_course.course_id=tbl_course_assign.course_id', 'LEFT');
        $this->db->join('tbl_teacher', 'tbl_course_assign.teacher_id=tbl_teacher.teacher_id', 'LEFT');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result; 
         }
         
         public function save_classroom_info($data){
           $this->db->insert('tbl_classroom',$data);
           return true; 
         }
         
         public function select_all_classroom(){
         $this->db->select('*');
        $this->db->from('tbl_classroom');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;  
         }
}
