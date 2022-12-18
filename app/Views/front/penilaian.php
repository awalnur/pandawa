
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h5 class="card-header">Form Penilaian Dosen</h5>
                                <!-- Account -->
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img
                                                src="<?= base_url()?>/assets/img/avatars/1.png"
                                                alt="user-avatar"
                                                class="d-block rounded"
                                                height="100"
                                                width="100"
                                                id="uploadedAvatar"
                                        />
                                        <div class="button-wrapper">
                                            <h4><?= $dosen->nama_dosen?></h4>
                                            <table class="no-border table ms-1">
                                                <tr>
                                                    <td class="p-0">NID</td>
                                                    <td class="p-0">: <b class="ms-3"><?= $dosen->nid; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0">Mata Kuliah</td>
                                                    <td class="p-0" class="p-0">: <b class="ms-3"><?= $dosen->matkul; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0">Kode MatKul</td>
                                                    <td class="p-0">: <b class="ms-3"><?= $dosen->kode_matkul; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0">Tahun Akademik</td>
                                                    <td class="p-0">: <b class="ms-3"><?= $dosen->thn_akademik; ?></b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-0" />
                                <div class="card-body p-0">
                                    <form action="#" method="post" id="fpert">
                                    <!-- SmartWizard html -->
                                        <input type="text" name="thaka" value="<?=$dosen->thn_akademik?>" hidden>
                                        <input type="text" name="idkelas" value="<?=$dosen->id_kelas?>" hidden>
                                    <div id="smartwizard" class="flex-column">
                                        <ul class="nav border-1">
                                            <?php
                                            $n=0;
                                            foreach ($jenispertanyaan as $item) {
                                                $n++;
                                                ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#step-<?= $item->idjenis_pertanyaan?>">
                                                        <div class="num"><?= $n ?></div>
                                                        <?= $item->jenis?>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#step-last">
                                                    <div class="num"><?= $n+1 ?> </div>
                                                    Kritik dan Saran
                                                </a>
                                            </li>
                                        </ul>
                                        <hr class="m-0">

                                        <div class="tab-content border-1" id="content">
                                            <?php
                                            foreach ($jenispertanyaan as $pitem) {
                                                ?>
                                                <div id="step-<?= $pitem->idjenis_pertanyaan ?>" class="tab-pane pb-5" role="tabpanel" aria-labelledby="step-1">
                                                    
                                                    <?php
                                                    $nop=0;
                                                    foreach ($pertanyaan[$pitem->idjenis_pertanyaan] as $psitem) {
                                                        $nop++;
                                                        ?>

                                                        <div class="card border-1 mb-2">
                                                            <div class="card-body">
                                                                <p class="pertanyaan mb-0">
                                                                    <?= $nop ?>. <?= $psitem->pertanyaan ?>
                                                                </p>
                                                                <div class="jawaban ps-3">
                                                                    <div class="form-check form-check-inline mt-3">
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="radio"
                                                                                name="radioanswer<?= $psitem->idpertanyaan ?>"
                                                                                id="inlineRadio4<?= $psitem->idpertanyaan ?>"
                                                                                value="4"
                                                                        />
                                                                        <label class="form-check-label" for="inlineRadio4<?= $psitem->idpertanyaan ?>">Sangat Baik</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline mt-3">
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="radio"
                                                                                name="radioanswer<?= $psitem->idpertanyaan ?>"
                                                                                id="inlineRadio3<?= $psitem->idpertanyaan ?>"
                                                                                value="3"
                                                                        />
                                                                        <label class="form-check-label" for="inlineRadio3<?= $psitem->idpertanyaan ?>"> Baik</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline mt-3">
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="radio"
                                                                                name="radioanswer<?= $psitem->idpertanyaan ?>"
                                                                                id="inlineRadio2<?= $psitem->idpertanyaan ?>"
                                                                                value="2"
                                                                        />
                                                                        <label class="form-check-label" for="inlineRadio2<?= $psitem->idpertanyaan ?>">Cukup</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline mt-3">
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="radio"
                                                                                name="radioanswer<?= $psitem->idpertanyaan ?>"
                                                                                id="inlineRadio1<?= $psitem->idpertanyaan ?>"
                                                                                value="1"
                                                                        />
                                                                        <label class="form-check-label" for="inlineRadio1<?= $psitem->idpertanyaan ?>">Kurang</label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <hr>
                                                </div>
                                            <?php } ?>
                                            <div id="step-last" class="tab-pane  pb-5" role="tabpanel" aria-labelledby="step-2">
                                                <p>
                                                    Kritik dan saran kepada dosen
                                                </p>
                                                <textarea name="kritiksaran" class="form-control" id="" placeholder="Kritik dan Saran ...." required></textarea>
                                            </div>

                                    </div>
                                </div>
                                <!-- /Account -->
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , made with ❤️ by Elita
                        </div>

                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->



<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?= base_url(); ?>/assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/libs/popper/popper.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script>
    $(function() {
        // SmartWizard initialize
        $('#smartwizard').smartWizard({
            selected: 0, // Initial selected step, 0 = first step
            theme: 'arrows', // theme for the wizard, related css need to include for other than default theme
            justified: false,
            enableFinishButton: true, // makes finish button enabled always,
            toolbar: {
                position: 'bottom', // none|top|bottom|both
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                extraHtml: '<button id="finish-btn" type="submit" class="btn btn btn-success" hidden>Simpan</button>' // Extra html to show on toolbar
            },
        });
        let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
        console.log(stepInfo.totalSteps);

        $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection, totalSteps) {
            if (nextStepIndex==stepInfo.totalSteps-1){
                $("#finish-btn").attr('hidden', false)
            }else if (currentStepIndex==stepInfo.totalSteps){
                $("#finish-btn").attr('hidden', false)
            }else{
                $("#finish-btn").attr('hidden', true)
            }
            // return confirm("Do you want to leave the step " + stepDirection + "?");
        });
        $(document).on('submit', '#fpert', function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url("/home/saveNilai/".$nid) ?>',
                type: 'POST',
                data: $(this).serialize(),
                dataType:'json',
                success:function (s){
                    if  (s.success==1){
                        window.location.href='<?= base_url("home") ?>';
                    }else{
                        alert("Gagal Menyimpan, pastikan semua data telah terisi, atau data tidak akan tersimpan")
                    }
                },error:function (e) {
                    alert("pastikan semua data telah terisi, atau data tidak akan tersimpan");
                }
            })
        })
    });
</script>
<script src="<?= base_url(); ?>/assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

<!-- Vendors JS -->
<script src="<?= base_url(); ?>/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="<?= base_url(); ?>/assets/js/main.js"></script>

<!-- Page JS -->
<script src="<?= base_url(); ?>/assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

</body>
</html>
