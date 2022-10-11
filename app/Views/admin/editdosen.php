
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Edit Dosen
            <small>Edit Dosen</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/admin/dosen">Dosen</a></li>
            <li class="active">Form Edit Dosen</li>
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
                        <h3 class="box-title">Edit Dosen</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?= base_url('admin/dosen/savedosen/edit/'.$dosen->nid)?>" method="post">

                        <div class="box-body">
                            <div class="alert alert-success alert-dismissable <?= (empty(session('success')))?'hidden':''?>">
                                Data Dosen Berhasil Diedit
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            </div>
                            <div class="form-group">
                                <label for="nid">NID</label>
                                <input type="text" class="form-control" id="nidedit" name="nid" value="<?= $dosen->nid;?>" placeholder="NID Dosen" disabled>
                                <div class="form-group">
                                    <input type="checkbox" name="edit" id="editnid">
                                    <label for="e" class="text-warning">Edit NID</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nid">Nama Dosen</label>
                                <input type="text" class="form-control" id="nid" name="nama" value="<?= $dosen->nama_dosen;?>" placeholder="Nama Lengkap Dosen">
                            </div>
                            <div class="form-group">
                                <label for="nid">Gelar</label>
                                <input type="text" class="form-control" id="gelar" name="gelar" value="<?= $dosen->gelar;?>" placeholder="Gelar Dosen">
                            </div>
<!--                            <div class="form-group">-->
<!--                                <label for="nid">Foto Dosen</label>-->
<!--                                <input type="text" class="form-control" id="nid" placeholder="NID Dosen">-->
<!--                            </div>-->
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
                            Sampel Data Dosen
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