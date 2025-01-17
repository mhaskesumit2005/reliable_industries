<!-- slider -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12 p-0">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="2500">
                <div class="carousel-inner">
                    <?php
                    foreach ($slider as $row) {
                    ?>
                        <div class="carousel-item overflow-hidden active slider_img position-relative">
                            <div class="carousel_overlay text-white d-flex align-items-center justify-content-center">
                                <div>
                                    <i class="fa-solid fa-quote-left text-white"></i>
                                    <p class="fw-semibold text-white"><?= $row['sub_title'] ?></p>
                                    <h1><?= $row['slider_title'] ?></h1>
                                    <i class="fa-solid fa-quote-right text-white"></i>
                                </div>
                            </div>
                            <img src="<?= base_url() ?>uploads/<?= $row['slider_image'] ?>" class="d-block w-100 vh-100"
                                alt="slider images">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- how work -->
<div class="container work py-5">
    <div class="row py-5">
        <?php
        foreach ($our_work as $row) {
        ?>
            <div class="col-md-4 my-3">
                <div class="card border-0 px-4 text-center">
                    <div class="icons mb-3">
                        <i
                            class="<?= $row['work_icons'] ?> text-white bg-red p-4 rounded-circle border border-1 border-danger fs-2"></i>
                    </div>
                    <h5 class="text-red"><?= $row['work_title'] ?></h5>
                    <p><?= $row['work_description'] ?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<!-- counter -->
<div class="bg-img counter" id="counter-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 py-5 d-flex align-items-center justify-content-center">
                <div class="">
                    <h5 class="text-white"><?= $quality_of_work[0]['quality_of_work_sub_title'] ?></h5>
                    <h1 class="txt-title"><?= $quality_of_work[0]['quality_of_work_title'] ?></h1>
                </div>
            </div>

            <div class="col-12 col-md-6 py-5">
                <div class="row g-0">
                    <div class="col-md-6 col-12">
                        <div class="counter-box">
                            <div class="count" data-target="<?= $quality_of_work[0]['happy_clients_count'] ?>"><?= $quality_of_work[0]['happy_clients_count'] ?></div>
                            <p><?= $quality_of_work[0]['happy_clients_count_title'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="counter-box">
                            <div class="count" data-target="<?= $quality_of_work[0]['delivered_products_count'] ?>"><?= $quality_of_work[0]['delivered_products_count'] ?></div>
                            <p><?= $quality_of_work[0]['delivered_products_count_title'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="counter-box">
                            <div class="count" data-target="<?= $quality_of_work[0]['years_of_experience_count'] ?>"><?= $quality_of_work[0]['years_of_experience_count'] ?></div>
                            <p><?= $quality_of_work[0]['years_of_experience_count_title'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="counter-box">
                            <div class="count" data-target="<?= $quality_of_work[0]['manufacturing_units_count'] ?>"><?= $quality_of_work[0]['manufacturing_units_count'] ?></div>
                            <p><?= $quality_of_work[0]['manufacturing_units_count_title'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- custom enquiry -->
<div class="container py-5">
    <p class="text-red text-center mb-1"><?= $custom[0]['sub_title'] ?></p>
    <h2 class="text-center fw-bold"><?= $custom[0]['title'] ?></h2>
    <div class="row justify-content-center align-items-center py-5">
        <div class="col-lg-5 d-flex justify-content-center align-items-center text-center">
            <img src="<?= base_url() ?>uploads/<?= $custom[0]['custom_image'] ?>" alt="Enquiry Image" class="img-fluid enquiry-image">
        </div>
        <div class="col-lg-7">
            <div class="enquiry_form bg-form shadow-lg bg-white p-5">
                <form action="<?= base_url() ?>user/enquiry_now" method="post" enctype="multipart/form-data" class="form-group rounded">
                    <p class="mb-1 text-white">Need Advice ?</p>
                    <p class="fs-3 text-start fw-bold mb-5">Get In Touch With Our Experts</p>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control bg-transparent text-white" name="enquiry_name" id="name" placeholder="Enter your name"
                                autocomplete="off" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control bg-transparent text-white" name="enquiry_email" id="email" placeholder="Enter your email"
                                autocomplete="off" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="number" class="form-control bg-transparent text-white" name="enquiry_contact" id="phone"
                                placeholder="Enter your phone number" autocomplete="off" required maxlength="10" oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="package-type">Package Type</label>
                            <select class="form-control rounded-0 bg-transparent text-white" name="enquiry_packaging_type" id="package-type">
                                <option class="text-dark" value="" disabled selected>Select Package Type</option>
                                <?php foreach ($products as $key => $row) { ?>
                                    <option class="text-dark" value="<?= $row['sub_category'] ?>"><?= $row['sub_category'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="industry">Industry</label>
                            <select class="form-control rounded-0 bg-transparent text-white" name="enquiry_industry" id="industry">
                                <option class="text-dark" value="" disabled selected>Select Industry</option>
                                <?php foreach ($packaging_solutions as $key => $row) { ?>
                                    <option class="text-dark" value="<?= $row['title'] ?>"><?= $row['title'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="minimum-order">Minimum Order</label>
                            <select class="form-control bg-transparent text-white" name="enquiry_minimum_order" id="minimum-order">
                                <option class="text-dark" value="" disabled selected>Select Minimum Order</option>
                                <option class="text-dark" value="Belove 500">Belove 500</option>
                                <option class="text-dark" value="500-1000">500 - 1000</option>
                                <option class="text-dark" value="1000-5000">1000 - 5000</option>
                                <option class="text-dark" value="Above 5000">Above 5000</option>
                            </select>
                        </div>
                        <input type="hidden" name="enquiry_status" value="Pending">
                        <input type="hidden" name="status" value="Active">
                        <input type="hidden" name="enquiry_date">
                    </div>
                    <button class="bttn bttn-enquiry" type="submit">Enquiry Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- industry -->
<div class="container-fluid bgc-gradient text-center py-5">
    <div class="row pb-5">
        <h1 class="mb-5">Comprehensive Packaging Solutions for Every Industry</h1>
    </div>
</div>
<div class="container industry-box">
    <div class="row py-5">
        <?php foreach ($packaging_solutions as $row) { ?>
            <div class="col-md-3">
                <div class="industry-card text-center shadow bg-white py-4">
                    <img src="<?= base_url() ?>uploads/<?= $row['packaging_image'] ?>" class="industry-img mb-4" alt="Industry Image">
                    <h5><?= $row['title'] ?></h5>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- clients -->
<div class="container brand-container py-5 mt-5">
    <p class="text-red text-center mb-1">TRUSTED BY LEADING BRANDS ACROSS INDUSTRIES</p>
    <h2 class="fw-bold title_heading text-center">Tailored Packaging Solutions to Elevate Your Brand</h2>
    <div class="swiper-container brand-slider py-5 overflow-hidden">
        <div class="swiper-wrapper text-center">
            <?php foreach ($trusted_brands as $key => $row) { ?>
                <div class="swiper-slide"><img src="<?= base_url() ?>uploads/<?= $row['brands_image'] ?>" height="80" width="auto" alt=""></div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Infrastructure -->
<div class="container bg-video py-5 my-5 d-flex justify-content-center infra position-relative overflow-hidden">
    <iframe class="video-bg"
        src="https://www.youtube.com/embed/MadK31m2vO0?controls=0&autoplay=1&loop=1&mute=1&playlist=MadK31m2vO0&start=17"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen>
    </iframe>
    <div class="row py-5 position-relative z-index-1">
        <div class="text-center text-white py-5">
            <h1>Leveraging Advanced Technology and Robust Infrastructure</h1>
            <a href="<?= base_url() ?>user/about" class="bttn bttn-enquiry">Know More</a>
        </div>
    </div>
</div>

<!-- testimonial -->
<div class="container py-5">
    <p class="text-red text-center mb-1">TESTIMONIALS</p>
    <h2 class="text-center fw-bold">What Our Clients Say</h2>
    <div class="swiper-container review-slider overflow-hidden pt-5">
        <div class="swiper-wrapper test pt-4">
            <?php foreach ($testimonials as $key => $row) { ?>
                <div class="swiper-slide">
                    <div class="review-card shadow-sm px-5 pt-5 pb-2 enquiry_form bgc-gradient position-relative">
                        <div class="mb-3">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="fst-italic fw-normal"><?= substr(strip_tags($row['description']), 0, 200) . '...'; ?></p>
                        <h5 class="mb-0 text-uppercase mt-4"><?= $row['company_name'] ?></h5>
                        <p class="">Client</p>
                        <i class="fa-solid fa-quote-right"></i>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</div>