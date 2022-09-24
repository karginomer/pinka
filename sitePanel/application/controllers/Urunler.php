<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urunler extends CI_Controller {

    public $viewFolder = "";
    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "urunler_v";

        $this->load->model("kategori_model");
        $this->load->model("urunler_model");
        $this->load->model("sektorler_model");

        //* Güvenlik için giriş yapılmamışsa login sayfasına yönlendirme
        // if(!get_active_user()){
        //     redirect(base_url("login"));
        // }

    }
	public function index()
	{
		$viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->urunler_model->get_all(
            array(), "urun_adi ASC"
        );
        $categories = $this->kategori_model->get_all(
            array(), ""
        );

        $urunler = $this->urunler_model->get_all(
            array(), ""
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $viewData->categories = $categories;
        $viewData->urunler = $urunler;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

    public function get_categories($id) {
        $data = array(
		    'sektor_adi' => $id
		);
		$this->load->view("urunler_v/add/get_categories", $data);
	} 


    public function new_form(){
        

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $sectors=$this->sektorler_model->get_all(
            array(), "name ASC"
        );
        $viewData->sectors=$sectors;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function category_new_form(){
        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add_category";
        $sectors=$this->sektorler_model->get_all(
            array(), "name ASC"
        );
        $viewData->sectors=$sectors;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function add_category(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("sektor_adi", "Sektör Adı", "required|trim");
        $this->form_validation->set_rules("kategori_adi", "Kategori Adı", "required|trim");


        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        $validate = $this->form_validation->run();
        if($validate){
            $insert = $this->kategori_model->add(
                array(
                    "sektor_adi"    => $this->input->post("sektor_adi"),
                    "kategori_adi"  => $this->input->post("kategori_adi"),
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );

            if($insert){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt ekleme sırasında bir problem oluştu",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("urunler"));
            die();
        } else {
            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add_category";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function save(){
        
        $this->load->library("form_validation");

        // Kurallar yazilir..

        if($_FILES["img_url"]["name"] == ""){

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Lütfen bir görsel seçiniz",
                "type"  => "error"
            );
            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("urunler/new_form"));

            die();
        }

        $this->form_validation->set_rules("urun_adi", "Ürün Adı", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){

            // Upload Süreci...

            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            $image_650x418 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",650,418, $file_name);

            if($image_650x418){

                $insert = $this->urunler_model->add(
                    array(
                        "sektor_adi"    => $this->input->post("sektor_adi"),
                        "kategori_adi"  => $this->input->post("kategori_adi"),
                        "urun_adi"      => $this->input->post("urun_adi"),
                        "img_url"       => $file_name,
                        "description"   => $this->input->post("description"),
                        "size"          => $this->input->post("size"),
                        "color"         => $this->input->post("color"),
                        "measure"       => $this->input->post("measure"),
                        "createdAt"     => date("Y-m-d H:i:s")
                    )
                );

                // TODO Alert sistemi eklenecek...
                if($insert){

                    $alert = array(
                        "title" => "İşlem Başarılı",
                        "text" => "Kayıt başarılı bir şekilde eklendi",
                        "type"  => "success"
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                        "type"  => "error"
                    );
                }

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Görsel yüklenirken bir problem oluştu",
                    "type"  => "error"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("urunler/new_form"));
                die();
            }
            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("urunler"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id){
        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->urunler_model->get(
            array(
            "id"    => $id,
            )
        );
        $sectors = $this->sektorler_model->get_all();
        $categories = $this->kategori_model->get_all();  
        $viewData->categories = $categories;
        $viewData->sectors = $sectors;
    

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function category_update_form($id){
        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $sectors = $this->sektorler_model->get_all();
        $item = $this->kategori_model->get(
            array(
            "id"    => $id,
            )
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update_category";
        $viewData->item = $item;
        $viewData->sectors = $sectors;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function update($id){
        $this->load->library("form_validation");

        // Kurallar yazilir..

        $this->form_validation->set_rules("urun_adi", "Ürün Adı", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        
        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){

            // Upload Süreci...
            if($_FILES["img_url"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
                
                $image_650x418 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",650,418, $file_name);
                
                if($image_650x418){

                    $data = array(
                        "sektor_adi"    => $this->input->post("sektor_adi"),
                        "kategori_adi"  => $this->input->post("kategori_adi"),
                        "urun_adi"      => $this->input->post("urun_adi"),
                        "description"   => $this->input->post("description"),
                        "img_url"       => $file_name,
                        "size"          => $this->input->post("size"),
                        "color"         => $this->input->post("color"),
                        "measure"       => $this->input->post("measure"),
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("urunler/update_form/$id"));

                    die();

                }

            } else {

                $data = array(
                    "sektor_adi"    => $this->input->post("sektor_adi"),
                    "kategori_adi"  => $this->input->post("kategori_adi"),
                    "urun_adi"      => $this->input->post("urun_adi"),
                    "description"   => $this->input->post("description"),
                    "size"          => $this->input->post("size"),
                    "color"         => $this->input->post("color"),
                    "measure"       => $this->input->post("measure"),
                );

            }

            $update = $this->urunler_model->update(array("id" => $id), $data);

            // TODO Alert sistemi eklenecek...
            if($update){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("urunler"));
        } else {
            $viewData = new stdClass();
            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->urunler_model->get(
                array(
                    "id"    => $id,
                )
            );
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_category($id){
        $this->load->library("form_validation");

        // Kurallar yazilir..

        $this->form_validation->set_rules("kategori_adi", "Kategori Adı", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){
                $data = array(
                    "sektor_adi"       => $this->input->post("sektor_adi"),
                    "kategori_adi"     => $this->input->post("kategori_adi"),
                );

            $update = $this->kategori_model->update(array("id" => $id), $data);

            // TODO Alert sistemi eklenecek...
            if($update){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("urunler"));
        } else {
            $viewData = new stdClass();
            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update_category";
            $viewData->form_error = true;
            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->kategori_model->get(
                array(
                    "id"    => $id,
                )
            );
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
        
        $delete = $this->urunler_model->delete(
            array(
                "id"    => $id
            )
        );
        // TODO Alert Sistemi Eklenecek...
        if($delete){
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi",
                "type"  => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt silme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("urunler"));


    }

    public function delete_category($id){
        
        $delete = $this->kategori_model->delete(
            array(
                "id"    => $id
            )
        );
        // TODO Alert Sistemi Eklenecek...
        if($delete){
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi",
                "type"  => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt silme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("urunler"));
    }

}