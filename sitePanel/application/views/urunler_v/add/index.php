<?php $this->load->view("include/header"); ?>
<?php $this->load->view("include/navbar"); ?>
<?php $this->load->view("include/solmenu"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Yeni Ürün Ekle</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php $this->load->view('include/scripts'); ?>            
<?php $this->load->view("include/footer"); ?>