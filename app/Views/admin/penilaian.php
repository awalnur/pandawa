
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dosen
            <small>Data Dosen</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Penilian</a></li>
            <li class="active">Data Dosen</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Nilai Dosen</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                <label for="">Pilih Tahun Akademik</label>
                                <select name="taAjaran" class="form-control select2" id="searchta">
                                    <?php foreach ($thnaka as $item) {
                                        ?>
                                        <option value="<?= $item->thn_akademik?>"  <?= ($item->aktif==1)?'selected':'';?> ><?= $item->thn_akademik?></option>

                                        <?php
                                    }?>

                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                <label for="">Pilih Prodi</label>
                                <select name="Jurusan" class="form-control select2" id="searchjurusan">
                                    <option value="1" selected>Akuntansi</option>
                                </select>
                            </div>
                            <div class="col-lg-6 text-right">
                                <div class="form-group">
                                    <br>
                                    <button class="btn btn-success" id="btndownloadlaporan"> <i class="fa fa-download"></i>Download Laporan</button>
                                </div>
                            </div>
                        </div>
                        <hr class="border-light">
                        <table class="table table-bordered table-striped" id="tbnilaidosen" style="width: 100% !important;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NID</th>
                                    <th>Nama Dosen</th>
                                    <th>Total Nilai</th>
                                    <th>Rata Rata</th>
                                    <th style="width: 140px !important;">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->