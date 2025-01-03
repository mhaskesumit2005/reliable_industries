<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Trusted By Leading Brands</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_trusted_brands" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="brands_image" class="form-label">Select Brands Image (SIZE 512 x 512 )<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="brands_image" id="brands_image" accept="image/*" required>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Brands</button>
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
            <h5 class="card-header">Trusted By Leading Brands List</h5>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>SR.NO</th>
                            <th>Image</th>
                            <th width="18%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($trusted_brands as $key => $row) {
                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td>
                                    <img class="border border-5" src="<?= base_url() ?>uploads/<?= $row['brands_image'] ?>" width="100" alt="">
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_brands/<?= $row['trusted_brands_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_brands/<?= $row['trusted_brands_id'] ?>" onclick="return confirm('Are you sure you want to delete this Trusted By Leading Brands...?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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