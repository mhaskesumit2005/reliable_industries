<div class="row">
  <div class="col-md-12">
    <div class="nav-align-top">
      <ul class="nav nav-pills flex-column flex-md-row mb-6">
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url() ?>admin/admin_profile"><i class="bx bx-sm bx-user me-1_5"></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>admin/admin_security"><i class="bx bx-sm bxs-lock me-1_5"></i> Security</a>
        </li>
      </ul>
    </div>
    <div class="card mb-6">
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
          <img src="<?= base_url() ?>uploads/<?= $admin->admin_image; ?>" alt="user-avatar" class="d-block w-px-100 h-px-120 rounded" style="object-fit: cover;" id="uploadedAvatar" />
          <form id="formAccountSettings" action="<?= base_url() ?>admin/update_profile" method="post" enctype="multipart/form-data">
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Upload New Photo &nbsp; <i class="fa fa-upload" aria-hidden="true"></i></span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input type="file" name="admin_image" id="upload" class="account-file-input" hidden accept="image/*" />
              </label>
              <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
            </div>

        </div>
      </div>
      <div class="card-body pt-4">
        <div class="row g-6">
          <div class="col-md-6">
            <label for="firstName" class="form-label">First Name</label>
            <input class="form-control" type="text" name="admin_first_name" id="firstName" placeholder="First Name" value="<?= $admin->admin_first_name; ?>" />
          </div>
          <div class="col-md-6">
            <label for="lastName" class="form-label">Last Name</label>
            <input class="form-control" type="text" name="admin_last_name" id="lastName" placeholder="Last Name" value="<?= $admin->admin_last_name; ?>" />
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">E-Mail</label>
            <input class="form-control" type="text" name="admin_email" id="email" placeholder="example@gmail.com" disabled value="<?= $admin->admin_email; ?>" />
          </div>
          <div class="col-md-6">
            <label for="organization" class="form-label">Organization</label>
            <input type="text" name="admin_organization" class="form-control" id="organization" placeholder="Company name" value="<?= $admin->admin_organization; ?>" />
          </div>
          <div class="col-md-6">
            <label class="form-label" for="phoneNumber">Phone Number</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text">IN (+91)</span>
              <input type="number" name="admin_contact" id="phoneNumber" class="form-control" placeholder="202 555 0111" value="<?= $admin->admin_contact; ?>" />
            </div>
          </div>
          <div class="col-md-6">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="admin_address" class="form-control" id="address" placeholder="Address" value="<?= $admin->admin_address; ?>" />
          </div>
        </div>
        <div class="mt-6">
          <button type="submit" class="btn btn-primary me-3">Save Changes &nbsp; <i class="fas fa-save"></i></button>
          <a href="<?= base_url() ?>admin/dashboard" class="btn btn-outline-secondary">Back &nbsp; <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>