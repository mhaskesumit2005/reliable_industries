<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Home Slider</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_slider" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="SliderImage" class="form-label">Choose Slider Image <sup>(1728x664) <span class="text-danger">*</span></sup></label>
                            <input type="file" class="form-control" name="slider_image" id="SliderImage" accept="image/*" required>
                        </div>
                        <div class="col-md-9 mb-3">
                            <label for="SliderSubTitle" class="form-label">Enter Sub Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="sub_title" id="SliderSubTitle" placeholder="Enter Sub Title" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="SliderTitle" class="form-label">Enter Slider Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="slider_title" id="SliderTitle" placeholder="Enter Slider Title" required>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary">Add Slider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Home Slider List</h5>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>SR.NO</th>
                            <th>Sub Title</th>
                            <th>Title</th>
                            <th>Slider Image</th>
                            <th width="18%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($slider as $key => $row) {

                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['sub_title'] ?></td>
                                <td><?= $row['slider_title'] ?></td>
                                <td>
                                    <img class="border border-5" src="<?= base_url() ?>uploads/<?= $row['slider_image'] ?>" width="100" alt="">
                                </td>
                                <td>
                                    <div class="text-center">
                                        <!-- <a class="btn btn-outline-secondary info" href="<?= base_url() ?>admin/view_blog_details/<?= $row['slider_id'] ?>"><i class="fa-solid fa-users-viewfinder"></i></a> -->
                                        <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_slider/<?= $row['slider_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_slider/<?= $row['slider_id'] ?>" onclick="return confirm('Are you sure you want to delete this Slider..?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>