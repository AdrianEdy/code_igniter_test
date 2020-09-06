<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BookingModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getBookingDay()
    {
        $query = $this->db->query("SELECT DISTINCT FROM_UNIXTIME(booking_date, '%Y-%m-%d') as booking_day 
            FROM booking");

        return $query->result_array();
    }

    public function getBookingAt($time)
    {
        $query = $this->db->query("SELECT room_id, FROM_UNIXTIME(booking_date, '%Y-%m-%d') as booking_day FROM booking
            HAVING booking_day = '{$time}'");
        
        return $query->result_array();
    }
}
