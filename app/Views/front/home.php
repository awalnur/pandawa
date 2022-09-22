
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-12 mb-4 order-0">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col-lg-9 col-sm-7">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary">Selamat Datang di <b>Pandawa</b>,<?= $nama?>!</h5>
                                            <p class="mb-4">
                                                Penilaian Dosen Oleh Mahasiwa (PANDAWA), instrumen untuk menilai kinerja dosen dalam proses pembelajaran di akhir semester.
                                                <br>
                                                Wajibkah Mahasiswa Mengisi PANDAWA?
                                                <span class="fw-bold">Mahasiswa wajib mengisi PANDAWA.</span>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-5 text-center text-sm-left">
                                        <div class="card-body pb-0 px-0 px-md-4">
                                            <img
                                                src="<?= base_url(); ?>/assets/img/illustrations/man-with-laptop-light.png"
                                                height="140"
                                                alt="View Badge User"

                                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                data-app-light-img="illustrations/man-with-laptop-light.png"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Horizontal -->
                    <h5 class="pb-1 mb-4">Daftar Dosen</h5>
                    <div class="row mb-5">
                        <?php

                        foreach ($dosen as $ddosen) {
//                            if ()
                            ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img class="card-img card-img-left" src="../assets/img/avatars/1.png" alt="Card image" />
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body pt-3 pb-2">
                                            <h5 class="card-title mb-0 mt-0 "><?= $ddosen->nama_dosen?></h5>
                                            <p class="card-text"><small class="text-muted"><?= $ddosen->matkul?></small></p>
                                            <?php
                                            if ($ddosen->dinilai==1){
                                                ?>
                                                <div class="alert alert-success ps-2 p-1 mb-0">
                                                    <i class="bx bx-check-circle"></i> Sudah dinilai
                                                </div>
                                            <?php
                                            }else{
                                                ?>
                                                <a href="<?= base_url('/home/penilaian/'.$ddosen->nid)?>"> <button class="btn btn-primary btn-sm">Beri Nilai</button></a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }?>
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
                            , made with ❤️ by ELITA
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

<script src="<?= base_url(); ?>/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

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
