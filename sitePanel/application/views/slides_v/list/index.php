 <?php $this->load->view("include/header"); ?>
 <?php $this->load->view("include/navbar"); ?>
 
 <?php $this->load->view("include/solmenu"); ?>
 <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>       
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div> 
 
 <?php $this->load->view("include/scripts"); ?>
 <?php $this->load->view("include/footer"); ?>
