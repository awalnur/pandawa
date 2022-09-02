
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Tambah Mahasiswa
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dosen</a></li>
            <li class="active">Form Tambah Mahasiswa</li>
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
                        <h3 class="box-title">Form Mahasiswa</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
<<<<<<< HEAD
                    <form role="form" action="<?= base_url('admin/mahasiswa/savemahasiswa')?>" method="post">
                        <div class="box-body">
                        <?php if (!empty(session('succeess'))){
                         ?>
                                <div class="alert alert-success">Data Berhasil Ditambahkan</div>
                         <?php } ?>
                            <div class="form-group">
                                <label for="nid">nim</label>
                                <input type="text" class="form-control" id="nim" name="nid" placeholder="NID Dosen">
                            </div>
                            <div class="form-group">
                                <label for="nid">Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nid" name="nama" placeholder="Nama Lengkap Mahasiswa">
                            </div>
                            <div class="form-group">
                                <label for="nid">Angkatan</label>
                                <input type="text" class="form-control" id="gelar" name="angkatan" placeholder="Gelar Dosen">
                            </div>
                            <div class="form-group">
                                <label for="nid">Prodi</label>
<!--                                <input type="text" class="form-control" id="nid" placeholder="NID Dosen">-->
                                <select name="prodi" class="form-control" id="">
                                    <?php foreach ($prodi as $iprodi){

                                    ?>
                                    <option value="<?= $iprodi->idprodi ?>"><?= $iprodi->nama_prodi ?></option>
                                    <?php } ?>
                                </select>
                            </div>

=======
                    <form role="form" action="<?= base_url('admin/dosen/savedosen')?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nid">NID</label>
                                <input type="text" class="form-control" id="nid" name="nid" placeholder="NID Dosen">
                            </div>
                            <div class="form-group">
                                <label for="nid">Nama Dosen</label>
                                <input type="text" class="form-control" id="nid" name="nama" placeholder="Nama Lengkap Dosen">
                            </div>
                            <div class="form-group">
                                <label for="nid">Gelar</label>
                                <input type="text" class="form-control" id="gelar" name="gelar" placeholder="Gelar Dosen">
                            </div>
                            <div class="form-group">
                                <label for="nid">Foto Dosen</label>
                                <input type="text" class="form-control" id="nid" placeholder="NID Dosen">
                            </div>
>>>>>>> main
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
<<<<<<< HEAD
                            Sampel Data Mahasiswa
=======
                            Sampel Data Dosen
>>>>>>> main
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