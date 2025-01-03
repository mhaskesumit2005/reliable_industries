<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Excellence & Quality Control</h5>
            <div class="card-body">
                <form action="<?= base_url() ?>admin/add_excellence" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Title" class="form-label">Enter Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title" id="Title" placeholder="Enter Title" value="<?= $excellence[0]['title'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Description" class="form-label">Enter Description <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="description" id="Description" placeholder="Enter Description" value="<?= $excellence[0]['description'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="Title1">Enter Title 1 <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title_1" id="Title1" placeholder="Enter Title 1" value="<?= $excellence[0]['title_1'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="Description_1">Enter Description 1 <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="description_1" id="Description_1" placeholder="Enter Description 1" value="<?= $excellence[0]['description_1'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="Title2">Enter Title 2 <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title_2" id="Title2" placeholder="Enter Title 2" value="<?= $excellence[0]['title_2'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="Description_2">Enter Description 2 <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="description_2" id="Description_2" placeholder="Enter Description 2" value="<?= $excellence[0]['description_2'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="Title3">Enter Title 3 <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title_3" id="Title3" placeholder="Enter Title 3" value="<?= $excellence[0]['title_3'] ?>" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="Description_3">Enter Description 3 <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="description_3" id="Description_3" placeholder="Enter Description 3" value="<?= $excellence[0]['description_3'] ?>" required />
                        </div>
                        <div class="col-md-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary">Add Excellence</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>