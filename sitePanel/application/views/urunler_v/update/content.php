<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->urun_adi</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("urunler/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="sektor_adi">Sektör Seçiniz</label>
                        <select name="sektor_adi" id="sektor_adi" class="form-control">
                            <?php foreach ($sectors as $sec){?>
                                <option value="<?php echo $sec->id; if($sec->id==$item->id) echo "selected";else echo "";  ?>"><?php echo $sec->name;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group" id="category">
                        <label for="kategpri_adi">Kategori Seçiniz</label>
                        <select name="kategori_adi" id="kategori_adi" class="form-control">
                            <?php foreach ($categories as $cat){?>
                                <option value="<?php echo $cat->id; if($cat->id==$item->id) echo "selected";else echo "";  ?>"><?php echo $cat->kategori_adi;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="urun_adi">Ürün Adını Giriniz</label>
                        <input class="form-control" placeholder="Ürün adını girin" name="urun_adi" id="urun_adi" value="<?php echo $item->urun_adi; ?>">
                    </div>
                    <div class="form-group">
                        <label>Ürün Açıklaması</label>
                        <textarea class="m-0 form-control" data-plugin="summernote" data-options="{height: 250}" name="description"><?= $item->description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="size">Beden Giriniz</label>
                        <input class="form-control" placeholder="Beden giriniz" name="size" id="size" value="<?= $item->size; ?>">
                    </div>
                    <div class="form-group">
                        <label for="color">Renk Giriniz</label>
                        <input class="form-control" placeholder="Renk giriniz" name="color" id="color" value="<?= $item->color; ?>">
                    </div>
                    <div class="form-group">
                        <label for="size">Ürün Ölçüleri</label>
                        <input class="form-control" placeholder="En boy yükseklik giriniz" name="measure" id="measure" value="<?= $item->measure; ?>">
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group image_upload_container">
                            <label>Görsel Seçiniz</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>
                        <div class="col-md-3 image_upload_container">
                            <img src="<?php echo get_picture($viewFolder, $item->img_url, "650x418"); ?>" alt="" class="img-responsive">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("urunler"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>