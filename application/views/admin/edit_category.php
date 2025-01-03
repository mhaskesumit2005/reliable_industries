<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Update Category</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/update_category" method="post" enctype="multipart/form-data">
                    <input class="form-control" type="hidden" name="category_manage_id" id="category_manage_id" value="<?= $category_manage[0]['category_manage_id'] ?>" />
                    <div class="row">
                        <div class="col-md-6">
                            <label for="category_name" class="form-label">Category Name<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="category_name" id="category_name" placeholder="Category Name" value="<?= $category_manage[0]['category_name'] ?>" />
                        </div>
                        <div class="col-md-4">
                            <label for="categoryImage" class="form-label">Category Image<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="category_image" id="categoryImage" accept="*/image" />
                        </div>
                        <div class="col-md-2">
                            <img src="<?= base_url() ?>uploads/<?= $category_manage[0]['category_image'] ?>" class="border border-5" width="100" alt="">
                        </div>
                        <div class="col-md-12 text-center  mt-5">
                            <button class="btn btn-primary">Update Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>