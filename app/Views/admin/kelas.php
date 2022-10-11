
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
                        <dvi class="btn-group">
                            <button class="btn btn-primary" onclick="location.href='<?= base_url('admin/kelas/tambahkls')?>'"><i class="fa fa-plus-circle"></i> Tambah Kelas</button>
<!--                            <button class="btn btn-success"><i class="fa fa-print"></i> Cetak Data Mahasiswa</button>?-->
                            <!--                                <butto class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Dosen</butto>-->
                        </dvi>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Kuliah</th>
                                <th>Kelas</th>
                                <th>Dosen</th>
                                <th>Th Akademik</th>
                                <th>Jumlah Mahasiswa</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $n=0;
                            foreach ($kelas as $ditem) {
                                $n++;
                                ?>
                                <tr>
                                    <td><?=$n;?></td>
                                    <td><?=$ditem->matkul;?>
                                    </td>
                                    <td><?=$ditem->kelas;?></td>
                                    <td><?= $ditem->nama_dosen;?>, <?= $ditem->gelar;?></td>
                                    <td><?= $ditem->thn_akademik;?></td>
                                    <td><?= $ditem->totalmhs;?></td>
                                    <td width="150">
                                        <a href="<?= base_url('/admin/kelas/viewkelas/'.$ditem->idkelas)?>" class="btn bg-navy btn-sm"><i class="fa fa-eye"></i></a>
                                        <button class="btn bg-orange btn-sm"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-sm"  id="hapuskelas" data-val="<?=$ditem->idkelas?>"><i class="fa fa-trash"></i></button></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Mata Kuliah</th>
                                <th>Kelas</th>
                                <th>Dosen</th>
                                <th>Th Akademik</th>
                                <th>Jumlah Mahasiswa</th>
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