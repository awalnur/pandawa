
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
                                <label for="nid">Mata Kuliah</label>
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
                            </div>
                            <div class="form-group">
                                <label for="nid">Nama Dosen</label>
                                <select class="form-control select2 selectdosen" style="width: 100%;">

                                </select>

                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas </label>
                                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Angkatan">
                            </div>
                            <div class="form-group">
                                <label for="nid">Tahun Akademik</label>
                                <!--                                <input type="text" class="form-control" id="nid" placeholder="NID Dosen">-->
                                <select name="ta" class="form-control" id="">
                                    <option value="20221"> 20221</option>
                                    <option value="20222"> 20222</option>
                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="smhs">Mahasiswa</label>
                                <div class="input-group">
                                    <select class="form-control select2 selectmhs ">

                                    </select>
                                        <butto type="button" class="btn btn-info input-group-addon" id="tmhs">Tambah Mahasiswa</butto>

                                </div>
                            </div>
                            <div class="form-group">
                                <table class="table table-bordered" id="tablekelasmhs">
                                    <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nim</td>
                                        <td>Nama Mahasiswa</td>
                                        <td>Anggkatan</td>
                                        <td>aksi</td>
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