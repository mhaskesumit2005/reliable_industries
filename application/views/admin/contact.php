<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Contact List</h5>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>SR.NO</th>
                            <th>Date / Time</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($contact as $key => $row) {
                            $dateTime = new DateTime($row['contact_date']);
                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $dateTime->format('Y-m-d H:i:s'); ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['subject'] ?></td>
                                <td><?= $row['message'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_contact/<?= $row['contact_id'] ?>" onclick="return confirm('Are you sure you want to delete this Contact...?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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