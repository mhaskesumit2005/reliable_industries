<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Update Product's</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/update_products" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="products_id" value="<?= $products[0]['products_id'] ?>">
                    <div class="row">
                        <h6>Product Details</h6>
                        <hr>
                        <div class="col-md-6 mb-3">
                            <label for="category_manage_id" class="form-label">Category <span class="text-danger">*</span></label>
                            <select name="category_manage_id" id="category_manage_id" class="form-control">
                                <option value="" disabled>Choose Category</option>
                                <?php foreach ($category_manage as $row) { ?>
                                    <option value="<?= $row['category_manage_id'] ?>"
                                        <?= isset($products[0]['category_manage_id']) && $row['category_manage_id'] == $products[0]['category_manage_id'] ? 'selected' : ' ' ?>>
                                        <?= $row['category_name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <input type="hidden" name="products_id" value="<?= $products[0]['products_id'] ?>">
                            <label for="sub_category" class="form-label">Sub Category <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="sub_category" id="sub_category" placeholder="Enter Sub Category" value="<?= $products[0]['sub_category'] ?>" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="products_name" class="form-label">Enter Product's Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="products_name" id="products_name" placeholder="Enter Product's Name" value="<?= $products[0]['products_name'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rating" class="form-label">Select Rating Star: <span class="text-danger">*</span></label>
                            <?php for ($i = 5; $i >= 1; $i--): ?>
                                <input type="radio" id="star<?= $i ?>" name="rating" value="<?= $i ?>"
                                    <?php echo ($i == $products[0]['rating']) ? 'checked' : ''; ?> class="" required />
                                <label for="star<?= $i ?>" class="fa-solid fa-star fs-4 me-1 text-warning"></label>
                            <?php endfor; ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="products_label" class="form-label">Enter Product's Label <span class="text-danger">*</span></label>
                            <select name="products_label" id="products_label" class="form-control" required>
                                <option value="" disabled selected>Choose Label</option>
                                <option value="Top Rated" <?php echo ($products[0]['products_label'] == 'Top Rated') ? 'selected' : ''; ?>>Top Rated</option>
                                <option value="New" <?php echo ($products[0]['products_label'] == 'New') ? 'selected' : ''; ?>>New</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="products_description" class="form-label">Enter Product's Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="products_description" id="editor" placeholder="Enter Product's Description"><?= $products[0]['products_description'] ?></textarea>
                        </div>
                        <h6>Product Images</h6>
                        <hr>
                        <div class="col-md-4 mb-3">
                            <label for="products_image" class="form-label">Select Main Product's Image <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="products_image" id="products_image" accept="image/*" />
                        </div>
                        <div class="col-md-2 mb-3">
                            <img src="<?= base_url() ?>uploads/<?= $products[0]['products_image'] ?>" width="100" class="border border-5" alt="">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="products_image1" class="form-label">Select Additional Image 1</label>
                            <input class="form-control" type="file" name="products_image1" id="products_image1" accept="image/*" />
                        </div>
                        <div class="col-md-2 mb-3">
                            <img src="<?= base_url() ?>uploads/<?= $products[0]['products_image1'] ?>" width="100" class="border border-5" alt="">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="products_image2" class="form-label">Select Additional Image 2</label>
                            <input class="form-control" type="file" name="products_image2" id="products_image2" accept="image/*" />
                        </div>
                        <div class="col-md-2 mb-3">
                            <img src="<?= base_url() ?>uploads/<?= $products[0]['products_image2'] ?>" width="100" class="border border-5" alt="">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="products_image3" class="form-label">Select Additional Image 3</label>
                            <input class="form-control" type="file" name="products_image3" id="products_image3" accept="image/*" />
                        </div>
                        <div class="col-md-2 mb-3">
                            <img src="<?= base_url() ?>uploads/<?= $products[0]['products_image3'] ?>" width="100" class="border border-5" alt="">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="products_image4" class="form-label">Select Additional Image 4</label>
                            <input class="form-control" type="file" name="products_image4" id="products_image4" accept="image/*" />
                        </div>
                        <div class="col-md-2 mb-3">
                            <img src="<?= base_url() ?>uploads/<?= $products[0]['products_image4'] ?>" width="100" class="border border-5" alt="">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="products_image5" class="form-label">Select Additional Image 5</label>
                            <input class="form-control" type="file" name="products_image5" id="products_image5" accept="image/*" />
                        </div>
                        <div class="col-md-2 mb-3">
                            <img src="<?= base_url() ?>uploads/<?= $products[0]['products_image5'] ?>" width="100" class="border border-5" alt="">
                        </div>

                        <h6>Product Specifications</h6>
                        <hr>
                        <div class="row align-items-center" id="dynamicFields">
                            <!-- Loop through existing specifications -->
                            <?php if (!empty($specifications)): ?>
                                <?php foreach ($specifications as $key => $spec): ?>
                                    <div class="row align-items-center mb-2" id="specRow<?= $key + 1 ?>">
                                        <div class="col-md-5 mb-3">
                                            <label for="SpecificationTitle<?= $key + 1 ?>" class="form-label">Enter Specification Title <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="specification_title[]" id="SpecificationTitle<?= $key + 1 ?>" placeholder="Enter Specification Title" value="<?= $spec['specification_title'] ?>" required />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="SpecificationDescription<?= $key + 1 ?>" class="form-label">Enter Specification Description <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="specification_description[]" id="SpecificationDescription<?= $key + 1 ?>" placeholder="Enter Specification Description" value="<?= $spec['specification_description'] ?>" required />
                                        </div>
                                        <div class="col-md-1" style="margin-top: 5px;">
                                            <button type="button" class="btn btn-danger remove-field" data-row-id="specRow<?= $key + 1 ?>">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-12 text-center mt-4">
                            <button type="button" class="btn btn-dark add-field">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Update Product's</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let fieldCounter = <?= !empty($specifications) ? count($specifications) : 0 ?>; // Start counter from the last specification ID or 0

        document.querySelector(".add-field").addEventListener("click", function() {
            fieldCounter++;

            const newFieldHTML = `
                <div class="row align-items-center mb-2" id="specRow${fieldCounter}">
                    <div class="col-md-5 mb-3">
                        <label for="SpecificationTitle${fieldCounter}" class="form-label">Enter Specification Title <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="specification_title[]" id="SpecificationTitle${fieldCounter}" placeholder="Enter Specification Title" required />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="SpecificationDescription${fieldCounter}" class="form-label">Enter Specification Description <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="specification_description[]" id="SpecificationDescription${fieldCounter}" placeholder="Enter Specification Description" required />
                    </div>
                    <div class="col-md-1" style="margin-top: 5px;">
                        <button type="button" class="btn btn-danger remove-field" data-row-id="specRow${fieldCounter}">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
            `;

            document.querySelector("#dynamicFields").insertAdjacentHTML("beforeend", newFieldHTML);
        });

        document.querySelector("#dynamicFields").addEventListener("click", function(e) {
            if (e.target.closest(".remove-field")) {
                const rowId = e.target.closest(".remove-field").getAttribute("data-row-id");
                document.getElementById(rowId).remove();
            }
        });
    });
</script>