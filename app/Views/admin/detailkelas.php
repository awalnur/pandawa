
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelas
            <small>Data Kelas</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kelas</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Kelas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class=" col-md-6 col-lg-4 col-sm-12">

                                <table class="table table-striped">
                                    <tr>
                                        <td>Prodi</td>
                                        <td>: <strong><?= $kelas->nama_prodi?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Mata Kuliah</td>
                                        <td>: <strong><?= $kelas->matkul?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>: <strong><?= $kelas->kelas?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Mahasiswa</td>
                                        <td>: <strong><?= $kelas->totalmhs?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Dosen Pengampu</td>
                                        <td>: <strong><?= $kelas->nama_dosen;?>, <?= $kelas->gelar;?></strong></td>
                                    </tr>

                                </table>

                            </div>
                        </div>
                        <hr>
                        <dvi class="btn-group margin-bottom">
                            <button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Mahasiswa</button>
                            <!--                            <button class="btn btn-success"><i class="fa fa-print"></i> Cetak Data Mahasiswa</button>?-->
                            <!--                                <butto class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Dosen</butto>-->
                        </dvi>
                        <br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nim</th>
                                <th>Nama Mahasiswa</th>
                                <th>Angkatan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $n=0;
                            foreach ($mhs as $mhs) {
                                $n++;
                                ?>
                                <tr>
                                    <td><?=$n;?></td>
                                    <td><?=$mhs->nim;?>
                                    </td>
                                    <td><?=$mhs->nama_mhs;?></td>
                                    <td><?= $mhs->angkatan?></td>
                                    <td width="150">
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus Dari Kelas</button>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nim</th>
                                <th>Nama Mahasiswa</th>
                                <th>Angkatan</th>
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