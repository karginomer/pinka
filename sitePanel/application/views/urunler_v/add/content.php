<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Sektör Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("urunler/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="sektor_adi">Sektör Seçiniz</label>
                        <select name="sektor_adi" id="sektor_adi" class="form-control">
                            <option value="">Sektör Seçiniz</option>
                            <?php foreach ($sectors as $sec){?>
                                <option value="<?php echo $sec->id; ?>"><?php echo $sec->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group" id="category">
                        <label for="kategpri_adi">Kategori Seçiniz</label>
                        <select name="kategpri_adi" id="kategpri_adi" class="form-control">
                            <option value="">Kategori Seçiniz</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="urun_adi">Ürün Adını Giriniz</label>
                        <input class="form-control" placeholder="Ürün adını girin" name="urun_adi" id="urun_adi">
                    </div>
                    <div class="form-group">
                        <label>Ürün Açıklaması</label>
                        <textarea class="m-0 form-control" data-plugin="summernote" data-options="{height: 250}" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="size">Beden Giriniz</label>
                        <input class="form-control" placeholder="Beden giriniz" name="size" id="size">
                    </div>
                    <div class="form-group">
                        <label for="size">Ürün Ölçüleri</label>
                        <input class="form-control" placeholder="En boy yükseklik giriniz" name="measure" id="measure">
                    </div>

                    <div class="form-group image_upload_container">
                        <label>Görsel Seçiniz</label>
                        <input type="file" name="img_url" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("urunler"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>

<script>
    var base_url = "<?php echo base_url("urunler");?>";
    jQuery("#sektor_adi").change(function () {
		jQuery.get(base_url + "/get_categories/" + jQuery(this).val(), function (data, status) {
            jQuery('#category').html(data);
		});
	});
</script>