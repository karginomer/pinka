<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->kategori_adi</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("urunler/update_category/$item->id"); ?>" method="post">
                    <div class="form-group">
                        <label>Sektör Adı</label>
                        <select name="sektor_adi" id="sektor_adi" class="form-control" required>
                            <?php foreach($sectors as $sec){ ?>
                                <?php var_dump($sec); ?>
                                <option value="<?= $sec->id; ?>" <?php echo ($sec->id == $item->sektor_adi) ? "selected" : ""; ?>><?= $sec->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori Başlığı</label>
                        <input class="form-control" placeholder="Kategori Adı" name="kategori_adi" value="<?php echo $item->kategori_adi; ?>" required>
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("kategori_adi"); ?></small>
                        <?php } ?>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("urunler"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>