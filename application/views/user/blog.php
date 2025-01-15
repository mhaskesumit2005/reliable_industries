<style>
    .pagination {
        padding: 10px 0;
        margin: 0;
        display: flex;
        justify-content: center;
        list-style: none;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-link {
        padding: 8px 15px;
        font-size: 14px;
        color: #333;
        /* Link Color */
        text-decoration: none;
        border: 1px solid #ddd;
        border-radius: 30px;
        /* Circular Button Style */
        background-color: #f8f9fa;
        transition: all 0.3s ease-in-out;
    }

    .pagination .page-link:hover {
        background-color: #343a40;
        /* Hover Background */
        color: #fff;
        /* Hover Text Color */
        text-decoration: none;
        border-color: #343a40;
    }

    .pagination .page-item.active .page-link {
        background-color: #fe0000;
        /* Active Background Color */
        color: #fff;
        /* Active Text Color */
        border-color: #fe0000;
        /* Active Border */
    }

    .pagination .page-item.disabled .page-link {
        background-color: #e9ecef;
        /* Disabled Background */
        color: #6c757d;
        /* Disabled Text */
        pointer-events: none;
        /* No Interaction */
        border-color: #ddd;
    }
</style>

<!-- Breadcrumb -->
<div class="text-white bread py-5 bg-bread">
    <div class="container py-5">
        <div class="row">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Blog & News</li>
                </ol>
            </nav>
            <h1>Latest News</h1>
        </div>
    </div>
</div>

<!-- blog -->
<div class="container blog">
    <div class="row py-5">
        <div class="col-md-8 col-12">
            <?php if (!empty($blogs)) : ?>
                <?php foreach ($blogs as $row) : ?>
                    <div class="card rounded-0 border-0 mt-4">
                        <div class="img-container overflow-hidden rounded-0">
                            <img src="<?= base_url() ?>uploads/<?= $row['blog_image'] ?>" class="card-img-top rounded-0" alt="Blog Image">
                        </div>
                        <div class="card-body">
                            <small>
                                <i class="fa-solid fa-layer-group text-red me-2"></i><?= $row['blog_category'] ?>
                                <span><i class="ms-3 fa-solid text-red fa-calendar-days me-2"></i><?= date('F j, Y', strtotime($row['blog_date'])) ?></span>
                            </small>
                            <hr class="my-2">
                            <h5 class="card-title"><?= htmlspecialchars($row['blog_title']) ?></h5>
                            <p class="card-text read_blog">
                                <?= htmlspecialchars(substr(strip_tags($row['blog_description']), 0, 500)) ?>...
                            </p>
                            <a href="<?= base_url() ?>user/blog_details/<?= $row['blog_id'] ?>" class="btn btn-danger rounded-0 px-3 py-2">Click Here</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No blogs found.</p>
            <?php endif; ?>

            <!-- Pagination -->
            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                <?= $pagination ?>
            </nav>
        </div>

        <div class="col-md-4 d-none d-sm-block">

            <!-- recent blogs -->
            <div class="shadow p-4 mt-4">
                <h5 class="mb-2">Recent Blogs</h5>
                <hr class="mt-0">

                <!-- Ensure that $recent_blogs is defined and contains multiple blogs -->
                <?php
                // Check if $recent_blogs is an array and contains multiple items before trying to sort
                if (isset($recent_blogs) && is_array($recent_blogs) && !empty($recent_blogs)) {
                    // Sort the $recent_blogs array by 'blog_date' in descending order
                    usort($recent_blogs, function ($a, $b) {
                        return strtotime($b['blog_date']) - strtotime($a['blog_date']);
                    });

                    // Limit the array to the first 3 recent blog posts
                    $recent_blogs = array_slice($recent_blogs, 0, 3);
                } else {
                    echo "<p>No recent blogs available.</p>";
                }
                ?>

                <?php foreach ($recent_blogs as $row): ?>
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
<!-- paginagtion javascript  -->
<script>
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        fetchBlogData(url);
    });

    function fetchBlogData(url) {
        $.ajax({
            url: url,
            method: "GET",
            beforeSend: function() {
                $('#blogContainer').html('<p>Loading...</p>');
            },
            success: function(data) {
                $('#blogContainer').html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>