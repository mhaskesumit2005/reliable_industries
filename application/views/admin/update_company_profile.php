<div class="row">
  <div class="col-md-12">
    <div class="card mb-6">
      <!-- Comapny Profile -->
      <div class="card-body pt-4">
        <h5>Update Company Profile</h5>
        <form id="formAccountSettings" action="<?= base_url() ?>admin/save_company_profile" method="post" enctype="multipart/form-data">
          <div class="row g-6 mt-5">
            <h6 class="mb-0">Basic Information</h6>
            <hr class="mt-2 ">
            <div class="col-md-3 mb-3 tex-center">
              <label for="formFile" class="form-label mt-3">Upload Company Logo</label>
              <input class="form-control" name="company_logo" type="file" id="formFile" accept="image/*" />
            </div>
            <div class="col-md-3 mb-3">
              <img src="<?= base_url() ?>uploads/<?= $company_profile[0]['company_logo'] ?>" class="border border-5" width="150" alt="company_logo">
            </div>
            <div class="col-md-3 mb-3 tex-center">
              <label for="formFile" class="form-label mt-3">Upload Company Favicon</label>
              <input class="form-control" name="company_favicon" type="file" id="formFile" accept="image/*" />
            </div>
            <div class="col-md-3 mb-3">
              <img src="<?= base_url() ?>uploads/<?= $company_profile[0]['company_favicon'] ?>" class="border border-5" width="100" alt="company_favicon">
            </div>
            <div class="col-md-4 mb-3">
              <label for="website_title" class="form-label">Website Title</label>
              <input class="form-control" type="text" id="website_title" name="website_title" placeholder="Company Title" value="<?= $company_profile[0]['website_title'] ?>" />
            </div>
            <div class="col-md-4 mb-3">
              <label for="company_name" class="form-label">Company Name</label>
              <input class="form-control" type="text" name="company_name" id="company_name" placeholder="Company Name" value="<?= $company_profile[0]['company_name'] ?>" />
            </div>
            <div class="col-md-4 mb-3">
              <label for="company_slogan" class="form-label">Company Slogan</label>
              <input class="form-control" type="text" name="company_slogan" id="company_slogan" placeholder="Company Slogan" value="<?= $company_profile[0]['company_slogan'] ?>" />
            </div>
            <div class="col-md-4 mb-3">
              <label for="email" class="form-label">E-Mail</label>
              <input class="form-control" type="text" id="email" name="company_email" placeholder="info@example.com" value="<?= $company_profile[0]['company_email'] ?>" />
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label" for="phoneNumber">Contact Number</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">IN (+91)</span>
                <input type="text" id="phoneNumber" name="company_phone" class="form-control" placeholder="202 555 0111" value="<?= $company_profile[0]['company_phone'] ?>" />
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label" for="alterPhoneNumber">Alternate Number</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">IN (+91)</span>
                <input type="text" id="alterPhoneNumber" name="alter_company_phone" class="form-control" placeholder="202 555 0111" value="<?= $company_profile[0]['alter_company_phone'] ?>" />
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="address" class="form-label">Head office Address</label>
              <textarea type="text" class="form-control" id="address" name="company_address" placeholder="Address"><?= $company_profile[0]['company_address'] ?></textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label for="state" class="form-label">State</label>
              <input class="form-control" type="text" id="state" name="state" placeholder="Maharashtra" value="<?= $company_profile[0]['state'] ?>" />
            </div>
            <div class="col-md-6 mb-3">
              <label for="country" class="form-label">country</label>
              <input class="form-control" type="text" id="country" name="country" placeholder="India" value="<?= $company_profile[0]['country'] ?>" />
            </div>
          </div>
          <div class="row mt-5">
            <h6>Social Media</h6>
            <hr>
            <div class="col-md-3 mb-3">
              <label for="social_media1" class="form-label">Facebook</label>
              <input class="form-control" type="text" id="social_media1" name="social_media1" placeholder="facebook" value="<?= $company_profile[0]['social_media1'] ?>" />
            </div>
            <div class="col-md-3 mb-3">
              <label for="social_media2" class="form-label">LinkedIn</label>
              <input class="form-control" type="text" id="social_media2" name="social_media2" placeholder="LinkedIn" value="<?= $company_profile[0]['social_media2'] ?>" />
            </div>
            <div class="col-md-3 mb-3">
              <label for="social_media3" class="form-label">Instagram</label>
              <input class="form-control" type="text" id="social_media3" name="social_media3" placeholder="Instagram" value="<?= $company_profile[0]['social_media3'] ?>" />
            </div>
            <div class="col-md-3 mb-3">
              <label for="social_media4" class="form-label">India Mart</label>
              <input class="form-control" type="text" id="social_media4" name="social_media4" placeholder="India Mart" value="<?= $company_profile[0]['social_media4'] ?>" />
            </div>
            <div class="col-md-12">
              <label for="youtube_video" class="form-label">Enter Youtube Video Link</label>
              <input class="form-control" type="text" id="youtube_video" name="youtube_video" placeholder="Enter Comapny Youtube Video Link" value="<?= $company_profile[0]['youtube_video'] ?>" />
            </div>
          </div>
          <div class="row mt-5">
            <h6>Google Map Location</h6>
            <hr>
            <div class="col-md-12">
              <label for="g_map" class="form-label">Google Map Location</label>
              <input class="form-control" type="text" id="g_map" name="google_map" placeholder="Enter comapny head office location link" value="<?= $company_profile[0]['google_map'] ?>" />
            </div>
          </div>
          <div class="mt-6">
            <button class="btn btn-primary me-3">Save Profile &nbsp; <i class="fas fa-save"></i></button>
            <a href="<?= base_url() ?>admin/company_profile" class="btn btn-outline-secondary">Back &nbsp; <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>