<div class="row">
    <div class="col-md-12">
        <!-- Enquiry List -->
        <div class="card">
            <div class="float-right">
                <h5 class="card-header">Complete Enquiry List</h5>
            </div>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>Status</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <!-- <th>Email</th> -->
                            <th>Packaging Type</th>
                            <th>Industry</th>
                            <th>Minimum Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 ">
                        <?php foreach ($enquires as $key => $row) {
                            echo "<!-- Status: " . $row['enquiry_status'] . " -->";
                            $badgeClass = '';
                            switch ($row['enquiry_status']) {
                                case 'Pending':
                                    $badgeClass = 'bg-label-warning';
                                    break;
                                case 'Active':
                                    $badgeClass = 'bg-label-primary';
                                    break;
                                case 'Complete':
                                    $badgeClass = 'bg-label-success';
                                    break;
                                case 'Cancel':
                                    $badgeClass = 'bg-label-danger';
                                    break;
                            }
                        ?>
                            <tr>
                                <td><span class="badge <?= $badgeClass ?> me-1"><?= $row['enquiry_status'] ?></span></td>
                                <td><?= $row['enquiry_date'] ?></td>
                                <td><?= $row['enquiry_name'] ?></td>
                                <td>+91 <?= $row['enquiry_contact'] ?></td>
                                <!-- <td><?= $row['enquiry_email'] ?></td> -->
                                <td><?= $row['enquiry_packaging_type'] ?></td>
                                <td><?= $row['enquiry_industry'] ?></td>
                                <td><?= $row['enquiry_minimum_order'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-sm btn-outline-secondary info" href="<?= base_url() ?>admin/view_enquiry/<?= $row['enquiry_id'] ?>"><i class="fa-solid fa-users-viewfinder"></i></a>
                                        <a class="btn btn-sm btn-outline-danger text-danger" href="<?= base_url('admin/enquiry/delete_enquiry/' . $row['enquiry_id']); ?>" onclick="return confirm('Are you sure you want to delete this enquiry?');"><i class="fa fa-trash"></i></a>
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
        <!--/ Enquiry List -->
    </div>
</div>