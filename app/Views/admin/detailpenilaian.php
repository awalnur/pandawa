
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dosen
            <small>Data Dosen</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Penilian</a></li>
            <li class="active">Data Dosen</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Nilai Dosen</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-striped table-bordered">
                            <thead class="text-center bg-info">
                            <tr>
                                <th rowspan="2" style="vertical-align: middle;" class="text-center">No</th>
                                <th rowspan="2" style="vertical-align: middle;"  class="text-center vertical">Kode Mata Kuliah</th>
                                <th rowspan="2" style="vertical-align: middle;"  class="text-center vertical">Mata Kuliah</th>
                                <th colspan="<?= sizeof($jp)?>" class="text-center">Nilai</th>
                                <th rowspan="2" style="vertical-align: middle;"  class="text-center vertical">Aksi</th>
                            </tr>
                            <tr>
                                <?php foreach ($jp as $item) {
                                    ?>
                                    <td><?= $item->jenis?></td>
                                    <?php
                                }?>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                            $n=0;
                            foreach ($detpen as $ditem) {
                                $n++;
                                ?>
                                <tr>
                                    <td><?=$n;?></td>
                                    <td><?=$ditem->kode_matkul;?>
                                    </td>
                                    <td><?=$ditem->matkul;?></td>
                                    <?php foreach ($jp as $item) {
                                        ?>
                                        <td><?= ($jenis[$ditem->kode_matkul][$item->idjenis_pertanyaan]['totalnilai'])?($jenis[$ditem->kode_matkul][$item->idjenis_pertanyaan]['totalnilai']):0;?></td>
                                        <?php
                                    }?>
                                    <td width="150"><a href="<?= base_url('admin/penilaian/detail/'.$ditem->nid)?>"> <button class="btn bg-navy btn-sm"><i class="fa fa-eye"></i> Detail</button></a> <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>

                            <tr>
                                <th rowspan="2" style="vertical-align: middle;" class="text-center">No</th>
                                <th rowspan="2" style="vertical-align: middle;"  class="text-center vertical">Kode Mata Kuliah</th>
                                <th rowspan="2" style="vertical-align: middle;"  class="text-center vertical">Mata Kuliah</th>
                                <th colspan="<?= sizeof($jp)?>" class="text-center">Nilai</th>
                                <th rowspan="2" style="vertical-align: middle;"  class="text-center vertical">Aksi</th>
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