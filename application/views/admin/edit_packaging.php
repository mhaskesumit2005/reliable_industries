<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Update Packaging Solution's</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/update_packaging_solutions" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <input type="hidden" name="packaging_solutions_id" value="<?= $packaging_solutions[0]['packaging_solutions_id'] ?>">
                            <label for="packaging_image" class="form-label">Select Image (SIZE 512 x 512 )<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="packaging_image" id="packaging_image" accept="image/*">
                        </div>
                        <div class="col-md-2 mb-3">
                            <img class="border border-5" src="<?= base_url() ?>uploads/<?= $packaging_solutions[0]['packaging_image'] ?>" width="100" alt="">
                        </div>
                        <div class="col-md-7 mb-3">
                            <label for="title" class="form-label">Enter Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Enter Title" value="<?= $packaging_solutions[0]['title'] ?>" required />
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Update Packaging Solution's</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>