<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Attendance_model extends CI_Model {
    function insert_schedule($data) {
        $this->db->insert("schedule_tbl",$data);
        return $this->db->insert_id();
    }

    function insert_attendance($data) {
        $this->db->insert("attendance_tbl",$data);
        return $this->db->insert_id();
    }

    function select_attendance () {
        $qry=$this->db->get('attendance_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_fullname () {
        $this->db->order_by('staff_tbl.id','DESC');
        $this->db->select("*");
        $this->db->from("staff_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_schedule_byID($id) {
        $this->db->where('id',$id);
        $qry=$this->db->get('schedule_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_schedule($id) {
        $this->db->where('id', $id);
        $this->db->delete("schedule_tbl");
        return $this->db->affected_rows();
    }

    function update_schedule($data,$id) {
        $this->db->where('id', $id);
        return $this->db->update('schedule_tbl',$data);
        $this->db->affected_rows();
    }

}