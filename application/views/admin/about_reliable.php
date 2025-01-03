<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add About Reliable</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_about_reliable" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="about_logo_image" class="form-label">Select About Logo Image<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="about_logo_image" id="about_logo_image" accept="image/*">
                        </div>
                        <div class="col-md-2 mb-3">
                            <img class="border border-5" src="<?= base_url() ?>uploads/<?= $about_reliable[0]['about_logo_image'] ?>" width="100" alt="Image">
                        </div>
                        <div class="col-md-7 mb-3">
                            <label for="about_sub_title" class="form-label">Enter Sub Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="about_sub_title" id="about_sub_title" placeholder="Enter Sub Title" value="<?= $about_reliable[0]['about_sub_title'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_title" class="form-label">Enter Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="about_title" id="about_title" placeholder="Enter Title" value="<?= $about_reliable[0]['about_title'] ?>" required />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="about_pdf" class="form-label">Upload PDF<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="about_pdf" id="about_pdf" accept=".pdf" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <span>PDF Name : <?= $about_reliable[0]['about_pdf'] ?></span>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="about_description">Enter Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="about_description" id="about_description" placeholder="Enter About Description"><?= $about_reliable[0]['about_description'] ?></textarea>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add About Reliable</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>