<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Who We Are ?</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_who_we_are" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="about_profile_image" class="form-label">Select About Profile Image<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="about_profile_image" id="about_profile_image" accept="image/*">
                        </div>
                        <div class="col-md-2 mb-3">
                            <img class="border border-5" src="<?= base_url() ?>uploads/<?= $about_profile[0]['about_profile_image'] ?>" width="100" alt="Image">
                        </div>
                        <div class="col-md-7 mb-3">
                            <label for="profile_sub_title" class="form-label">Enter Profile Sub Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="profile_sub_title" id="profile_sub_title" placeholder="Enter Profile Sub Title" value="<?= $about_profile[0]['profile_sub_title'] ?>" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="profile_title" class="form-label">Enter Profile Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="profile_title" id="profile_title" placeholder="Enter Profile Title" value="<?= $about_profile[0]['profile_title'] ?>" required />
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="about_profile_description">Enter Profile Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="about_profile_description" id="about_profile_description" placeholder="Enter About Profile Description"><?= $about_profile[0]['about_profile_description'] ?></textarea>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Who We Are ?</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>