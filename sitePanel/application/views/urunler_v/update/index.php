<?php $this->load->view("include/header"); ?>
 <?php $this->load->view("include/navbar"); ?>
 
 <?php $this->load->view("include/solmenu"); ?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-center">Ürün Güncelleme Alanı</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?> 
      </div>
    </section>
</div>
<?php $this->load->view("include/scripts"); ?>
 <?php $this->load->view("include/footer"); ?>