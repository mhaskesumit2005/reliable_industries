<div class="row">
  <div class="col-md-12">
    <div class="card mb-6">
      <!-- Comapny Profile -->
      <div class="card-body pt-4">
        <h5>Company Profile</h5>
        <form id="formAccountSettings" action="#" method="post" enctype="multipart/form-data">
          <div class="row g-6 mt-5">
            <h6 class="mb-0">Basic Information</h6>
            <hr class="mt-2 ">

            <div class="col-md-6 text-center">
              <img src="<?= base_url() ?>uploads/<?= $company_profile[0]['company_logo'] ?>" class="border border-5" width="150" alt="company_logo">
              <p class="text-center mt-2">Company Logo</p>
            </div>

            <div class="col-md-6 mb-3 text-center">
              <img src="<?= base_url() ?>uploads/<?= $company_profile[0]['company_favicon'] ?>" class="border border-5" width="100" alt="company_favicon">
              <p class="text-center mt-2">Company Favicon</p>
            </div>
            <div class="col-md-4 mb-3">
              <label for="website_title" class="form-label">Website Title</label>
              <input class="form-control" type="text" id="website_title" name="website_title" placeholder="Company Title" value="<?= $company_profile[0]['website_title'] ?>" disabled />
            </div>
            <div class="col-md-4 mb-3">
              <label for="company_name" class="form-label">Company Name</label>
              <input class="form-control" type="text" name="company_name" id="company_name" placeholder="Company Name" value="<?= $company_profile[0]['company_name'] ?>" disabled />
            </div>
            <div class="col-md-4 mb-3">
              <label for="company_slogan" class="form-label">Company Slogan</label>
              <input class="form-control" type="text" name="company_slogan" id="company_slogan" placeholder="Company Slogan" value="<?= $company_profile[0]['company_slogan'] ?>" disabled />
            </div>
            <div class="col-md-4 mb-3">
              <label for="email" class="form-label">E-Mail</label>
              <input class="form-control" type="text" id="email" name="company_email" placeholder="info@example.com" value="<?= $company_profile[0]['company_email'] ?>" disabled />
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label" for="phoneNumber">Contact Number</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">IN (+91) </span>
                <input type="text" id="phoneNumber" name="company_phone" class="form-control" placeholder="202 555 0111" value="<?= $company_profile[0]['company_phone'] ?>" disabled />
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label" for="alterPhoneNumber">Alternate Number</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">IN (+91)</span>
                <input type="text" id="alterPhoneNumber" name="alter_company_phone" class="form-control" placeholder="202 555 0111" value="<?= $company_profile[0]['alter_company_phone'] ?>" disabled />
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="address" class="form-label">Head office Address</label>
              <textarea type="text" class="form-control" id="address" name="company_address" placeholder="Address" disabled><?= $company_profile[0]['company_address'] ?></textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label for="state" class="form-label">State</label>
              <input class="form-control" type="text" id="state" name="state" placeholder="Maharashtra" value="<?= $company_profile[0]['state'] ?>" disabled />
            </div>
            <div class="col-md-6 mb-3">
              <label for="country" class="form-label">country</label>
              <input class="form-control" type="text" id="country" name="country" placeholder="India" value="<?= $company_profile[0]['country'] ?>" disabled />
            </div>
          </div>
          <div class="row mt-5">
            <h6>Social Media</h6>
            <hr>
            <div class="col-md-3 mb-3">
              <label for="social_media1" class="form-label">Facebook</label>
              <input class="form-control" type="text" id="social_media1" name="social_media1" placeholder="facebook" value="<?= $company_profile[0]['social_media1'] ?>" disabled />
            </div>
            <div class="col-md-3 mb-3">
              <label for="social_media2" class="form-label">LinkedIn</label>
              <input class="form-control" type="text" id="social_media2" name="social_media2" placeholder="LinkedIn" value="<?= $company_profile[0]['social_media2'] ?>" disabled />
            </div>
            <div class="col-md-3 mb-3">
              <label for="social_media3" class="form-label">Instagram</label>
              <input class="form-control" type="text" id="social_media3" name="social_media3" placeholder="Instagram" value="<?= $company_profile[0]['social_media3'] ?>" disabled />
            </div>
            <div class="col-md-3 mb-3">
              <label for="social_media4" class="form-label">India Mart</label>
              <input class="form-control" type="text" id="social_media4" name="social_media4" placeholder="India Mart" value="<?= $company_profile[0]['social_media4'] ?>" disabled />
            </div>
            <div class="col-md-12">
              <label for="youtube_video" class="form-label">Enter Youtube Video Link</label>
              <input class="form-control" type="text" id="youtube_video" name="youtube_video" placeholder="Enter Comapny Youtube Video Link" value="<?= $company_profile[0]['youtube_video'] ?>" disabled />
            </div>
          </div>
          <div class="row mt-5">
            <h6>Google Map Location</h6>
            <hr>
            <div class="col-md-12">
              <label for="g_map" class="form-label">Google Map Location</label>
              <input class="form-control" type="text" id="g_map" name="google_map" placeholder="Enter Comapny Head Office Location Link" value="<?= $company_profile[0]['google_map'] ?>" disabled />
            </div>

          </div>
          <div class="mt-6">
            <a href="<?= base_url() ?>admin/update_company_profile" class="btn btn-primary me-3">Update &nbsp; <i class="fas fa-edit"></i></a>
            <a href="<?= base_url() ?>admin/dashboard" class="btn btn-outline-secondary">Back &nbsp; <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>
  </div>
</div>