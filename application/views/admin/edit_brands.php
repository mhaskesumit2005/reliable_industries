<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Update Trusted By Leading Brands</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/update_trusted_brands" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <input type="hidden" name="trusted_brands_id" value="<?= $trusted_brands[0]['trusted_brands_id'] ?>">
                            <label for="brands_image" class="form-label">Select Brands Image (SIZE 512 x 512 )<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="brands_image" id="brands_image" accept="image/*" required>
                        </div>
                        <div class="col-md-2 mb-2">
                            <img class="border border-5" src="<?= base_url() ?>uploads/<?= $trusted_brands[0]['brands_image'] ?>" width="100" class="border-5" alt="<?= base_url() ?>uploads/<?= $trusted_brands[0]['brands_image'] ?>">
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Update Brands</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>