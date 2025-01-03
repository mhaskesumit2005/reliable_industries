<?php  // application/models/Admin_model.php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function select_where($tname, $cond)
    {
        return $this->db->where($cond)->get($tname)->result_array();
    }
    public function update($tname, $cond, $data)
    {
        $this->db->where($cond)->update($tname, $data);
    }

    public function validate_admin($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Assuming password is hashed using md5().

        $query = $this->db->get('admin_account');

        if ($query->num_rows() == 1) {
            return $query->row(); // Return the admin data if credentials match.
        } else {
            return false; // Return false if no match.
        }
    }

    // <============= GET ADMIN DATA BY ID =============> 
    public function getAdminById($admin_account_id)
    {
        $this->db->where('admin_account_id', $admin_account_id);
        $query = $this->db->get('admin_account');
        return $query->row(); // return a single admin record
    }

    // <============= GET ADMIN BY USERNAME =============> 
    public function get_admin_by_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('admin_account');

        if ($query->num_rows() > 0) {
            return $query->row_array(); // Fetch admin data as an associative array
        }
        return false; // Return false if the user does not exist
    }

    // <============= FETCH ADMIN DETAILS BY ID =============> 
    public function get_admin_by_id($admin_account_id)
    {
        $this->db->where('admin_account_id', $admin_account_id);
        $query = $this->db->get('admin_account');
        return $query->row_array();  // Return the admin details as an array
    }

    public function update_admin_password($admin_id, $update_data)
    {
        $this->db->where('admin_account_id', $admin_id);
        return $this->db->update('admin_account', $update_data); // Assuming your table is named 'admins'
    }

    // <============= SAVE PDF FUNCTION =============> 
    public function savePdf($data)
    {
        return $this->db->insert('about_reliable', $data);
    }

    // <============= INSERT SPECIFICATION =============> 
    public function insert_specifications($data)
    {
        $this->db->insert_batch('specification', $data); // Insert multiple rows
    }

    public function delete_specifications($products_id)
    {
        $this->db->delete('specification', ['products_id' => $products_id]);
    }

    /* Method to get related products based on sub_category, excluding the current product */
    public function select_where_not_in($table, $cond, $column, $exclude_value)
    {
        $this->db->where($cond);
        $this->db->where_not_in($column, $exclude_value);
        $query = $this->db->get($table);
        return $query->result_array();
    }


    /* Function to get admin account types */
    public function getAdminAccountTypes()
    {
        $query = "SELECT admin_account_type, admin_first_name, admin_last_name, admin_contact, admin_email, admin_organization 
              FROM admin_account 
              WHERE admin_account_type = 'Developer' OR admin_account_type = 'Project Manager';";

        $result = $this->db->query($query);

        if ($result->num_rows() > 0) {
            return $result->result_array(); // Returns an array of associative arrays
        } else {
            return []; // Return an empty array if no results
        }
    }

    public function get_blog_count()
    {
        return $this->db->count_all('blog'); // Count all blogs in the 'blog' table
    }

    public function get_blogs($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('blog_date', 'DESC');
        $query = $this->db->get('blog'); // Fetch blogs from the 'blog' table
        return $query->result_array();
    }
    // resent blog 
    public function get_new_blogs($new_threshold, $limit)
    {
        $this->db->where('blog_date >=', $new_threshold);
        $this->db->order_by('blog_date', 'DESC'); // Most recent blogs first
        $this->db->limit($limit); // Limit the results to a specific number
        $query = $this->db->get('blog'); // Fetch from the 'blog' table

        return $query->result_array();
    }
}
