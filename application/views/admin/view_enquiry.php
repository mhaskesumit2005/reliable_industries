<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-header">
                        <a href="javascript:void(0);" onclick="history.back();" aria-label="Go back">Enquiry By</a>
                        <i class="fa fa-arrow-right mx-2" aria-hidden="true"></i>
                        <b><?= isset($enquires[0]['enquiry_name']) ? htmlspecialchars($enquires[0]['enquiry_name']) : 'Unknown' ?></b>
                    </h5>
                </div>

                <div class="col-md-6">
                    <div class="text-lg-end text-center p-5">
                    <a class="btn btn-success btn-sm"
   target="_blank"
   href="https://wa.me/+91<?= $enquires[0]['enquiry_contact'] ?>?text=👋 *Dear <?= $enquires[0]['enquiry_name'] ?>!*%0A
   🌟 *Thank you for your enquiry on <?= $enquires[0]['enquiry_datetime'] ?>.*%0A%0A
   Here are your details :%0A
   *Enquiry Status :* <?= $enquires[0]['enquiry_status'] ?>%0A
   *Packaging Type :* <?= $enquires[0]['enquiry_packaging_type'] ?>%0A
   *Industry :* <?= $enquires[0]['enquiry_industry'] ?>%0A
   *Minimum Order :* <?= $enquires[0]['enquiry_minimum_order'] ?>%0A%0A
   *If you have any further questions, feel free to ask!*%0A%0A
   🤝 *Regards,*%0A
   🌐 *Reliable Industries*">
                            <i class="fa-brands fa-whatsapp fs-4 me-lg-2 me-0"></i>
                            <span class="d-none d-lg-block">WhatsApp</span>
                        </a>


                        <!-- <a class="btn btn-dark btn-sm" href="mailto:mhaskesumit1082@gmail.com?subject=%20 Hello! &body=%20 Helloo Body"><i class="fa-solid fa-envelope fs-4 me-lg-2 me-0"></i><span class="d-none d-lg-block">Email</span></a> -->

                        <a class="btn btn-dark btn-sm" 
   href="mailto: <?= $enquires[0]['enquiry_email'] ?>?subject=Thank%20you%20for%20your%20enquiry
   &body=🌟%20Thank%20you%20for%20your%20enquiry%20on%20<?= urlencode($enquires[0]['enquiry_datetime']) ?>.%0A%0A
   Here%20are%20your%20details:%0A
   📌%20Enquiry%20Status:%20<?= urlencode($enquires[0]['enquiry_status']) ?>%0A
   📦%20Packaging%20Type:%20<?= urlencode($enquires[0]['enquiry_packaging_type']) ?>%0A
   🏭%20Industry:%20<?= urlencode($enquires[0]['enquiry_industry']) ?>%0A
   📊%20Minimum%20Order:%20<?= urlencode($enquires[0]['enquiry_minimum_order']) ?>%0A%0A
   ❓%20If%20you%20have%20any%20further%20questions,%20feel%20free%20to%20ask!%0A%0A
   🤝%20Regards,%0A
   🌐%20Reliable%20Industries">
   <i class="fa-solid fa-envelope fs-4 me-lg-2 me-0"></i>
   <span class="d-none d-lg-block">Email</span>
</a>

                    </div>
                </div>
            </div>
            <div class="card-header table-responsive">

                <table class="table  table-bordered table-sm mb-5">
                    <tr>
                        <th>Enquiry Status</th>
                        <th>Enquiry Date / Time</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                    </tr>
                    <?php
                    foreach ($enquires as $key => $row) {
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
                            <td><?= $enquires[0]['enquiry_datetime'] ?></td>
                            <td><?= $enquires[0]['enquiry_name'] ?></td>
                            <td>+91 <?= $enquires[0]['enquiry_contact'] ?></td>
                            <td><?= $enquires[0]['enquiry_email'] ?></td>
                        </tr>
                        <tr>
                            <th>Packaging Type</th>
                            <th>Industry</th>
                            <th>Minimum Order</th>
                            <th colspan="2" rowspan="2"></th>
                        </tr>
                        <tr>
                            <td><?= $enquires[0]['enquiry_packaging_type'] ?></td>
                            <td><?= $enquires[0]['enquiry_industry'] ?></td>
                            <td><?= $enquires[0]['enquiry_minimum_order'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end">
                                <a href="javascript:void(0);" onclick="updateStatus('Pending', <?= $row['enquiry_id'] ?>);" class="btn btn-warning btn-sm">
                                    Set Pending
                                </a>
                                <a href="javascript:void(0);" onclick="updateStatus('Active', <?= $row['enquiry_id'] ?>);" class="btn btn-primary btn-sm">
                                    Set Active
                                </a>
                                <a href="javascript:void(0);" onclick="updateStatus('Complete', <?= $row['enquiry_id'] ?>);" class="btn btn-success btn-sm">
                                    Set Complete
                                </a>
                                <a href="javascript:void(0);" onclick="updateStatus('Cancel', <?= $row['enquiry_id'] ?>);" class="btn btn-danger btn-sm">
                                    Set Cancel
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function updateStatus(status, enquiryId) {
        // Confirm the action
        const confirmation = confirm('Are you sure you want to set the status to ' + status + '?');
        if (confirmation) {
            // Create the URL with parameters
            const url = '<?= base_url() ?>admin/update_status?status=' + status + '&id=' + enquiryId;

            // Use `window.location.href` to simulate a click and navigate to the URL
            window.location.href = url;

            // Optionally, you can use `history.back()` in case you want to auto-redirect the user after a server-side action
            // history.back();
        }
    }
</script>