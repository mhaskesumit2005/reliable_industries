<!-- Footer Start -->
<div class="container-fluid  bg-black footer wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-3 social">
                <p class="section-title text-white h5 mb-4">Head Office<span></span></p>
                <p><i class="fa fa-map-marker-alt me-3"></i><?= $company_profile[0]['company_address'] ?></p>
                <a href="callto:+91 <?= $company_profile[0]['alter_company_phone'] ?>">
                    <p><i class="fa fa-phone-alt me-3"></i>+91 <?= $company_profile[0]['alter_company_phone'] ?></p>
                </a>
                <a href="mailto:<?= $company_profile[0]['company_email'] ?>">
                    <p><i class="fa fa-envelope me-3"></i><?= $company_profile[0]['company_email'] ?></p>
                </a>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" target="_blank" href="<?= $company_profile[0]['social_media1'] ?>"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="<?= $company_profile[0]['social_media2'] ?>"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="<?= $company_profile[0]['social_media3'] ?>"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="<?= $company_profile[0]['social_media4'] ?>"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <p class="section-title text-white h5 mb-4">Pages<span></span></p>
                <a class="btn btn-link" href="<?= base_url() ?>user/about">About Us</a>
                <a class="btn btn-link" href="<?= base_url() ?>user/product">Products</a>
                <a class="btn btn-link" href="<?= base_url() ?>user/blog">Blog</a>
                <a class="btn btn-link" href="<?= base_url() ?>user/contact">Contact</a>
            </div>
            <div class="col-md-6 col-lg-3">
                <p class="section-title text-white h5 mb-4">Quick Link<span></span></p>
                <a class="btn btn-link" href="<?= base_url() ?>user/enquiry">Enquiry</a>
                <a class="btn btn-link" href="<?= base_url() ?>user/privacy_policy">Privacy Policy</a>
                <a class="btn btn-link" href="<?= base_url() ?>user/faq">FAQ's</a>
            </div>
            <div class="col-md-6 col-lg-3 newsletter">
                <p class="section-title text-white h5 mb-4">Newsletter<span></span></p>
                <p class="text-white">Join our newsletter and never miss an update!</p>
                <div class="position-relative w-100 mt-3">
                    <!-- Display SweetAlert messages if they exist -->
                    <?php if ($this->session->flashdata('alert_type') && $this->session->flashdata('alert_message')): ?>
                        <script>
                            Swal.fire({
                                icon: '<?= $this->session->flashdata('alert_type'); ?>', // 'success', 'warning', or 'error'
                                title: '<?= $this->session->flashdata('alert_message'); ?>',
                                showConfirmButton: true,
                                timer: 3000 // Auto-close after 3 seconds (optional)
                            });
                        </script>
                    <?php endif; ?>

                    <!-- Your newsletter form -->
                    <form action="<?= base_url() ?>user/newsletter" method="post">
                        <input type="hidden" name="newsletter_date" id="newsletter_date">
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" name="email" type="email" placeholder="Example@email.xxx" style="height: 48px;" required>
                        <button class="btn shadow-none border-0 position-absolute top-0 end-0 mt-1 me-2" id="subscribe"><i class="fa fa-paper-plane text-red fs-4"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-lg-5">
        <div class="copyright">
            <div class="row">
                <div class="col-md-7 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="" href="<?= base_url() ?>"><?= $admin_account[0]['admin_organization'] ?></a> <script>
                            document.write(new Date().getFullYear());
                            </script>, All Right Reserved.
                    Designed & Developed By <a class="" target="_blank" href="https://a2zithub.org/"><?= $admin_account[1]['admin_organization'] ?></a>
                </div>
                <div class="col-md-5 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="<?= base_url() ?>">Home</a>
                        <a href="<?= base_url() ?>user/privacy_policy">Privacy Policy</a>
                        <a href="<?= base_url() ?>user/faq">FQA's</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll to Top Button -->
<!-- <div> -->
<i class="fa-solid fa-angle-up btn-scroll" onclick="scrollToTop()" id="scrollTopBtn"></i>
<!-- </div> -->
<a href="https://wa.me/+91<?= $company_profile[0]['company_phone'] ?>/" target="_blank" id="wpBtn">
    <img src="<?= base_url() ?>assets/user_assets/images/whatsapp-icon.svg" width="35" alt="">
</a>

<!-- Bootstrap CDN 5.3.3 -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>

<!-- AOS animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- fontawesome icons kit cdn -->
<script src="https://kit.fontawesome.com/e6b0e2e79d.js" crossorigin="anonymous"></script>

<!-- swiper js cdn -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- external js -->
<script src="<?= base_url() ?>assets/user_assets/js/alert.js"></script>
<script src="<?= base_url() ?>assets/user_assets/js/counter.js"></script>
<script src="<?= base_url() ?>assets/user_assets/js/imggallery.js"></script>
<script src="<?= base_url() ?>assets/user_assets/js/imggallery.js"></script>
<script src="<?= base_url() ?>assets/user_assets/js/navbar.js"></script>
<script src="<?= base_url() ?>assets/user_assets/js/product_details.js"></script>
<script src="<?= base_url() ?>assets/user_assets/js/review.js"></script>
<script src="<?= base_url() ?>assets/user_assets/js/scrolltop.js"></script>
<script src="<?= base_url() ?>assets/user_assets/js/swiper.js"></script>
<script src="<?= base_url() ?>assets/user_assets/js/units.js"></script>

<!-- ck editor read blog js  -->

<script>
    // Alert for Subscription
    $(document).on('submit', 'form[action="<?= base_url() ?>user/newsletter"]', function(e) {
        e.preventDefault(); // Prevent default form submission

        // Display SweetAlert Success Message
        swal({
            icon: 'success', // SweetAlert v2 style
            title: 'Thank you for subscribing!',
            text: 'You have successfully subscribed to our newsletter.',
        });
    });
</script>


<script>
    document.querySelectorAll('.read_blog').forEach(blog => {
        const originalHTML = blog.innerHTML; // CKEditor-generated content
        const strippedText = blog.textContent.substring(0, 350) + '...'; // Strip to text safely
        blog.innerHTML = strippedText; // Replace with plain text
    });
</script>

<script>
    document.getElementById('download-btn').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default link behavior
        const fileUrl = this.href;

        // Trigger a download
        const a = document.createElement('a');
        a.href = fileUrl;
        a.download = ''; // This will force the browser to download the file
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });
</script>

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
    document.querySelector('input[name="enquiry_date"]').value = formattedDateTime;
</script>


<script>
    document.getElementById('newsletter_date').value = new Date().toISOString().split('T')[0]
</script>

<script>
    // Sample visitor count and percentage change
    let visitorCount = 0;
    let previousVisitorCount = 0; // Initialize with the previous count for comparison

    // Example function to simulate fetching visitor count
    function updateVisitorStats() {
        // Here you can replace with an actual API call
        visitorCount = Math.floor(Math.random() * 1000); // Simulating random visitor count

        // Calculate the percentage change in visitors
        let changePercentage = previousVisitorCount === 0 ? 0 : ((visitorCount - previousVisitorCount) / previousVisitorCount) * 100;

        // Update the DOM elements with the fetched data
        document.getElementById('visitor-count').textContent = visitorCount;
        document.getElementById('visitor-percentage').innerHTML = `<i class="bx bx-up-arrow-alt"></i> ${changePercentage.toFixed(2)}%`;

        // Save the new count for the next comparison
        previousVisitorCount = visitorCount;
    }

    // Call the update function every 10 seconds
    setInterval(updateVisitorStats, 10000);

    // Initial call to display the visitor stats
    updateVisitorStats();
</script>

<script>
    // preloader
    var loader = document.getElementById('preloader');
    window.addEventListener('load', function() {
        loader.style.display = 'none';
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all nav-links
        const navLinks = document.querySelectorAll('.navbar-nav .nav-item .nav-link');

        // Get the current URL
        const currentUrl = window.location.href;

        // Iterate through each nav-link
        navLinks.forEach(navLink => {
            const linkHref = navLink.getAttribute('href');

            // Check if the current URL matches the nav-link href
            if (currentUrl === linkHref || currentUrl.startsWith(linkHref)) {
                // Add 'active' class to the parent <li> element
                navLink.parentElement.classList.add('active');
            } else {
                // Remove 'active' class if it exists
                navLink.parentElement.classList.remove('active');
            }
        });
    });
</script>

</body>

</html>