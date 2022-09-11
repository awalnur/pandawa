
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
                        <h3 class="box-title">Tambah Pertanyaan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-adds">
                            Tambah Pertanyaan
                        </button>

                        <div class="modal fade" id="modal-adds">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Pertanyaan Baru</h4>
                                    </div>
                                    <form action="#" id="pertanyaan">

                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="jenis">
                                                    Jenis Pertanyaan
                                                </label>
                                                <select name="jenis" id="" class="form-control">
                                                    <?php
                                                        foreach ($jenis as $jen){
                                                        ?>
                                                            <option value="<?=$jen->idjenis_pertanyaan?>"><?= $jen->jenis?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Pertanyaan">
                                                    Pertanyaan
                                                </label>
                                                <textarea type="text" name="pertanyaan" class="form-control" placeholder="pertanyaan" required></textarea>
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
                                <th>Pertanyaan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $n=0;
                            foreach ($pertanyaan as $jitem) {
                                $n++;
                                ?>
                                <tr>
                                    <td><?=$n;?></td>
                                    <td><?=$jitem->jenis;?>
                                    <td><?=$jitem->pertanyaan;?>
                                    </td><td width="150">
                                        <button class="btn bg-orange btn-sm"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" id="deletepertanyaan" data-val="<?= $jitem->idpertanyaan?>"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Jenis Pertanyaan</th>
                                <th>Pertanyaan</th>
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