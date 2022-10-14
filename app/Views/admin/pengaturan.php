
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengaturan
            <small>Pengaturan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pengaturan</li>
        </ol>
    </section>
        <section class="content">

            <div class="row">
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">

                                <div class="row">
                                    <div class="col-md-12">

                                        <h6 class="h4">Tahun Ajaran Aktif</h6>
                                        <div class="alert alert-success alert-dismissible hidden" id="respsa">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Tahun Akademik Aktif Berhasil diubah
                                        </div>
                                        <div class="alert alert-error alert-dismissible hidden" id="respsae">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Tahun Akademik Aktif Gagal diubah
                                        </div>

                                        <div class="modal fade" id="modal-add-thnajaran">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Tahun Ajaran Baru</h4>
                                                    </div>
                                                    <form action="#" id="savetahunajaran">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="tahunajaran">
                                                                    Tahun Ajaran
                                                                </label>
                                                                <input type="text" class="form-control" name="tahunajaran" maxlength="5" placeholder="Tahun Ajaran (6 Digit)">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <form class="form-horizontal" id="taaktif">
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Tahun Ajaran</label>

                                                <div class="col-sm-10 col-md-4">
                                                    <div class="input-group">
                                                        <select name="tahunajaran" id="ta" class="form-control">
                                                            <?php foreach ($thnak as $thnkaa){
                                                              ?>
                                                                <option value="<?= $thnkaa->thn_akademik?>" <?= ($thnkaa->aktif)?'selected':'';?>><?= $thnkaa->thn_akademik?></option>
                                                                <?php
                                                            } ?>
                                                        </select>
                                                        <span class="input-group-addon" style="cursor: pointer" id="btnsetaktif"><i class="fa fa-plus " id="yee"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label"></label>

                                                <div class="col-sm-10 col-md-4">
                                                    <button class="btn btn-primary" type="submit">
                                                        Simpan Tahun ajaran
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <hr>
                                <form class="form-horizontal text-left" id="ubahpasswordadmin">
                                    <h5 class="h4">Ubah Password</h5>
                                    <div class="alert alert-success alert-dismissible hidden" id="resp">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Password Berhasil diubah
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label text-left">Password Baru</label>

                                        <div class="col-sm-10 col-md-4">
                                            <div class="input-group">
                                                <input type="password" name="passwordbaru" class="form-control" id="passwordbaru" placeholder="Password Baru" required>
                                                <span class="input-group-addon" style="cursor: pointer" id="showpasswod"><i class="fa fa-eye-slash " id="yee"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Ulangi Password Baru</label>
                                        <div class="col-sm-10 col-md-4">
                                            <div class="input-group">
                                                <input type="password" name="upasswordbaru" class="form-control" id="upasswordbaru" placeholder="Ulangi Password Baru" required>
                                                <span class="input-group-addon" style="cursor: pointer" id="showpasswod"><i class="fa fa-eye-slash " id="yee"></i></span>
                                            </div>
<!--                                            <span class="help-block">Pastikan Kedua password baru, sa</span>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Password Lama</label>

                                        <div class="col-sm-10 col-md-4">
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="passwordlama" name="passlama" placeholder="Password Lama" required>
                                                <span class="input-group-addon" style="cursor: pointer" id="showpasswod"><i class="fa fa-eye-slash " id="yee"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label"></label>

                                        <div class="col-sm-10 col-md-4">
                                            <button class="btn btn-primary" type="submit" id="savepasswordbaru">
                                                Ubah Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>

                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            Pengaturan
                        </div>
                        <div class="box-body box-profile">

                            <p class="">Software Engineer</p>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>

</div>