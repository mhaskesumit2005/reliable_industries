<!doctype html>
<html
    lang="en"
    class="light-style layout-menu-fixed layout-compact"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="<?= base_url() ?>assets/admin_assets/"
    data-template="vertical-menu-template-free"
    data-style="light">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Reliable Industries - Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>uploads/<?= $company_profile[0]['company_favicon'] ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <!-- Incons fron boxicons.com -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin_assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin_assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin_assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin_assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin_assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin_assets/vendor/css/pages/page-auth.css" />


    <!-- Helpers -->
    <script src="<?= base_url() ?>assets/admin_assets/vendor/js/helpers.js"></script>
    <script src="<?= base_url() ?>assets/admin_assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="<?= base_url() ?>admin" class="app-brand-link gap-2">
                                <img src="<?= base_url() ?>uploads/<?= $company_profile[0]['company_favicon'] ?>" width="100" alt="">
                            </a>
                        </div>
                        <!-- /Logo -->

                        <h4 class="mb-1">Welcome to System !</h4>
                        <p class="mb-6">Please sign-in to your account</p>
                        <form id="formAuthentication" class="mb-6" action="<?= base_url('admin/login_process'); ?>" method="post">
                            <div class="mb-6">
                                <label for="email" class="form-label">Email or Username</label>
                                <input type="text" cfd class="form-control" id="email" name="username" placeholder="Enter your email or username" autofocus required />
                            </div>
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control"
                                        name="password"
                                        placeholder="Enter Password"
                                        aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <!-- Display error message if login failed -->
                            <?php if ($this->session->userdata('error')): ?>
                                <p style="color: red;"><?= $this->session->userdata('error'); ?></p>
                            <?php endif; ?>

                            <div class="mb-8">
                                <div class="d-flex justify-content-between mt-8">
                                    <div class="form-check mb-0 ms-2">
                                        <input class="form-check-input" type="checkbox" id="remember-me" required />
                                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                                    </div>

                                </div>
                            </div>
                            <div class="mb-6">
                                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="mt-5 text-center">© Reliable Industries, Developed By A2Z IT HUB PVT LTD</p>
            </div>
        </div>
    </div>



    </div>
    <!-- / Layout page -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/admin_assets/vendor/js/core.js -->

    <script src="<?= base_url() ?>assets/admin_assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>assets/admin_assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url() ?>assets/admin_assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url() ?>assets/admin_assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url() ?>assets/admin_assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url() ?>assets/admin_assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url() ?>assets/admin_assets/assets/js/dashboards-analytics.js"></script>
    <script src="<?= base_url() ?>assets/admin_assets/assets/js/pages-account-settings-account.js"></script>


    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>