<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Update Blog & News</h5>
            <div class="card-header">
                <form action="<?= base_url() ?>admin/update_blog" method="post" enctype="multipart/form-data" onsubmit="setBlogDateTime()">
                    <div class="row">
                        <input type="hidden" name="blog_id" value="<?= $blog[0]['blog_id'] ?>">
                        <input class="form-control" type="hidden" name="blog_date" id="blog_date" value="" />
                        <div class="col-md-4 mb-3">
                            <label for="BlogImage" class="form-label">Choose Image <sup>(878x393) <span class="text-danger">*</span></sup></label>
                            <input type="file" class="form-control" name="blog_image" id="BlogImage" accept="image/*">
                        </div>
                        <div class="col-md-2 mb-3">
                            <img src="<?= base_url() ?>uploads/<?= $blog[0]['blog_image'] ?>" width="150" class="border border-5" alt="Image">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image_description" class="form-label">Enter Image Description <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="image_description" id="image_description" placeholder="Enter Image Description" value="<?= $blog[0]['image_description'] ?>" autocomplete="off" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="blog_category" class="form-label">Select Blog Category <span class="text-danger">*</span></label>
                            <select class="form-select" id="blog_category" name="blog_category" required>
                                <option value="" disabled <?= empty($blog[0]['blog_category']) ? 'selected' : ''; ?>>Select a category</option>
                                <option value="Industries" <?= $blog[0]['blog_category'] == 'Industries' ? 'selected' : ''; ?>>Industries</option>
                                <option value="Achievement" <?= $blog[0]['blog_category'] == 'Achievement' ? 'selected' : ''; ?>>Achievement</option>
                                <option value="Technology" <?= $blog[0]['blog_category'] == 'Technology' ? 'selected' : ''; ?>>Technology</option>
                                <option value="Reliable" <?= $blog[0]['blog_category'] == 'Reliable' ? 'selected' : ''; ?>>Reliable</option>
                                <option value="Other" <?= $blog[0]['blog_category'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="blog_title" class="form-label">Enter Blog Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="blog_title" id="blog_title" placeholder="Enter Blog Title" value="<?= $blog[0]['blog_title'] ?>" required />
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Enter Blog Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="blog_description" id="editor" placeholder="Enter Blog Description"><?= $blog[0]['blog_description'] ?></textarea>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary">Update Blog</button>
                        </div>
                    </div>
                </form>
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
    function setBlogDateTime() {
        const now = new Date();
        const formattedDateTime = formatDateTime(now);

        // Set the value of the hidden input field with name="blog_date"
        document.getElementById('blog_date').value = formattedDateTime;
    }
</script>