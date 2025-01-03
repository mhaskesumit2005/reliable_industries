<!-- Breadcrumb -->
<div class="text-white bread py-5 bg-bread">
    <div class="container py-5">
        <div class="row">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
                </ol>
            </nav>
            <h1>Who We Are</h1>
        </div>
    </div>
</div>

<!-- About reliable -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6  p-4">
                <div class=" text-center">
                    <img class="img_shadow w-50 " src="<?= base_url() ?>uploads/<?= $about_reliable[0]['about_logo_image'] ?>" alt="about_img" />
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <p class="text-danger m-0"><?= $about_reliable[0]['about_sub_title'] ?></p>
                    <h1 class="fw-bold"><?= $about_reliable[0]['about_title'] ?></h1>
                    <p class="fs-5"><?= $about_reliable[0]['about_description'] ?></p>
                    <a href="<?= base_url() ?>uploads/<?= $about_reliable[0]['about_pdf'] ?>" id="download-btn" class="btn btn-danger rounded-0 px-4 py-2">Download</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About reliable end -->
<!-- reliable histroy -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
            <div>
                <p class="text-danger m-0"><?= $about_profile[0]['profile_sub_title'] ?></p>
                <h1 class="fw-bold"><?= $about_profile[0]['profile_title'] ?></h1>
                <p class="fs-5"><?= $about_profile[0]['about_profile_description'] ?></p>
            </div>
        </div>
        <div class="col-md-6  p-4">
            <div class=" text-center">
                <img class=" w-50 " src="<?= base_url() ?>uploads/<?= $about_profile[0]['about_profile_image'] ?>" alt="about_img" />
            </div>
        </div>
    </div>
</div>
<!-- reliable histroy end-->
<!-- Our mission/vision -->
<section class="bg-light py-5">
    <div class="container py-4">
        <div class="row vision-mission p-1">
            <!-- Vision and Mission Section -->
            <div class="col-lg-7 d-flex flex-column flex-md-row justify-content-center">
                <div class="vision p-5 enquiry_form w-100 bg-white">
                    <div class="vision-logo">
                        <i class="fa-solid fa-chart-line "></i>
                    </div>
                    <h3 class="mt-4"><?= $vision_mission[0]['our_vision_title'] ?></h3>
                    <p><?= $vision_mission[0]['our_vision_description'] ?></p>
                </div>
                <div class="mission p-5 enquiry_form w-100 bg-white">
                    <div class="mission-logo">
                        <i class="fa-solid fa-bullseye "></i>
                    </div>
                    <h3 class="mt-4"><?= $vision_mission[0]['our_mission_title'] ?></h3>
                    <p><?= $vision_mission[0]['our_mission_description'] ?></p>
                </div>
            </div>

            <!-- Content Section -->
            <div class="col-md-5 d-flex align-items-center">
                <div class="text-start content">
                    <p class="text-danger"><?= $vision_mission[0]['sub_title'] ?></p>
                    <h1 class="fw-bold"><?= $vision_mission[0]['title'] ?></h1>
                    <p class="fs-5 text-black"><?= $vision_mission[0]['description'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our mission/vision end -->
<!-- Excellence section -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="mt-4">
                <h1 class="fw-bold"><?= $excellence[0]['title'] ?></h1>
                <p class="fs-5"><?= $excellence[0]['description'] ?></p>
            </div>
            <div class="card card-body border border-danger enquiry_form excellence_cards p-4">
                <div class="row">
                    <div class="col-3 col-md-2 p-1 d-flex align-items-center">
                        <div
                            class="card card-body icons_card border border-danger bg-danger text-white p-4 text-center shadow rounded-circle">
                            <i class="fa-solid fa-ranking-star fs-1"></i>
                        </div>
                    </div>
                    <div class="col-9 col-md-9 p-2 d-flex align-items-center">
                        <div>
                            <h4 class="text-uppercase fw-bold"><?= $excellence[0]['title_1'] ?></h4>
                            <span class="fw-normal"><?= $excellence[0]['description_1'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-body border border-danger enquiry_form mt-4 excellence_cards p-4">
                <div class="row">
                    <div class="col-3 col-md-2 p-1 d-flex align-items-center">
                        <div
                            class="card card-body icons_card border border-danger bg-danger text-white p-4 text-center shadow rounded-circle">
                            <i class="fa-solid fa-boxes-packing fs-1"></i>
                        </div>
                    </div>
                    <div class="col-9 col-md-9 p-2 d-flex align-items-center">
                        <div>
                            <h4 class="text-uppercase fw-bold"><?= $excellence[0]['title_2'] ?></h4>
                            <span class="fw-normal"><?= $excellence[0]['description_2'] ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-body border border-danger enquiry_form mt-4 excellence_cards p-4">
                <div class="row">
                    <div class="col-3 col-md-2 p-1 d-flex align-items-center">
                        <div
                            class="card card-body icons_card border border-danger bg-danger text-white p-4 text-center shadow rounded-circle">
                            <i class="fa-solid fa-print fs-1"></i>
                        </div>
                    </div>
                    <div class="col-9 col-md-9 p-2 d-flex align-items-center">
                        <div>
                            <h4 class="text-uppercase fw-bold"><?= $excellence[0]['title_3'] ?></h4>
                            <span class="fw-normal"><?= $excellence[0]['description_3'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Excellence section end -->