<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

    public function index()
    {
        $data['attendance']=$this->Attendance_model->select_attendance();
        $data['fullname']=$this->Schedule_model->select_fullname();
        $this->load->view('admin/header');
        $this->load->view('admin/attendance',$data);
        $this->load->view('admin/footer');
    }

    public function insert()
	{
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('id', 'RFID', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data = array('response' => "error", 'message' => validation_errors());
            } else {
                $id = $this->input->post('id');
                $time = $this->input->post('time');
                $name=$this->Staff_model->select_staff_byID($id);
                if($name != NULL){
                    $fullname = $name[0]['firstname']." ".$name[0]['midname']." ".$name[0]['lastname'];
                    if($this->Attendance_model->insert_attendance(array('rfid'=>$id, 'fullname'=>$fullname, 'morning_in'=>$time))) {
                    $data = array('response' => "success", 'message' => "Attendance added successfully", 'rfid'=> $id, 'fullname'=> $fullname);
                }
                }else{
                    $data = array('response' => "error", 'message' => "Failed");
                }
            }
            echo json_encode($data);
    }else {
        echo "'No direct script access allowed'";
    }
	}

    public function edit()
	{
		if ($this->input->is_ajax_request()) {
			$this->input->post('edit_id');
			$edit_id = $this->input->post('edit_id');
			if ($post = $this->Department_model->select_department_byID($edit_id)) {
				$data = array('response' => "success", 'post' => $post);
			} else {
				$data = array('response' => "error", 'message' => "failed");
			}
			echo json_encode($data);
		}
	}
    
    public function update() {
		if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('department_name', 'Department name', 'required');
            $this->form_validation->set_rules('department_desc', 'Department description', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
                $id = $this->input->post('id');
                $department_name = $this->input->post('department_name');
                $department_desc = $this->input->post('department_desc');
				if ($this->Department_model->update_department(array('department_name' => $department_name, 'department_desc' => $department_desc), $id)) {
					$data = array('response' => "success", 'message' => "Data update successfully");
				} else {
					$data = array('response' => "error", 'message' => "Failed");
				}
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
	}

    public function delete() {
		if ($this->input->is_ajax_request()) {
			$del_id = $this->input->post('del_id');
			if ($this->Department_model->delete_department($del_id)) {
				$data = array('response' => "success", 'message' => 'Deleted successfully');
			} else {
				$data = array('response' => "error", 'message' => 'Failed');
			}
			echo json_encode($data);
		}
	}
}
