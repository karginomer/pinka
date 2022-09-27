<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <!-- place -->
                <div id="calendarIO"></div>
                <!-- end place -->
                <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-horizontal" method="POST" action="" id="form_create">
                                <input type="hidden" name="calendar_id" value="0">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Olay Ekle</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Başlık</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Açıklama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="color" class="col-sm-2 control-label">Renk</label>
                                        <div class="col-sm-10">
                                            <input type="color" name="color" id="color" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="start" class="col-sm-2 text-center control-label">Başlangıç Tarihi</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="start_date" class="form-control" id="start" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="end" class="col-sm-2 text-center control-label">Bitiş Tarihi</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="end_date" class="form-control" id="end" readonly>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                                    <button type="submit" class="btn btn-success">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal -->
                <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-horizontal" method="POST" action="" id="form_edit">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Düzenle</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="calendar_id" value="1">
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Başlık</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Açıklama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="color" class="col-sm-2 control-label">Renk</label>
                                        <div class="col-sm-10">
                                            <input type="color" name="color" id="color" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="start" class="col-sm-12 control-label">Başlangıç Tarihi</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="start_date" class="form-control" id="start" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="end" class="col-sm-12 control-label">Bitiş Tarihi</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="end_date" class="form-control" id="end" readonly>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" class="form-control" id="id">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Kapat</button>
                                    <a class="btn btn-danger delete_calendar text-white" id="delete_calendar">Sil</a>
                                    <button type="submit" class="btn btn-success">Güncelle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('calendar_v/calendar_script'); ?>