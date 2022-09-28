<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personel extends CI_Controller {

	public $viewFolder="";
	public $subViewFolder="";
	public $breadCrumb="";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder="personel_v";
		$this->breadCrumb="Personeller";

		//* Modelleri yüklemek
		$this->load->model("Personel_model");
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->breadCrumb = $this->breadCrumb;
		$viewData->subViewFolder = $this->subViewFolder;
		$viewData->subViewFolder = "list";
		$viewData->employees = $this->Personel_model->getEmployees();
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function add_form(){
		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->breadCrumb = "Personel Ekle";
		$viewData->subViewFolder = $this->subViewFolder;
		$viewData->subViewFolder = "add";
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}




	public function get_employees($id){
		$id = $this->uri->segment(4);
		$viewData = new stdClass();
		$viewData->viewFolder = "personel_v";
		$viewData->subViewFolder = "add";
		$viewData->company_id=$id;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/get_employees", $viewData);
	}
}
