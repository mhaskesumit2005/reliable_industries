<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Our Work</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_our_work" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="work_title" class="form-label">Enter Work Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="work_title" id="work_title" placeholder="Enter Work Title" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="work_icons" class="form-label">Enter Work Icon's Link<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="work_icons" id="work_icons" placeholder="Enter Work Icon's Link" required />
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Enter Work Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="work_description" id="editor" placeholder="Enter Work Description"></textarea>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Work Info</button>
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
            <h5 class="card-header">Our Work List</h5>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>SR.NO</th>
                            <th>Title</th>
                            <th>Icon's</th>
                            <th>Description</th>
                            <th width="13%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($our_work as $key => $row) {

                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['work_title'] ?></td>
                                <td><?= $row['work_icons'] ?></td>
                                <td><?= $row['work_description'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_our_work/<?= $row['work_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_our_work/<?= $row['work_id'] ?>" onclick="return confirm('Are you sure you want to delete this Our Work...?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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