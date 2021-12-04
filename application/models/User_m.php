<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model { 

    public function login($post) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    /**
     * Get User Data
     */
    public function get($id = null) {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    /**
     * Save Data User
     */
    public function add($post) {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['address'];
        $params['level'] = $post['level'];
        $this->db->insert('user', $params);
    }

    /**
     * Update Data User
     */
    public function edit($post) {
        $params = [
            'name' => $post['fullname'],
            'username' => $post['username'],
            'password' => $post['password'],
            'address' => $post['address'],
            'level' => $post['level'],
        ];

        $this->db->where('user', $post['id']);
        $this->db->update('user',  $params);
    }

    /**
     * Delete Data User
     */
    public function del($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

}