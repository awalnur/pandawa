
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
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-importmhs">
                                <i class="fa fa-cloud-upload"></i> Import Data Mata Kuliah
                            </button>
                            <a href="<?= base_url('/template/template_matkul.xlsx')?>" download class="btn link-info"><i class="fa fa-download"> </i>Download Template import</a>
                            <div class="modal fade" id="modal-importmhs">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Pilih File yang akan di import</h4>
                                        </div>
                                        <form action="<?= base_url('admin/matkul/importing')?>" id="importmatkul" method="POST" enctype="multipart/form-data">

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="jenis">
                                                        Pilih File
                                                    </label>
                                                    <input type="file" placeholder="import" name="importMatkul">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Import</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!--                                <butto class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Dosen</butto>-->
                        </dvi>

                        <br><br>
                        <?php if (!empty(session('success'))){
                            ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?= session('success')?>
                            </div>
                            <?php
                        }else if (!empty(session('gagalss'))){
                            ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?= session('gagal')?>
                            </div>

                            <?php
                        } ?>

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
                                    <td width="150">
                                        <a href="<?= base_url('/admin/matkul/edit/'.$ditem->kode_matkul)?>"> <button class="btn bg-orange btn-sm"><i class="fa fa-edit"></i></button></a>
                                        <button class="btn btn-danger btn-sm"  id="deletemk" data-val="<?= $ditem->kode_matkul?>"><i class="fa fa-trash"></i></button></td>
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