<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RoomModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getBookedRoom($roomId)
    {
        if (is_array($roomId)) {
            $rooms = implode(',', $roomId);

            $query = $this->db->query("SELECT name FROM room WHERE id IN ($rooms)");
        } else {
            $query = $this->db->query("SELECT name FROM room WHERE id = $roomId");
        }
        
        return $query->result_array();
    }
}
