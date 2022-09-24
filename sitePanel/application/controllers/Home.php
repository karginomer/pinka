<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$viewData=new stdClass();
        $this->load->helper("text");
        $viewData->viewFolder="home_v";
		$this->load->view("{$viewData->viewFolder}/index",$viewData);
	}


}
