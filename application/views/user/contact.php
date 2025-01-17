<!-- Breadcrumb -->
<div class="text-white bread py-5 bg-bread">
    <div class="container py-5">
        <div class="row">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Contact Us</li>
                </ol>
            </nav>
            <h1>Let's Meet</h1>
        </div>
    </div>
</div>

<!-- contact -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-7 py-5">
            <div class="row p-3">
                <p class="mb-2 fw-medium">Get In Touch</p>
                <hr class="m-0">
                <div class="row">
                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-location-dot text-red fs-3"></i>
                    </div>
                    <div class="col-10 d-flex align-items-center">
                        <div class="pt-3">
                            <h6>Head Office Address</h6>
                            <p class="w-75"><?= $company_profile[0]['company_address'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-phone text-red fs-3"></i>
                    </div>
                    <div class="col-10 d-flex align-items-center">
                        <div class="">
                            <a href="callto:+91 <?= $company_profile[0]['company_phone'] ?>">
                                <p class="m-0 text-dark">+91 <?= $company_profile[0]['company_phone'] ?></p>
                            </a>
                            <p class="m-0">+91 30085890 /91/92/93/94/95</p>
                        </div>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-envelope text-red fs-3"></i>
                    </div>
                    <div class="col-10 d-flex align-items-center">
                        <div class="">
                            <a href="mailto:<?= $company_profile[0]['company_email'] ?>">
                                <p class="m-0 text-dark"><?= $company_profile[0]['company_email'] ?></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-3">
                <p class="mb-2 fw-medium">Google Map Location</p>
                <hr class="mb-3">
                <iframe
                    src="<?= $company_profile[0]['google_map'] ?>"
                    width="100%" height="290" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="m-0 p-0"></iframe>
            </div>
        </div>
        <div class="col-md-5 text-center py-5">
            <div class="enquiry_form shadow p-4 ">
                <img src="<?= base_url() ?>uploads/<?= $company_profile[0]['company_favicon'] ?>" alt="" class="w-25 mb-3">
                <h6>We Would Be Happy To Assist You</h6>
                <form action="<?= base_url() ?>user/send_contact" method="post" onsubmit="return confirm('Are you sure you want to Submit..?');">
                    <input type="hidden" name="contact_date">
                    <input type="text" class="form-control my-4" name="name" placeholder="Enter Name" required>
                    <input type="email" class="form-control my-4" name="email" placeholder="Enter Email" required>
                    <input type="number" class="form-control my-4" name="phone" placeholder="Enter Phone" required maxlength="10" oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);">

                    <input type="text" class="form-control my-4" name="subject" placeholder="Enter Subject" required>
                    <textarea id="" class="form-control" name="message" placeholder="Enter Your Messages.."
                        required></textarea>
                    <button type="submit" class="btn btn-danger rounded-0 px-3 py-2 mt-5">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- manufacturing units -->
<div class="bg-img ">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 py-5 d-flex align-items-center justify-content-center">
                <div class="">
                    <h5 class="text-white">OUR MANUFACTURING UNIT'S</h5>
                    <h1 class="txt-title">Driven by Precision, Powered by Expertise</h1>
                </div>
            </div>

            <div class="col-12 col-md-7 py-5">
                <div class="row g-0">
                    <div class="swiper-container units-slider overflow-hidden">
                        <div class="swiper-wrapper test ">
                            <?php foreach ($manufacturing_units as $key => $row) { ?>
                                <div class="swiper-slide">
                                    <div
                                        class="shadow px-5 pt-5 pb-2 enquiry_form bg-white text-dark position-relative text-center">
                                        <i class="fa-solid fa-gear fs-1 text-red mb-4"></i>
                                        <h5>Unit <?= $key + 1 ?></h5>
                                        <p><?= $row['units_address'] ?></p>
                                        <p><i class="fa-solid fa-headset fs-5 text-red me-3"></i><span
                                                class="fw-semibold">+91 <?= $row['units_phone'] ?></span></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Infrastructure -->
<div class="container bg-video py-5 my-5 d-flex justify-content-center infra position-relative overflow-hidden">
    <iframe class="video-bg"
        src="<?= $company_profile[0]['youtube_video'] ?>"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen>
    </iframe>
    <div class="row py-5 position-relative z-index-1">
        <div class="text-center text-white py-5">
            <h1>Utilizing Technology and Infrastructure</h1>
            <a href="<?= $company_profile[0]['youtube_video'] ?>" target="_blank" class="btn btn-danger rounded-0 px-3 py-2 mt-3">Know More</a>
        </div>
    </div>
</div>

<script>
    // Function to format date and time as YYYY-MM-DDTHH:MM
    function formatDateTime(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const day = String(date.getDate()).padStart(2, '0');
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0'); // Optional if not needed

        // Return formatted date and time
        return `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`;
    }

    // Get the current date and time
    const now = new Date();
    const formattedDateTime = formatDateTime(now);

    // Set the value of the datetime-local input field
    document.querySelector('input[name="contact_date"]').value = formattedDateTime;
</script>