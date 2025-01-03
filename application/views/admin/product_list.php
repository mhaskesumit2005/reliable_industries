<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Products List</h5>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>SR.NO</th>
                            <th>Category Name</th>
                            <th>Sub Category</th>
                            <th>Products Name</th>
                            <th>Products Label</th>
                            <th width="18%">Action</th>
                        </tr>
                    </thead>
                    <?php
                    // Create an associative array of categories for easy lookup
                    $categories = [];
                    foreach ($category_manage as $category) {
                        $categories[$category['category_manage_id']] = $category['category_name'];
                    }
                    ?>

                    <tbody class="table-border-bottom-0">
                        <?php foreach ($products as $key => $row) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= isset($categories[$row['category_manage_id']]) ? $categories[$row['category_manage_id']] : 'Category Not Found' ?></td> <!-- Display category_name from the mapping -->
                                <td><?= $row['sub_category'] ?></td>
                                <td><?= $row['products_name'] ?></td>
                                <td><?= $row['products_label'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-outline-secondary info" href="<?= base_url() ?>admin/view_products_details/<?= $row['products_id'] ?>"><i class="fa-solid fa-eye"></i></a>
                                        <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_products/<?= $row['products_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_products/<?= $row['products_id'] ?>" onclick="return confirm('Are you sure you want to delete this Products...?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>