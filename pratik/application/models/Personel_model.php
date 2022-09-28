<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personel_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    public function getEmployees() {
        $employees=$this->db->where(array("company_id"=>'234'))->get("pi_employees")->result();
        return $employees;
    }
}