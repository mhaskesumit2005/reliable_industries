<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Update Our Manufacturing Unit's</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/update_manufacturing" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="units_address" class="form-label">Enter Manufacturing Units Address<span class="text-danger">*</span></label>
                            <input type="hidden" name="manufacturing_units_id" class="form-control" value="<?= $manufacturing_units[0]['manufacturing_units_id'] ?>">
                            <input class="form-control" type="text" name="units_address" id="units_address" placeholder="Enter Manufacturing Units Address" value="<?= $manufacturing_units[0]['units_address'] ?>" required autocomplete="off" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="units_phone" class="form-label">Enter Manufacturing Units Phone<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="units_phone" id="units_phone" placeholder="Enter Manufacturing Units Phone" value="<?= $manufacturing_units[0]['units_phone'] ?>" required />
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Update Unit's</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>