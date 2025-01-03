<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Update Our Work</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/update_our_work" method="post">
                    <input type="hidden" name="work_id" value="<?= $our_work[0]['work_id'] ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="work_title" class="form-label">Enter Work Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="work_title" id="work_title" placeholder="Enter Work Title" value="<?= $our_work[0]['work_title'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="work_icons" class="form-label">Enter Work Icon's Link<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="work_icons" id="work_icons" placeholder="Enter Work Icon's Link" value="<?= $our_work[0]['work_icons'] ?>" required />
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Enter Work Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="work_description" id="editor" placeholder="Enter Work Description"><?= $our_work[0]['work_description'] ?></textarea>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Update Work Info</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>