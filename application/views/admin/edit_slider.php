<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Update Home Slider</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/update_slider" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="slider_id" value="<?= $slider[0]['slider_id'] ?>">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="SliderImage" class="form-label">Choose Slider Image <sup>(1728x664) <span class="text-danger">*</span></sup></label>
                            <input type="file" class="form-control" name="slider_image" id="SliderImage" accept="image/*">
                        </div>
                        <div class="col-md-2 mb-3">
                            <img src="<?= base_url() ?>uploads/<?= $slider[0]['slider_image'] ?>" width="100" alt="">
                        </div>
                        <div class="col-md-7 mb-3">
                            <label for="SliderSubTitle" class="form-label">Enter Sub Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="sub_title" id="SliderSubTitle" placeholder="Enter Sub Title" value="<?= $slider[0]['sub_title'] ?>" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="SliderTitle" class="form-label">Enter Slider Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="slider_title" id="SliderTitle" placeholder="Enter Slider Title" value="<?= $slider[0]['slider_title'] ?>" required>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary">Update Slider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>