<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Subscriber List</h5>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>SR.NO</th>
                            <th>Date</th>
                            <th>Email</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($newsletter as $key => $row) {
                            $dateTime = new DateTime($row['newsletter_date']);
                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $dateTime->format('Y-m-d'); ?></td>
                                <td><?= $row['email'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_subscriber/<?= $row['newsletter_id'] ?>" onclick="return confirm('Are you sure you want to delete this Subscriber...?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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