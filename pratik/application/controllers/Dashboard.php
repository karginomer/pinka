<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $viewFolder="";
	public $breadCrumb="";
	public function __construct()
	{
		parent::__construct();
		$this->viewFolder="dashboard_v";
		$this->breadCrumb="Anasayfa";
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->breadCrumb = $this->breadCrumb;
		$this->load->view("{$this->viewFolder}/index",$viewData);
	}
}
