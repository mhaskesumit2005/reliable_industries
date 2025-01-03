<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Quality Of Work</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_quality_of_work" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="quality_of_work_sub_title" class="form-label">Enter Quality Of Work Sub Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="quality_of_work_sub_title" id="quality_of_work_sub_title" placeholder="Enter Quality Of Work Sub Title" value="<?= $quality_of_work[0]['quality_of_work_sub_title'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="quality_of_work_title" class="form-label">Enter Quality Of Work Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="quality_of_work_title" id="quality_of_work_title" placeholder="Enter Quality Of Work Title" value="<?= $quality_of_work[0]['quality_of_work_title'] ?>" required />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="happy_clients_count" class="form-label">Enter Happy Clients Count<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="happy_clients_count" id="happy_clients_count" placeholder="Enter Happy Clients Count" value="<?= $quality_of_work[0]['happy_clients_count'] ?>" required />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="delivered_products_count" class="form-label">Enter Delivered Products Count<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="delivered_products_count" id="delivered_products_count" placeholder="Enter Delivered Products Count" value="<?= $quality_of_work[0]['delivered_products_count'] ?>" required />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="years_of_experience_count" class="form-label">Enter Years of Experience Count<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="years_of_experience_count" id="years_of_experience_count" placeholder="Enter Years of Experience Count" value="<?= $quality_of_work[0]['years_of_experience_count'] ?>" required />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="manufacturing_units_count" class="form-label">Enter Manufacturing Units Count<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="manufacturing_units_count" id="manufacturing_units_count" placeholder="Enter Manufacturing Units Count" value="<?= $quality_of_work[0]['manufacturing_units_count'] ?>" required />
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="happy_clients_count_title" class="form-label">Enter Happy Clients Count Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="happy_clients_count_title" id="happy_clients_count_title" placeholder="Enter Happy Clients Count Title" value="<?= $quality_of_work[0]['happy_clients_count_title'] ?>" required />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="delivered_products_count_title" class="form-label">Enter Delivered Products Count Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="delivered_products_count_title" id="delivered_products_count_title" placeholder="Enter Delivered Products Count Title" value="<?= $quality_of_work[0]['delivered_products_count_title'] ?>" required />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="years_of_experience_count_title" class="form-label">Enter Years of Experience Count Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="years_of_experience_count_title" id="years_of_experience_count_title" placeholder="Enter Years of Experience Count Title" value="<?= $quality_of_work[0]['years_of_experience_count_title'] ?>" required />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="manufacturing_units_count_title" class="form-label">Enter Manufacturing Units Count Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="manufacturing_units_count_title" id="manufacturing_units_count_title" placeholder="Enter Manufacturing Units Count Title" value="<?= $quality_of_work[0]['manufacturing_units_count_title'] ?>" required />
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Quality Of Work</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>