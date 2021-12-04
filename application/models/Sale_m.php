<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_m extends CI_Model {

	public function generate_invoice() {
		$sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
				FROM t_sale 
				WHERE MID(invoice,3,6) = DATE_FORMAT(CURRENT_DATE(), '%y%m%d')";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$n = ((int)$row->invoice_no) + 1;
			$no = sprintf("%'.04d", $n);
		} else {
			$no = "0001";
		}
		$invoice = "MP" . date('ymd') . $no;
		return $invoice;
	}

	public function get_sale($id = null) {
		$this->db->select('*, customer.name as customer_name, user.name as user_name, t_sale.created as sale_created');
		$this->db->from('t_sale');
		$this->db->join('user', 't_sale.user_id=user.user_id');
		$this->db->join('customer', 't_sale.customer_id=customer.customer_id', 'left');
		if ($id != null) {
			$this->db->where('sale_id', $id);
		}
		$this->db->order_by('t_sale.created', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function get_sale_detail($sale_id = null) {
		$this->db->select('*, customer.name as customer_name, p_item.name as item_name');
		$this->db->from('t_sale_detail');
		$this->db->join('p_item', 't_sale_detail.item_id=p_item.item_id');
		$this->db->join('t_sale', 't_sale_detail.sale_id=t_sale.sale_id');
		$this->db->join('customer', 't_sale.customer_id=customer.customer_id', 'left');
		if ($sale_id != null) {
			$this->db->where('t_sale_detail.sale_id', $sale_id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add_sale($post) {
        $data = [
            'invoice' => $this->generate_invoice(),
            'customer_id' => $post['customer_id'] != null ? $post['customer_id'] : null,
            'total_price' => (int) $post['sub_total'],
            'discount' => $post['discount'] != null ? (int) $post['discount'] : null,
            'final_price' => (int) $post['grand_total'],
            'cash' => (int) $post['cash'],
            'remaining' => (int) $post['change'],
            'note' => $post['note'] != null ? $post['note'] : null,
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid')
        ];

        $this->db->insert('t_sale', $data);
        return $this->db->insert_id();
    }

	public function add_sale_detail($post, $sale_id) {
		$data = [
			'sale_id' => $sale_id,
			'qty' => $post['qty'],
			'item_id' => $post['item_id'],
			'total' => $post['total']
		];

		$this->db->insert('t_sale_detail', $data);
	}


}
