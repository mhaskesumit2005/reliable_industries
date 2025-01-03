<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header text-dark">Technical Support Overview</h5>
            <div class="card-body">
                <p class="card-text text-dark">
                    Welcome to the Technical Support Overview. Here, you'll find essential information and resources to troubleshoot and resolve technical issues effectively.
                </p>
                <div class="col-md-12 mt-5">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table">
                                <tr>
                                    <th>Support Domain</th>
                                    <th>Support Name</th>
                                    <th>Support Contact</th>
                                    <th>Support Email</th>
                                    <th>Support Organization</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($accountTypes)) {
                                    foreach ($accountTypes as $row) { ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['admin_account_type']) ?></td>
                                            <td><?= htmlspecialchars($row['admin_first_name']) ?>&nbsp;<?= htmlspecialchars($row['admin_last_name']) ?></td>
                                            <td>+91 <?= htmlspecialchars($row['admin_contact']) ?></td>
                                            <td><?= htmlspecialchars($row['admin_email']) ?></td>
                                            <td><?= htmlspecialchars($row['admin_organization']) ?></td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="5">No matching admin account types found.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>




                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>