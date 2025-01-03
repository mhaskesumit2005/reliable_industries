<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Update Frequently Asked Questions (FAQ)</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/update_faq" method="post">
                    <input type="hidden" name="faq_id" value="<?= $faq[0]['faq_id'] ?>">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="faq_title" class="form-label">Enter Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="faq_title" id="faq_title" placeholder="Enter Title" value="<?= $faq[0]['faq_title'] ?>" />
                        </div>
                        <div class="col-md-12 ">
                            <label for="faq_description" class="form-label">Enter Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" type="text" name="faq_description" id="editor" placeholder="Enter Description"><?= $faq[0]['faq_description'] ?></textarea>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Update FAQ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>