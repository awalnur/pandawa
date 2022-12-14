
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Tambah Mahasiswa
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Mahasiswa</a></li>
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
                    <form role="form" action="<?= base_url('admin/mahasiswa/savemahasiswa')?>" method="post">
                        <div class="box-body">
                        <?php if (!empty(session('success'))){
                         ?>
                                <div class="alert alert-success">Data Berhasil Ditambahkan</div>
                         <?php } ?>
                            <div class="form-group">
                                <label for="nid">nim</label>
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
                            </div>
                            <div class="form-group">
                                <label for="nid">Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap Mahasiswa">
                            </div>
                            <div class="form-group">
                                <label for="nid">Angkatan</label>
                                <input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="Angkatan">
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