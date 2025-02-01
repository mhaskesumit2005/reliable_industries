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

    <!-- tadata pdf cdn -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url() ?>assets/admin_assets/vendor/js/helpers.js"></script>
    <script src="<?= base_url() ?>assets/admin_assets/js/config.js"></script>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ck editor cdn -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.0/classic/ckeditor.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <?php
                    if (!isset($_SESSION['admin_username']))
                        redirect('/admin/index');
                    ?>
                    <a href="<?= base_url() ?>admin/dashboard" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bold ms-2 text-primary"><img style="margin-left: 0px;" src="<?= base_url() ?>uploads/<?= $company_profile[0]['company_favicon'] ?>" width="40" alt=""> <?php echo $admin->admin_account_type; ?></span>
                    </a>


                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboards -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/dashboard" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-smile"></i>
                            <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                            <span class="badge rounded-pill bg-danger ms-auto"><?php echo $pending_enquiry_count; ?></span>
                        </a>
                    </li>
                    <!-- Company Profile -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/company_profile" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-info-circle"></i>
                            <div class="text-truncate" data-i18n="Company Profile">Company Profile</div>
                        </a>
                    </li>

                    <!-- Enquiry -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-phone-call"></i>
                            <div class="text-truncate" data-i18n="Enquiry">Enquiry</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/enquiry_list" class="menu-link">
                                    <div class="text-truncate" data-i18n="Pending Enquiry">Pending Enquiry</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/active_enquiry" class="menu-link">
                                    <div class="text-truncate" data-i18n="Active Enquiry">Active Enquiry</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/complete_enquiry" class="menu-link">
                                    <div class="text-truncate" data-i18n="Complete Enquiry">Complete Enquiry</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/cancel_enquiry" class="menu-link">
                                    <div class="text-truncate" data-i18n="Cancel Enquiry">Cancel Enquiry</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/total_enquiry_list" class="menu-link">
                                    <div class="text-truncate" data-i18n="Follow-Up">Total Enquiry List</div>
                                </a>
                            </li>
                        </ul>
                        <!-- Product Start-->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layer"></i>
                            <div class="text-truncate" data-i18n="Product">Product</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/category_manage" class="menu-link">
                                    <div class="text-truncate" data-i18n="Category Manage">Category Manage</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/products" class="menu-link">
                                    <div class="text-truncate" data-i18n="Product's">Add Product's</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/product_list" class="menu-link">
                                    <div class="text-truncate" data-i18n="Product List">Product List</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- contact  -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/contact" class="menu-link">
                        <i class='bx bx-phone-call me-2'></i>
                            <div class="text-truncate" data-i18n="Contact">Contact</div>
                        </a>
                    </li>
                    <!-- Subscriber -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/subscriber" class="menu-link">
                        <i class='bx bx-user-pin me-2'></i>
                            <div class="text-truncate" data-i18n="Subscriber">Subscriber</div>
                        </a>
                    </li>
                    <!-- CMS -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">CMS</span></li>
                    <!-- Home  -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-home"></i>
                            <div class="text-truncate" data-i18n="Home">Home</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/slider" class="menu-link">
                                    <div class="text-truncate" data-i18n="Slider">Slider</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/our_work" class="menu-link">
                                    <div class="text-truncate" data-i18n="Our Work">Our Work</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/quality_of_work" class="menu-link">
                                    <div class="text-truncate" data-i18n="Quality Of Work">Quality Of Work</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/custom_enquiry" class="menu-link">
                                    <div class="text-truncate" data-i18n="Get Custom Enquiry">Get Custom Enquiry</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/packaging_solutions" class="menu-link">
                                    <div class="text-truncate" data-i18n="Packaging Solution's">Packaging Solution's</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/trusted_brands" class="menu-link">
                                    <div class="text-truncate" data-i18n="Trusted By Leading Brands">Trusted By Leading Brands</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/testimonials" class="menu-link">
                                    <div class="text-truncate" data-i18n="Testimonials">Testimonials</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- About Start -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class='bx bx-info-square me-2'></i>
                            <div class="text-truncate" data-i18n="Home">About</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/about_reliable" class="menu-link">
                                    <div class="text-truncate" data-i18n="About Reliable">About Reliable</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/who_we_are" class="menu-link">
                                    <div class="text-truncate" data-i18n="Who We Are">Who We Are ?</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/vision_mission" class="menu-link">
                                    <div class="text-truncate" data-i18n="Who We Are">Vision & Mission</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/excellence" class="menu-link">
                                    <div class="text-truncate" data-i18n="Who We Are">Excellence & Quality Control</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- About End  -->

                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/blog" class="menu-link">
                            <i class='bx bx-news me-2'></i>
                            <div class="text-truncate" data-i18n="Blog">Blog</div>
                        </a>
                    </li>
                    <!-- Privacy Policy -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/privacy_policy" class="menu-link">
                        <i class='bx bx-check-shield me-2'></i>
                            <div class="text-truncate" data-i18n="Privacy Policy">Privacy Policy</div>
                        </a>
                    </li>

                    <!-- FAQ  -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/faq" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-question-mark"></i>
                            <div class="text-truncate" data-i18n="Faq">FAQ</div>
                        </a>
                    </li>

                    <!-- Our Manufacturing Unit's  -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/manufacturing_units" class="menu-link">
                        <i class='bx bx-buildings me-3'></i>
                            <div class="text-truncate" data-i18n="Our Manufacturing Unit's">Our Unit's</div>
                        </a>
                    </li>
                    <!-- Support -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Support</span></li>
                    <li class="menu-item mb-5 pb-5">
                        <a href="<?= base_url() ?>admin/support" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-support"></i>
                            <div class="text-truncate" data-i18n="Support">Support</div>
                        </a>
                    </li>
                    <br>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav
                    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="bx bx-menu bx-md"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a
                                    class="nav-link dropdown-toggle hide-arrow p-0"
                                    href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= base_url() ?>uploads/<?php echo $admin->admin_image; ?>" style="object-fit:cover;" alt class=" h-100 w-100 rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url() ?>admin/admin_profile">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= base_url() ?>uploads/<?php echo $admin->admin_image; ?>" style="object-fit:cover;" alt class=" h-100 w-100 rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0"><?= $admin->admin_first_name; ?> <?= $admin->admin_last_name; ?></h6>
                                                    <small class="text-muted"><?= $admin->admin_account_type; ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url() ?>admin/admin_profile">
                                            <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url() ?>admin/admin_security"> <i class="bx bx-cog bx-md me-3"></i><span>Settings</span> </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url() ?>admin/logout">
                                            <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
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