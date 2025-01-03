<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Frequently Asked Questions (FAQ)</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_faq" method="post">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="faq_title" class="form-label">Enter Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="faq_title" id="faq_title" placeholder="Enter Title" required />
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Enter Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="faq_description" id="editor" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add FAQ</button>
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
            <h5 class="card-header">Frequently Asked Questions (FAQ) List</h5>
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
                        <?php foreach ($faq as $key => $row) {

                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['faq_title'] ?></td>
                                <td><?= $row['faq_description'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_faq/<?= $row['faq_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_faq/<?= $row['faq_id'] ?>" onclick="return confirm('Are you sure you want to delete this Faq?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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