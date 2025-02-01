<div class="row">
    <div class="col-xxl-8 mb-6 order-0">
        <div class="card">
            <div class="d-flex align-items-start row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h4 class="card-title text-primary mb-3">

                            <?php
                            if (!isset($_SESSION['admin_username']))
                                redirect('/admin/index');
                            echo 'Welcome, ' . $this->session->userdata('admin_first_name') . '!<br>';
                            ?>
                        </h4>
                        <p class="mb-6">
                            You have get <?php echo $pending_enquiry_count; ?> enquiries pending<br />Check enquiries.
                        </p>
                        <a href="<?= base_url() ?>admin/enquiry_list" class="btn btn-sm btn-outline-primary">View Enquiries &nbsp; <i class="fa fa-question-circle"></i></a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-6">
                        <img
                            src="<?= base_url() ?>assets/admin_assets/img/illustrations/man-with-laptop.png"
                            height="175"
                            class="scaleX-n1-rtl"
                            alt="View Badge User" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                                <img
                                    src="<?= base_url() ?>assets/admin_assets/img/icons/unicons/chart-success.png"
                                    alt="chart success"
                                    class="rounded" />
                            </div>
                        </div>
                        <div id="visitor-stats">
                            <p class="mb-1">Visitor's</p>
                            <h4 class="card-title mb-3" id="visitor-count">0</h4>
                            <small class="text-success fw-medium" id="visitor-percentage"><i class="bx bx-up-arrow-alt"></i> +0%</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                                <img src="<?= base_url() ?>assets/admin_assets/img/icons/unicons/wallet-info.png" alt="wallet info" class="rounded" />
                            </div>
                        </div>
                        <p class="mb-1">Enquiries</p>
                        <h4 class="card-title mb-3"><?php echo $total_enquiries; ?></h4>
                        <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +<?php echo $resolved_percentage; ?>%</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- Enquiry List -->
        <div class="card">
            <h5 class="card-header">Enquiries</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Status</th>
                            <th>Date/Time</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Packaging Type</th>
                            <th>Minimum Order</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $limited_enquires = array_slice($enquires, 0, 5);
                        foreach ($limited_enquires as $key => $row) {
                            echo "<!-- Status: " . $row['enquiry_status'] . " -->";

                            // Set badge color based on enquiry status
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
                            }
                        ?>
                            <tr>
                                <td><span class="badge <?= $badgeClass ?> me-1"><?= $row['enquiry_status'] ?></span></td>
                                <td><?= $row['enquiry_datetime'] ?></td>
                                <td><?= $row['enquiry_name'] ?></td>
                                <td>+91 <?= $row['enquiry_contact'] ?></td>
                                <td><?= $row['enquiry_email'] ?></td>
                                <td><?= $row['enquiry_packaging_type'] ?></td>
                                <td><?= $row['enquiry_minimum_order'] ?></td>
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