
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mata Kuliah
            <small>Data Mata Kuliah</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a class="active">Mata Kuliah</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Mata Kuliah</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <dvi class="btn-group">
                            <button class="btn btn-primary" onclick="location.href='<?= base_url('admin/matkul/tambah')?>'"><i class="fa fa-plus-circle"></i> Tambah Mata Kuliah</button>
                        </dvi>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Matkul</th>
                                <th>Nama Matkul</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $n=0;
                            foreach ($matkul as $ditem) {
                                $n++;
                                ?>
                                <tr>
                                    <td><?=$n;?></td>
                                    <td><?=$ditem->kode_matkul;?>
                                    </td>
                                    <td><?=$ditem->matkul;?></td>
                                    <td><?= $ditem->sks;?></td>
                                    <td><?= $ditem->semester;?></td>
                                    <td width="150"><button class="btn bg-navy btn-sm"><i class="fa fa-eye"></i></button> <button class="btn bg-orange btn-sm"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Matkul</th>
                                <th>Nama Matkul</th>
                                <th>SKS</th>
                                <th>Semester</th>
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