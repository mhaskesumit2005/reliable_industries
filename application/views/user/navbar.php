<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Reliable Industries is one of the fast Growing manufacturer in Label Industry.">
    <meta name="keywords" content="Reliable Industries, Label, Packaging">
    <meta name="author" content="A2Z IT HUB PVT LTD, Sushant Gunjal">
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>uploads/<?= $company_profile[0]['company_favicon'] ?>">
    <title>Reliable Industries</title>
    <!-- seo -->
    <meta property="og:title" content="Reliable Industries" />
    <meta property="og:description"
        content="Reliable Industries is one of the fast Growing manufacturer in Label Industry." />
    <meta property="og:image" content="https://reliableindustries.netlify.app/assets/images/logo-favicon.png" />
    <meta property="og:url" content="https://reliableindustries.netlify.app//" />
    <meta property="og:type" content="website" />
    <!-- google font - jost -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- external css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/user_assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/user_assets/css/navbar.css">
    <!-- REMIXICONS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CDN 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- swiper js cdn -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

</head>

<body>
    <div id="preloader"></div>
    <!-- Topbar Start -->
    <div class="container-fluid bgc-gradient text-light p-0">
        <div class="row gx-0 d-none d-lg-flex py-2">
            <div class="col-lg-12 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small><i class="fa-solid fa-envelope text-white me-2"></i><a href="mailto:<?= $company_profile[0]['company_email'] ?>" class=" text-white"><?= $company_profile[0]['company_email'] ?></a></small>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small><i class="fa-solid fa-phone text-white me-2"></i><a href="callto:+91 <?= $company_profile[0]['company_phone'] ?>" class=" text-white">+91 <?= $company_profile[0]['company_phone'] ?></a></small>
                </div>
            </div>
        </div>
    </div>

    <!-- navbar -->
    <nav class="navbar bg-white shadow navbar-expand-lg sticky-top py-4">
        <div class="container">
            <a class="navbar-brand overflow-hidden" href="<?= base_url() ?>">
                <img src="<?= base_url() ?>uploads/<?= $company_profile[0]['company_logo'] ?>" alt="Reliable Industry" width="350" height="auto">
            </a>
            <button class="navbar-toggler rounded-0  shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="sidebar w-100 offcanvas offcanvas-start " tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header shadow">
                    <a class="navbar-brand overflow-hidden" href="index.html">
                        <img src="<?= base_url() ?>uploads/<?= $company_profile[0]['company_logo'] ?>" alt="Reliable Industry" width="350" height="auto">
                    </a>
                    <button type="button" class="btn-close border-0 " data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column  flex-lg-row">
                    <ul class="navbar-nav  justify-content-center align-items-center  flex-grow-1 pe-3">
                        <li class="nav-item mx-4">
                            <a class="nav-link text-black" aria-current="page" href="<?= base_url() ?>">Home</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link text-black" href="<?= base_url() ?>user/about">About Us</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link text-black" href="<?= base_url() ?>user/product">Products</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link text-black" href="<?= base_url() ?>user/blog">Blog</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link text-black" href="<?= base_url() ?>user/contact">Contact Us</a>
                        </li>
                    </ul>
                    <div>
                        <a href="<?= base_url() ?>user/enquiry" class="btn btn-cat rounded-0">Enquiry Now</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>