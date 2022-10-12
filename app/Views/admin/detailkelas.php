
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
                    <div class="box-header with-border">
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
                        <div class="btn-group margin-bottom">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-addmhs"><i class="fa fa-plus-circle"></i> Tambah Mahasiswa</button>

<!--                            <button class="btn btn-warning" data-toggle="modal" data-target="#edit-kelas"><i class="fa fa-edit"></i>Edit Kelas</button>-->
                        </div>
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
                                        <button class="btn btn-danger btn-sm" id="deletemhskelas" data-val-idkelas="<?= $kelas->id_kelas?>" data-val-nim="<?= $mhs->nim?>"><i class="fa fa-trash"></i> Hapus Dari Kelas</button>
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

<div class="modal fade" id="modal-addmhs">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Jenis Pertanyaan</h4>
            </div>
            <form action="#" id="tambahmhs_kelas">
                <div class="modal-body">

                        <div class="row">

                            <div class="col-md-6 sm-12">
                                <div class="form-group">
                                    <label>Angkatan</label>
                                    <select name="pilangkatan" id="pilangkatans" class="form-control">
                                        <?php foreach ($angkatan as $item) {?>
                                            <option value="<?=$item->angkatan?>"><?=$item->angkatan?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <input type="hidden" value="<?= $kelas->idprodi?>" id="idprodis"/>
                    <input type="hidden" value="<?= $kelas->id_kelas?>" name="idkelas"/>
                        <table class="table table-bordered table-responsive col-12" style="width: 100%!important;" id="tablekelasmhs2">
                            <thead >
                                <tr>
                                    <td class="text-center">No</td>
                                    <td>Nim</td>
                                    <td>Nama Mahasiswa</td>
                                    <td>Anggkatan</td>
                                    <td>Prodi</td>
                                </tr>
                            </thead>
                        </table>
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
