
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mahasiswa
            <small>Data Mahasiswa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Mahasiswa</a></li>
            <li class="active">Data Mahasiswa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Mahasiswa</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <dvi class="btn-group">
                            <button class="btn btn-primary" onclick="location.href='<?= base_url('admin/mahasiswa/tambahmhs')?>'"><i class="fa fa-plus-circle"></i> Tambah Mahasiswa</button>
                            <button class="btn btn-success"><i class="fa fa-print"></i> Cetak Data Mahasiswa</button>
                            <!--                                <butto class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Dosen</butto>-->
                        </dvi>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>prodi</th>
                                <th>Angkatan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $n=0;
                            foreach ($mahasiswa as $ditem) {
                                $n++;
                                ?>
                                <tr>
                                    <td><?=$n;?></td>
                                    <td><?=$ditem->nim;?>
                                    </td>
                                    <td><?=$ditem->nama_mhs;?></td>
                                    <td><?= $ditem->nama_prodi;?></td>
                                    <td><?= $ditem->angkatan;?></td>
                                    <td width="150"><button class="btn bg-navy btn-sm"><i class="fa fa-eye"></i></button> <button class="btn bg-orange btn-sm"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>prodi</th>
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