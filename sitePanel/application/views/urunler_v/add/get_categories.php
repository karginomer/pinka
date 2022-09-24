<?php $categories=sektoreAitKategoriler($sektor_adi) ?>
<div class="form-group">
  <label for="select2-demo-6">Kategori Seçiniz</label>
   <select name="kategori_adi" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('pi_choose_an_employee');?>">
    <?php foreach($categories as $cat) {?>
        <option value="<?php echo $cat->id;?>"> <?php echo $cat->kategori_adi;?></option>
    <?php } ?>
  </select>             
</div>