<div class="row">
    <div class="col-md-12">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link pulse-grow w-25 active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Kategoriler</a>
            <a class="nav-link pulse-grow w-25" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Ürünler</a>
          </div>
        </nav>
        <div class="tab-content mt-5" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center ">KATEGORİLER
                                <a href="<?= base_url("urunler/category_new_form") ?>" class="btn btn-success btn-lg float-right">Yeni Kategori Ekle</a>
                            </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderd table-striped perTable">
                                <thead>
                                    <th>Eylem</th>
                                    <th>Sektör Adı</th>
                                    <th>Kategori Adı</th>
                                </thead>
                                <tbody>
                                    <?php foreach($categories as $cat){ ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url("urunler/category_update_form/$cat->id") ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                <button
                                                    data-url="<?php echo base_url("urunler/delete_category/$cat->id"); ?>"
                                                    class="btn icon-btn btn-xs btn-outline-danger btn-delete">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </td>
                                            <td><?= sektorAdi($cat->sektor_adi); ?></td>
                                            <td><?= $cat->kategori_adi; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center ">ÜRÜNLER
                        <a href="<?= base_url("urunler/new_form") ?>" class="btn btn-success btn-lg float-right">Yeni Ürün Ekle</a>
                    </h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered perTable">
                        <thead>
                            <th>Eylem</th>
                            <th>Sektör Adı</th>
                            <th>Kategori Adı</th>
                            <th>Ürün Adı</th>
                            <th>Ürün Görsel</th>
                            <th>Beden</th>
                            <th>Renk</th>
                            <th>Boyutları</th>
                        </thead>
                        <tbody>
                            <?php foreach($urunler as $p){ ?>
                                <tr>
                                    <td class="text-center w200">
                                        <button
                                            data-url="<?php echo base_url("urunler/delete/$p->id"); ?>"
                                            class="btn btn-sm btn-danger btn-outline btn-delete">
                                            <i class="fa fa-trash"></i> Sil
                                        </button>
                                        <a href="<?php echo base_url("urunler/update_form/$p->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                    </td>
                                    <td><?= sektorAdi($p->sektor_adi); ?></td>
                                    <td><?= kategoriAdi($p->kategori_adi); ?></td>
                                    <td><?= $p->urun_adi; ?></td>
                                    <td class="text-center w100">
                                        <img width="75"
                                         src="<?php echo get_picture($viewFolder, $p->img_url, "650x418"); ?>"
                                         alt="<?= $viewFolder; ?>" class="img-rounded">
                                    </td>
                                    <td><?= $p->size; ?></td>
                                    <td><?= $p->color; ?></td>
                                    <td><?= $p->measure; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>


