<!-- Breadcrumb -->
<div class="text-white bread py-5 bg-bread">
    <div class="container py-5">
        <div class="row">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Enquiry Now</li>
                </ol>
            </nav>
            <h1>Who We Are</h1>
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
                                placeholder="Enter your phone number" autocomplete="off" required>
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