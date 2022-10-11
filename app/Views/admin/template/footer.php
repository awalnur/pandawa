
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-s"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/adminLTE')?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/adminLTE')?>/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/adminLTE')?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/adminLTE')?>/bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="<?= base_url('assets/adminLTE')?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/adminLTE')?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets/adminLTE')?>/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/adminLTE')?>/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/adminLTE')?>/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url('assets/adminLTE')?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url('assets/adminLTE')?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/adminLTE')?>/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/adminLTE')?>/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/adminLTE')?>/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url('assets/adminLTE')?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets/adminLTE')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url('assets/adminLTE')?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/adminLTE')?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminLTE')?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/adminLTE')?>/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/adminLTE')?>/dist/js/demo.js"></script>

<script>
    $(function () {

        $("#searchjurusan").select2({
            placeholder: 'Pilih Prodi',
            ajax: {
                url: '<?= base_url('admin/penilaian/getProdi')?>',
                dataType: 'json',
                delay: 250,
                data: function (data) {
                    return {
                        searchTerm: data.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results:response
                    };
                },
                cache: true
            }
        });

        $("#searchta").select2({
            placeholder: 'Pilih Prodi',
            ajax: {
                url: '<?= base_url('admin/penilaian/ta')?>',
                dataType: 'json',
                delay: 250,
                data: function (data) {
                    return {
                        searchTerm: data.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results:response
                    };
                },
                cache: true
            }
        });
        $("#btndownloadlaporan").click(function (){
            let jurusan=$("#searchjurusan").val();
            let ta=$("#searchta").val();

            return window.open('<?= base_url("/admin/penilaian/report")?>/'+jurusan+'/'+ta, '_blank');
        })
        $('.smk').select2({
            placeholder: 'Pilih Mata Kuliah',
            ajax: {
                url: '<?= base_url('admin/kelas/getmk')?>',
                dataType: 'json',
                delay: 250,
                data: function (data) {
                    return {
                        searchTerm: data.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results:response
                    };
                },
                cache: true
            }
        });
        $('.selectmhs').select2({
            placeholder: 'Tambah Mahasiswa Ke Kelas',
            ajax: {
                url: '<?= base_url('admin/kelas/getmhs')?>',
                dataType: 'json',
                delay: 250,
                data: function (data) {
                    return {
                        searchTerm: data.term // search term
                    };
                },
                processResults: function (response) {
                    console.log(response)
                    return {
                        results:response
                    };
                },
                cache: true
            }
        });

        $('#tmhs').click(function () {
            alert($('.selectmhs').val());
        })
        $('#example1').DataTable();
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });

        $("#jenispertanyaan").submit(function (s){
            s.preventDefault();
            $.ajax({
                url: '<?= base_url('admin/pertanyaan/savejenis')?>',
                data: $(this).serialize(),
                dataType: 'json',
                type: 'post',
                success:function (s){
                    console.log(s)

                    if(s.success==1){
                        alert('Jenis Baru Ditambahkan')
                        window.location.reload()
                    }
                }
            })
        });
        $("#editjenis_pertanyaan").submit(function (s){
            s.preventDefault();
            $.ajax({
                url: '<?= base_url('admin/pertanyaan/savejenis/edit')?>',
                data: $(this).serialize(),
                dataType: 'json',
                type: 'post',
                success:function (s){
                    console.log(s)

                    if(s.success==1){
                        alert('Edit Jenis Berhasil');
                        window.location.reload()
                    }
                }
            })
        });
        $(document).on("click", "#deletejenis", function (s) {
            // alert("S");
            if(confirm("Hapus Jenis Akan Menghapus semua pertanyaan pada jenis ini?")){
                $.ajax({
                    url: '<?= base_url('admin/pertanyaan/delete/jenis')?>',
                    data:'id='+$(this).attr("data-val"),
                    dataType: 'Json',
                    type: 'post',
                    success:function (e){
                        if (e.success==1){
                            alert('Jenis Berhasil Dihapus');
                            window.location.reload();
                        }else{
                            alert('Jenis Gagal Dihapus');

                        }
                    }
                })
            }
        });
       $(document).on("click", "#deletepertanyaan", function (s) {
            // alert("S");
            if(confirm("Hapus Jenis Akan Menghapus semua pertanyaan pada jenis ini?")){
                $.ajax({
                    url: '<?= base_url('admin/pertanyaan/delete/pert')?>',
                    data:'id='+$(this).attr("data-val"),
                    dataType: 'Json',
                    type: 'post',
                    success:function (e){
                        if (e.success==1){
                            alert('Jenis Berhasil Dihapus');
                            window.location.reload();
                        }else{
                            alert('Jenis Gagal Dihapus');

                        }
                    }
                })
            }
        });

        $("#pertanyaan").submit(function (s){
            s.preventDefault();
            $.ajax({
                url: '<?= base_url('admin/pertanyaan/savepertanyaan')?>',
                data: $(this).serialize(),
                dataType: 'json',
                type: 'post',
                success:function (s){
                    console.log(s)

                    if(s.success==1){
                        alert('Pertanyaan Baru Ditambahkan')
                        window.location.reload()
                    }
                }
            });
        });
        $("#edit_pertanyaan").submit(function (s){
            s.preventDefault();
            $.ajax({
                url: '<?= base_url('admin/pertanyaan/savepertanyaan/edit')?>',
                data: $(this).serialize(),
                dataType: 'json',
                type: 'post',
                success:function (s){
                    console.log(s)

                    if(s.success==1){
                        alert('Edit Pertanyaan Berhasil')
                        window.location.reload()
                    }
                }
            });
        });

        $(document).on("click", "#deletemhs", function (s) {
            // alert("S");
            if(confirm("Hapus Mahasiswa ?")){
                $.ajax({
                    url: '<?= base_url('admin/mahasiswa/delete')?>',
                    data:'id='+$(this).attr("data-val"),
                    dataType: 'Json',
                    type: 'post',
                    success:function (e){
                        if (e.success==1){
                            alert('Jenis Berhasil Dihapus');
                            window.location.reload();
                        }else{
                            alert('Jenis Gagal Dihapus');

                        }
                    }
                })
            }
        });
        $(document).on("click", "#deletemk", function (s) {
            // alert("S");
            if(confirm("Hapus Mata Kuliah ?")){
                $.ajax({
                    url: '<?= base_url('admin/matkul/delete')?>',
                    data:'id='+$(this).attr("data-val"),
                    dataType: 'Json',
                    type: 'post',
                    success:function (e){
                        if (e.success==1){
                            alert('Mata Kuliah Berhasil Dihapus');
                            window.location.reload();
                        }else{
                            alert('Mata Kuliah Gagal Dihapus');

                        }
                    }
                })
            }
        });
        $(document).on("click", "#deletedosen", function (s) {
            // alert("S");
            if(confirm("Hapus Dosen ?")){
                $.ajax({
                    url: '<?= base_url('admin/dosen/delete')?>',
                    data:'id='+$(this).attr("data-val"),
                    dataType: 'Json',
                    type: 'post',
                    success:function (e){
                        if (e.success==1){
                            alert('Dosen Berhasil Dihapus');
                            window.location.reload();
                        }else{
                            alert('Dosen Gagal Dihapus');

                        }
                    }
                })
            }
        });
        var tmhs=$("#tablekelasmhs").dataTable({
            searchable: false,
            "ajax":{
                "url": "<?= base_url('admin/kelas/getsmsh') ?>",
                "type": "POST"
            },
            columnDefs: [{
                    "targets": 0,
                    "data": [0],
                    "render": function (data, type, row, meta) {
                        return '<input type="checkbox" name="msh[]" value="'+data+'"/>';
                    }
                },
                {
                    "targets": 1,
                    "data": [0]
                },
                {
                    "targets": 2,
                    "data": [1]
                },
                {
                    "targets": 3,
                    "data": [2]
                },
                {
                    "targets": 4,
                    "data": [3]
                }

            ],
            select: {
                style:    'os',
                selector: 'td:first-child'
            },
        })
        $("#pilprodi").change(function () {
            let url='<?= base_url("admin/kelas/getsmsh/")?>/'+$(this).val()+'/'+$("#pilangkatan").val()+'';
            console.log(url)
            tmhs.api().ajax.url(url).load();
            // alert($(this).val())
        });
        $("#pilangkatan").change(function () {
            let url='<?= base_url("admin/kelas/getsmsh/")?>/'+$("#pilprodi").val()+'/'+$(this).val()+'';
            console.log(url)
            tmhs.api().ajax.url(url).load();
            // alert($(this).val())
        })
        $("#editnid").change(function (){
            if(this.checked){
                $("#nidedit").attr('disabled', false);
            }else{
                $("#nidedit").attr('disabled', true);
            }
        })
        $("#editkodematkul").change(function (e) {
            if(this.checked){
                $("#kodematkul").attr('disabled', false);
            }else{
                $("#kodematkul").attr('disabled', true);
            }
        })
    });
</script>
</body>
</html>