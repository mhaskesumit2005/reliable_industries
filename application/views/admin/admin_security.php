<div class="row">
  <div class="col-md-12">
    <div class="nav-align-top">
      <ul class="nav nav-pills flex-column flex-md-row mb-6">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>admin/admin_profile"><i class="bx bx-sm bx-user me-1_5"></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url() ?>admin/admin_security"><i class="bx bx-sm bxs-lock me-1_5"></i> Security</a>
        </li>
      </ul>
    </div>
    <div class="card mb-6">
      <!-- Security -->
      <div class="card-body pt-4">
        <h5 class="mb-5">Change Password</h5>
        <form id="formAccountSettings" action="<?= base_url() ?>admin/update_password" method="post">
          <input type="hidden" id="passwordid" name="current_id" value="<?= $_SESSION['admin_account_id']; ?>" />

          <div class="row g-6">
            <div class="col-md-4 form-password-toggle">
              <label class="form-label" for="password">Current Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="current_password" placeholder="Enter Current Password" aria-describedby="password" required />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <div class="col-md-4 form-password-toggle">
              <label class="form-label" for="password">New Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="new_password" placeholder="Enter New Password" aria-describedby="password" required />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="col-md-4 form-password-toggle">
              <label class="form-label" for="password">Confirm Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password" aria-describedby="password" required />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>


            <div class="mt-6">
              <button type="submit" class="btn btn-primary me-3">Save Changes &nbsp; <i class="fas fa-save"></i></button>
              <a href="<?= base_url() ?>admin/admin_profile" class="btn btn-outline-secondary">Cancel &nbsp; <i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </form>
        <div class="col-md-12">
          <p>Password Requirements:</p>
          <li>Minimum 8 characters long - the more, the better</li>
          <li>At least one lowercase character</li>
          <li>At least one number, symbol, or whitespace character</li>
        </div>
      </div>
      <!-- /Account -->
    </div>
  </div>
</div>