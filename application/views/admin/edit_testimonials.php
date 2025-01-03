<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Update Testimonials</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/update_testimonials" method="post">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="hidden" name="testimonials_id" value="<?= $testimonials[0]['testimonials_id'] ?>">
                            <label for="company_name" class="form-label">Enter Company Name<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="company_name" id="company_name" placeholder="Enter Company Name" value="<?= $testimonials[0]['company_name'] ?>" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Enter Company Description<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="description" id="description" placeholder="Enter Company Description" value="<?= $testimonials[0]['description'] ?>" required>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Update Testimonials</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>