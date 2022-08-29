<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="<?= base_url(); ?>/assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />

    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url(); ?>/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url(); ?>/assets/js/config.js"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar layout-without-menu">
    <div class="layout-container">
        <!-- Menu -->
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar"
            >
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center justify-content-center">
                        <h2 class="logo text-black mb-0">Pandawa</h2>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Place this tag where you want the button to render. -->
                        <li class="nav-item lh-1 me-3">
                            <a
                                class="github-button"
                                href="https://github.com/themeselection/sneat-html-admin-template-free"
                                data-icon="octicon-star"
                                data-size="large"
                                data-show-count="true"
                                aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                            >Star</a
                            >
                        </li>

                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="<?= base_url(); ?>/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="<?= base_url(); ?>/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">John Doe</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="auth-login-basic.html">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                <li class="nav-item">
                                    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-account-settings-notifications.html"
                                    ><i class="bx bx-bell me-1"></i> Notifications</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-account-settings-connections.html"
                                    ><i class="bx bx-link-alt me-1"></i> Connections</a
                                    >
                                </li>
                            </ul>
                            <div class="card mb-4">
                                <h5 class="card-header">Form Penilaian Dosen</h5>
                                <!-- Account -->
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img
                                                src="../assets/img/avatars/1.png"
                                                alt="user-avatar"
                                                class="d-block rounded"
                                                height="100"
                                                width="100"
                                                id="uploadedAvatar"
                                        />
                                        <div class="button-wrapper">
                                            <p>Nama Dosen</p>
                                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-0" />
                                <div class="card-body p-0">
                                    <!-- SmartWizard html -->
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
                                                                                name="radioanswer<?= $psitem->pertanyaan ?>"
                                                                                id="inlineRadio1"
                                                                                value="4"
                                                                        />
                                                                        <label class="form-check-label" for="inlineRadio1">Sangat Baik</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline mt-3">
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="radio"
                                                                                name="inlineRadioOptions"
                                                                                id="inlineRadio1"
                                                                                value="3"
                                                                        />
                                                                        <label class="form-check-label" for="inlineRadio1"> Baik</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline mt-3">
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="radio"
                                                                                name="inlineRadioOptions"
                                                                                id="inlineRadio1"
                                                                                value="2"
                                                                        />
                                                                        <label class="form-check-label" for="inlineRadio1">Cukup</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline mt-3">
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="radio"
                                                                                name="inlineRadioOptions"
                                                                                id="inlineRadio1"
                                                                                value="1"
                                                                        />
                                                                        <label class="form-check-label" for="inlineRadio1">Kurang</label>
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
                                                sasdasdasd
                                            </div>

                                    </div>
                                </div>
                                <!-- /Account -->
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
                            , made with ❤️ by
                            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                        </div>
                        <div>
                            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                            <a
                                href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                target="_blank"
                                class="footer-link me-4"
                            >Documentation</a
                            >

                            <a
                                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                target="_blank"
                                class="footer-link me-4"
                            >Support</a
                            >
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
            navigationUI:'hide',
        });
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
