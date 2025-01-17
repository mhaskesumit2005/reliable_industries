<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    // <============= Start Login Process =============> 

    public function login_process()
    {
        // Get input data from the login form
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Call the model function to validate admin credentials
        $admin_data = $this->Admin_model->get_admin_by_username($username); // Retrieve admin data by username

        if ($admin_data) {
            // Verify the entered password with the hashed password from the database
            if (password_verify($password, $admin_data['password'])) {
                // Set session data for logged-in user
                $_SESSION['admin_account_id'] = $admin_data['admin_account_id'];
                $_SESSION['admin_username'] = $admin_data['username'];
                $_SESSION['admin_first_name'] = $admin_data['admin_first_name'];

                // Redirect to admin dashboard
                redirect('admin/dashboard');
            } else {
                // Invalid password
                $_SESSION['error'] = 'Invalid username or password.';
                redirect('admin');
            }
        } else {
            // User not found
            $_SESSION['error'] = 'Invalid username or password.';
            redirect('admin');
        }
    }

    // <============= End Login Process =============> 


    // <============= Start Index Login Page =============> 

    public function index()
    {
        // Load the login page view
        $data["company_profile"] = $this->My_model->select("company_profile");
        $this->load->view('admin/login', $data);
    }

    // <============= End Index Login Page =============> 

    // <============= Start Logout =============> 

    public function logout()
    {
        // Destroy the session to log out
        $this->session->sess_destroy();
        redirect('admin');
    }

    // <============= EndLogout =============> 


    // <============= Start Email Write Page =============> 

    public function email_template()
    {
        $this->load->view("admin/email_template");
    }

    // <============= End Email Write Page =============> 

    // <============= Start Navbar Page =============> 

    protected function navbar()
    {
        $data["company_profile"] = $this->My_model->select("company_profile");
        $data['pending_enquiry_count'] = $this->My_model->get_pending_enquiry_count();
        $admin_account_id = $this->session->userdata('admin_account_id');
        $data['admin'] = $this->Admin_model->getAdminById($admin_account_id);
        $this->load->view("admin/navbar", $data);
    }

    // <============= End Navbar Page =============> 

    // <============= Start Dashboard Page =============> 

    public function dashboard()
    {
        $total_enquiries = $this->My_model->get_total_enquiries();
        $resolved_enquiries = $this->My_model->get_enquiries_by_status('resolved');
        // Calculate the percentage of resolved enquiries
        $resolved_percentage = ($total_enquiries > 0) ? ($resolved_enquiries / $total_enquiries) * 100 : 0;

        // Get admin data by matching session id with admin id
        $data['total_enquiries'] = $this->My_model->get_total_enquiries();
        $data['resolved_percentage'] = round($resolved_percentage, 2); // Rounded to 2 decimal places
        $data['pending_enquiry_count'] = $this->My_model->get_pending_enquiry_count();
        $admin_account_id = $this->session->userdata('admin_account_id');
        $data['admin'] = $this->Admin_model->getAdminById($admin_account_id);
        $data['enquires'] = $this->My_model->select_where("enquires", array('status' => 'active'));
        $this->navbar();
        $this->load->view("admin/dashboard", $data);
        $this->footer();
    }

    // <============= End Dashboard Page =============> 


    // <============= Start Admin Profile Page =============> 

    public function admin_profile()
    {
        $admin_account_id = $this->session->userdata('admin_account_id');
        $data['admin'] = $this->Admin_model->getAdminById($admin_account_id);
        $this->navbar();
        $this->load->view("admin/admin_profile", $data);
        $this->footer();
    }

    public function update_profile()
    {
        if ($_FILES['admin_image']['name'] != '') {
            $file_name = time() . $_FILES['admin_image']['name'];
            move_uploaded_file($_FILES['admin_image']['tmp_name'], "uploads/" . $file_name);
            $_POST["admin_image"] = $file_name;
        }
        $admin_account_id = $this->session->userdata('admin_account_id');
        $data['admin'] = $this->Admin_model->getAdminById($admin_account_id);

        $cond = ["admin_account_id" => $admin_account_id];
        $this->My_model->update("admin_account", $cond, $_POST);
        redirect(base_url() . "admin/admin_profile");
    }

    // <============= End Admin Profile Page =============> 

    // <============= Start Admin Security Page =============> 

    public function admin_security()
    {
        $this->navbar();
        $this->load->view("admin/admin_security");
        $this->footer();
    }

    public function update_password()
    {
        // Validate if required fields exist in POST request
        if (isset($_POST['current_id'], $_POST['current_password'], $_POST['new_password'], $_POST['confirm_password'])) {

            // Get the admin data by ID
            $admin_data = $this->Admin_model->get_admin_by_id($_POST['current_id']);

            if ($admin_data) {
                // Verify the current password matches the hashed password in the database
                if (password_verify($_POST['current_password'], $admin_data['password'])) {

                    // Check if new password and confirm password match
                    if ($_POST['new_password'] === $_POST['confirm_password']) {

                        // Hash the new password before saving
                        $hashed_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

                        // Prepare data for update
                        $update_data = [
                            'password' => $hashed_password,
                        ];

                        // Call the model to update the password
                        $update_result = $this->Admin_model->update_admin_password($_POST['current_id'], $update_data);

                        if ($update_result) {
                            // Password updated successfully
                            $this->session->set_flashdata('success', 'Password updated successfully.');
                            redirect(base_url() . "admin/");
                        } else {
                            // Handle update failure
                            $this->session->set_flashdata('error', 'Failed to update password. Please try again.');
                            redirect(base_url() . "admin/admin_security");
                        }
                    } else {
                        // New password and confirmation do not match
                        $this->session->set_flashdata('error', 'New password and confirmation password do not match.');
                        redirect(base_url() . "admin/admin_security");
                    }
                } else {
                    // Current password is incorrect
                    $this->session->set_flashdata('error', 'Current password is incorrect.');
                    redirect(base_url() . "admin/admin_security");
                }
            } else {
                // Admin data not found
                $this->session->set_flashdata('error', 'Admin not found.');
                redirect(base_url() . "admin/admin_security");
            }
        } else {
            // Invalid form submission
            $this->session->set_flashdata('error', 'Invalid form submission.');
            redirect(base_url() . "admin/admin_security");
        }
    }

    // <============= End Admin Security Page =============> 

    // <============= Start Company Profile Page =============> 

    public function company_profile()
    {
        $data["company_profile"] = $this->My_model->select("company_profile");
        $this->navbar();
        $this->load->view("admin/company_profile", $data);
        $this->footer();
    }


    public function save_company_profile()
    {
        if ($_FILES['company_logo']['name'] != '') {
            $file_name = time() . $_FILES['company_logo']['name'];
            move_uploaded_file($_FILES['company_logo']['tmp_name'], "uploads/" . $file_name);
            $_POST["company_logo"] = $file_name;
        }

        if ($_FILES['company_favicon']['name'] != '') {
            $file_name = time() . $_FILES['company_favicon']['name'];
            move_uploaded_file($_FILES['company_favicon']['tmp_name'], "uploads/" . $file_name);
            $_POST["company_favicon"] = $file_name;
        }

        $this->My_model->update("company_profile", ["company_profile_id" => 1], $_POST);
        redirect(base_url() . "admin/company_profile");
    }

    public function update_company_profile()
    {
        $data["company_profile"] = $this->My_model->select("company_profile");
        $this->navbar();
        $this->load->view("admin/update_company_profile", $data);
        $this->footer();
    }

    // <============= End Company Profile Page =============> 

    // <============= Start Enquiry List =============> 

    public function enquiry_list()
    {
        $data['enquires'] = $this->My_model->get_enquiries();
        $data['enquires'] = $this->My_model->select_where("enquires", array('status' => 'active'));
        $this->navbar();
        $this->load->view("admin/enquiry_list", $data);
        $this->footer();
    }

    // <============= End Enquiry List =============> 

    // <============= Start View Enquiry Page =============> 

    public function view_enquiry($enquiry_id)
    {
        $cond = ["enquiry_id" => $enquiry_id];
        $data["enquires"] = $this->Admin_model->select_where("enquires", $cond);
        $this->navbar();
        $this->load->view("admin/view_enquiry", $data);
        $this->footer();
    }

    // <============= End View Enquiry Page =============> 

    // <============= Start Update Status =============> 

    public function update_status()
    {
        // Retrieve GET data using CodeIgniter's request object
        $enquiryId = $this->input->get('id');  // Retrieve 'id' from the URL
        $newStatus = $this->input->get('status');  // Retrieve 'status' from the URL

        // Validate inputs
        if (empty($enquiryId) || empty($newStatus)) {
            // Set an error flash message
            $this->session->set_flashdata('error', 'Invalid request. Missing parameters.');

            // JavaScript redirection using document.referrer with fallback
            echo "<script>alert('Invalid request. Missing parameters.');</script>";
            echo "<script>if (document.referrer) {
                        window.location.href = document.referrer;
                    } else {
                        window.location.href = '/enquiry_list';
                    }</script>";
            exit;
        }

        // Additional validation for `status` values
        $allowedStatuses = ['Active', 'Pending', 'Complete', 'Cancel'];
        if (!in_array($newStatus, $allowedStatuses)) {
            // Set an error flash message
            $this->session->set_flashdata('error', 'Invalid status provided.');

            // JavaScript redirection using document.referrer with fallback
            echo "<script>alert('Invalid status provided.');</script>";
            echo "<script>if (document.referrer) {
                        window.location.href = document.referrer;
                    } else {
                        window.location.href = '/enquiry_list';
                    }</script>";
            exit;
        }

        // Update the status
        $update = $this->My_model->updateStatus($enquiryId, $newStatus);

        if ($update) {
            // Set a success flash message
            $this->session->set_flashdata('success', 'Status updated successfully.');
        } else {
            // Set an error flash message
            $this->session->set_flashdata('error', 'Failed to update status.');
        }

        // Redirect based on the new status
        switch ($newStatus) {
            case 'Pending':
                // Redirect to Pending List page
                echo "<script>window.location.href = 'https://a2zithub.org/reliable_industries/admin/enquiry_list';</script>";
                break;

            case 'Active':
                // Redirect to Active List page
                echo "<script>window.location.href = 'https://a2zithub.org/reliable_industries/admin/active_enquiry';</script>";
                break;

            case 'Complete':
                // Redirect to Complete Enquiry page
                echo "<script>window.location.href = 'https://a2zithub.org/reliable_industries/admin/complete_enquiry';</script>";
                break;

            case 'Cancel':
                // Redirect to Cancel Enquiry page
                echo "<script>window.location.href = 'https://a2zithub.org/reliable_industries/admin/cancel_enquiry';</script>";
                break;

            default:
                // Fallback to enquiry list if status is not recognized
                echo "<script>if (document.referrer) {
                            window.location.href = document.referrer;
                        } else {
                            window.location.href = '/enquiry_list';
                        }</script>";
                break;
        }
    }

    // <============= End Update Status =============> 


    // <============= Start Function to update enquiry status to 'Deactive' =============> 

    public function delete_enquiry($enquiry_id)
    {
        // Load the Enquiry model
        $this->load->model('My_model');

        // Update the status to 'Deactive'
        $this->My_model->update_status($enquiry_id, 'Deactive');

        // Set a success message
        $this->session->set_flashdata('success', 'Enquiry status updated to Deactive.');

        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            // Fallback if HTTP_REFERER is not set
            echo "<script>history.back();</script>";
            exit;
        }
    }

    // <============= End Function to update enquiry status to 'Deactive' =============> 


    // <============= Start Active Enquiry =============> 

    public function active_enquiry()
    {
        $data['enquires'] = $this->My_model->active_records("enquires", array('status' => 'active'));
        $this->navbar();
        $this->load->view("admin/active_enquiry", $data);
        $this->footer();
    }

    // <============= End Active Enquiry =============> 

    // <============= Start Complete Enquiry =============> 

    public function complete_enquiry()
    {
        $data["enquires"] = $this->My_model->complete_records("enquires", array('status' => 'active'));
        $this->navbar();
        $this->load->view("admin/complete_enquiry", $data);
        $this->footer();
    }

    // <============= End Complete Enquiry =============> 

    // <============= Start Cancel Enquiry =============> 
    public function cancel_enquiry()
    {
        $data["enquires"] = $this->My_model->cancel_records("enquires", array('status' => 'active'));
        $this->navbar();
        $this->load->view("admin/cancel_enquiry", $data);
        $this->footer();
    }

    // <============= End Cancel Enquiry =============> 

    // <============= Start Total Enquiry List =============> 
    public function total_enquiry_list()
    {
        // Get total number of enquiries
        $data['total_enquiries'] = $this->My_model->get_total_enquiries();

        // Get the list of actual enquiries (this can be filtered based on your needs, e.g., active)
        $data['enquires'] = $this->My_model->get_enquiries(); // Returns the list of enquiries
        $this->navbar();
        $this->load->view("admin/total_enquiry_list", $data);
        $this->footer();
    }

    // <============= End Total Enquiry List =============> 

    /*<===================== HOME PAGE START =====================>*/

    // <============= Start Slider Secssion =============> 

    public function slider()
    {
        $data['slider'] = $this->My_model->select("slider");
        $this->navbar();
        $this->load->view("admin/slider", $data);
        $this->footer();
    }

    public function add_slider()
    {
        if ($_FILES['slider_image']['name'] != '') {
            $file_name = time() . $_FILES['slider_image']['name'];
            move_uploaded_file($_FILES['slider_image']['tmp_name'], "uploads/" . $file_name);
            $_POST['slider_image'] = $file_name;
        }
        $this->My_model->insert('slider', $_POST);
        redirect(base_url() . "admin/slider");
    }

    public function edit_slider($slider_id)
    {
        $cond = ["slider_id" => $slider_id];
        $data["slider"] = $this->Admin_model->select_where("slider", $cond);
        $this->navbar();
        $this->load->view("admin/edit_slider", $data);
        $this->footer();
    }

    public function update_slider()
    {
        if ($_FILES['slider_image']['name'] != '') {
            $file_name = time() . $_FILES['slider_image']['name'];
            move_uploaded_file($_FILES['slider_image']['tmp_name'], "uploads/" . $file_name);
            $_POST['slider_image'] = $file_name;
        }
        $cond = ["slider_id" => $_POST["slider_id"]];
        $this->Admin_model->update("slider", $cond, $_POST);
        redirect(base_url() . "admin/slider");
    }

    public function delete_slider($slider_id)
    {
        $cond = ["slider_id" => $slider_id];
        $this->My_model->delete("slider", $cond);
        redirect(base_url() . "admin/slider");
    }

    // <============= End Slider Secssion =============> 

    // <============= Start Category Manage Secssion =============> 

    public function category_manage()
    {
        $data['category_manage'] = $this->My_model->select("category_manage");
        $this->navbar();
        $this->load->view("admin/category_manage", $data);
        $this->footer();
    }

    // <============= End Category Manage Secssion =============> 

    // <============= Start Our Work Secssion =============> 

    public function our_work()
    {
        $data["our_work"] = $this->My_model->select("our_work");
        $this->navbar();
        $this->load->view("admin/our_work", $data);
        $this->footer();
    }

    public function add_our_work()
    {
        $this->My_model->insert("our_work", $_POST);
        redirect(base_url() . "admin/our_work");
    }

    public function edit_our_work($work_id)
    {
        $cond = ["work_id" => $work_id];
        $data['our_work'] = $this->Admin_model->select_where("our_work", $cond);
        $this->navbar();
        $this->load->view("admin/edit_our_work", $data);
        $this->footer();
    }

    public function update_our_work()
    {
        $cond = ["work_id" => $_POST['work_id']];
        $this->Admin_model->update("our_work", $cond, $_POST);
        redirect(base_url() . "admin/our_work");
    }

    public function delete_our_work($work_id)
    {
        $cond = ["work_id" => $work_id];
        $this->My_model->delete("our_work", $cond);
        redirect(base_url() . "admin/our_work");
    }

    // <============= End Our Wo Secssion =============> 

    // <============= Start Quality Of Work Secssion =============> 

    public function quality_of_work()
    {

        $data["quality_of_work"] = $this->My_model->select("quality_of_work", $_POST);
        $this->navbar();
        $this->load->view("admin/quality_of_work", $data);
        $this->footer();
    }

    public function add_quality_of_work()
    {
        // $this->My_model->insert("quality_of_work", $_POST);
        $this->My_model->update("quality_of_work", ["quality_of_work_id" => 1], $_POST);
        redirect(base_url() . "admin/quality_of_work");
    }

    // <============= End Quality Of Work Secssion =============> 

    // <============= Start Custom Enquiry Secssion =============> 

    public function custom_enquiry()
    {
        $data["custom"] = $this->My_model->select("custom", $_POST);
        $this->navbar();
        $this->load->view("admin/custom_enquiry", $data);
        $this->footer();
    }

    public function get_custom_enquiry()
    {
        if ($_FILES['custom_image']['name'] != '') {
            $file_name = time() . $_FILES['custom_image']['name'];
            move_uploaded_file($_FILES['custom_image']['tmp_name'], "uploads/" . $file_name);
            $_POST["custom_image"] = $file_name;
        }
        // $this->My_model->insert("custom", $_POST);
        $this->My_model->update("custom", ["custom_id" => 1], $_POST);
        redirect(base_url() . "admin/custom_enquiry");
    }

    // <============= End Custom Enquiry Secssion =============> 

    // <============= Start Packaging Solution's Secssion =============> 

    public function packaging_solutions()
    {
        $data['packaging_solutions'] = $this->My_model->select("packaging_solutions");
        $this->navbar();
        $this->load->view("admin/packaging_solutions", $data);
        $this->footer();
    }

    public function add_packaging_solutions()
    {
        if ($_FILES['packaging_image']['name'] != '') {
            $file_name = time() . $_FILES['packaging_image']['name'];
            move_uploaded_file($_FILES['packaging_image']['tmp_name'], "uploads/" . $file_name);
            $_POST['packaging_image'] = $file_name;
        }
        $this->My_model->insert("packaging_solutions", $_POST);
        redirect(base_url() . "admin/packaging_solutions");
    }

    public function edit_packaging($packaging_solutions_id)
    {
        $cond = ["packaging_solutions_id" => $packaging_solutions_id];
        $data["packaging_solutions"] = $this->Admin_model->select_where("packaging_solutions", $cond);
        $this->navbar();
        $this->load->view("admin/edit_packaging", $data);
        $this->footer();
    }

    public function update_packaging_solutions()
    {
        if ($_FILES['packaging_image']['name'] != '') {
            $file_name = time() . $_FILES['packaging_image']['name'];
            move_uploaded_file($_FILES['packaging_image']['tmp_name'], "uploads/" . $file_name);
            $_POST['packaging_image'] = $file_name;
        }
        $cond = ["packaging_solutions_id" => $_POST['packaging_solutions_id']];
        $this->Admin_model->update("packaging_solutions", $cond, $_POST);
        redirect(base_url() . "admin/packaging_solutions");
    }

    public function delete_packaging($packaging_solutions_id)
    {
        $cond = ["packaging_solutions_id" => $packaging_solutions_id];
        $this->My_model->delete("packaging_solutions", $cond);
        redirect(base_url() . "admin/packaging_solutions");
    }

    // <============= End Packaging Solution's Secssion =============> 

    // <============= Start Trusted By Leading Brands Secssion =============> 

    public function trusted_brands()
    {
        $data['trusted_brands'] = $this->My_model->select("trusted_brands");
        $this->navbar();
        $this->load->view("admin/trusted_brands", $data);
        $this->footer();
    }

    public function add_trusted_brands()
    {
        if ($_FILES['brands_image']['name'] != '') {
            $file_name = time() . $_FILES['brands_image']['name'];
            move_uploaded_file($_FILES['brands_image']['tmp_name'], "uploads/" . $file_name);
            $_POST['brands_image'] = $file_name;
        }
        $this->My_model->insert("trusted_brands", $_POST);
        redirect(base_url() . "admin/trusted_brands");
    }

    public function edit_brands($trusted_brands_id)
    {
        $cond = ["trusted_brands_id" => $trusted_brands_id];
        $data['trusted_brands'] = $this->Admin_model->select_where("trusted_brands", $cond);
        $this->navbar();
        $this->load->view("admin/edit_brands", $data);
        $this->footer();
    }

    public function update_trusted_brands()
    {
        if ($_FILES['brands_image']['name'] != '') {
            $file_name = time() . $_FILES['brands_image']['name'];
            move_uploaded_file($_FILES['brands_image']['tmp_name'], "uploads/" . $file_name);
            $_POST['brands_image'] = $file_name;
        }
        $cond = ["trusted_brands_id" => $_POST["trusted_brands_id"]];
        $this->Admin_model->update("trusted_brands", $cond, $_POST);
        redirect(base_url() . "admin/trusted_brands");
    }

    public function delete_brands($trusted_brands_id)
    {
        $cond = ["trusted_brands_id" => $trusted_brands_id];
        $this->My_model->delete("trusted_brands", $cond);
        redirect(base_url() . "admin/trusted_brands");
    }

    // <============= End Trusted By Leading Brands Secssion =============> 

    // <============= Start Testimonials Secssion =============> 

    public function testimonials()
    {
        $data["testimonials"] = $this->My_model->select("testimonials");
        $this->navbar();
        $this->load->view("admin/testimonials", $data);
        $this->footer();
    }

    public function add_testimonials()
    {
        $this->My_model->insert("testimonials", $_POST);
        redirect(base_url() . "admin/testimonials");
    }

    public function edit_testimonials($testimonials_id)
    {
        $cond = ["testimonials_id" => $testimonials_id];
        $data["testimonials"]  = $this->Admin_model->select_where("testimonials", $cond);
        $this->navbar();
        $this->load->view("admin/edit_testimonials", $data);
        $this->footer();
    }

    public function update_testimonials()
    {
        $cond = ["testimonials_id" => $_POST['testimonials_id']];
        $this->Admin_model->update("testimonials", $cond, $_POST);
        redirect(base_url() . "admin/testimonials");
    }

    public function delete_testimonials($testimonials_id)
    {
        $cond = ["testimonials_id" => $testimonials_id];
        $this->My_model->delete("testimonials", $cond);
        redirect(base_url() . "admin/testimonials");
    }

    // <============= End Testimonials Secssion =============> 

    //  <--======================= START ABOUT PAGE =======================--> 

    // <============= Start About Reliable Secssion =============> 

    public function about_reliable()
    {
        $data["about_reliable"] = $this->My_model->select("about_reliable", $_POST);
        $this->navbar();    
        $this->load->view("admin/about_reliable", $data);
        $this->footer();
    }

    public function add_about_reliable()
    {
        $this->load->library('upload');
        if ($_FILES['about_logo_image']['name'] != '') {
            $file_name = time() . $_FILES['about_logo_image']['name'];
            move_uploaded_file($_FILES['about_logo_image']['tmp_name'], "uploads/" . $file_name);
            $_POST["about_logo_image"] = $file_name;
        }

        if ($_FILES['about_pdf']['name'] != '') {
            // Get file extension
            $file_extension = pathinfo($_FILES['about_pdf']['name'], PATHINFO_EXTENSION);

            // Validate the file type
            if (strtolower($file_extension) === 'pdf') {
                // Generate a unique file name
                $file_name = time() . '_' . $_FILES['about_pdf']['name'];

                // Specify the upload directory
                $upload_dir = "uploads/";

                // Move the uploaded file to the directory
                if (move_uploaded_file($_FILES['about_pdf']['tmp_name'], $upload_dir . $file_name)) {
                    // Add the uploaded file name to the $_POST array
                    $_POST["about_pdf"] = $file_name;
                    echo "PDF file uploaded successfully!";
                } else {
                    echo "Failed to upload PDF file.";
                }
            } else {
                echo "Only PDF files are allowed.";
            }
        }
        // $this->My_model->insert("about_reliable", $_POST);
        $this->My_model->update("about_reliable", ["about_reliable_id" => 3], $_POST);
        redirect(base_url() . "admin/about_reliable");
    }
    // <============= End About Reliable Secssion =============> 

    // <============= Start Who We Are Secssion =============> 

    public function who_we_are()
    {
        $data['about_profile']  = $this->My_model->select("about_profile", $_POST);
        $this->navbar();
        $this->load->view("admin/who_we_are", $data);
        $this->footer();
    }

    public function add_who_we_are()
    {
        if ($_FILES['about_profile_image']['name'] != '') {
            $file_name = time() . $_FILES['about_profile_image']['name'];
            move_uploaded_file($_FILES['about_profile_image']['tmp_name'], "uploads/" . $file_name);
            $_POST['about_profile_image'] = $file_name;
        }
        // $this->My_model->insert("about_profile", $_POST);
        $this->Admin_model->update("about_profile", ["about_profile_id" => 1], $_POST);
        redirect(base_url() . "admin/who_we_are");
    }

    // <============= End Who We Are Secssion =============> 

    // <============= Start Vision & Mission Secssion =============> 

    public function vision_mission()
    {
        $data["vision_mission"] = $this->My_model->select("vision_mission", $_POST);
        $this->navbar();
        $this->load->view("admin/vision_mission", $data);
        $this->footer();
    }

    public function add_vision_mission()
    {
        // $this->My_model->insert("vision_mission", $_POST);
        $this->Admin_model->update("vision_mission", ["vision_mission_id" => 1], $_POST);
        redirect(base_url() . "admin/vision_mission");
    }
    // <============= End Vision & Mission Secssion =============> 


    // <============= Start Excellence Secssion =============> 

    public function excellence()
    {
        $data["excellence"] = $this->My_model->select("excellence", $_POST);
        $this->navbar();
        $this->load->view("admin/excellence", $data);
        $this->footer();
    }

    public function add_excellence()
    {
        // $this->My_model->insert("excellence", $_POST);
        $this->Admin_model->update("excellence", ["excellence_id" => 1], $_POST);
        redirect(base_url() . "admin/excellence");
    }
    // <============= End Excellence Secssion =============> 

    // <============= START PRODUCT PAGE =============> 

    // <============= Start Add Category Secssion =============> 

    public function add_category()
    {
        if ($_FILES['category_image']['name'] != '') {
            $file_name = time() . $_FILES['category_image']['name'];
            move_uploaded_file($_FILES['category_image']['tmp_name'], "uploads/" . $file_name);
            $_POST["category_image"] = $file_name;
        }
        $this->My_model->insert("category_manage", $_POST);
        redirect(base_url() . "admin/category_manage");
    }

    public function edit_category($category_manage_id)
    {
        $cond = ["category_manage_id" => $category_manage_id];
        $data["category_manage"] = $this->Admin_model->select_where("category_manage", $cond);
        $this->navbar();
        $this->load->view("admin/edit_category", $data);
        $this->footer();
    }

    public function update_category()
    {
        if ($_FILES['category_image']['name'] != '') {
            $file_name = time() . $_FILES['category_image']['name'];
            move_uploaded_file($_FILES['category_image']['tmp_name'], "uploads/" . $file_name);
            $_POST['category_image'] = $file_name;
        }
        $cond = ["category_manage_id" => $_POST['category_manage_id']];
        $this->Admin_model->update("category_manage", $cond, $_POST);
        redirect(base_url() . "admin/category_manage");
    }

    public function delete_category($category_manage_id)
    {
        $cond = ["category_manage_id" => $category_manage_id];
        $this->My_model->delete("category_manage", $cond);
        redirect(base_url() . "admin/category_manage");
    }

    // <============= End Add Category Secssion =============> 

    // <============= Start Products Secssion =============> 

    public function products()
    {
        $data["category_manage"] = $this->My_model->select("category_manage");
        $this->navbar();
        $this->load->view("admin/products", $data);
        $this->footer();
    }

    public function add_products()
    {
        // Handle image uploads
        $imageFields = [
            'products_image',
            'products_image1',
            'products_image2',
            'products_image3',
            'products_image4',
            'products_image5'
        ];

        foreach ($imageFields as $field) {
            if (!empty($_FILES[$field]['name'])) {
                $file_name = time() . '_' . $_FILES[$field]['name'];
                move_uploaded_file($_FILES[$field]['tmp_name'], "uploads/" . $file_name);
                $_POST[$field] = $file_name;
            }
        }

        // Remove unwanted specification fields from $_POST before inserting into products table
        $productData = array_intersect_key($_POST, array_flip([
            'category_manage_id',
            'sub_category',
            'products_name',
            'rating',
            'products_label',
            'products_description',
            'products_image',
            'products_image1',
            'products_image2',
            'products_image3',
            'products_image4',
            'products_image5',
        ]));

        // Insert product data and get product ID
        $productId = $this->My_model->insert("products", $productData);

        // Gather and insert specification data
        $titles = $this->input->post('specification_title');
        $descriptions = $this->input->post('specification_description');

        if (!empty($titles) && !empty($descriptions)) {
            $specifications = [];
            foreach ($titles as $key => $title) {
                $specifications[] = [
                    'products_id' => $productId,
                    'specification_title' => $title,
                    'specification_description' => $descriptions[$key],
                ];
            }
            $this->Admin_model->insert_specifications($specifications);
        }

        // Redirect to product listing
        redirect(base_url() . "admin/products");
    }

    public function product_list()
    {
        // Fetch categories and products in a single call for categories and products
        $category_query = $this->db->get('category_manage');
        $data['category_manage'] = $category_query->result_array();

        // Fetch products using the custom model method (assuming My_model is used correctly)
        $data['products'] = $this->My_model->select('products'); // Replace this with the necessary query if needed

        // Load views with data
        $this->navbar();
        $this->load->view('admin/product_list', $data);
        $this->footer();
    }

    public function edit_products($products_id)
    {
        $cond = ["products_id" => $products_id];

        // Fetch categories for dropdown
        $data["category_manage"] = $this->My_model->select("category_manage");

        // Fetch product details
        $data["products"] = $this->Admin_model->select_where("products", $cond);

        // Fetch specifications for the product
        $data["specifications"] = $this->Admin_model->select_where("specification", $cond);

        // Load views
        $this->navbar();
        $this->load->view("admin/edit_products", $data);
        $this->footer();
    }

    public function update_products()
    {
        // Handle image uploads
        $imageFields = [
            'products_image',
            'products_image1',
            'products_image2',
            'products_image3',
            'products_image4',
            'products_image5'
        ];

        foreach ($imageFields as $field) {
            if (!empty($_FILES[$field]['name'])) {
                $file_name = time() . '_' . $_FILES[$field]['name'];
                move_uploaded_file($_FILES[$field]['tmp_name'], "uploads/" . $file_name);
                $_POST[$field] = $file_name;
            }
        }

        // Remove unwanted specification fields from $_POST before updating the products table
        $productData = array_intersect_key($_POST, array_flip([
            'category_manage_id',
            'sub_category',
            'products_name',
            'rating',
            'products_label',
            'products_description',
            'products_image',
            'products_image1',
            'products_image2',
            'products_image3',
            'products_image4',
            'products_image5',
        ]));

        // Define update condition
        $cond = ["products_id" => $_POST['products_id']];

        // Update product data
        $this->Admin_model->update("products", $cond, $productData);

        // Update specifications
        $titles = $this->input->post('specification_title');
        $descriptions = $this->input->post('specification_description');

        if (!empty($titles) && !empty($descriptions)) {
            // Delete old specifications for this product
            $this->Admin_model->delete_specifications($_POST['products_id']);

            // Prepare new specification data
            $specifications = [];
            foreach ($titles as $key => $title) {
                $specifications[] = [
                    'products_id' => $_POST['products_id'],
                    'specification_title' => $title,
                    'specification_description' => $descriptions[$key],
                ];
            }

            // Insert new specifications
            $this->Admin_model->insert_specifications($specifications);
        }

        // Redirect to product listing
        redirect(base_url() . "admin/product_list");
    }

    public function delete_products($products_id)
    {
        // Delete dependent rows from the specification table
        $this->db->where('products_id', $products_id);
        $this->db->delete('specification');

        // Now delete the product
        $this->My_model->delete('products', ['products_id' => $products_id]);

        // Redirect after deletion
        redirect(base_url() . 'admin/product_list');
    }

    public function view_products_details($products_id)
    {
        $cond = ["products_id" => $products_id];
        $data["products"] = $this->Admin_model->select_where("products", $cond);

        // Fetch specifications for the product
        $data["specifications"] = $this->Admin_model->select_where("specification", $cond);
        $this->navbar();
        $this->load->view("admin/view_products_details", $data);
        $this->footer();
    }

    // <============= Start Products Secssion =============> 

    // <======================= START PRODUCT PAGE =======================> 

    // <============= Start Blog Page =============> 

    public function blog()
    {
        $data["blog"] = $this->My_model->select("blog");
        $this->navbar();
        $this->load->view("admin/blog", $data);
        $this->footer();
    }

    public function add_blog()
    {
        if ($_FILES['blog_image']['name'] != '') {
            $file_name = time() . $_FILES['blog_image']['name'];
            move_uploaded_file($_FILES['blog_image']['tmp_name'], "uploads/" . $file_name);
            $_POST['blog_image'] = $file_name;
        }
        $this->My_model->insert("blog", $_POST);
        redirect(base_url() . "admin/blog");
    }

    public function view_blog_details($blog_id)
    {
        $cond = ["blog_id" => $blog_id];
        $data["blog"] = $this->Admin_model->select_where("blog", $cond);
        $this->navbar();
        $this->load->view("admin/view_blog_details", $data);
        $this->footer();
    }

    public function edit_blog($blog_id)
    {
        $cond = ["blog_id" => $blog_id];
        $data["blog"] = $this->Admin_model->select_where("blog", $cond);
        $this->navbar();
        $this->load->view("admin/edit_blog", $data);
        $this->footer();
    }

    public function update_blog()
    {
        if ($_FILES['blog_image']['name'] != '') {
            $file_name = time() . $_FILES['blog_image']['name'];
            move_uploaded_file($_FILES['blog_image']['tmp_name'], "uploads/" . $file_name);
            $_POST['blog_image'] = $file_name;
        }
        $cond = ["blog_id" => $_POST['blog_id']];
        $this->Admin_model->update("blog", $cond, $_POST);
        redirect(base_url() . "admin/blog");
    }

    public function delete_blog($blog_id)
    {
        $cond = ["blog_id" => $blog_id];
        $this->My_model->delete("blog", $cond);
        redirect(base_url() . "admin/blog");
    }

    // <============= End Blog Page =============> 

    // <============= Start FAQ Page =============> 

    public function faq()
    {
        $data["faq"] = $this->My_model->select("faq");
        $this->navbar();
        $this->load->view("admin/faq", $data);
        $this->footer();
    }

    public function add_faq()
    {
        $this->My_model->insert("faq", $_POST);
        redirect(base_url() . "admin/faq");
    }

    public function edit_faq($faq_id)
    {
        $cond = ["faq_id" => $faq_id];
        $data["faq"] = $this->Admin_model->select_where("faq", $cond);
        $this->navbar();
        $this->load->view("admin/edit_faq", $data);
        $this->footer();
    }

    public function update_faq()
    {
        $cond = ["faq_id" => $_POST['faq_id']];
        $this->Admin_model->update("faq", $cond, $_POST);
        redirect(base_url() . "admin/faq");
    }

    public function delete_faq($faq_id)
    {
        $cond = ["faq_id" => $faq_id];
        $this->My_model->delete("faq", $cond);
        redirect(base_url() . "admin/faq");
    }

    // <============= Start FAQ Page =============> 

    // <============= Start Privacy Policy Page =============> 

    public function privacy_policy()
    {
        $data['privacy_policy'] = $this->My_model->select("privacy_policy");
        $this->navbar();
        $this->load->view("admin/privacy_policy", $data);
        $this->footer();
    }

    public function add_privacy_policy()
    {
        $this->My_model->insert("privacy_policy", $_POST);
        redirect(base_url() . "admin/privacy_policy");
    }

    public function edit_privacy_policy($privacy_policy_id)
    {
        $cond = ["privacy_policy_id" => $privacy_policy_id];
        $data["privacy_policy"] = $this->Admin_model->select_where("privacy_policy", $cond);
        $this->navbar();
        $this->load->view("admin/edit_privacy_policy", $data);
        $this->footer();
    }

    public function update_privacy_policy()
    {
        $cond = ["privacy_policy_id" => $_POST["privacy_policy_id"]];
        $this->Admin_model->update("privacy_policy", $cond, $_POST);
        redirect(base_url() . "admin/privacy_policy");
    }

    public function delete_privacy_policy($privacy_policy_id)
    {
        $cond = ["privacy_policy_id" => $privacy_policy_id];
        $this->My_model->delete("privacy_policy", $cond);
        redirect(base_url() . "admin/privacy_policy");
    }

    // <============= End Privacy Policy Page =============> 

    // <============= Start Contact Page =============> 

    public function contact()
    {
        $data['contact'] = $this->My_model->select("contact");
        $this->navbar();
        $this->load->view("admin/contact", $data);
        $this->footer();
    }

    public function delete_contact($contact_id)
    {
        $cond = ["contact_id" => $contact_id];
        $this->My_model->delete("contact", $cond);
        redirect(base_url() . "admin/contact");
    }

    // <============= End Contact Page =============> 

    // <============= Start Manufacturing Unit's Secssion =============> 

    public function manufacturing_units()
    {
        $data["manufacturing_units"] = $this->My_model->select("manufacturing_units");
        $this->navbar();
        $this->load->view("admin/manufacturing_units", $data);
        $this->footer();
    }

    public function add_manufacturing()
    {
        $this->My_model->insert("manufacturing_units", $_POST);
        redirect(base_url() . "admin/manufacturing_units");
    }

    public function edit_units($manufacturing_units_id)
    {
        $cond = ["manufacturing_units_id" => $manufacturing_units_id];
        $data["manufacturing_units"] = $this->Admin_model->select_where("manufacturing_units", $cond);
        $this->navbar();
        $this->load->view("admin/edit_units", $data);
        $this->footer();
    }

    public function update_manufacturing()
    {
        $cond = ["manufacturing_units_id" => $_POST["manufacturing_units_id"]];
        $this->Admin_model->update("manufacturing_units", $cond, $_POST);
        redirect(base_url() . "admin/manufacturing_units");
    }

    public function delete_units($manufacturing_units_id)
    {
        $cond = ["manufacturing_units_id" => $manufacturing_units_id];
        $this->My_model->delete("manufacturing_units", $cond);
        redirect(base_url() . "admin/manufacturing_units");
    }

    // <============= End Manufacturing Unit's Secssion =============> 

    // <============= Start Subscriber Secssion =============> 

    public function subscriber()
    {
        $data["newsletter"] = $this->My_model->select("newsletter");
        $this->navbar();
        $this->load->view("admin/subscriber", $data);
        $this->footer();
    }

    public function delete_subscriber($newsletter_id)
    {
        $cond = ["newsletter_id" => $newsletter_id];
        $this->My_model->delete("newsletter", $cond);
        redirect(base_url() . "admin/subscriber");
    }

    // <============= End Subscriber Secssion =============> 

    // <============= Start Support Secssion =============> 

    public function support()
    {
        $this->load->model('Admin_model');
        // Assume the method getAdminAccountTypes returns an array of objects with all necessary fields
        $data["accountTypes"] = $this->Admin_model->getAdminAccountTypes();
        $this->navbar();
        $this->load->view("admin/support", $data);
        $this->footer();
    }

    // <============= End Support Secssion =============> 

    // <============= START FOOTER PAGE =============> 

    protected function footer()
    {
        $data["admin_account"] = $this->My_model->select("admin_account");
        $this->load->view("admin/footer", $data);
    }

    // <============= END FOOTER PAGE =============> 

}
