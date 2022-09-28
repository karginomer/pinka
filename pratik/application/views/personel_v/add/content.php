<div class="row my-3">
    <div class="col-md-12">
        <div class="card card-hover b-radius">
            <div class="card-header">
                <h2 class="text-center">Yeni Personel Ekle
                    <a href="<?php echo base_url("personel");?>" class="btn btn-dark btn-sm float-end me-5"><i class="fas fa-times"></i></a>
                </h2>
            </div>
            <div class="card-body p-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Adı</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Adı">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="surname">Soyadı</label>
                                <input type="text" class="form-control" name="sur_name" id="sur_name" placeholder="Soyadı">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="surname">TC Kimlik No</label>
                                <input type="text" class="form-control" name="tc" id="tc" placeholder="TC Kimlik No">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="surname">İşe Giriş Tarihi</label>
                                <input type="date" class="form-control" name="date_of_joining" id="date_of_joining">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="company_id">Şirket</label>
                                <select name="company_id" id="company_id" class="form-control">
                                    <option value="">Şirketler gelecek</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id">Departman</label>
                                <select name="department_id" id="department_id" class="form-control">
                                    <option value="">Departman gelecek</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="designation_id">Pozisyon</label>
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="">Pozisyon gelecek</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="location_id">Lokasyon</label>
                                <select name="location_id" id="location_id" class="form-control">
                                    <option value="">Lokasyon gelecek</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="username">Kullanıcı Adı</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Kullanıcı Adı">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">Cinsiyet</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Erkek">Erkek</option>
                                    <option value="Kadın">Kadın</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_of_birth">Doğum Tarihi</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="contact_no">Telefon No</label>
                                <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Telefon No">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="child">Çocuk Sayısı</label>
                                <input type="text" name="child" id="child" class="form-control" placeholder="Varsa çocuk sayısı">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="blood">Kan Grubu</label>
                                <select name="blood" id="blood" class="form-control">
                                    <option value="A+">A Rh+</option>
                                    <option value="A-">A Rh-</option>
                                    <option value="B+">B Rh+</option>
                                    <option value="B-">B Rh-</option>
                                    <option value="AB+">AB Rh+</option>
                                    <option value="AB-">AB Rh-</option>
                                    <option value="0+">0 Rh+</option>
                                    <option value="0-">0 Rh-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title_type">Yetki Grubu</label>
                                <select name="title_type" id="title_type" class="form-control">
                                    <option value="1">Üst Seviye Yönetici</option>
                                    <option value="2">Orta Kademe Yönetici</option>
                                    <option value="3">İlk Kademe Yönetici</option>
                                    <option value="4">Yönetici Olmayan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title_type">Amir Seçiniz ( Üst Organ )</label>
                                <select name="title_type" id="title_type" class="form-control">
                                    <option value="">Yöneticiler gelecek</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="education_level">Eğitim Seviyesi Seçiniz</label>
                                <select name="education_level" id="education_level" class="form-control">
                                    <option value="İlkokul">İlkokul</option>
                                    <option value="Ortaokul">Ortaokul</option>
                                    <option value="Lise">Lise</option>
                                    <option value="Önlisans(MYO)">ÖnLisans(MYO)</option>
                                    <option value="Lisans">Lisans</option>
                                    <option value="Lisansüstü">Lisansüstü</option>
                                    <option value="Doktora">Doktora</option>
                                    <option value="Doçent">Doçent</option>
                                    <option value="Profesör">Profesör</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="yaka_turu">Yaka Türü Seçiniz</label>
                                <select name="yaka_turu" id="yaka_turu" class="form-control">
                                    <option value="Beyaz Yaka">Beyaz Yaka</option>
                                    <option value="MaviYaka">Mavi Yaka</option>
                                    <option value="ISGUzmanı">ISG Uzmanı</option>
                                    <option value="Stajyer">Stajyer</option>
                                    <option value="Danışman">Danışman</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="password">Şifre</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Şifreyi Girin" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="re_password">Şifre</label>
                                <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Şifreyi Tekrar Girin" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Adres</label>
                                <textarea name="address" id="address" class="form-control" placeholder="Adres"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Kaydet</button>
                                <a href="<?= base_url("personel");?>" class="btn btn-dark btn-block my-2">Geri Dön</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>