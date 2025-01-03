<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Product's</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_products" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <h6>Product Details</h6>
                        <hr>
                        <div class="col-md-6 mb-3">
                            <label for="category_manage_id" class="form-label">Category <span class="text-danger">*</span></label>
                            <select name="category_manage_id" id="category_manage_id" class="form-control">
                                <option value="" disabled selected>Choose Category</option>
                                <?php foreach ($category_manage as $key => $row) { ?>
                                    <option value="<?= $row['category_manage_id'] ?>"><?= $row['category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sub_category" class="form-label">Sub Category <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="sub_category" id="sub_category" placeholder="Enter Sub Category" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="products_name" class="form-label">Enter Product's Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="products_name" id="products_name" placeholder="Enter Product's Name" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rating" class="form-label">Select Rating Star: <span class="text-danger">*</span></label>
                            <?php for ($i = 5; $i >= 1; $i--): ?>
                                <input type="radio" id="star<?= $i ?>" name="rating" value="<?= $i ?>" class="" required />
                                <label for="star<?= $i ?>" class="fa-solid fa-star fs-4 me-1 text-warning"></label>
                            <?php endfor; ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="products_label" class="form-label">Enter Product's Label <span class="text-danger">*</span></label>
                            <select name="products_label" id="products_label" class="form-control" required>
                                <option value="" disabled selected>Choose Label</option>
                                <option value="Top Rated">Top Rated</option>
                                <option value="New">New</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="products_description" class="form-label">Enter Product's Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="products_description" id="editor" placeholder="Enter Product's Description"></textarea>
                        </div>
                        <h6>Product Images</h6>
                        <hr>
                        <div class="col-md-6 mb-3">
                            <label for="products_image" class="form-label">Select Main Product's Image <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="products_image" id="products_image" accept="image/*" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="products_image1" class="form-label">Select Additional Image 1</label>
                            <input class="form-control" type="file" name="products_image1" id="products_image1" accept="image/*" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="products_image2" class="form-label">Select Additional Image 2</label>
                            <input class="form-control" type="file" name="products_image2" id="products_image2" accept="image/*" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="products_image3" class="form-label">Select Additional Image 3</label>
                            <input class="form-control" type="file" name="products_image3" id="products_image3" accept="image/*" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="products_image4" class="form-label">Select Additional Image 4</label>
                            <input class="form-control" type="file" name="products_image4" id="products_image4" accept="image/*" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="products_image5" class="form-label">Select Additional Image 5</label>
                            <input class="form-control" type="file" name="products_image5" id="products_image5" accept="image/*" required />
                        </div>

                        <h6>Product Specifications</h6>
                        <hr>
                        <div class="row align-items-center" id="dynamicFields">
                            <div class="col-md-5 mb-3">
                                <label for="SpecificationTitle1" class="form-label">Enter Specification Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="specification_title[]" id="SpecificationTitle1" placeholder="Enter Specification Title" required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="SpecificationDescription1" class="form-label">Enter Specification Description <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="specification_description[]" id="SpecificationDescription1" placeholder="Enter Specification Description" required />
                            </div>
                            <div class="col-md-1" style="margin-top:10px">
                                <button type="button" class="btn btn-dark add-field">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Product's</button>
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
        let fieldCounter = 1;

        document.querySelector("#dynamicFields").addEventListener("click", function(e) {
            if (e.target.closest(".add-field")) {
                fieldCounter++;
                // The new dynamic row to append
                const newFieldHTML = `
                <div class="row align-items-center mt-2" id="row${fieldCounter}">
                    <div class="col-md-5 mb-3">
                        <input class="form-control" type="text" name="specification_title[]" placeholder="Enter Specification Title" required />
                    </div>
                    <div class="col-md-6 mb-3">
                        <input class="form-control" type="text" name="specification_description[]" placeholder="Enter Specification Description" required />
                    </div>
                    <div class="col-md-1" style="margin-top:-10px">
                        <button type="button" class="btn btn-danger remove-field" data-row-id="row${fieldCounter}">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>`;

                // Append the new field
                document.querySelector("#dynamicFields").insertAdjacentHTML("beforeend", newFieldHTML);
            }

            if (e.target.closest(".remove-field")) {
                const rowId = e.target.closest(".remove-field").getAttribute("data-row-id");
                document.getElementById(rowId).remove();
            }
        });
    });
</script>