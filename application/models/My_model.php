<?php
class My_model extends CI_Model
{
    public function insert($tname, $data)
    {
        $this->db->insert($tname, $data);
        return $this->db->insert_id();
    }
    public function select($tname)
    {
        return $this->db->get($tname)->result_array();
    }
    // <---==================Pending Records==================---> 
    public function select_where($tname, $cond)
    {
        $status = 'Pending';
        $this->db->where('status', 'active', $cond);
        $this->db->where('enquiry_status', $status);
        $this->db->order_by('enquiry_date', 'DESC');
        return $this->db->where($cond)->get($tname)->result_array();
    }
    // <---==================Active Records==================---> 
    public function active_records($tname, $cond)
    {
        $status = 'Active';
        $this->db->where('status', 'active', $cond);
        $this->db->where('enquiry_status', $status);
        $this->db->order_by('enquiry_date', 'DESC');
        return $this->db->where($cond)->get($tname)->result_array();
    }
    // <---==================Complete Records==================---> 
    public function complete_records($tname, $cond)
    {
        $status = 'Complete';
        $this->db->where('status', 'active', $cond);
        $this->db->where('enquiry_status', $status);
        $this->db->order_by('enquiry_date', 'DESC');
        return $this->db->where($cond)->get($tname)->result_array();
    }
    // <---==================Cancel Records==================---> 
    public function cancel_records($tname, $cond)
    {
        $status = 'Cancel';
        $this->db->where('status', 'active', $cond);
        $this->db->where('enquiry_status', $status);
        $this->db->order_by('enquiry_date', 'DESC');
        return $this->db->where($cond)->get($tname)->result_array();
    }

    public function update($tname, $cond, $data)
    {
        $this->db->where($cond)->update($tname, $data);
    }
    public function delete($tname, $cond)
    {
        return $this->db->where($cond)->delete($tname);
    }

    // Function to update the enquiry status
    public function update_status($enquiry_id, $status)
    {
        $this->db->where('enquiry_id', $enquiry_id); // Locate the correct enquiry by ID
        $this->db->update('enquires', ['status' => $status]); // Update status
    }

    // SWITCH CASE STATUS 
    public function updateStatus($enquiryId, $newStatus)
    {
        return $this->db->set('enquiry_status', $newStatus)
            ->where('enquiry_id', $enquiryId)
            ->update("enquires");
    }

    public function get_pending_enquiry_count()
    {
        $this->db->where('enquiry_status', 'Pending');
        $this->db->where('status', 'Active'); // Add this line to filter by status
        $this->db->from('enquires');
        return $this->db->count_all_results();
    }

    public function get_enquiries()
    {
        $this->db->where('status', 'Active'); // Apply the WHERE condition first
        $query = $this->db->get('enquires'); // Then retrieve the data
        return $query->result_array(); // Return the results as an array
    }


    // Method to get the total number of enquiries
    public function get_total_enquiries()
    {
        $this->db->where('status', 'Active');
        return $this->db->count_all('enquires');
    }

    public function get_enquiries_by_status($status)
    {
        $this->db->where('status', $status);
        return $this->db->count_all_results('enquires');
    }

    public function get_related_blogs($current_blog_id, $current_blog_category)
    {
        // Check if both parameters are passed and not empty
        if (empty($current_blog_id) || empty($current_blog_category)) {
            return [];  // If data is missing, return an empty array
        }

        // Prepare and execute query to fetch blogs from the same category, excluding the current blog
        $this->db->where('blog_category', $current_blog_category);
        $this->db->where('blog_id !=', $current_blog_id);
        $query = $this->db->get('blog');

        if ($query->num_rows() > 0) {
            // Return the result as an array if blogs are found
            return $query->result_array();
        } else {
            // If no related blogs found, return an empty array
            return [];
        }
    }

    public function get_blog_by_id($blog_id)
    {
        return $this->db->where('blog_id', $blog_id)->get('blog')->row_array();
    }

    public function get_where($table, $conditions)
    {
        $query = $this->db->get_where($table, $conditions);
        return $query->row(); // Return a single result (or null if not found)
    }


    // ProductModel.php
    public function get_products_with_category_names()
    {
        $this->db->select('products.*, category_manage.category_name');
        $this->db->from('products');
        $this->db->join('category_manage', 'products.category_manage_id = category_manage.category_manage_id');
        $query = $this->db->get();
        return $query->result_array();
    }
}
