<style>
    /* Scope to the product-detail-tabs */

    .product-detail-tabs .nav-link.active {
        border-bottom: 2px solid red !important;
    }

    .product-detail-tabs .nav-link {
        color: #000 !important;
    }

    .product-detail-tabs .nav-link:hover {
        color: #000;
    }

    /* image gallery */
    .product-gallery {
        width: 80%;
        margin: auto;
    }

    .product-gallery .main-image {
        border: 1px solid #e2e2e2;
        padding: 20px 0px;
    }

    .main-image img {
        width: 100%;
        height: 200px;
        object-fit: contain;
        border-radius: 10px;
    }

    .thumbnail-gallery {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .thumbnail {
        width: 18%;
        height: 18%;
        object-fit: cover;
        margin: 0 5px;
        border: 2px solid transparent;
        border-radius: 5px;
        cursor: pointer;
    }

    .thumbnail:hover,
    .thumbnail.active {
        border-color: #ff0000;
    }

    /* Product Details page css end */
</style>
<div class="card py-5 px-5">
    <div class="row">
        <h5 class="card-header">Product's Details</h5>
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
                <small>Home > Products > Pouch > Aluminium Foil > <?= $products[0]['products_name'] ?></small>
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