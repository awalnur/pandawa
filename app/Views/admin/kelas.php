
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
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-importkelas">
                                    <i class="fa fa-cloud-upload"></i> Import Data Kelas
                                </button>
                                <a href="<?= base_url('/template/template_kelas.xlsx')?>" download class="btn link-info"><i class="fa fa-download"> </i>Download Template import</a>
                                 <div class="modal fade" id="modal-importkelas">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Pilih File yang akan di import</h4>
                                            </div>
                                            <form action="<?= base_url('admin/kelas/importing')?>" id="importkelas" method="POST" enctype="multipart/form-data">

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="jenis">
                                                            Pilih File
                                                        </label>
                                                        <input type="file" placeholder="import" name="importkelas">
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
                            </dvi>
                            <?php if (!empty(session('success'))){
                            ?>
                            <br>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?= session('success')?>
                            </div>
                            <?php
                        }else if (!empty(session('gagalss'))){
                            ?>

<br>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?= session('gagalss')?>
                            </div>

                            <?php
                        } ?>

                        <hr>

                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                Filter
                                <div class="form-group">
                                    <label>Prodi</label>
                                    <select class="prodi form-control" id="filter_prodi">
                                        <option value="0">Semua</option>
                                        <?php
                                        foreach($prodi as $pitem){
                                            ?>
                                            <option value="<?= $pitem->idprodi?>"><?= $pitem->nama_prodi?></option>
                                            <?php
                                        }
                                        ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <br>
                                <div class="form-group">
                                    <label>Tahun Akademik</label>
                                    <select class="prodi form-control" id="filter_thnakademik"> 
                                    <option value="0">Semua</option>
                                        <?php
                                        foreach($thnakademik as $thn){
                                            ?>
                                            <option value="<?= $thn->thn_akademik ?>" <?= ($thn->aktif==1)?'selected':''; ?> ><?= $thn->thn_akademik?></option>
                                            <?php
                                        }
                                        ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <br>
                                <div class="form-group">
                                    <label>Mata Kuliah</label>
                                    <select class="prodi form-control" id="filter_matkul">
                                    <option value="0">Semua</option>
                                        <?php
                                        foreach($matakuliah as $matkul){
                                            ?>
                                            <option value="<?= $matkul->kode_matkul ?>" ><?= $matkul->matkul?></option>
                                            <?php
                                        }
                                        ?>
                                    </select> 
                                </div>
                            </div>
                        </div>
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
                                <th>Prodi</th>
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