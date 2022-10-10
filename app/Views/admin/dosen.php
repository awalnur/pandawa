
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
            <li><a href="#">Dosen</a></li>
            <li class="active">Data Dosen</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Dosen</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                            <dvi class="btn-group">
                                <button class="btn btn-primary" onclick="location.href='<?= base_url('admin/dosen/tambah')?>'"><i class="fa fa-plus-circle"></i> Tambah Dosen</button>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-importmhs">
                                    <i class="fa fa-cloud-upload"></i> Import Data Dosen
                                </button>
                                <a href="<?= base_url('/template/template_dosen.xlsx')?>" download class="btn link-info"><i class="fa fa-download"> </i>Download Template import</a>
                                <div class="modal fade" id="modal-importmhs">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Pilih File yang akan di import</h4>
                                            </div>
                                            <form action="<?= base_url('admin/dosen/importing')?>" id="importdosen" method="POST" enctype="multipart/form-data">

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="jenis">
                                                            Pilih File
                                                        </label>
                                                        <input type="file" placeholder="import" name="importDosen">
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
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?= session('gagalss')?>
                            </div>

                            <?php
                        } ?>

                        </dvi>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NID</th>
                                <th>Nama Dosen</th>
                                <th>Gelar</th>
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
                                <td><?= $ditem->gelar;?></td>
                                <td width="150">
                                    <a href="<?= base_url('admin/dosen/edit/'.$ditem->nid)?>">
                                        <button class="btn bg-orange btn-sm"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <button class="btn btn-danger btn-sm" id="deletedosen" data-val="<?= $ditem->nid?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama Dosen</th>
                                <th>Gelar</th>
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