<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Our Manufacturing Unit's</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_manufacturing" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="units_address" class="form-label">Enter Manufacturing Units Address<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="units_address" id="units_address" placeholder="Enter Manufacturing Units Address" required autocomplete="off" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="units_phone" class="form-label">Enter Manufacturing Units Phone<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="units_phone" id="units_phone" placeholder="Enter Manufacturing Units Phone" required />
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Unit's</button>
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
            <h5 class="card-header">Our Manufacturing Unit's List</h5>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>SR.NO</th>
                            <th>Manufacturing Units Address</th>
                            <th>Manufacturing Units Phone</th>
                            <th width="13%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($manufacturing_units as $key => $row) {

                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['units_address'] ?></td>
                                <td><?= $row['units_phone'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_units/<?= $row['manufacturing_units_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_units/<?= $row['manufacturing_units_id'] ?>" onclick="return confirm('Are you sure you want to delete this Units?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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