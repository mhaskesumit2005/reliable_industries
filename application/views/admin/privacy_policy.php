<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Privacy Policy</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_privacy_policy" method="post">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="privacy_policy_title" class="form-label">Enter Privacy Policy Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="privacy_policy_title" id="privacy_policy_title" placeholder="Enter Privacy Policy Title" />
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Enter Privacy Policy Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="privacy_policy_description" id="editor" placeholder="Enter Privacy Policy Description"></textarea>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Privacy Policy</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Privacy Policy List</h5>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>SR.NO</th>
                            <th>Faq Title</th>
                            <th>Faq Description</th>
                            <th width="13%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($privacy_policy as $key => $row) {

                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['privacy_policy_title'] ?></td>
                                <td><?= $row['privacy_policy_description'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_privacy_policy/<?= $row['privacy_policy_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_privacy_policy/<?= $row['privacy_policy_id'] ?>" onclick="return confirm('Are you sure you want to delete this Privacy Policy..?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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