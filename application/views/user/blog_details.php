<!-- Breadcrumb -->
<div class="text-white bread py-5 bg-bread">
    <div class="container py-5">
        <div class="row">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>user/blog">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                </ol>
            </nav>
            <h1><?= $blog[0]['blog_title'] ?></h1>
        </div>
    </div>
</div>

<!-- blog Details -->
<div class="container blog">
    <div class="row py-5">
        <div class="col-md-8 col-12">
            <?php if (is_array($blog) && !empty($blog)): ?>
                <div class="card rounded-0 border-0 mt-4">
                    <div class="img-container overflow-hidden rounded-0">
                        <!-- Ensure blog data exists before trying to display it -->
                        <?php if (isset($blog[0]['blog_image'])): ?>
                            <img src="<?= base_url() ?>uploads/<?= $blog[0]['blog_image'] ?>" class="card-img-top rounded-0" alt="...">
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <small><i class="fa-solid fa-layer-group text-red me-2"></i><?= $blog[0]['blog_category'] ?> <span><i
                                    class="ms-3 fa-solid text-red fa-calendar-days me-2"></i><?= date('F j, Y', strtotime($blog[0]['blog_date'])) ?></span></small>
                        <hr class="my-2">
                        <h3 class="card-title mt-3"><?= $blog[0]['blog_title'] ?></h3>
                        <p class="card-text"><?= $blog[0]['blog_description'] ?></p>
                        <hr>
                        <h5 class="text-red">Share on social media</h5>
                        <a class="me-2" href="https://api.whatsapp.com/send?text=Check%20out%20this%20blog%20from%20Reliable%20<?= base_url() ?>user/blog_details/<?= $blog[0]['blog_id'] ?>" target="_blank" style="text-decoration: none;">
                            <i class="fa-brands fa-square-whatsapp" style="font-size: 30px; color: #25D366;"></i>
                        </a>
                        <a class="me-2" href="https://www.facebook.com/sharer/sharer.php?u=https://a2zithub.org/reliable_industries/user/blog_details/<?= $blog[0]['blog_id'] ?>" target="_blank">
                            <i class="fa-brands fa-square-facebook" style="font-size: 30px; color: #0866ff;"></i>
                        </a>
                        <a class="me-2" href="https://t.me/share/url?url=https://a2zithub.org/reliable_industries/user/blog_details/<?= $blog[0]['blog_id'] ?>&text=Check%20out%20this%20blog%20from%20Reliable%20" target="_blank" style="text-decoration: none;">
                            <i class="fa-brands fa-telegram" style="font-size: 30px; color: #00a8e5;"></i>
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <p>No blog details found.</p>
            <?php endif; ?>


            <!-- Related Blogs -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-red mt-4">Related Blogs</h2>
                </div>
                <div class="row">
                    <?php if (!empty($related_blogs)): ?>
                        <?php foreach ($related_blogs as $blog): ?>
                            <div class="col-md-6 col-12">
                                <div class="card rounded-0 border-0 mt-4">
                                    <div class="img-container overflow-hidden rounded-0">
                                        <img src="<?= base_url('uploads/' . htmlspecialchars($blog['blog_image'])) ?>" class="card-img-top rounded-0" alt="<?= htmlspecialchars($blog['image_description']) ?>">
                                    </div>
                                    <div class="card-body">
                                        <small>
                                            <i class="fa-solid fa-layer-group text-red me-2"></i><?= htmlspecialchars($blog['blog_category']) ?>
                                            <span><i class="ms-3 fa-solid text-red fa-calendar-days me-2"></i><?= date('F j, Y', strtotime($blog['blog_date'])) ?></span>
                                        </small>
                                        <hr class="my-2">
                                        <h5 class="card-title"><?= htmlspecialchars($blog['blog_title']) ?></h5>
                                        <p class="card-text"><?= substr(strip_tags($blog['blog_description']), 0, 200) . '...'; ?></p>
                                        <a href="<?= base_url('user/blog_details/' . $blog['blog_id']) ?>" class="btn btn-danger rounded-0 px-3 py-2">click here</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No related blogs found.</p>
                    <?php endif; ?>
                </div>

            </div>


        </div>
        <div class="col-md-4 d-none d-sm-block">
            <!-- Recent Blogs Section -->
            <div class="shadow p-4 mt-4">
                <h5 class="mb-2">Related Blogs</h5>
                <hr class="mt-0">

                <?php
                // Ensure that $related_blogs is an array and not empty
                if (is_array($related_blogs) && !empty($related_blogs)) {
                    // Sort the related blogs array by 'blog_date' in descending order
                    usort($related_blogs, function ($a, $b) {
                        return strtotime($b['blog_date']) - strtotime($a['blog_date']);
                    });

                    // Limit the array to the first 3 related blogs
                    $related_blogs = array_slice($related_blogs, 0, 3);
                } else {
                    echo "<p>No related blogs available.</p>";  // Gracefully handle if no related blogs are found
                }
                ?>

                <?php foreach ($related_blogs as $row): ?>
                    <div class="row border border-light mx-0 my-2">
                        <div class="col-md-4 col-4 p-0 img-container overflow-hidden">
                            <?php
                            // Check if the image exists or use a default image
                            $imageUrl = isset($row['blog_image']) && !empty($row['blog_image']) ? base_url() . "uploads/" . $row['blog_image'] : base_url() . "assets/default-image.jpg";
                            ?>
                            <img src="<?= $imageUrl ?>" class="w-100 h-auto card-img-top" alt="<?= htmlspecialchars($row['blog_title']) ?>">
                        </div>
                        <div class="col-md-8 col-8">
                            <small class="text-muted"><?= date('F j, Y', strtotime($row['blog_date'])) ?></small>
                            <a href="<?= base_url() ?>user/blog_details/<?= $row['blog_id'] ?>">
                                <p class="fw-semibold text-dark read_blog"><?= htmlspecialchars($row['blog_title']) ?></p>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


            <!-- category -->
            <div class="shadow p-4 mt-4">
                <h5 class="mb-2">Category</h5>
                <hr class="mt-0">
                <div class="cat">
                    <button class="btn btn-cat rounded-0 btn-sm me-2 mb-2">Industry</button>
                    <button class="btn btn-cat rounded-0 btn-sm me-2 mb-2">Achivement</button>
                    <button class="btn btn-cat rounded-0 btn-sm me-2 mb-2">Technology</button>
                    <button class="btn btn-cat rounded-0 btn-sm me-2 mb-2">Reliable</button>
                    <button class="btn btn-cat rounded-0 btn-sm me-2 mb-2">Other</button>
                </div>
            </div>
        </div>
    </div>
</div>