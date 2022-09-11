
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Jenis Pertanyaan
            <small>Data Jenis Pertanyaan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Pertanyaan</a></li>
            <li class="active">Jenis Pertanyaan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Jenis Pertanyaan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
                                Tambah Jenis
                            </button>

                        <div class="modal fade" id="modal-add">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Jenis Pertanyaan Baru</h4>
                                    </div>
                                    <form action="#" id="jenispertanyaan">

                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="jenis">
                                                Jenis Pertanyaan
                                            </label>
                                            <input type="text" name="jenis" class="form-control" required>
                                        </div>

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
                        <hr>
                        <table id="jenispert" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Pertanyaan</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $n=0;
                            foreach ($jenis as $jitem) {
                                $n++;
                                ?>
                                <tr>
                                    <td><?=$n;?></td>
                                    <td><?=$jitem->jenis;?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/pertanyaan/pertanyaan/' . $jitem->idjenis_pertanyaan) ?>" class="btn btn-info">List Pertanyaan</a></td>
                                    <td width="150">
                                        <button class="btn bg-orange btn-sm"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" id="deletejenis" data-val="<?= $jitem->idjenis_pertanyaan?>"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Jenis Pertanyaan</th>
                                <th>Detail</th>
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