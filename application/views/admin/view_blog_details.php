<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Blog Details</h5>
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?= base_url() ?>uploads/<?= $blog[0]['blog_image'] ?>" class="w-100 border border-5" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            Blog title
                            <div class="border border-light p-2 mt-2 mb-5">
                                <h5><?= $blog[0]['blog_title'] ?></h5>
                            </div>
                            Blog Description
                            <div class="border border-light p-2 mt-2" style="overflow-y: scroll; height:200px;">
                                <p><?= $blog[0]['blog_description'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <a href="<?= base_url() ?>admin/blog" style="float: right;" class="btn btn-outline-secondary">Back &nbsp; <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>