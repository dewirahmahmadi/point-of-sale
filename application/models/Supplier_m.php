<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model { 

    /**
     * Get Supplier 
     */
    public function get($id = null){
        $this->db->from('supplier');
        if ($id != null) {
            $this->db->where('supplier_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    /**
     * Method used to Add Supplier
     */
    public function add($post){
        $params = [
            'name' => $post['supplier_name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => empty($post['description']) ? null : $post['description']
        ];

        $this->db->insert('supplier', $params);
    }

    public function edit($post){
        $params = [
            'name' => $post['supplier_name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => empty($post['description']) ? null : $post['description'],
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db->where('supplier_id', $post['id']);
        $this->db->update('supplier',  $params);
    }

    /**
     * Delete Supplier
     *
     */
    public function delete($id){
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }

}
