<?php
class User extends CI_Controller
{
    // <============= START NAVBAR SECSSION =============> 
    protected function navbar()
    {
        $data["company_profile"] = $this->My_model->select("company_profile");
        $this->load->view("user/navbar", $data);
    }
    // <============= END NAVBAR SECSSION =============> 

    // <============= START INDEX PAGE =============> 

    public function index()
    {
        $data['slider'] = $this->My_model->select("slider");
        $data['our_work'] = $this->My_model->select("our_work");
        $data['quality_of_work'] = $this->My_model->select("quality_of_work");
        $data['custom'] = $this->My_model->select("custom");
        $data['packaging_solutions'] = $this->My_model->select("packaging_solutions");
        $data['trusted_brands'] = $this->My_model->select("trusted_brands");
        $data['testimonials'] = $this->My_model->select("testimonials");
        $data["products"] = $this->My_model->select("products");
        $data["packaging_solutions"] = $this->My_model->select("packaging_solutions");
        $this->navbar();
        $this->load->view("user/index", $data);
        $this->footer();
    }

    public function enquiry_now()
    {
        echo "<pre>";
        print_r($_POST);
        $this->My_model->insert("enquires", $_POST);
        redirect(base_url());
    }

    // <============= END INDEX PAGE =============> 

    // <============= START ABOUT PAGE =============> 

    public function about()
    {
        $data['about_reliable'] = $this->My_model->select("about_reliable");
        $data['about_profile'] = $this->My_model->select("about_profile");
        $data['vision_mission'] = $this->My_model->select("vision_mission");
        $data['excellence'] = $this->My_model->select("excellence");
        $this->navbar();
        $this->load->view("user/about", $data);
        $this->footer();
    }

    // <============= END ABOUT PAGE =============> 

    // <============= START ENQUIRY PAGE =============> 

    public function enquiry()
    {
        $data['custom'] = $this->My_model->select("custom");
        $data["products"] = $this->My_model->select("products");
        $data["packaging_solutions"] = $this->My_model->select("packaging_solutions");
        $this->navbar();
        $this->load->view("user/enquiry", $data);
        $this->footer();
    }
    // <============= END ENQUIRY PAGE =============> 

    // <============= START PRODUCT PAGE =============> 

    public function product()
    {
        $data["category_manage"] = $this->My_model->select("category_manage");
        $data["products"] = $this->My_model->select("products");
        $this->navbar();
        $this->load->view("user/product", $data);
        $this->footer();
    }
    // <============= END PRODUCT PAGE =============> 

    // <============= START PRODUCT DETAILS PAGE =============> 

    public function products_details($products_id)
    {
        // Fetch the current product details
        $cond = ["products_id" => $products_id];
        $data["products"] = $this->Admin_model->select_where("products", $cond);

        // Fetch specifications for the product
        $data["specifications"] = $this->Admin_model->select_where("specification", $cond);

        // Get the sub_category of the current product
        $sub_category = $data["products"][0]["sub_category"];

        // Fetch related products based on the sub_category (excluding the current product)
        $related_cond = ["sub_category" => $sub_category];
        $data["related_products"] = $this->Admin_model->select_where_not_in("products", $related_cond, "products_id", $products_id);

        // Load the navbar and footer
        $this->navbar();
        $this->load->view("user/products_details", $data);
        $this->footer();
    }
    // <============= END PRODUCT DETAILS PAGE =============> 

    // <============= START BLOG PAGE =============> 

    public function blog()
    {
        $this->load->library('pagination');
        $this->load->model('Admin_model');

        // Pagination configuration
        $config['base_url'] = base_url('user/blog'); // Base URL for pagination
        $config['total_rows'] = $this->Admin_model->get_blog_count(); // Count all blogs
        $config['per_page'] = 3; // Show 3 blogs per page
        $config['uri_segment'] = 3; // Define URI segment for pagination

        // Pagination Configuration for CodeIgniter
        $config['full_tag_open'] = '<ul class="pagination d-flex justify-content-center">'; // Container
        $config['full_tag_close'] = '</ul>';

        $config['num_tag_open'] = '<li class="page-item">'; // Numbered Pages
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="javascript:void(0)">'; // Active Page
        $config['cur_tag_close'] = '</a></li>';

        $config['prev_tag_open'] = '<li class="page-item">'; // Previous Button
        $config['prev_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="page-item">'; // Next Button
        $config['next_tag_close'] = '</li>';

        $config['first_tag_open'] = '<li class="page-item">'; // First Button
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">'; // Last Button
        $config['last_tag_close'] = '</li>';

        $config['attributes'] = ['class' => 'page-link focus-ring focus-ring-light']; // Common link styling

        $config['prev_link'] = '&laquo;'; // Text for Previous
        $config['next_link'] = '&raquo;'; // Text for Next
        $config['first_link'] = 'First'; // Optional First Link Text
        $config['last_link'] = 'Last'; // Optional Last Link Text

        $this->pagination->initialize($config);

        // Get current page
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Fetch blogs
        $data['blogs'] = $this->Admin_model->get_blogs($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();

        // Define threshold for "new" blogs (last 7 days)
        $new_threshold = date('Y-m-d', strtotime('-7 days'));

        // Fetch blogs filtered by newness and limited to the latest 3
        $data['recent_blogs'] = $this->Admin_model->get_new_blogs($new_threshold, 3);

        if ($this->input->is_ajax_request()) {
            $this->load->view('user/ajax_blog', $data);
        } else {
            $data['blog'] = $this->Admin_model->get_blogs($config['per_page'], $page);
            $this->navbar(); // Navigation bar view
            $this->load->view('user/blog', $data);
            $this->footer(); // Footer view
        }
    }
    // <============= START BLOG DETAILS PAGE =============> 

    public function blog_details($blog_id = null)
    {
        // Default to null to handle missing parameter gracefully
        if ($blog_id === null) {
            show_404(); // Return a 404 error if no blog ID is provided
            return;  // Stop execution if no blog ID is found
        }

        // Get current blog details
        $current_blog = $this->My_model->get_blog_by_id($blog_id);

        if ($current_blog) {
            // Fetch related blogs from the same category, excluding the current blog
            $related_blogs = $this->My_model->get_related_blogs($current_blog['blog_id'], $current_blog['blog_category']);

            // Prepare data array to pass to the view
            $data['current_blog'] = $current_blog;
            $data['related_blogs'] = $related_blogs;  // Include the related blogs in the data

        } else {
            show_404(); // Handle case where the blog doesn't exist
        }

        // Loading additional blog data
        $cond = ["blog_id" => $blog_id];
        $data['blog'] = $this->Admin_model->select_where("blog", $cond); // Fetch specific blog data

        // Load additional required models or methods (if applicable)
        $this->navbar();  // Presumably for navigation
        $this->load->view("user/blog_details", $data); // Load the view with the data
        $this->footer();  // Presumably for footer content
    }

    // <============= END BLOG PAGE =============> 

    // <============= START PEIVACY POLICY PAGE =============> 

    public function privacy_policy()
    {
        $data['privacy_policy'] = $this->My_model->select("privacy_policy");
        $this->navbar();
        $this->load->view("user/privacy_policy", $data);
        $this->footer();
    }
    // <============= END PEIVACY POLICY PAGE =============> 

    // <============= START FAQ PAGE =============> 

    public function faq()
    {
        $data["faq"] = $this->My_model->select("faq");
        $this->navbar();
        $this->load->view("user/faq", $data);
        $this->footer();
    }
    // <============= END FAQ PAGE =============> 

    // <============= START CONTACT PAGE =============> 

    public function contact()
    {
        $data['company_profile'] = $this->My_model->select("company_profile");
        $data['manufacturing_units'] = $this->My_model->select("manufacturing_units");
        $this->navbar();
        $this->load->view("user/contact", $data);
        $this->footer();
    }

    public function send_contact()
    {
        $this->My_model->insert("contact", $_POST);
        redirect(base_url() . "user/contact");
    }
    // <============= END CONTACT PAGE =============> 


    // <============= START NEWSLETTER SECSSION =============> 
    public function newsletter()
    {
        // Get email from POST data
        $email = $this->input->post('email', TRUE);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->session->set_flashdata('alert_type', 'error');
            $this->session->set_flashdata('alert_message', 'Invalid email address! Please try again.');
            redirect(base_url());
            return;
        }

        // Check if the email already exists in the 'newsletter' table
        $isEmailRegistered = $this->My_model->get_where('newsletter', ['email' => $email]);

        if ($isEmailRegistered) {
            $this->session->set_flashdata('alert_type', 'warning');
            $this->session->set_flashdata('alert_message', 'You are already subscribed to the newsletter!');
        } else {
            // Insert email into 'newsletter' table
            $this->My_model->insert('newsletter', ['email' => $email]);

            $this->session->set_flashdata('alert_type', 'success');
            $this->session->set_flashdata('alert_message', 'Thank you for subscribing to the newsletter!');
        }

        // Redirect back to the contact page with flash data
        redirect(base_url());
    }
    // <============= END NEWSLETTER SECSSION =============> 

    // <============= START FOOTER PAGE =============> 
    protected function footer()
    {
        $data['company_profile'] = $this->My_model->select("company_profile");
        $data['admin_account'] = $this->My_model->select("admin_account");
        $this->load->view("user/footer", $data);
    }
    // <============= END FOOTER PAGE =============> 

}
