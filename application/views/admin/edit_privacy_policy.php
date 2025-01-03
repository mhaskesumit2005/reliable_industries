<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Update Privacy Policy</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/update_privacy_policy" method="post">
                    <input type="hidden" name="privacy_policy_id" value="<?= $privacy_policy[0]['privacy_policy_id'] ?>">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="privacy_policy_title" class="form-label">Enter Privacy Policy Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="privacy_policy_title" id="privacy_policy_title" placeholder="Enter Privacy Policy Title" value="<?= $privacy_policy[0]['privacy_policy_title'] ?>" />
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Enter Privacy Policy Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="privacy_policy_description" id="editor" placeholder="Enter Privacy Policy Description"><?= $privacy_policy[0]['privacy_policy_description'] ?></textarea>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Update Privacy Policy</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>