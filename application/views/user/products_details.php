<!-- Breadcrumb -->
<div class="text-white bread py-5 bg-bread">
    <div class="container py-5">
        <div class="row">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>user/product">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Product Details
                    </li>
                </ol>
            </nav>
            <h1><?= $products[0]['products_name'] ?></h1>
        </div>
    </div>
</div>


<div class="container py-5">
    <div class="row">
        <div class="col-md-6 col-12 mt-4">
            <div class="product-gallery">
                <div class="main-image">
                    <img id="displayed-image" src="<?= base_url() ?>uploads/<?= $products[0]['products_image'] ?>" alt="Main Product Image">
                </div>
                <div class="thumbnail-gallery">
                    <img class="thumbnail active" src="<?= base_url() ?>uploads/<?= $products[0]['products_image1'] ?>" alt="Hoodie 1" onclick="changeImage('<?= base_url() ?>uploads/<?= $products[0]['products_image1'] ?>')">
                    <img class="thumbnail" src="<?= base_url() ?>uploads/<?= $products[0]['products_image2'] ?>" alt="Hoodie 2" onclick="changeImage('<?= base_url() ?>uploads/<?= $products[0]['products_image2'] ?>')">
                    <img class="thumbnail" src="<?= base_url() ?>uploads/<?= $products[0]['products_image3'] ?>" alt="Hoodie 3" onclick="changeImage('<?= base_url() ?>uploads/<?= $products[0]['products_image3'] ?>')">
                    <img class="thumbnail" src="<?= base_url() ?>uploads/<?= $products[0]['products_image4'] ?>" alt="Hoodie 4" onclick="changeImage('<?= base_url() ?>uploads/<?= $products[0]['products_image4'] ?>')">
                    <img class="thumbnail" src="<?= base_url() ?>uploads/<?= $products[0]['products_image5'] ?>" alt="Hoodie 4" onclick="changeImage('<?= base_url() ?>uploads/<?= $products[0]['products_image5'] ?>')">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 mt-4">
            <div>
            <small>Home > Products > <?= $products[0]['category_manage_id'] ?> > <?= $products[0]['sub_category'] ?> > <?= $products[0]['products_name'] ?></small>
                <h2><?= $products[0]['products_name'] ?></h2>
                <div class="text-start d-flex align-items-center">
                    <mark>
                        <?php
                        $rating = $products[0]['rating']; // Fetch the rating value (e.g., 3 out of 5 stars)
                        for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($i <= $rating): ?>
                                <!-- Solid Star for Ratings Equal or Less than Current Value -->
                                <i class="fa-solid fa-star text-danger"></i>
                            <?php else: ?>
                                <!-- Empty Star for Remaining Stars -->
                                <i class="fa-regular fa-star text-danger"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </mark>
                </div>
                <p class="py-2 text-truncate"><?= wordwrap(strip_tags(substr($products[0]['products_description'], 0, 100)), 100, ' ') . '...' ?></p>
            </div>
            <div class="card card-body rounded-0  overflow-hidden product-detail-tabs">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                                <button class="nav-link border-0 active" id="nav-home-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab"
                                    aria-controls="nav-home" aria-selected="true">Description</button>
                                <button class="nav-link border-0" id="nav-profile-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab"
                                    aria-controls="nav-profile" aria-selected="false">Specification</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active pt-3" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab" tabindex="0">
                                <p><?= $products[0]['products_description'] ?></p>
                            </div>
                            <div class="tab-pane pt-3 fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab" tabindex="0">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <?php foreach ($specifications as $key => $row) { ?>
                                            <tr>
                                                <td style="font-weight: bold;"><?= $row['specification_title'] ?></td>
                                                <td><?= $row['specification_description'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Related Products -->
    <div class="row px-2">
        <h5>Related Products</h5>

        <?php if (empty($related_products)) { ?>
            <!-- Message when no related products are found -->
            <div class="col-12 text-center">
                <p>No Related Products Found.</p>
            </div>
        <?php } else { ?>
            <!-- Loop through the related products -->
            <?php foreach ($related_products as $related) { ?>
                <div class="col-sm-6 col-lg-3 mt-4 p-2">
                    <div class="card d-flex align-items-center border border-danger h-100 w-100 cards_img position-relative rounded-0">
                        <!-- Product Label -->
                        <div class="hash_rating p-1">
                            <span>
                                <a href="<?= base_url('user/products_details/' . $related['products_id']) ?>"
                                    class="text-decoration-none text-white fw-semibold"
                                    aria-label="Product #<?= $related['products_label'] ?>">
                                    #<?= htmlspecialchars($related['products_label']) ?>
                                </a>
                            </span>
                        </div>

                        <!-- Product Image -->
                        <div class="overflow-hidden p-3">
                            <img src="<?= base_url('uploads/' . $related['products_image']) ?>"
                                height="200"
                                class="card-img-top w-auto p-4"
                                alt="<?= htmlspecialchars($related['products_name']) ?>" />
                        </div>

                        <!-- Product Rating -->
                        <div class="rating_star p-1 text-end text-white">
                            <?php
                            $rating = $related['rating']; // Fetch the rating value (e.g., 3 out of 5 stars)
                            for ($i = 1; $i <= 5; $i++): ?>
                                <?php if ($i <= $rating): ?>
                                    <!-- Solid Star for Ratings Equal or Less than Current Value -->
                                    <i class="fa-solid fa-star"></i>
                                <?php else: ?>
                                    <!-- Empty Star for Remaining Stars -->
                                    <i class="fa-regular fa-star"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>

                        <!-- Product Info -->
                        <div class="card-body">
                            <h4 class="card-title"><?= htmlspecialchars($related['products_name']) ?></h4>
                            <p class="card-text fs-6">
                                <?= wordwrap(strip_tags(substr($related['products_description'], 0, 100)), 100, ' ') . '...' ?>
                            </p>
                            <div class="w-100">
                                <a href="<?= base_url('user/products_details/' . $related['products_id']) ?>"
                                    class="btn btn-outline-danger w-100 py-2 fw-semibold">
                                    View Product
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>