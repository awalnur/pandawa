
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
                            <button class="btn btn-primary" onclick="location.href='<?= base_url('admin/mahasiswa/tambahmhs')?>//'"><i class="fa fa-plus-circle"></i></button>
<!--                            <button class="btn btn-success"><i class="fa fa-print"></i> Cetak Data Mahasiswa</button>-->
<!--                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-importmhs">-->
<!--                                <i class="fa fa-cloud-upload"></i>-->
<!--                            </button>-->
                            <div class="modal fade" id="modal-importmhs">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Pilih File yang akan di import</h4>
                                        </div>
                                        <form action="<?= base_url('admin/mahasiswa/importing')?>" id="importmhs" method="POST" enctype="multipart/form-data">

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="jenis">
                                                        Pilih File
                                                    </label>
                                                    <input type="file" placeholder="import" name="importMhs">
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
                            <button class="btn btn-info" data-toggle="modal" data-target="#modal-c-sync"><i class="fa fa-refresh"></i> Singkronisasi Ebfis.feb-unsiq.ac.id</button>
<!--                            <a href="" class="btn link-info"><i class="fa fa-download"> </i>Download Template import</a>-->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-importmhs">
                                <i class="fa fa-cloud-upload"></i> Import Data Mahasiswa
                            </button>

                        </dvi>

                        <div class="modal fade" id="modal-c-sync">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Lakukkan singkronisasi</h4>
                                    </div>
                                    <form action="#" id="sync">

                                        <div class="modal-body">

                                            <div class="form-group">
                                                <p>
                                                    Melakukan singkronisasi mungkin akan menghapus data yang tidak sesuai dengan EBFIS
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label for="Pertanyaan">
                                                    Password
                                                </label>
                                                <input type="password" name="password" class="form-control" id="passie" placeholder="Password" required/>
                                            </div>
                                            <p class="hidden" id="loading"><i class="fa fa-spin fa-refresh"></i> Sedang memproses. ....</p>
                                            <p class="hidden" id="resusltsyn"><i class="fa fa-check-circle"></i> <strong id="berhasil"></strong>/<small id="totalsmua"></small> Berhasil disingkronkan</p>
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
                                    <td width="150" class="text-center">
<!--                                        <button class="btn bg-navy btn-sm"><i class="fa fa-eye"></i></button> -->
<!--                                        <button class="btn bg-orange btn-sm"><i class="fa fa-edit"></i></button> -->
                                        <button class="btn btn-danger btn-sm" id="deletemhs" data-val="<?= $ditem->nim?>"><i class="fa fa-trash"></i></button></td>
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