<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Get Custom Enquiry</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/get_custom_enquiry" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="custom_image" class="form-label">Select Image<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="custom_image" id="custom_image" accept="image/*">
                        </div>
                        <div class="col-md-6 mb-3">
                            <img class="border border-5" src="<?= base_url() ?>uploads/<?= $custom[0]['custom_image'] ?>" width="100" alt="Image">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sub_title" class="form-label">Enter Sub Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="sub_title" id="sub_title" placeholder="Enter Sub Title" value="<?= $custom[0]['sub_title'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Enter Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Enter Title" value="<?= $custom[0]['title'] ?>" required />
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Get Custom Enquiry</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>