<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Slide Listesi
            
            <a href="<?php echo base_url("slides/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
            
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("slides/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                        <th class="w50">#id</th>
                        <th>Görsel</th>
                        <th>Başlık</th>
                        <th>Açıklama</th>
                        <th>Eylemler</th>
                    </thead>
                    <tbody>

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td class="w50 text-center">#<?php echo $item->id; ?></td>
                                <td class="text-center w100">
                                    <img width="75"
                                         src="<?php echo get_picture($viewFolder, $item->image, "1920x1080"); ?>"
                                         alt="<?= $viewFolder; ?>" class="img-rounded">
                                </td>
                                <td><?php echo $item->slide; ?></td>
                                <td class="text-center w100">
                                    <?= $item->description;?>
                                </td>
                                <td class="text-center w200">
                                    <button
                                        data-url="<?php echo base_url("slides/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline btn-delete">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("slides/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>