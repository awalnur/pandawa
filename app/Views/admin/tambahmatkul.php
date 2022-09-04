
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Tambah Matakuliah
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Mata Kuliah</a></li>
            <li class="active">Form Tambah Mata Kuliah</li>
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
                        <h3 class="box-title">Form Matakuliah</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?= base_url('admin/matkul/savematkul')?>" method="post">
                        <div class="box-body">
                            <?php if (!empty(session('success'))){
                                ?>
                                <div class="alert alert-success">Data Berhasil Ditambahkan</div>
                            <?php }else if (!empty(session('error'))){
                                ?>
                                <div class="alert alert-danger">Data Gagal Ditambahkan / Duplikat data</div>

                                <?php
                            } ?>
                            <div class="form-group">
                                <label for="kodematkul">Kode Mata Kuliah</label>
                                <input type="text" class="form-control" id="kodematkul" name="kodematkul" placeholder="Kode Mata kuliah">
                            </div>
                            <div class="form-group">
                                <label for="nid">Mata Kuliah</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Mata Kuliah">
                            </div>
                            <div class="form-group">
                                <label for="nid">Sks</label>
                                <input type="text" class="form-control" id="sks" name="sks" placeholder="SKS">
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester">
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