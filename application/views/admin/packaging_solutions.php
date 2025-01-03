<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Packaging Solution's</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_packaging_solutions" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="packaging_image" class="form-label">Select Image (SIZE 512 x 512 )<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="packaging_image" id="packaging_image" accept="image/*" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Enter Title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Enter Title" required />
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Packaging Solution's</button>
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
            <h5 class="card-header">Packaging Solution's List</h5>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>SR.NO</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th width="18%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($packaging_solutions as $key => $row) {

                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['title'] ?></td>
                                <td>
                                    <img class="border border-5" src="<?= base_url() ?>uploads/<?= $row['packaging_image'] ?>" width="100" alt="">
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_packaging/<?= $row['packaging_solutions_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_packaging/<?= $row['packaging_solutions_id'] ?>" onclick="return confirm('Are you sure you want to delete this Packaging Solutions...?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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