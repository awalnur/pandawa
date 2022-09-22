
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
                                    <option value="20212" selected>20212</option>

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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NID</th>
                                <th>Nama Dosen</th>
                                <th>Total Nilai</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $n=0;
                            foreach ($dosen as $ditem) {
                                $n++;
                                ?>
                                <tr>
                                    <td><?=$n;?></td>
                                    <td><?=$ditem->nid;?>
                                    </td>
                                    <td><?=$ditem->nama_dosen;?></td>
                                    <td><?= $ditem->totalnilai;?></td>
                                    <td><?= $ditem->rata;?></td>
                                    <td width="160" class="text-center"><a href="<?= base_url('admin/penilaian/detail/'.$ditem->nid);?>"> <button class="btn bg-navy btn-sm"><i class="fa fa-download"></i> Download Rekap</button></a> <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>NID</th>
                                <th>Nama Dosen</th>
                                <th>Total Nilai</th>
                                <th>Rata-rata Nilai</th>
                                <th>Aksi</th>
                            </tr>
                            </tfoot>
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