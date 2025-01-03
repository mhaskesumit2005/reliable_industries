<!-- Breadcrumb -->
<div class="text-white bread py-5 bg-bread">
    <div class="container py-5">
        <div class="row">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">FAQ's</li>
                </ol>
            </nav>
            <h1>Frequently Asked Questions</h1>
        </div>
    </div>
</div>
<!-- FAQ's page -->
<section class="FAQ_section">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center py-4 faq_gif">
                    <img height="350" src="<?= base_url() ?>assets/user_assets/images/faq_img1.gif" />
                    <h2 class="py-2">We’re here to help with any question of our customers</h2>
                </div>
                <!-- FAQ Questions and Answers section -->
                <div class="accordion " id="accordionExample">
                    <!-- 1st question -->
                    <?php foreach ($faq as $key => $row) { ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header  shadow-sm rounded-5 border-0" id="headingOne">
                                <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq<?= $row['faq_id'] ?>" aria-expanded="true" aria-controls="faq<?= $row['faq_id'] ?>">
                                    <p class="fw-semibold karan"><?= $key + 1 ?>. <?= $row['faq_title'] ?></p>
                                </button>
                            </h2>
                            <div id="faq<?= $row['faq_id'] ?>" class="accordion-collapse collapse " aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body py-4"><?= $row['faq_description'] ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- FAQ's page end -->