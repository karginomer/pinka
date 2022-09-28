<div class="row fs12 my-3">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Tüm Personeller
                <a href="<?php echo base_url("personel/add_form");?>" class="btn btn-danger btn-sm float-end me-5">Yeni Personel Ekle</a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-striped perTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ad Soyad</th>
                        <th>İşe Giriş Tarihi</th>
                        <th>Eğitim Seviyesi</th>
                        <th>Yaka Türü</th>
                        <th>Şirket</th>
                        <th>Üst Departman</th>
                        <th>Departman</th>
                        <th>Pozisyon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $e=1;foreach($employees as $emp){?>
                        <tr>
                            <td><?= $e++;?></td>
                            <td><?= $emp->first_name." ".$emp->last_name;?></td>
                            <td><?= $emp->date_of_joining; ?></td>
                            <td><?= $emp->education_level; ?></td>
                            <td><?= $emp->yaka_turu; ?></td>
                            <td><?= $emp->company_id; ?></td>
                            <td><?= $emp->department_id; ?></td>
                            <td><?= $emp->department_id; ?></td>
                            <td><?= $emp->designation_id; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>