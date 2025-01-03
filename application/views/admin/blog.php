<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Blog & News</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/add_blog" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="blog_date">
                        <div class="col-md-4 mb-3">
                            <label for="BlogImage" class="form-label">Choose Image <sup>(878x393) <span class="text-danger">*</span></sup></label>
                            <input type="file" class="form-control" name="blog_image" id="BlogImage" accept="image/*" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="image_description" class="form-label">Enter Image Description <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="image_description" id="image_description" placeholder="Enter  Image Description" autocomplete="off" required />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="blog_category" class="form-label">Select Blog Category <span class="text-danger">*</span></label>
                            <select class="form-select" id="blog_category" name="blog_category" required aria-label="Default select example">
                                <option selected disabled>Select Blog Categories</option>
                                <option value="Industries">Industries</option>
                                <option value="Achivement">Achivement</option>
                                <option value="Technology">Technology</option>
                                <option value="Reliable">Reliable</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="blog_title" class="form-label">Enter Blog Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="blog_title" id="blog_title" placeholder="Enter Blog Title" autocomplete="off" required />
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Enter Blog Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="blog_description" id="editor" placeholder="Enter Blog Description"></textarea>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Add Blog</button>
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
            <h5 class="card-header">Blog & News List</h5>
            <div class="table-responsive text-nowrap p-5">
                <table class="table table-sm table-hover" id="datatable-demo">
                    <thead>
                        <tr class="text-center">
                            <th>SR.NO</th>
                            <th>Blog Title</th>
                            <th>Blog Image</th>
                            <th>Date & Time</th> <!-- Added Date & Time column -->
                            <th width="18%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($blog as $key => $row) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['blog_title'] ?></td>
                                <td>
                                    <img class="border border-5" src="<?= base_url() ?>uploads/<?= $row['blog_image'] ?>" width="100" alt="">
                                </td>
                                <td>
                                    <?= date('Y-m-d', strtotime($row['blog_date'])) ?> <!-- Format the date and time -->
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-outline-secondary info" href="<?= base_url() ?>admin/view_blog_details/<?= $row['blog_id'] ?>"><i class="fa-solid fa-users-viewfinder"></i></a>
                                        <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_blog/<?= $row['blog_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_blog/<?= $row['blog_id'] ?>" onclick="return confirm('Are you sure you want to delete this Blog?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<script>
    // Function to format date and time as YYYY-MM-DDTHH:MM
    function formatDateTime(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const day = String(date.getDate()).padStart(2, '0');
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0'); // Optional if not needed

        // Return formatted date and time
        return `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`;
    }

    // Function to set the current date and time in the hidden field before submitting the form
    function setDateTime() {
        const now = new Date();
        const formattedDateTime = formatDateTime(now);

        // Set the value of the hidden input field with name="blog_date"
        document.querySelector('input[name="blog_date"]').value = formattedDateTime;
    }

    // Add event listener to set date and time before submitting the form
    document.querySelector('form').addEventListener('submit', function() {
        setDateTime();
    });
</script>