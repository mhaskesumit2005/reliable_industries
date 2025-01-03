<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Category</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_category" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="category_name" class="form-label">Category Name<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="category_name" id="category_name" placeholder="Category Name" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="categoryImage" class="form-label">Category Image<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="category_image" id="categoryImage" accept="*/image" required />
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Category</button>
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
            <h5 class="card-header">Category List</h5>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>SR.NO</th>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($category_manage as $key => $row) {

                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['category_name'] ?></td>
                                <td>
                                    <img class="border border-5" src="<?= base_url() ?>uploads/<?= $row['category_image'] ?>" width="100" alt="">
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_category/<?= $row['category_manage_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_category/<?= $row['category_manage_id'] ?>" onclick="return confirm('Are you sure you want to delete this Category?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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