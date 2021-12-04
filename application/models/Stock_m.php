<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model {

	public  function get_stock($id)
	{
		$this->db->from('t_stock');
		if ($id != null) {
			$this->db->where('stock_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

    public function get_stock_in($id = null)
    {
		$this->db->select('t_stock.*,p_item.barcode as item_barcode, p_item.name as item_name, p_item.price as item_price, supplier.name as supplier_name');
		$this->db->from('t_stock');
		$this->db->join('p_item', 'p_item.item_id=t_stock.item_id');
		$this->db->join('supplier', 'supplier.supplier_id=t_stock.supplier_id', 'left');
		$this->db->where('type', 'in');
		if ($id != null) {
			$this->db->where('stock_id', $id);
		}
		$query = $this->db->get();
		return $query;
    }

	public function get_stock_out($id = null)
	{
		$this->db->select('t_stock.*,p_item.barcode as item_barcode, p_item.name as item_name, p_item.price as item_price, supplier.name as supplier_name');
		$this->db->from('t_stock');
		$this->db->join('p_item', 'p_item.item_id=t_stock.item_id');
		$this->db->join('supplier', 'supplier.supplier_id=t_stock.supplier_id', 'left');
		$this->db->where('type', 'out');
		if ($id != null) {
			$this->db->where('stock_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add_stock_out($post)
	{
		$data = [
			'date' => $post['date'],
			'item_id' => $post['item_id'],
			'type' => 'out',
			'detail' => $post['detail'],
			'qty' => $post['qty'],
			'user_id' => $this->session->userdata('userid')
		];

		$this->db->insert('t_stock', $data);
	}

    public function add_stock_in($post) 
    {
        $params = [
            'date' => $post['date'],
            'item_id' => $post['item_id'],
            'type' => 'in',
            'detail' => $post['detail'],
            'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty'],
            'user_id' => $this->session->userdata('userid')
        ];

        $this->db->insert('t_stock', $params);
    }

	public function delete($id)
	{
		$this->db->where('stock_id', $id);
		$this->db->delete('t_stock');
	}

}
