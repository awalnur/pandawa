
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Tambah Kelas
            <small>Kelas</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Kelas</a></li>
            <li class="active">Form Tambah Kelas</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-7">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Tambah Kelas</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?= base_url('admin/kelas/savekelas')?>" method="post">
                        <div class="box-body">
                            <?php if (!empty(session('success'))){
                                ?>
                                <div class="alert alert-success">Data Berhasil Ditambahkan</div>
                            <?php } ?>
                            <div class="form-group">
                                <label>Prodi</label>
                                <select name="pilprodi" id="pilprodi" class="form-control">
                                    <option value="1">Akuntansi</option>
                                    <option value="2">Manajemen</option>
                                    <option value="3">Perbankan Syariah</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mk">Mata Kuliah</label>
                                <select class="form-control select2 smk" name="mkk" style="width: 100%;">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nid">Nama Dosen</label>
                                <select class="form-control select2 selectdosen" name="dosen" style="width: 100%;">

                                </select>

                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas </label>
                                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas">
                            </div>
                            <div class="form-group">
                                <label for="nid">Tahun Akademik</label>
                                <select name="ta" class="form-control" id="">
                                    <?php
                                    foreach ($ta as $item) {
                                        ?>
                                    <option value="<?= $item->thn_akademik?>"> <?= $item->thn_akademik?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                                 <div class="row">

                                     <div class="col-md-6 sm-12">
                                            <div class="form-group">
                                                <label>Angkatan</label>
                                                <select name="pilangkatan" id="pilangkatan" class="form-control">
                                                    <?php foreach ($angkatan as $item) {?>
                                                    <option value="<?=$item->angkatan?>"><?=$item->angkatan?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <table class="table table-bordered table-striped" id="tablekelasmhs">
                                    <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nim</td>
                                        <td>Nama Mahasiswa</td>
                                        <td>Anggkatan</td>
                                        <td>Prodi</td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-5">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Catatan</h3>
                    </div>
                    <div class="box-body">
                        <p>
                            Sampel Data Mahasiswa
                        </p>
                    </div>
                    <!-- /.box-header -->

                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>