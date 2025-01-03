<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Vision & Mission</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_vision_mission" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sub_title" class="form-label">Enter Sub Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="sub_title" id="sub_title" placeholder="Enter Sub Title" value="<?= $vision_mission[0]['sub_title'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Enter Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Enter Title" value="<?= $vision_mission[0]['title'] ?>" required />
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="description">Enter Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter Vision & Mission Description"><?= $vision_mission[0]['description'] ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="our_vision_title">Enter Our Vision Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="our_vision_title" id="our_vision_title" placeholder="Enter Our Vision Title" value="<?= $vision_mission[0]['our_vision_title'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="our_vision_description">Enter Our Vision Description<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="our_vision_description" id="our_vision_description" placeholder="Enter Our Vision Description" value="<?= $vision_mission[0]['our_vision_description'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="our_mission_title">Enter Our Mission Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="our_mission_title" id="our_mission_title" placeholder="Enter Our Mission Title" value="<?= $vision_mission[0]['our_mission_title'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="our_mission_description">Enter Our Mission Description<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="our_mission_description" id="our_mission_description" placeholder="Enter Our Mission Description" value="<?= $vision_mission[0]['our_mission_description'] ?>" required />
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Vision & Mission</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>