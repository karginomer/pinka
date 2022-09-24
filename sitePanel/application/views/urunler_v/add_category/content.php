<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Kategori Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("urunler/add_category"); ?>" method="post">
                    <div class="form-group">
                        <label>Sektör Seçiniz</label>
                        <select name="sektor_adi" id="sektor_adi" class="form-control" required>
                            <?php foreach($sectors as $sec){ ?>
                                <option value="<?= $sec->id; ?>"><?= $sec->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori Başlığı</label>
                        <input class="form-control" placeholder="Kategori Adı" name="kategori_adi">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("urunler"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>