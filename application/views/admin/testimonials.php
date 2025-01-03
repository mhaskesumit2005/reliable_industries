<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Testimonials</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_testimonials" method="post">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="company_name" class="form-label">Enter Company Name<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="company_name" id="company_name" placeholder="Enter Company Name" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Enter Company Description<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="description" id="description" placeholder="Enter Company Description" required>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Testimonials</button>
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
            <h5 class="card-header">Testimonials List</h5>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>SR.NO</th>
                            <th>Company Name</th>
                            <th>Description</th>
                            <th width="18%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($testimonials as $key => $row) {
                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['company_name'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_testimonials/<?= $row['testimonials_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_testimonials/<?= $row['testimonials_id'] ?>" onclick="return confirm('Are you sure you want to delete this Testimonials...?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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