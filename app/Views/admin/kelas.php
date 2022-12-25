
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
                    <div class="box-header  with-border">
                        <h3 class="box-title">Kelas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <dvi class="btn-group">
                            <button class="btn btn-primary" onclick="location.href='<?= base_url('admin/kelas/tambahkls')?>'"><i class="fa fa-plus-circle"></i> Tambah Kelas</button>
<!--                            <button class="btn btn-success"><i class="fa fa-print"></i> Cetak Data Mahasiswa</button>?-->
                            <!--                                <butto class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Dosen</butto>-->
                        </dvi>
                        <hr>
                        <table id="tablekelas" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Prodi</th>
                                <th>Mata Kuliah</th>
                                <th>Kelas</th>
                                <th>Dosen</th>
                                <th>Th Akademik</th>
                                <th>Jumlah Mahasiswa</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Mata Kuliah</th>
                                <th>Kelas</th>
                                <th>Dosen</th>
                                <th>Th Akademik</th>
                                <th>Jumlah Mahasiswa</th>
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