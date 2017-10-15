<?php

class Items extends CI_Model {

    function get_live_items($search_data) {

        $this->db->select("title,description");

        $this->db->from('item');
        $this->db->group_start();
        $this->db->like('title', $search_data);
        $this->db->or_like('description', $search_data);
        $this->db->group_end();

        $this->db->limit(10);
        $this->db->order_by("id", 'desc');
        $query = $this->db->get();

        return $query->result();
    }

}
