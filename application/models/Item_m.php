<?php defined('BASEPATH') OR exit('No direct script access allowed');

class item_m extends CI_Model { 

    /**
     * Get item 
     */
    public function get($id = null) {
        $this->db->select('p_item.*, p_category.name as name_category, p_unit.name as name_unit');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_item.category_id = p_category.category_id');
        $this->db->join('p_unit', 'p_item.unit_id = p_unit.unit_id');
        if ($id != null) {
            $this->db->where('item_id', $id);
        }
		$this->db->order_by("created", "desc");
        $query = $this->db->get();
        return $query;
    }

	/**
	 * Get item latest
	 */
	public function get_latest() {
		$this->db->select('p_item.*, p_category.name as name_category, p_unit.name as name_unit');
		$this->db->from('p_item');
		$this->db->join('p_category', 'p_item.category_id = p_category.category_id');
		$this->db->join('p_unit', 'p_item.unit_id = p_unit.unit_id');
		$this->db->order_by("created", "desc");
		$this->db->limit(4);
		$query = $this->db->get();
		return $query;
	}

    /**
     * Used to add item
     */
    public function add($post) {
        $params = [
            'name' => $post['product_name'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'image' => $post['image'] != null ? $post['image'] : null
        ];
        $this->db->insert('p_item', $params);
    }

    /**
     * Used to Edit Item
     */
    public function edit($post) {
        $params = [
            'name' => $post['product_name'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'updated' => date('Y-m-d H:i:s')
        ];

		if ($post['image'] != null) {
			$params['image'] = $post['image'];
		}

        $this->db->where('item_id', $post['id']);
        $this->db->update('p_item',  $params);
    }

    /**
     * Check Existing Barcode 
     */
    function check_barcode($code, $id =null) {
        $this->db->from('p_item');
        $this->db->where('barcode', $code);
        if ($id != null) {
            $this->db->where('item_id !=', $id);
        }

        $query = $this->db->get();
        return $query;

    }

    /**
     * Delete item
     *
     */
    public function delete($id) {
        $this->db->where('item_id', $id);
        $this->db->delete('p_item');
    }

    /**
     * Update Data Stock In
     */
    public function update_stock_in($data) {
        $id = $data['item_id'];
        $qty = $data['qty'];
        $sql = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }

    /**
     * Update Data Stock Out
     */
	public function update_stock_out($data) {
		$qty = $data['qty'];
		$id = $data['item_id'];
		$sql = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$id'";
		$this->db->query($sql);
	}

}
