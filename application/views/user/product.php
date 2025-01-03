<!-- Breadcrumb -->
<div class="text-white bread py-5 bg-bread">
    <div class="container py-5">
        <div class="row">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Products
                    </li>
                </ol>
            </nav>
            <h1>Our Wide Range Of Products</h1>
        </div>
    </div>
</div>

<!-- Products -->
<div class="container category">
    <div class="row py-5">
        <h5>Explore Categories</h5>
        <!-- categories -->
        <nav class="category-list pt-3">
            <div class="nav nav-tabs border-0 cat-tab" id="nav-tab" role="tablist">
                <?php foreach ($category_manage as $key => $row) { ?>
                    <button class="nav-link ms-0 me-0 <?= $key === 0 ? 'active' : '' ?> border-0" id="nav-home-tab<?= $row['category_manage_id'] ?>" data-bs-toggle="tab"
                        data-bs-target="#nav-home<?= $row['category_manage_id'] ?>" type="button" role="tab" aria-controls="nav-home<?= $row['category_manage_id'] ?>" aria-selected="<?= $key === 0 ? 'true' : 'false' ?>">
                        <div>
                            <div class="bg-white p-4 rounded-circle border border-danger product_img">
                                <img src="<?= base_url() ?>uploads/<?= $row['category_image'] ?>" width="40" alt="Product 1" class="" />
                            </div>
                            <h6 class="mt-3 text-capitalize"><?= $row['category_name'] ?></h6>
                        </div>
                    </button>
                <?php } ?>
            </div>
        </nav>
        <!-- products -->
        <div class="tab-content mt-5" id="nav-tabContent">
            <h5>Top Products For You</h5>
            <?php foreach ($category_manage as $key => $category) { ?>
                <div class="tab-pane fade <?= $key === 0 ? 'show active' : '' ?>" id="nav-home<?= $category['category_manage_id'] ?>" role="tabpanel" aria-labelledby="nav-home-tab<?= $category['category_manage_id'] ?>" tabindex="0">
                    <div class="row px-2">
                        <?php
                        $filteredProducts = array_filter($products, function ($product) use ($category) {
                            return $product['category_manage_id'] === $category['category_manage_id'];
                        });

                        if (empty($filteredProducts)) {
                            echo '<p class="text-center">No Products Found in This Category.</p>';
                        }

                        foreach ($filteredProducts as $product) { ?>
                            <div class="col-sm-6 col-lg-3 mt-4 p-2">
                                <div class="card d-flex align-items-center border border-danger h-100 w-100 cards_img position-relative rounded-0">
                                    <!-- Product Label -->
                                    <div class="hash_rating p-1">
                                        <span>
                                            <a href="<?= base_url('user/products_details/' . $product['products_id']) ?>"
                                                class="text-decoration-none text-white fw-semibold"
                                                aria-label="Product #<?= htmlspecialchars($product['products_label']) ?>">
                                                #<?= htmlspecialchars($product['products_label']) ?>
                                            </a>
                                        </span>
                                    </div>
                                    <!-- Product Image -->
                                    <div class="overflow-hidden p-3">
                                        <img src="<?= base_url('uploads/' . $product['products_image']) ?>"
                                            height="200"
                                            class="card-img-top w-auto p-4"
                                            alt="<?= htmlspecialchars($product['products_name']) ?>" />
                                    </div>
                                    <!-- Product Rating -->
                                    <div class="rating_star p-1 text-end text-white">
                                        <?php
                                        $rating = $product['rating']; // Fetch the rating value (e.g., 3 out of 5 stars)
                                        for ($i = 1; $i <= 5; $i++): ?>
                                            <?php if ($i <= $rating): ?>
                                                <i class="fa-solid fa-star"></i>
                                            <?php else: ?>
                                                <i class="fa-regular fa-star"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="card-body">
                                        <h4 class="card-title"><?= htmlspecialchars($product['products_name']) ?></h4>
                                        <p class="card-text fs-6">
                                            <?= wordwrap(strip_tags(substr($product['products_description'], 0, 100)), 100, ' ') . '...' ?>
                                        </p>
                                        <div class="w-100">
                                            <a href="<?= base_url('user/products_details/' . $product['products_id']) ?>"
                                                class="btn btn-outline-danger w-100 py-2 fw-semibold">
                                                View Product
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>